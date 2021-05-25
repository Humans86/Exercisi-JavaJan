<?php

namespace App\Models;

use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $fillable = ['title','url','content','category_id'];

    public function category()
    {
        return $this->BelongsTo(Category::Class);
    }
    public function image(){
        return $this->hasOne(PostImage::class);
    }
}
