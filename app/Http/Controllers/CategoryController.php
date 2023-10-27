<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Issue;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $issues = Issue::orderBy('created_at', 'desc')->take(5)->get();
        return view('categories.index',['categories' => $categories],['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.create_edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        $categories = Category::all();
        $issues = Issue::orderBy('created_at', 'desc')->get();
        return view('categories.index',['categories'=>$categories, 'issues'=>$issues]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $categories = Category::all();
        $issues = Issue::all();
        return view('categories.index', ['categories'=>$categories, 'issues'=>$issues]);
    }
}
