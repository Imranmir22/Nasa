<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyRequest;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result=Company::paginate(10); 
        return view('all_companies', ['response'=>$result]);
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
    public function store(CompanyRequest $request)
    {
        //
        $company = new Company();
        if( $request->file('logo'))
        {
            $path= $request->file('logo')->store('public');    
            $path= pathinfo($path);
            $company->logo=  $path['basename'];
        }
            $company->name= $request->name;
            $company->email=$request->email;
            $company->website= $request->website;
            $company->save(); 
            return view('dashboard');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function update(CompanyRequest $request, $id)
    {
        //
        // $request->validate(
        //     [
        //         'name'=>'required',
        //         'email'=>'email',
        //         // 'logo'=>['image','dimensions:max_width=100,max_height=100'],
        //         'website'=>'url'
        //     ]
        //     );
        $company=Company::find($id);
        if($company)
        {
                if($request->file('logo'))
                {            
                    $path= $request->file('logo')->store('public');    
                    $path= pathinfo($path);
                    $company->logo=$path['basename'];
                }
                $company->name= $request->name;
                $company->email=$request->email;
                $company->website= $request->website;
                $company->save(); 
                return redirect('company');    

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('company_id',$id)->delete();
        Company::find($id)->delete();
        return redirect('company');
    }
    public function update_company($id)
    {
        $result=Company::find($id);
        return view('update_company', ['response'=>$result]);
    }
}
