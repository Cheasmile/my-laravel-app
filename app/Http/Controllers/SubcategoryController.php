<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
 public function index()
{
    $data = Subcategory::all();
    $categories = \App\Models\Category::all(); // define $categories here

    return view('admin.subcategory.index', compact('data', 'categories')); // ✅ now it's defined
}

public function create()
{
    $categories = \App\Models\Category::all(); // get all categories
    return view('admin.subcategory.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    Subcategory::create([
        'name' => $request->name,
        'category_id' => $request->category_id, 
        'user_id' => Auth::id(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('subcategory.index');
}

    public function edit($id)
{
    $subcategory = Subcategory::findOrFail($id);
    $categories = \App\Models\Category::all(); // pass categories for select
    return view('admin.subcategory.edit', compact('subcategory', 'categories'));
}


    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    $subcategory = Subcategory::findOrFail($id);
    $subcategory->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('subcategory.index');
}

public function delete($id)
{
    Subcategory::findOrFail($id)->delete();
    return redirect()->route('subcategory.index');
}

}
