<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Jobs\ProcessImageSmall;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListPost;
use Illuminate\Support\Facades\Storage;

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
      //Només podem pujar imatges d'aquest tipus:

      $request->validate([
        'image' => 'required|mimes:jpeg,bmp,png|max:10240' //10Mb
    ]);

     //Processem l'imatge i posem quants segons han pasat de 1970 i 
     //aixi garantitzem que les imatges tindran un nom unic.

    $filename = time() .".". $request->image->extension();

    //A part del path, també li hem d'indicar el nom 
    $request->image->move(public_path('images'), $filename);
     
   
    $image = PostImage::create(['image'=> $filename, 'post_id'=> $list->id]);

    ProcessImageSmall::dispatch($image);

    return back()->with('status', 'Imatge carregada correctament');
    }

    public function contentImage(Request $request)
    {
       
    $request->validate([
        'image' => 'required|mimes:jpeg,bmp,png|max:10240' //10Mb
    ]);

    $filename = time() . "." . $request->image->extension();
    $request->image->move(public_path('images_post'), $filename);
     
    return response()->json(["default" => URL::to('/') . '/images_post/' .$filename]);
    } 

    public function imageDownload(PostImage $image)
    {
        return Storage::disk('local')->download($image->image);
    }

    public function imageDelete(PostImage $image)
    {
        $image->delete();
        Storage::disk('local')->delete($image->image);
        return back()->with('status', 'Imatge Esborrada correctament!');

    }
  
}
