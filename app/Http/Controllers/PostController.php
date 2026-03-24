<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
public function index()
{
    // Eager load category and its subcategories for all posts
    $posts = Post::with(['user', 'category.subcategories'])->get();

    $categories = Category::with('subcategories')->get();

    return view('admin.post.index', [
        'data' => $posts,
        'categories' => $categories
    ]);
}


  public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'detail' => 'required',
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // validate image
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public'); // store in storage/app/public/posts
    }

    Post::create([
        'name' => $request->name,
        'detail' => $request->detail,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'user_id' => Auth::id(),
        'image' => $imagePath,
    ]);

    return redirect()->route('post.index')->with('status', 'Post created successfully!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'detail' => 'required',
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $post = Post::findOrFail($id);

    // Handle image
    if ($request->hasFile('image')) {
        // Delete old image
        if ($post->image) {
            \Storage::disk('public')->delete($post->image);
        }

        // Save new image and get path
        $post->image = $request->file('image')->store('posts', 'public');
    }

    // Update other fields
    $post->name = $request->name;
    $post->detail = $request->detail;
    $post->category_id = $request->category_id;
    $post->subcategory_id = $request->subcategory_id;

    $post->save(); // <-- Use save() after setting properties

    return redirect()->route('post.index')->with('status', 'Post updated successfully!');
}


    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('post.index');
    }

   public function bySubcategory($id)
{
    $posts = Post::where('subcategory_id', $id)->get();

    switch ($id) {
    case 1:
        return view('posts.index', compact('posts'));
    case 2:
        return view('posts.index1', compact('posts'));
    case 3:
        return view('posts.index2', compact('posts'));
    case 4:
        return view('posts.index3', compact('posts'));
    case 5:
        return view('posts.index4', compact('posts'));
    case 6:
        return view('posts.index5', compact('posts'));
    case 7:
        return view('posts.index6', compact('posts'));
    case 8:
        return view('posts.index7', compact('posts'));
    case 9:
        return view('posts.index8', compact('posts'));
    case 10:
        return view('posts.index9', compact('posts'));
    case 11:
        return view('posts.index10', compact('posts'));
    case 12:
        return view('posts.index11', compact('posts'));
    case 13:
        return view('posts.index12', compact('posts'));
    case 14:
        return view('posts.index13', compact('posts'));
    case 15:
        return view('posts.index14', compact('posts'));
    case 16:
        return view('posts.index15', compact('posts'));
    case 17:
        return view('posts.index16', compact('posts'));
    case 18:
        return view('posts.index17', compact('posts'));
    case 19:
        return view('posts.index18', compact('posts'));
    case 20:
        return view('posts.index19', compact('posts'));
    case 21:
        return view('posts.index20', compact('posts'));
    case 22:
        return view('posts.index21', compact('posts'));
    case 23:
        return view('posts.index22', compact('posts'));
    case 24:
        return view('posts.index23', compact('posts'));
    case 25:
        return view('posts.index24', compact('posts'));
    case 26:
        return view('posts.index25', compact('posts'));
    case 27:
        return view('posts.index26', compact('posts'));
    case 28:
        return view('posts.index27', compact('posts'));
    case 29:
        return view('posts.index28', compact('posts'));
    case 30:
        return view('posts.index29', compact('posts'));
    case 31:
        return view('posts.index30', compact('posts'));
    case 32:
        return view('posts.index31', compact('posts'));
    case 33:
        return view('posts.index32', compact('posts'));
    case 34:
        return view('posts.index33', compact('posts'));
    case 35:
        return view('posts.index34', compact('posts'));
    case 36:
        return view('posts.index35', compact('posts'));
    case 37:
        return view('posts.index36', compact('posts'));
    case 38:
        return view('posts.index37', compact('posts'));
    case 39:
        return view('posts.index38', compact('posts'));
    case 40:
        return view('posts.index39', compact('posts'));
    case 41:
        return view('posts.index40', compact('posts'));
    case 42:
        return view('posts.index41', compact('posts'));
    case 43:
        return view('posts.index42', compact('posts'));
    case 44:
        return view('posts.index43', compact('posts'));
    case 45:
        return view('posts.index44', compact('posts'));
    case 46:
        return view('posts.index45', compact('posts'));
    case 47:
        return view('posts.index46', compact('posts'));
    case 48:
        return view('posts.index47', compact('posts'));
    case 49:
        return view('posts.index48', compact('posts'));
    case 50:
        return view('posts.index49', compact('posts'));
    case 51:
        return view('posts.index50', compact('posts'));
    case 52:
        return view('posts.index51', compact('posts'));
    case 53:
        return view('posts.index52', compact('posts'));
    case 54:
        return view('posts.index53', compact('posts'));
    case 55:
        return view('posts.index54', compact('posts'));
    case 56:
        return view('posts.index55', compact('posts'));
    case 57:
        return view('posts.index56', compact('posts'));
    case 58:
        return view('posts.index57', compact('posts'));
    case 59:
        return view('posts.index58', compact('posts'));
    case 60:
        return view('posts.index59', compact('posts'));
    case 61:
        return view('posts.index60', compact('posts'));
    case 62:
        return view('posts.index61', compact('posts'));
    case 63:
        return view('posts.index62', compact('posts'));
    case 64:
        return view('posts.index63', compact('posts'));
    case 65:
        return view('posts.index64', compact('posts'));
    case 66:
        return view('posts.index65', compact('posts'));
    case 67:
        return view('posts.index66', compact('posts'));
    case 68:
        return view('posts.index67', compact('posts'));
    case 69:
        return view('posts.index68', compact('posts'));
    case 70:
        return view('posts.index69', compact('posts'));
    case 71:
        return view('posts.index70', compact('posts'));
    default:
        abort(404);

    }
}

}
