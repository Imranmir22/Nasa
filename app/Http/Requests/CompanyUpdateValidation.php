<?php

namespace App\Http\Requests;
use App\Rules\CompanyvalidationRule;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()  // return true to allow validtion default if false
    {
        return true;
    }

    


    public function attributes()  //to change the name of input field  for error messages
    {
        return [
            'name'=>'your_name',
            'email' => 'email address',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() //actual rules are defined here
    {
      
        return [
            'name'=>['required',new CompanyvalidationRule],
            'email' => ['required', 'string', 'email','unique:companies,email'],
            'logo'=>['required'],
            'website'=>['required_if:name,imran','url'],   //The website field is required when your name is imran
            'slug'=>['string']
        ];
    }

    public function messages()  //return the custom message 
    {
        return [
            'name.required' => ' name field is required',
            'email.required' => 'A email is required and should be unique',
        ];
    }
}
