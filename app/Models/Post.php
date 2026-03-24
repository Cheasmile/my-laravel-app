<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'detail', 'user_id', 'category_id', 'subcategory_id', 'image'];

     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
