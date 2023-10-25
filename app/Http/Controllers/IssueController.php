<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Priority;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::orderBy('created_at', 'desc')->get();
        return view('issues.index',['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $priorities = Priority::all();
        $statuses = Status::all();
        return view('issues.create',['categories' => $categories, 'statuses' => $statuses, 'priorities' => $priorities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $issue = new Issue();
        $issue->title = $request->title;
        $issue->text = $request->text;
        $issue->estimated_time = $request->estimated_time;
        $issue->user_id = Auth::user()->id;
        $issue->category_id = $request->category_id;
        $issue->priority_id = $request->priority_id;
        $issue->status_id = $request->status_id;
        $issue->department_id = Auth::user()->usuario_departamento->id;
        $issue->save();
        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        $comments = Comment::all();
        return view('issues.show',['issue'=>$issue],['comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        $priorities = Priority::all();
        $statuses = Status::all();
        $categories = Category::all();

        return view('issues.edit',['issue'=>$issue, 'priorities'=>$priorities, 'statuses'=>$statuses, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $comments = Comment::all();

        $issue->title = $request->title;
        $issue->text = $request->text;
        $issue->estimated_time = $request->estimated_time;
        $issue->save();
        return view('issues.show',['issue'=>$issue, 'comments'=>$comments]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        $issues = Issue::all();
        return view('issues.index', ['issues'=>$issues]);
    }
}
