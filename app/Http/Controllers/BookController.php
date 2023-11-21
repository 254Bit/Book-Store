<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBook(Request $request)
    {
        $request->validate([
            "title"=> "required",
            "author"=> "required",
            "pages"=> "required",
            "IBN"=> "required",
            "category"=> "required",
            "publisher"=> "required",
            "price"=> "required",
            "yearOfPublication"=> "required",
        ]);
        $books = Book::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'pages'=>$request->pages,
            'IBN'=>$request->IBN,
            'category'=>$request->category,
            'publisher'=>$request->publisher,
            'price'=>$request->price,
            'yearOfPublication'=>$request->yearOfPublication, // take the model itself in this case Book
    
        
        ]); 
        $books = Book::find($books->id);        
        if(!$books) {
            return response()->json(['Unsuccessful']);
        }
        else{
            return response()->json(['Successful' => $books]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBook(Request $request, Book $books)
    {
        // $request->validate([
        //     "title"=> "required",
        //     "author"=> "required",
        //     "pages"=> "required",
        //     "IBN"=> "required",
        //     "category"=> "required",
        //     "publisher"=> "required",
        //     "price"=> "required",
        //     "yearOfPublication"=> "required",
        // ]);
        $books->update($request->all());
        $books = Book::find($books->id);
        // $books->update(
        //     $request->title, 
        //     $request->author, 
        //     $request->pages,
        //     $request->IBN, 
        //     $request->category, 
        //     $request->publisher,
        //     $request->price, 
        //     $request->yearOfPublication, 
        // );       
       return response(["Successfully updated"=> $books]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBook(Request $request,Book $books )
    {
        $books->delete($request->all());
        $books->Book::find($books->id);
        
               
        return response(["Successfully deleted"=> $books]);
    }
}
