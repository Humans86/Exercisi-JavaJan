<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Post::
        join('post_images','post_images.post_id','=','posts.id')->
        join('categories','categories.id','=','posts.category_id')->
        select ('posts.*','categories.title as category','post_images.image')->
        orderBy('posts.created_at','desc')->paginate(3);
        
        return response()->json($lists,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $list)
    {
        $list->image;
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
        return $this->successResponse(["posts"=>$category->post()->paginate(2),"category" => $category]);
        
    }
}
