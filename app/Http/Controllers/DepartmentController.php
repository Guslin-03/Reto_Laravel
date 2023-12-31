<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Issue;

class DepartmentController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index(){
        $departments = Department::orderBy('name', 'asc')->get();
        $issues = Issue::orderBy('created_at', 'desc')->take(5)->get();
        return view('departments.index',['departments' => $departments],['issues' => $issues]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('departments.create_edit');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->headquarters = $request->headquarters;
        $department->description = $request->description;
        $department->save();
        return redirect()->route('departments.index');

    }

    /**
    * Display the specified resource.
    */
    public function show(Department $department)
    {
        return view('departments.show',['department'=>$department]);
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Department $department)
    {
        return view('departments.create_edit',['department'=>$department]);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, Department $department)
    {
        $department->name = $request->name;
        $department->headquarters = $request->headquarters;
        $department->description = $request->description;
        $department->save();
        return view('departments.show',['department'=>$department]);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Department $department)
    {
        $department->delete();
        $departments = Department::all();
        return view('departments.index', ['departments'=>$departments]);
    }
}
