<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactPost;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\ApiResponseController;
use App\Models\Contact;

class ContactController extends ApiResponseController
{
    public function store(Request $request){
        
       $validator = Validator::make($request->all(), StoreContactPost::myRules()); 
       
       if($validator->fails())
       {
           return $this->errorResponse($validator->errors());
       }
       else
       {
      dd($validator->validated());
           $contact = Contact::create($validator->validated());

           $email = new ContactMailable($request->all());
            Mail::to($contact->email)->send($email);
           //ContacteMailable::dispatch($contact->email,$contact->name.' '.$contact->surname);*/

           return $this->successResponse("exito");
       }
  
      }
}
