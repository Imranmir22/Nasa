<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        try {

            $book = Company::first();
            return Company::with(['departments'])->get();
            return $book->loadCount('genres');
            $companies=  Company::withCount(['departments'])->get();
            return $companies[0]->departments_count;

            exit;
            return  Company::doesntHave('departments')->get();
            return Company::whereRelation('departments','department_name','finance')->get();

            return Company::whereHas('departments', function (Builder $query) {
                $query->where('name', 'amazon');// company which have department and name is amazon
            })->get();


            return Company::has('departments.employees')->get();
            return Company::has('departments')->get();// Retrieve all companies that have at least one department
                                              //departments is the table name not model name
            return Company::has('departments','>',2)->get();
            $user = User::find(1);
            return User::find(1)->roles()->get();;
            $company=Company::find(1);
            $department=Department::find(1);
            // $posts =$department->hasOne(Employee::class)->latestOfMany()->get();//to get latest record of employee with department 1
            // $posts =$department->hasOne(Employee::class)->oldestOfMany();//the old employee
          
            $posts =$department->hasOne(Employee::class)
            ->ofMany(['id'=>'min'], function ($query) {//ofMany filters on a different condtion also we can
                $query->where('id', '<', 4);        //provide many coditions inside array
            })->get();

            // $company=new Company();
            $posts =$company->hasOneThrough(Employee::class,Department::class,'company_id','department_id','id','id')->get();//through a middle class
                                                                          //foreign keys are optional or used when foreign keys
                                                                                //are not assigned acc. to rules
            #different functions are hasOne,hasMany, hasManyThrough,belongsToMany                                                             

        } catch (\Exception $th) {
            return $th->getMessage();
        }
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
    public function update(Request $request, $id)
    {
        //
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
}
