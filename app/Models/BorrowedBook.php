<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}


































































// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class BorrowedBook extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'user_id',
//         'book_id',
//         'borrow_date',
//     ];

//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }

//     public function book()
//     {
//         return $this->belongsTo(\App\Models\Book::class, 'book_id');
//     }

    
// }

