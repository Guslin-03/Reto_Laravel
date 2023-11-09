<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Issue;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::orderBy('name', 'asc')->get();
        $issues = Issue::orderBy('created_at', 'desc')->take(5)->get();
        return view('statuses.index',['statuses' => $statuses], ['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuses.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = new Status();
        $status->name = $request->name;
        $status->save();
        return redirect()->route('statuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('statuses.create_edit',['status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $status->name = $request->name;
        $status->save();
        $statuses = Status::all();
        $issues = Issue::orderBy('created_at', 'desc')->get();
        return view('statuses.index',['statuses'=>$statuses, 'issues'=>$issues]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        $statuses = Status::all();
        $issues = Issue::all();
        return view('statuses.index', ['statuses'=>$statuses, 'issues'=>$issues]);
    }
}
