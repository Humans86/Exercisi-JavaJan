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
          
           Contact::create($validator->validated());
           return $this->successResponse("Informació creada correctament");
       }
  
      }
}
