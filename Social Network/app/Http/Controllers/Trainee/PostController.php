<?php


namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $Post;
    protected $tag;


    public function __construct(Post $Posts, Tag $tag)
    {
        $this->Post = $Posts;
        $this->tag = $tag;
    }
    public function index()
    {
        $Posts = $this->Post->GetPostsWithDetails()->latest()->get();
        return view('pages.trainee.index',compact('Posts'));
    }

    public function create()
    {
        $tags = $this->tag->all();
        return view('pages.trainee.create',compact('tags'));
    }
    public function store(StorePostRequest $request)
    {

        $Fields = array_merge($request->validated(), ['user_id' => Auth::id()]);
        $Posts = $this->Post->create($Fields);

        //////////////Attaching tags to posts///////////////
        $tags = $request->input('tags', []);
        $tagIds = [];
        foreach ($tags as $tag) {
            if (is_numeric($tag)) {
                $tagIds[] = $tag;
            } else {
                $newTag =  $this->tag->create(['name' => $tag]);
                $tagIds[] = $newTag->id;
            }
        }
        $Posts->tags()->sync($tagIds);

        return redirect()->route('Index-post-trainee');
    }

    public function show($id)
    {
        $Post = $this->Post->find($id);
        return view('pages.trainee.show', compact('Post'));
    }
    public function edit(string $id)
    {
        $tags = $this->tag->all();
        $Post = $this->Post->find($id);
        return view('pages.trainee.edit',compact('Post','tags'));
    }
    public function update(Request $request, string $id)
    {
        $Post = $this->Post->find($id);
        $Post->update($request->all());
        $tags = $request->input('tags', []);
        $tagIds = [];
        foreach ($tags as $tag) {
            if (is_numeric($tag)) {
                $tagIds[] = $tag;
            } else {
                $newTag =  $this->tag->create(['name' => $tag]);
                $tagIds[] = $newTag->id;
            }
        }
        $Post->tags()->sync($tagIds);
        return to_route('Index-post-trainee');

    }
    public function destroy(string $id)
    {
        $Posts = $this->Post->find($id);
        $Posts->tags()->detach();
        $Posts->delete();
        return to_route('Index-post-trainee');
    }
}
