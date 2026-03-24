<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'category_id'];

    // ទំនាក់ទំនងទៅកាន់ User (ម្ចាស់អ្នកបង្កើត)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ទំនាក់ទំនងទៅកាន់ Category (មេ)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ប្រសិនបើអ្នកមានតារាង Posts ដែលភ្ជាប់ជាមួយ Subcategory
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}