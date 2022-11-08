<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
       $books=Book::paginate(10);
       return view('list_books',['books'=>$books]);
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
    public function insert_books()
    {
        $response = Http::withHeaders([
            "Authorization"=>"AppRinger"
        ])->post('https://run.mocky.io/v3/821d47eb-b962-4a30-9231-e54479f1fbdf', [
           
        ]);
       $response= $response->json();
        $book=[];
       foreach ($response['items'] as $key => $value) {
          $book['book_id']=$value['id'];
          $book['title']=$value['volumeInfo']['title'];
          $book['sub_title']=$value['volumeInfo']['subtitle'] ?? null;
          $book['authors']=json_encode($value['volumeInfo']['authors']);
          $book['small_thumbnail']=$value['volumeInfo']['imageLinks']['smallThumbnail'];
          $book['thumbnail']=$value['volumeInfo']['imageLinks']['thumbnail'];
          Book::create($book);
          $book=[];
       }
       return view('dashboard');
    }
}
