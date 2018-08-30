<?php

namespace App\Http\Controllers;

use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     *
     * show book's form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     *
     * store request
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate($this->rules(), $this->messages());
        $book = new Book();
        $request['publish_date'] = Carbon::now();
        $book->fill($request->all());
        $book->save();
        return redirect()->back()->with('success', 'book has been saved successfully');

    }

    /**
     *
     * validation rules
     *
     * @return array
     */
    private
    function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'isbn' => 'required|unique:books,isbn',
            'publish_date' => 'required'
        ];
    }

    /**
     *
     * validation messages
     *
     * @return array
     */
    private
    function messages()
    {
        return [
            'title.required' => 'title is required',
            'author.required' => 'author is required',
            'publisher.required' => 'publisher is required',
            'writer.required' => 'writer is required',
            'publish_date.required' => 'publish date is required',
            'isbn.required' => 'isbn is required',
            'isbn.unique' => 'isbn should be unique',
        ];
    }
}
