<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\Usercreated;
use  App\Http\Requests\Companyvalidation;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Rules\CompanyvalidationRule;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Auth\Access\AuthorizationException;
use App\Exceptions\GateException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_companies(Department $department , Employee $employee)
    {

        
       
        // Validator::make($request->all(), [
        //     'title' => 'required|unique:posts|max:255',   //for auto redirect after validation fails use this
        //     'body' => 'required',
        // ])->validate();
       


        // Validator::make($request->all(), [
        //     'credit_card_number' => 'required_if:payment_type,cc'  //credit_card_number is required if payment_type is  cc
        // ]);
        return $employee;
    }
 
    public function register_company(Companyvalidation $request)
    {
        
        $file=$request->file('logo');
        // fucntions of file to upload
        $fileExtension=$file->getClientOriginalExtension();
        $fileName=$file->getClientOriginalName();
        $fileRealPath=$file->getRealPath();
        $fileSize=$file->getSize();
        $fileMime=$file->getMimeType();

       //---------------------------------//
        // $disk = Storage::build([  //     to create a disk at runtime
        //     'driver' => 'local',
        //     'root' => '/path/to/root',
        // ]);
        // $filePath=$disk->put('image.jpg', $request->logo);
        
        //---------------------------------//

        $filePath=Storage::put('company_logo', $request->logo);//company_logo is directory name were 
        $company=new Company();                      // logo will be uploaded inside public/storage folder
        $request->logo=$filePath;
        $request=$request->except('_token');
        $company->create($request);
        return $request;
    }
    public function index()
    {

        
        //
        // event (new UserCreated('abc@gmail.com'));  //emit the event 
        UserCreated::dispatch('abc@gmail.com');  //by this we can also emit the event
        return ;
        return Department::with('companies')->get();

        return Company::doesntHave('company_departments')->get();

        return Company::with(['departments'=>function($q){           
            $q->where('department_name','accounts');
        }])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //       
        $required="";
        if($request->file('logo'))
        {
            $required='required';
        }
        $validation=Validator::make($request->toArray(),[
            'name'=>['required',new CompanyvalidationRule],
            'email' => ['required', 'string', 'email',Rule::unique('companies')->ignore($id)],
            'logo'=>[$required],
            'website'=>['required_if:name,imran','regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
        ])->validate();
        $company=Company::find($id);
        if($required)
        {  
            Storage::disk('local')->delete($company->logo);          
            $filePath=Storage::disk('public')->put('company_logo', $request->logo);
        }
        else
            $filePath=$company->logo;
        $company->name=$validation['name'];
        $company->email=$validation['email'];
        $company->logo=$filePath;
        $company->website=$validation['website'];
        $company->save();
        return view('company_list',['companies'=>Company::get()]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function edit_with_gate_policies(Request $request, Company $company)
    {
        try
        {
            // $this->authorize('update', $company);
            
            if ($request->user()->cannot('update', $company)) {  // two methods cannot and can
                // abort(403);

                throw new GateException();
            }
            return view('update_company',['company'=>$company]);
            
            Gate::authorize('updsate-company');  //this will automaticatlly through the exception if user not authorized for the route
            $response = Gate::inspect('edit-settings');
    
            if ($response->allowed()) {
                // The action is authorized...
            } else {
                echo $response->message();
            }

            $user=User::find(1);   
            if (Gate::forUser($user)->allows('update-company')) { //for a paritcular user
                // The user can update the post...
            }

            if (Gate::any(['update-post', 'delete-post'])) {//the user can update or delete 
                // The user can update or delete....
            }
            // return "not authorized";
    }
    catch(GateException $e)
    {
        report($e);
       
        return ["message"=>$e->getMessage()];
    }
      
    }
    public function all_companies(Request $request)
    {
        $companies=Company::get();
        return view('company_list',['companies'=>$companies]);
    }
}
