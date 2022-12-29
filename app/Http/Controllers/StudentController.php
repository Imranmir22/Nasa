<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Contact;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       $request->validate([
        'email'=>'unique:users,email',
        'password'=>'min:8 ',
        'name'=>'min:3 | max:255'
       ]);
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
    public function upload_image(Request $request)
    {
        $this->validate($request, [
            'potrait' => 'image|mimes:png,jpg,gif',
            'landscape' => 'image|mimes:png,jpg,gif',

        ]);
       
        if($request->file('landscape'))
        {
            $type=1;  
            $file=$request->file('landscape');
        }
        else
        {
            $type=0;
            $file=$request->file('potrait');
           
        }

        $fileExtension=$file->getClientOriginalExtension();
        $fileName=$file->getClientOriginalName();
        $fileSize=$file->getSize();
        $fileMime=$file->getMimeType();   
        $contents = Storage::put('',$file);//store file tird parameter is public or private 
        return  Storage::url($contents);  //to get the URL for a given file
        
        return $contents;
            
    }
    public function add_contact(Request $request)
    {
        $contactsModel=new Contact();
        $contactsModel->name=$request->contactname;
        $contactsModel->contact_number=json_encode($request->contactnumber,true);
        $contactsModel->save();
        $contacts=Contact::get();
        return view('students',['data'=>$contacts]);
       
    }
    public function get_contacts()
    {
        $contacts=Contact::get();
        return view('students',['data'=>$contacts]);
    }
    public function edit_contact(Request $request,$id)
    {
        $contactsModel=Contact::find($id);
        $contactsModel->name=$request->contactname;
        $contactsModel->contact_number=json_encode($request->contactnumber,true);        
        $contactsModel->save();
        return redirect('get-contacts');
    }
    public function delete_contact($id)
    {
        Contact::destroy($id);
        return redirect('get-contacts');

    }
}
