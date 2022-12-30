<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        //  $this->middleware('auth:api');
     }

    public function index()
    {
        $books = Book::get();
        return response()->json([
            'status' => 'success',
            'books' => $books,
        ]);
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
            'book_name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover_image' => 'required',
        ]);
        $cover_image = $request->file('cover_image') ?? "";
        $base_name = $cover_image ? date("YmdHmi").$cover_image->getClientOriginalName() : "";   
        if($base_name) 
            $cover_image->move(public_path('storage/Images'), $base_name);
        $book = Book::create([
            'book_name' => $request->book_name,
            'author' => $request->author,
            'cover_image' => "Images/".$base_name,       
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Book created successfully',
            'book' => $book
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
        try {
            return Book::findorfail($id);
        } catch (ModelNotFoundException $e) {
            return ['message' => 'book id not found'];
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
        try
        {
            $book=Book::findorfail($id);
            $request->validate([
                'book_name' => 'string|max:255',
                'author' => 'string|max:255',
                'cover_image' => 'mimes:jpg,jpeg,png',
            ]);
            $cover_image = $request->file('cover_image') ?? "";
            $base_name = $cover_image ? date("YmdHmi").$cover_image->getClientOriginalName() : "";   
            if($base_name) {
                $cover_image->move(public_path('storage/Images'), $base_name);
            }
        
            $book->book_name=$request->book_name ?? $book->book_name;
            $book->author=$request->author ?? $book->author;
            $book->cover_image=$base_name ?? $book->cover_image;
            $book->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Book Updated successfully',
                'book' => Book::find($id)
            ]);
                
        }
        catch(ModelNotfoundexception $e)
        {
            return ['message'=>'id not found'];
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
        try
        {
            $book=Book::findorfail($id);
            $book->destroy($id);
            return ['message' => 'book deleted'];
        }
        catch(ModelNotfoundexception $e)
        {
            return ['message'=>'id not found'];
        }
    }
    public function rent_book($id)
    {
        try
        {
            $book=Book::findorfail($id);
            if(!$book->taken_by_user)
            {
                $book->taken_by_user=Auth()->id();
                $book->update();
                return ['message' => 'book granted'];
            }
            else
            {
                return ['message' => 'book already taken'];
            }
            
        }
        catch(ModelNotfoundexception $e)
        {
            return ['message'=>'id not found'];
        }   
    }

    public function book_returned($id)
    {
        try
        {
            $book=Book::findorfail($id);           
            $book->taken_by_user=null;
            $book->update();
            return ['message' => 'book returned'];
        }
        catch(ModelNotfoundexception $e)
        {
            return ['message'=>'id not found'];
        }   
    }

   
}
