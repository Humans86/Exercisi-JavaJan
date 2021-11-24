<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = ['title', 'url','image'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function image(){
        return $this->hasOne(Category::class);
    }
}
