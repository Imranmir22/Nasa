<?php

namespace App\Http\Controllers;
use App\Models\Companie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;


class Companies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result=Companie::paginate(10); 
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
    public function store(Request $request)
    {
        //
        $company = new Companie();
        $request->validate(
            [
                'name'=>'required',
                'email'=>'email',
                'logo'=>['image'],
                'website'=>'url'
            ]
            );
            $path= $request->file('logo')->store('public');    
            $path= pathinfo($path);

            $company->name= $request->name;
            $company->email=$request->email;
            $company->logo=  $path['basename'];
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
        //
        try
        {
            $user=Companie::findOrFail($id);
            return view('show_company',['response'=>$user]);
            
        }
        catch(ModelNotFoundException $ex)
        {
            return['message'=>"company with id $id not exists"];
        }
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
    public function update(Request $request, $id)
    {
        //
        $company=Employee::find($id);
        if($company)
        {
            $request->validate(
                [
                    'name'=>'required',
                    'email'=>'email',
                    'logo'=>['image'],
                    'website'=>'url'
                ]
                );
                // $path= $request->file('logo')->store('public');    
                // $path= pathinfo($path);
                // $file=$company->logo;
                // Storage::delete($file);

                $company->name= $request->name;
                $company->email=$request->email;
                // $company->logo=  $path['basename'];
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
        //
        Employee::where('company_id',$id)->delete();
        $result= Companie::destroy($id);
        if($result)
        {
            return redirect('company');    
        }
    }
    public function update_company($id)
    {
        $result=Companie::find($id);
        return view('update_company', ['response'=>$result]);
    }
}
