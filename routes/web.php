<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get("/", function () {
    return redirect(Auth::check() ? "/user/books" : "/login");
});


// ----------------- Register -----------------
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// ----------------- Login -----------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ----------------- User Books -----------------
Route::get('/user/books', [UserController::class, 'index'])->name('user.books.index')->middleware('auth');
Route::get('/user/books/{id}', [UserController::class, 'show'])->name('user.books.show')->middleware('auth');
Route::get('/user/books/{id}/borrow', [UserController::class, 'borrow'])->name('user.books.borrow')->middleware('auth');

// ----------------- Sidebar Functions -----------------
// Show User Profile
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');

// Edit User Profile
Route::get('/user/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit')->middleware('auth');
Route::put('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update')->middleware('auth');


// Show Borrowed Books
Route::get('/user/borrowed-books', [UserController::class, 'borrowedBooks'])->name('user.borrowed.books')->middleware('auth');






Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login']);
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {

    // Dashboard
    Route::get('admin/dashboard', [BookController::class, 'index'])->name('admin.dashboard');

    // Books CRUD
    Route::get('admin/books', [BookController::class, 'index'])->name('admin.books.index');
    Route::get('admin/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('admin/books', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('admin/books/{book}', [BookController::class, 'show'])->name('admin.books.show');
    Route::get('admin/books/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');

    // Admin Profile
    Route::get('admin/profile', [AdminProfileController::class, 'show'])->name('admin.profile');
    Route::get('admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');

    // ----------------- Search Student by ID -----------------
    Route::get('admin/student-search', [AdminController::class, 'showStudentSearchForm'])
        ->name('admin.student.search');
    Route::post('admin/student-search', [AdminController::class, 'searchStudent'])
        ->name('admin.student.search.post');
});


