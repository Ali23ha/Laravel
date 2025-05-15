<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $Posts = Post::GetPostsWithDetails()->get();
        //dd($Posts);
        return view('pages.coach.index',compact('Posts'));
    }
    public function create()
    {
        return view('pages.coach.create');
    }
    public function store(StorePostRequest $request)
    {
        $Fields = array_merge([$request->validated(),['user_id' => Auth::id()]]);

        $Posts = Post::create($Fields);

        return redirect()->route('Index-post-coach');
    }

    public function show($id)
    {
        $Post = Post::find($id);
        return view('pages.coach.show', compact('Post'));
    }
    public function edit(string $id)
    {
        $Post = Post::find($id);
        return view('pages.coach.edit',compact('Post'));
    }


    public function update(Request $request, string $id)
    {
        $Post = Post::find($id);
        $Post->update($request->all());
        return to_route('Index-post-coach');

    }


    public function destroy(string $id)
    {
        $Posts = Post::find($id);
        $Posts->delete();
        return to_route('Index-post-coach');
    }
}
