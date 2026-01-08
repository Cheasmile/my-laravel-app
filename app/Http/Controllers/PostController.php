<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcategory;

class PostController extends Controller
{
      public function index()
{
    $data = Post::with(['category','subcategory','user'])->get(); // eager load relationships
    $categories = Category::all();     // <--- define this
    $subcategories = Subcategory::all(); // <--- define this

    return view('admin.post.index', compact('data', 'categories','subcategories'));
}

public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        

        Post::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('post.index');
    }
    public function create()
{
    $categories = \App\Models\Category::all();
    return view('admin.post.create', compact('categories'));
}

    public function edit($id)
{
    $post = Post::findOrFail($id);

    $categories = \App\Models\Category::all();

    $subcategories = \App\Models\Subcategory::where('category_id', $post->category_id)->get();

    return view('admin.post.edit', compact('post', 'categories', 'subcategories'));
}


   public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    $post->update(
        $request->only('name','detail','category_id','subcategory_id')
    );

    return redirect()->route('post.index');
}

public function delete($id)
{
    Post::findOrFail($id)->delete();
    return redirect()->route('post.index');
}

}
