<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Issue;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index',['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create', ['issue' => $issue]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->minutesUsed = $request->minutesUsed;
        $comment->issue_id = $request->issue_id;
        $comment->save();
        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment, Issue $issue)
    {
        $comments = Comment::all();

        dd($issue->title);

        $comment->text = $request->text;
        $comment->minutesUsed = $request->minutesUsed;
        $comment->save();
        return view('issues.show',['comments'=>$comments, 'issue'=>$issue]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
