<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::with(relations: 'user')->get();

    return view('admin.category.index', compact('categories'));
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index');
    }


     public function getSubcategories($id)
    {
        return response()->json(
            Subcategory::where('category_id', $id)->get()
        );
    }
public function show($id)
{
    // Selected category with subcategories
    $category = Category::with('subcategories')->findOrFail($id);

    // All categories for dropdown
    $categories = Category::all();

    return view('category.show', compact('category', 'categories'));
}




    
}
