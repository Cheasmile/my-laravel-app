<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
class CategoryController extends Controller
{
    public function index(){
        $data=Category::all();
        $data_array=[
            'category'=>$data,
            'subcategory'=>Subcategory::all(),
        ];
        return view('admin.category.index',compact('data','data_array'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create([
        'name' => $request->name,
        'user_id' => Auth::id(), 
        'created_at' => now(),
        'updated_at' => now(),
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
        'name' => 'required'
    ]);

    $category = Category::findOrFail($id);
    $category->update([
        'name' => $request->name
    ]);

    return redirect()->back(); // stay on index
}

public function delete($id)
{
    Category::findOrFail($id)->delete();
    return redirect()->back();
}


}
