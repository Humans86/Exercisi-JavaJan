<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_image';

    protected $fillable = ['name','format','post_id'];
    
    public function post(){
        return $this->BelongsTo(Post::class);
    }

    public function getImageUrl()
    {
        return URL::asset('images/'.$this->image);
       // return Storage::url($this->image);

    }
}