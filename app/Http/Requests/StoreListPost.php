<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        return 
                [
                    'title'=>'required|min:5|max:500',
                    'url' =>'required|min:5|max:500',
                    'content'=>'required|min:5',
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,jpeg|max:2048',
                    'category_id'=>'required',
                    
                ];
    }
}
