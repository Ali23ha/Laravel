<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comments\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $postId)
    {
        $validated_data = array_merge([$request->validated(),'user_id' => Auth::id(),
            'content' => $request->input('content'),'post_id' => $postId,]);

        Comment::create($validated_data);

        return redirect()->route('Index-post-coach')->with('success', 'Comment added successfully.');

    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
