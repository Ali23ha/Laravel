<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function upvoteComment($commentId)
    {
        Comment::findOrFail($commentId);
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

        return redirect()->back()->with('success', 'Upvoted comment successfully.');
    }

    public function downvoteComment($commentId)
    {
        Comment::findOrFail($commentId);

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

        return redirect()->back()->with('success', 'Downvoted comment successfully.');
    }
    public function upvotePost($postId)
    {
        Post::findOrFail($postId);
//        dd($postId);
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
        Post::findOrFail($postId);

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
