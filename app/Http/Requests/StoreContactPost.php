<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactPost extends FormRequest
{
    
    public static function myRules(){
        return [
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required|min:11',
            'message' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->myRules();
    }
}
