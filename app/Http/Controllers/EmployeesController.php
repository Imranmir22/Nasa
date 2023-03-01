<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeesController extends Controller
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
    public function store(EmployeeRequest $request)
    {
       $employee=new Employee();

            $employee->first_name= $request->first_name;
            $employee->last_name=$request->last_name;
            $employee->gender=$request->gender;
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
    public function update(EmployeeRequest $request, $id)
    {
        $employee=Employee::find($id);
        if($employee)
        {
            $employee->first_name= $request->first_name;
            $employee->last_name=$request->last_name;
            $employee->gender=$request->gender;
            $employee->company_id= $request->company_id;
            $employee->email=$request->email;
            $employee->phone= $request->phone;
            $employee->save(); 
            return redirect('employee');
        }
        else {
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
       Employee::find($id)->delete($id);
       return redirect('employee');
    }
    
    public function get_employee($id)
    {
        $result=Employee::find($id);
        return view('update_employee', ['response'=>$result]);
    }
}
