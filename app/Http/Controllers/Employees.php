<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Validate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\View;
use App\Models\Employee;

class Employees extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=Employee::paginate(10); 
        return view('all_employees', ['response'=>$result]);
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
       $employee=new Employee();
        //
        $request->validate(
            [
                'first_name'=>'required',
                'last_name'=>'required',
                'company_id'=>'exists:companies,id',
                'email'=>'email',
                'phone'=>'integer'
            ]
            );

            $employee->first_name= $request->first_name;
            $employee->last_name=$request->last_name;
            $employee->company_id= $request->company_id;
            $employee->email=$request->email;
            $employee->phone= $request->phone;
            $employee->save(); 
            return redirect('employee');
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
            $user=Employee::findOrFail($id);

            return view('show_employee', ['response'=>$user]);
           
        }
        catch(ModelNotFoundException $ex)
        {
            return['message'=>"employee id $id not exists"];
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
        $employee=Employee::find($id);
        if($employee)
        {
            $request->validate(
            [
                'first_name'=>'required',
                'last_name'=>'required',
                'company_id'=>'exists:companies,id',
                'email'=>'email',
                'phone'=>'integer'
            ]
            );


            $employee->first_name= $request->first_name;
            $employee->last_name=$request->last_name;
            $employee->company_id= $request->company_id;
            $employee->email=$request->email;
            $employee->phone= $request->phone;
            $employee->save(); 
            return redirect('employee');
        }
        else {
            # code...
            return ["message"=>"no record found"];
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
       $result= Employee::destroy($id);
       if($result)
         return redirect('employee');
       else 
        return ["message"=>"no record found"];
    }
    
    public function get_employee($id)
    {
        $result=Employee::find($id);
        return view('update_employee', ['response'=>$result]);
    }
}
