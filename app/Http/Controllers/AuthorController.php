<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Validator;
use View;
use Response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sorting = explode('_', $request->sort) ?? '';
        if ($request->sort && $sorting[1] === 'asc') {
            if ($sorting[0] == 'books') {
                $authors = Author::withCount('getBooks')->orderBy('get_books_count', $sorting[1])->paginate(10);
                $authors->appends(['sort' => $request->sort]);
            } else {
                $authors = Author::orderBy($sorting[0])->paginate(10);
                $authors->appends(['sort' => $request->sort]);
            }
        } elseif ($request->sort && $sorting[1] === 'desc') {
            if ($sorting[0] == 'books') {
                $authors = Author::withCount('getBooks')->orderBy('get_books_count', $sorting[1])->paginate(10);
                $authors->appends(['sort' => $request->sort]);
            } else {
                $authors = Author::orderByDesc($sorting[0])->paginate(10);
                $authors->appends(['sort' => $request->sort]);
            }
        } else {
            $authors = Author::orderBy('id')->paginate(10);
        }

        return view('author.index', [
            'authors' => $authors,
            'sortBy' => $request->sort,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'author_name' => ['required', 'between:3,64', 'alpha'],
                'author_surname' => ['required', 'between:3,64', 'alpha_dash'],
            ],
            [
                'required' => ':attribute field is required',
                'between' => ':attribute (:input) length must be between :min and :max characters.',
                'alpha' => ':attribute must only contain letters.',
            ],
            [
                'author_name' => 'Name',
                'author_surname' => 'Surname',
            ]
        );
        if ($validator->fails()) {
            $request->flash(); // flash() - input values stays in memory
            return redirect()->back()->withErrors($validator);
        }
        Author::new()->saveAuthor($request);
        return redirect()->route('author.index')->with('success_message', "Author $request->author_name was successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $authorInfo = View::make('author.show')
        ->with(['author' => $author])
        ->render();
        return Response::json(['html' => $authorInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'author_name' => ['required', 'between:3,64', 'alpha'],
                'author_surname' => ['required', 'between:3,64', 'alpha'],
            ],
            [
                'required' => ':attribute field is required',
                'between' => ':attribute (:input) length must be between :min and :max characters.',
                'alpha' => ':attribute must only contain letters.',
            ],
            [
                'author_name' => 'Name',
                'author_surname' => 'Surname',
            ]
        );
        if ($validator->fails()) {
            $request->flash(); // flash() - input values stays in memory
            return redirect()->back()->withErrors($validator);
        }
        $author->saveAuthor($request);
        return redirect()->route('author.index')->with('success_message', "Author $request->author_name was successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {

        return $author->deleteAuthor($author) ?? redirect()->back()->with('success_message', "Author $author->name $author->surname was successfully deleted");
    }

    public function deletePicture(Author $author) {
        Author::removePicture($author);
        return redirect()->back();
    }
}
