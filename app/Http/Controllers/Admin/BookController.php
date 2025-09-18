<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book; 

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('admin.index', compact('books'));
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'nullable|integer',
            'available_copies' => 'nullable|integer'
        ], [
            'title.required' => 'title is required',
            'author.required' => 'author is required',
        ]);

        Book::create($request->all());

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully!');
    }


    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.view', compact('book'));
    }


    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('admin.edit', compact('book'));
    }



    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'nullable|integer',
            'available_copies' => 'nullable|integer',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
    }



    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

                return redirect()->route('admin.books.index')->with('success', 'Book removed successfully!');

    }
}

