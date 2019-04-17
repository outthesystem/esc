<?php

namespace App\Http\Controllers;

use App\Book;
use Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = translate('book');
        return view('backend.'.Auth::user()->role.'.book.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->copies = $request->copies;
        $book->school_id = school_id();
        $book->session = get_settings('running_session');

        if($book->save()){
            $data = array(
                'status' => true,
                'notification' => translate('book_added_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_adding_book')
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.book.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('backend.'.Auth::user()->role.'.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->copies = $request->copies;
        $book->school_id = school_id();
        $book->session = get_settings('running_session');

        if($book->save()){
            $data = array(
                'status' => true,
                'notification' => translate('book_updated_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_updating_book')
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Book::destroy($id)){
            $data = array(
                'status' => true,
                'notification' => translate('book_deleted_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_deleting_book')
            );
        }
        return $data;
    }
}
