<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Contact;
use App\Models\ContactImage;
use Illuminate\Http\Request;
use App\Jobs\ProcessImageSmall;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Crearcontact;

class ContactController extends Controller
{
    /**
     * Display a contacting of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware(['auth','rol.admin']);
    }

    public function index()
    {
        
        $contacts = Contact::orderBy('created_at','desc')->get();
        return view('dashboard.contact.index',['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
    $categories = Category::pluck('id','title');
    return view ('dashboard.contact.show',["contact"=>$contact,'categories'=> $categories]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contact = Contact::findOrFail($contact->id);
        $categories = Category::pluck('id','title');
        return view ('dashboard.contact.edit',['contact'=>$contact,'categories' => $categories]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(StorecontactContact $request, $id)
    { 
        $Contact = Contact::find($id);
        $Contact->title = $request->input('title');
        $Contact->url = $request->input('url');
        $Contact->content = $request->input('content');
        $Contact->category_id = $request->input('category_id');
        

        if($request->hasfile('image'))
        {
            $destination = 'images'.$Contact->image;
            if(Contact::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $nom_imatge = $file->getClientOriginalName();
            $file->move('images',$nom_imatge);
            $Contact->image=$nom_imatge;
        } 
        $Contact->update();
        return back()->with('status','Element modificat correctament!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('status','Element esborrat correctament');
    }

    public function image(Request $request, Contact $contact)
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
     
   
    $image = ContactImage::create(['image'=> $filename, 'Contact_id'=> $contact->id]);
    

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

    public function imageDownload(ContactImage $image)
    {
        return Storage::disk('local')->download($image->image);
    }

    public function imageDelete(ContactImage $image)
    {
        $image->delete();
        Storage::disk('local')->delete($image->image);
        return back()->with('status', 'Imatge Esborrada correctament!');

    }
  
}
