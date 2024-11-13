<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $category = Category::all();
            return view('category.index', compact('category'));
        }
            return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if(Auth::check())
        {
            return view('category.create');
        }
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'category' => 'required|max:255',
        ]);
        Category::create($request->all());
        return redirect()->route('category.index')
                ->withSuccess('New Category is added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if(Auth::check())
        {
            return view('category.edit', [
                'category' => $category
            ]);

        }
            return redirect()->route('login');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $request->validate([
          'category' => 'required|max:255',
        ]);
        
        $category->update($request->all());
        return redirect()->route('category.index')
                ->withSuccess('Category is updated successfully.');
    }
     /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if(Auth::check())
        {
            return view('category.show', [
                'category' => $category
            ]);
        }
            return redirect()->route('login');

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
                ->withSuccess('Category is deleted successfully.');
    }
}
