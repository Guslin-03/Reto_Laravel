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
        return view('comments.create_edit', ['issue' => $issue]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $issue = Issue::find($request->issue_id);
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->minutesUsed = $request->minutesUsed;
        $comment->issue_id = $issue->id;
        $comment->save();

        return redirect()->route('issues.show',['issue'=>$issue]);
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
        return view('comments.create_edit',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $issue = $comment->comentario_incidencia;

        $comment->text = $request->text;
        $comment->minutesUsed = $request->minutesUsed;
        $comment->save();
        $comments = Comment::all();
        return view('issues.show',['comments'=>$comments, 'issue'=>$issue]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $issue = $comment->comentario_incidencia;
        $comment->delete();
        $comments = Comment::all();
        return view('issues.show', ['comments'=>$comments, 'issue'=>$issue]);
    }
}
