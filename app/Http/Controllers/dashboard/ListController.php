<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use App\Exports\ListsExport;
use Illuminate\Http\Request;
use App\Jobs\ProcessImageSmall;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListPost;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\CrearList;

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

    public function export(){
        return Excel::download(new ListsExport, 'lists.xlsx');
    }
   
    public function exportIntoCSV(){
      return Excel::download(new ListsExport, 'lists.csv');
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
        $data = $request->all();
       
        if($imatges=$request->file('image'))
        {
            $nom_imatge = $imatges->getClientOriginalName();
            $imatges->move('images',$nom_imatge);
            $data['image']=$nom_imatge;
        }
            Post::create($data);
          
   
        return back()->with('status','Element creat correctamente');
     
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
        $list = Post::findOrFail($list->id);
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
    
    public function update(StoreListPost $request, $id)
    { 
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        

        if($request->hasfile('image'))
        {
            $destination = 'images'.$post->image;
            if(Post::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $nom_imatge = $file->getClientOriginalName();
            $file->move('images',$nom_imatge);
            $post->image=$nom_imatge;
        } 
        $post->update();
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
    $request->image->move(public_path('images'), $filename);
     
    return response()->json(["default" => URL::to('/') . '/images/' .$filename]);
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
