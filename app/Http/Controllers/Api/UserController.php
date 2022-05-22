<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Validation\ValidationException;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try
        {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();


            return ['user' => $user, 'token' => $user->createToken($request->email)->plainTextToken];
        }

        throw ValidationException::withMessages(["user" => "Invalid Email or Password"]);
        } catch (ValidationException $e) {

            return response()->json(['success' => 'false', 'errors' => $e->errors(), 'type' => 'system', 'message' => $e->getMessage()], 422);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id_from_auth = Auth::user()->id;
        return User::whereParentId($user_id_from_auth)->get();
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

        try {
            $rules = [
                'name'             => 'required',
                'state'            => 'required',
                'district'         => 'required',
                'address'          => 'required',
                'pincode'          => 'required|integer|min:6|max:10',
                'phone'            =>'required|integer|unique:users',
                'email'            => 'required|unique:users',
                'password'         => 'required',
                'password_confirmation' => 'same:password',
            ];
            $messages = [

                'required'              => "<strong>:attribute</strong> is required",

                'password_confirmation.same' => "Password and confirm password should be same",

                'email.unique'          => "The user with <strong>{$request->input('email')}</strong> email already exits.",
                'phone.unique'          => "The phone number <strong>{$request->input('phone')}</strong>already exits.",

            ];
            $request->validate($rules, $messages);
            $user = array(
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone'    => $request->input('phone'),
                'state'    => $request->input('state'),
                'district' => $request->input('district'),
                'address'  => $request->input('address'),
                'pincode'   => $request->input('pincode'),

            );
            $user = User::create($user);
            return response()->json(['success' => 'true', 'message' => ucfirst($request->input('role')) . " Added Sucessfully",], 200);
        } catch (ValidationException $e) {

            return response()->json(['success' => 'false', 'errors' => $e->errors(), 'type' => 'system', 'message' => $e->getMessage()], 422);
        } catch (Exception $e) {

            return response()->json(['success' => 'false', 'errors' => json_decode($e->getMessage(), 1), 'type' => 'system', 'message' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $user=User::findOrFail($id);
            return $user;
        }
        catch(ModelNotFoundException $ex)
        {return "ddd";
            return $ex->getMessage();
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
        try

        {

        $messages = [
            'required'    => 'The :attribute field is required.',
            'id.required' => 'Invalid Request',
            'min'         => ['string' => 'The password filed can not be less than 8 characters.'],
            'confirmed'   => 'The :attribute confirmation field does not match with new password.',
        ];
        $rules=[
            'password' => ['confirmed'],
            'id'       => ['required'],
            'email'    => ['required', 'email', 'unique:users,email,' . $request->id . ",id"],
             'phone'   => ['required', 'phone','integer', 'unique:users,phone,' . $request->id . ",id"],
             'name'    => ['required'],
            'state'    => ['required'],
            'district' => ['required'],
            'address'  => ['required'],
            'pincode'  => ['required','integer','min:6','max:10'],
            'role'     => ['required'],
        ];
        Validator::make($request->all(),$rules, $messages)->validate();
        $user = User::find($validated['id']);
        if ($request['password'] != "") {

            $user->password = Hash::make($request['password']);
        }
        $user->name =  $request['name'];
        $user->role =  $request['role'];
        $user->email = $request['email'];
        $user->save();
        return response()->json(['success' => true, 'message' => 'User Updated Successfully.', 'd' => $user->toSql()], 200);
    }
     catch (ValidationException $e) {

        return response()->json(['success' => 'false', 'errors' => $e->errors(), 'type' => 'system', 'message' => $e->getMessage()], 422);
    }
    }

    /**
     * Removes  the specified resources from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        try {
            if (in_array(Auth::user()->id, $request->ids)) {
                unset($request->ids[array_search(Auth::user()->id, $request->ids)]);
            }

            User::whereParent_id(Auth::user()->id)->whereIn("id", $request->ids)->delete();
            return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
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
        try {
            // if (Auth::user()->id == $id) {
            //     throw new Exception("You can not delete yourself");
            // }
            User::destroy($id);
            return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
