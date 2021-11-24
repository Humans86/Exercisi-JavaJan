<?php

namespace App\Http\Controllers\dashboard;

use PDF;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryPost;

class CategoryController extends Controller
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
        $categoria = Category::orderBy('created_at','desc')->get();
        return view('dashboard.category.index',['categories' => $categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.category.create",['category'=> new Category()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        $data = $request->all();
        if($imatges=$request->file('image'))
        {
            $nom_imatge = $imatges->getClientOriginalName();
            $imatges->move('images',$nom_imatge);
            $data['image']=$nom_imatge;
        }
            Category::create($data);
          
       return back()->with('status','Categoria creada correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show',["category"=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view ('dashboard.category.edit',["category"=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryPost $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->input('title');
        $category->url = $request->input('url');        

        if($request->hasfile('image'))
        {
            $destination = 'images'.$category->image;
            if(Category::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $nom_imatge = $file->getClientOriginalName();
            $file->move('images',$nom_imatge);
            $post->image=$nom_imatge;
        } 
        $category->update($request->validated());
        return back()->with('status','Categoria modificada correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status','Categoria Esborrada Correctament');
    }

    public function pdf()
    {
        $category = Category::orderBy('created_at','desc')->get();

        $pdf = PDF::loadView('dashboard.category.pdf', ['categories' => $category]);
        //return $pdf->stream();
       return $pdf->download('categories.pdf'); //descarregar PDF 
       //return view('dashboard.category.pdf', ['categories' => $category] ); 
    }
}
