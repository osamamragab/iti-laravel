<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    


    public function index()
    {
        $books = Book::all();
        return view('student.index', compact('books'));
    }


    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('student.view', compact('book'));
    }


    public function borrow(string $id)
    {
        $book = Book::findOrFail($id);

        if ($book->available_copies < 1) {
            return redirect()->back()->with('error', 'No copies available');
        }

        BorrowedBook::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => now(),
        ]);

        // decrement the nubmer of available copies 
        $book->decrement('available_copies');

        return redirect()->route('user.books.index')->with('success', 'Book borrowed successfully!');
    }


    public function profile()
    {
        $user = Auth::user();
        return view('student.profile', [
            'user' => $user,
            'borrowedBooks' => BorrowedBook::where('user_id', Auth::id())->with('book')->get()
        ]);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('student.update', compact('user'));
    }



    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:3|confirmed',

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }


        \App\Models\User::where('id', Auth::id())->update($data);

        return redirect()->route('user.profile')->with('success', 'UPdate Done');
    }


    public function borrowedBooks()
    {
        $borrowedBooks = BorrowedBook::where('user_id', Auth::id())
            ->with('book')
            ->get();

        return view('student.borrowed_books', compact('borrowedBooks'));
    }
}


