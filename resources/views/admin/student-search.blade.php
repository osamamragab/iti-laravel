@extends('layouts.adminSidebar')

@section('content')
<div class="container my-4">
    <h2>Search Student</h2>

<!-- Form to enter student ID -->
    <form action="{{ route('admin.student.search.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Back to List</a>
    </form>

<!-- Display student data if exist -->
    @isset($student)
        <div class="mt-4">
             <h2>User Profile</h2>
        <div class="card p-4 shadow mb-4">
            <p><strong>ID:</strong> {{ $student->id }}</p>
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
           
        </div>

            <h5 class="mt-3">Borrowed Books:</h5>
            @if($borrowedBooks->isEmpty())
                <p>No books borrowed.</p>
            @else
                <ul>
                    @foreach($borrowedBooks as $borrow)
                        <li>{{ $borrow->book->title }} by {{ $borrow->book->author }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endisset
</div>
@endsection
