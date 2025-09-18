@extends('layouts.bootStrap_CDN')

@section('title', 'User Profile')

@section('content')
<div class="container my-4">
  <h2>User Profile</h2>
  <div class="card p-4 shadow mb-4">
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('user.books.index') }}" class="btn btn-secondary mt-3">Back to List</a>
  </div>

  <h3>Previously Borrowed Books</h3>
  <div class="row">
    @foreach($borrowedBooks as $borrowed)
      <div class="col-md-6 mb-4"> 
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $borrowed->book->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Author: {{ $borrowed->book->author }}</h6>
            <a href="{{ route('user.books.show', $borrowed->book->id) }}" class="btn btn-secondary">View</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

