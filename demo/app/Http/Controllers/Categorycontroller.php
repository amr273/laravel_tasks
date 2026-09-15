<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $requestData=$request->validate (
        // [
        //     'name'=>'required|min:3|max:20|string|unique:categories,name',
        //     'description'=>'required|min:12|max:50|string'
        // ],[
        //    'name.required'=>'category name is required',
        //    'name.unique'=>'category name is already exist',
        //    'name.min'=>'category name must be at least 3 characters',
        //     'description.required'=>'category description is required',
        //    'description.min'=>'category description must be at least 12 characters',
        // ]
        // );
        $requestData = $request->validate([
            'name' => 'required|min:3|max:20|string|unique:categories,name',
            'description' => 'required|min:12|max:50|string',
        ]);
        // $categoryData = $request->except("_token");
        Category::create($requestData);
        return to_route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // $requestData = $request->validated();
        $requestData = $request->validate([
            'name' => 'required|min:3|max:20|string|unique:categories,name',
            'description' => 'required|min:12|max:50|string',
        ]);
        $category->update($requestData);
        return view('categories.show', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index');
    }
}
