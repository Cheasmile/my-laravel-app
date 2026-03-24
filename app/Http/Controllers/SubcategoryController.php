<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    public function index()
    {
        // ទាញយកតែ Subcategory ណាដែលមាន Category ពិតប្រាកដក្នុង DB ប៉ុណ្ណោះ
        $data = Subcategory::whereHas('category')->with('category')->get();
        $categories = Category::all();
        
        // ពិនិត្យអក្សរតូចធំ៖ បើ Folder ឈ្មោះ Admin (A ធំ) ត្រូវដូរ admin ទៅ Admin
        return view('admin.subcategory.index', compact('data', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
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
            'user_id' => Auth::id() ?? 1, // ការពារបើមិនទាន់ Login ឱ្យយក ID 1
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Saved!');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
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

        return redirect()->route('subcategory.index')->with('success', 'Updated!');
    }

    public function delete($id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->route('subcategory.index');
    }
}