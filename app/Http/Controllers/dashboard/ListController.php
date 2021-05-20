<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListPost;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware(['auth','rol.admin']);
    }
    public function index()
    {
        
        $lists = Post::orderBy('created_at','desc')->get();
        return view('dashboard.list.index',['lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id','title');
        return view("dashboard.list.create",['list'=> new Post(),'categories'=> $categories]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListPost $request)
    {
        //dd($request->all());
        Post::create($request->validated());
        return back()->with('status','Element creat correctament');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $list)
    {
    $categories = Category::pluck('id','title');
    return view ('dashboard.list.show',["list"=>$list,'categories'=> $categories]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $list)
    {
        $categories = Category::pluck('id','title');
        return view ('dashboard.list.edit',['list'=>$list,'categories' => $categories]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreListPost $request, Post $list)
    {
        $list->update($request->validated());
        return back()->with('status','Element modificat correctament!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $list)
    {
        $list->delete();
        return back()->with('status','Element esborrat correctament');
    }

    public function image(Request $request, Post $list)
    {
        //Només podem pujar imatges d'aquest tipus
       $request->validate([
         'image' => 'required|mimes:jpeg,bmp,png|max:10240' //10MB
        ]);

        //Processem l'imatge i posem uns quans segons que han passat de 1970 i 
        //així garantitzem que les imatges tindran un nom únic

       $filename = time() .".". $request->image->extension();

        //A part del path també li hem d'indicar el nom
        
       $request->image->move(public_path('images'),$filename);
        
       
       PostImage::create(['image'=>$filename, 'post_id'=>$list->id]);
       return back()->with('status','Imatge carregada correctament');
        
    }
    
}
