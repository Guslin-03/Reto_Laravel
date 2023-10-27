<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Issue;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::all();
        $issues = Issue::orderBy('created_at', 'desc')->take(5)->get();
        return view('priorities.index',['priorities' => $priorities],['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('priorities.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $priority = new Priority();
        $priority->name = $request->name;
        $priority->save();
        return redirect()->route('priorities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view('priorities.create_edit',['priority'=>$priority]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priority $priority)
    {
        $priority->name = $request->name;
        $priority->save();
        $priorities = Priority::all();
        $issues = Issue::orderBy('created_at', 'desc')->get();
        return view('priorities.index',['priorities'=>$priorities, 'issues'=>$issues]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();
        $priorities = Priority::all();
        $issues = Issue::all();
        return view('priorities.index', ['priorities'=>$priorities, 'issues'=>$issues]);
    }
}
