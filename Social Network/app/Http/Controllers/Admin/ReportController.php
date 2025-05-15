<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::ViewReport()->get();

        return view('pages.admin.index-reports', compact('reports'));
    }
    public function Action(Request $request, Report $report)
    {
        $request->validate([
            'action' => 'required|in:reviewed,ignored',
        ]);

        $report->update(['status' => $request->action]);

        if ($request->action === 'reviewed')
        {
            $report->post->delete();
        }
        $report->delete();


        return redirect()->route('Reports-index-admin')->with('success', 'Report resolved successfully.');
    }

}
