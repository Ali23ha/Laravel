<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function upvoteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $vote = Vote::where('user_id', Auth::id())
            ->where('comment_id', $commentId)
            ->first();

        if ($vote) {
            $vote->update(['is_upvote' => true]);
        } else {
            Vote::create([
                'user_id' => Auth::id(),
                'comment_id' => $commentId,
                'is_upvote' => true,
            ]);
        }

        return redirect()->back()->with('success', 'Upvoted successfully.');
    }

    public function downvoteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $vote = Vote::where('user_id', Auth::id())
            ->where('comment_id', $commentId)
            ->first();

        if ($vote) {
            $vote->update(['is_upvote' => false]);
        } else {
            Vote::create([
                'user_id' => Auth::id(),
                'comment_id' => $commentId,
                'is_upvote' => false,
            ]);
        }

        return redirect()->back()->with('success', 'Downvoted successfully.');
    }
    public function upvotePost($postId)
    {
        Comment::findOrFail($postId);

        $vote = Vote::where('user_id', Auth::id())
            ->where('post_id', $postId)
            ->first();

        if ($vote) {
            $vote->update(['is_upvote' => true]);
        } else {
            Vote::create([
                'user_id' => Auth::id(),
                'post_id' => $postId,
                'is_upvote' => true,
            ]);
        }

        return redirect()->back()->with('success', 'Upvoted post successfully.');
    }
    public function downvotePost($postId)
    {
        Comment::findOrFail($postId);

        $vote = Vote::where('user_id', Auth::id())
            ->where('post_id', $postId)
            ->first();

        if ($vote) {
            $vote->update(['is_upvote' => false]);
        } else {
            Vote::create([
                'user_id' => Auth::id(),
                'post_id' => $postId,
                'is_upvote' => false,
            ]);
        }

        return redirect()->back()->with('success', 'Downvoted post successfully.');
    }
}
