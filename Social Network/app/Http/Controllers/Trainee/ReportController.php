<?php

namespace App\Http\Controllers\Trainee;

use App\Events\TestNotifications;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function create(string $id)
    {
        $Post = Post::find($id);
        return view('pages.trainee.create-report',compact('Post'));
    }
    public function store(Request $request)
    {
        Report::create([
            'post_id' => $request->id,
            'user_id' => Auth::id(),
            'reason' => $request->reason
        ]);

        event(new TestNotifications([
            'post_id' => $request->id,
            'user_id' => Auth::id(),
        ]));

        return redirect()->route('Index-post-trainee')->with('success', 'Post reported successfully.');
    }
}
