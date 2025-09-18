@extends('layouts.bootStrap_CDN')

@section('title', 'Book Details')

@section('content')
<div class="container my-4">
  <h2>Book Details</h2>
  <div class="card p-4 shadow">
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
    <p><strong>Available Copies:</strong> {{ $book->available_copies }}</p>
  </div>
  <a href="{{ route('user.books.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
