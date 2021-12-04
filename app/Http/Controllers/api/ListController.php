<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends ApiResponseController
{
  
    public function index()
    {
        $lists = Post::
        
        join('categories','categories.id','=','posts.category_id')->
        select ('posts.*','categories.title as category')->
        orderBy('posts.created_at','desc')->paginate(5);
        
        return response()->json($lists,200);
    }

    public function show(Post $list)
    {
        $list->image;
        $list->images;
        $list->category;
        return $this->successResponse($list);

    }

    public function url(String $url)
    {
        $list = Post::where('url',$url)->first();
        $list->image;
        $list->category;
        return $this->successResponse($list);

    }


    public function category (Category $category)
    {
        $lists = Post::
        join('categories', 'categories.id', '=', 'posts.category_id')->
        select('posts.*', 'categories.title as category')->
        orderBy('posts.created_at', 'desc')->
        where('categories.id', $category->id)->paginate(5);

        return $this->successResponse(["posts" => $lists, "category" => $category]);
        return $this->successResponse(["posts" => $category->post()->paginate(10), "category" => $category]);

        
    }
}
