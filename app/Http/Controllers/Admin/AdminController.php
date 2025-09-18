<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // هنا نستخدم جدول المستخدمين
use App\Models\Book;
use App\Models\BorrowedBook;

class AdminController extends Controller
{
    // عرض الفورم فقط
    public function showStudentSearchForm()
    {
        return view('admin.student-search');
    }

    // البحث عن الطالب وعرض الكتب المستعارة
    public function searchStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer|exists:users,id',
        ]);

        $student = User::find($request->student_id);

        // استدعاء الكتب المستعارة
        $borrowedBooks = BorrowedBook::where('user_id', $student->id)->get();

        return view('admin.student-search', compact('student', 'borrowedBooks'));
    }
}


