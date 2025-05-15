<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $Posts = Post::GetPostsWithDetails()->get();

        return view('pages.admin.index',compact('Posts'));
    }

    public function show($id)
    {
        $Post = Post::find($id);
        return view('pages.admin.show', compact('Post'));
    }

    public function destroy(string $id)
    {
        $Posts = Post::find($id);
        $Posts->delete();
        return to_route('Index-post-admin');
    }
}
