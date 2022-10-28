<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Rules\CompanyvalidationRule;
use Illuminate\Routing\UrlGenerator;

class Companyvalidation extends FormRequest
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

    protected function prepareForValidation()  //to prepare fields for validation or to add additional parameters to request                                                //to request
    {
    
        $this->merge([                     //the merge methods adds new parameter to request
            'slug' => Str::slug($this->email),
        ]);
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
    public function rules(Request $request) //actual rules are defined here
    {
        dd(Request::get('id')); 
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
