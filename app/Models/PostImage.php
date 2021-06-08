<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostImage extends Model
{
    
    protected $fillable = ['post_id', 'image'];
    
    public function post(){
        return $this->BelongsTo(Post::class);
    }

    public function getImageUrl()
    {
        return URL::asset('images/'.$this->image);
       // return Storage::url($this->image);

    }
}