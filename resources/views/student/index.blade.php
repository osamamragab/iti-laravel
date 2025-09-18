@extends('layouts.bootStrap_CDN')

@section('title', 'Student Dashboard')
@section('content')

<div class="container">
  <div class="row">
    @foreach($books as $book)
      <div class="col-md-6 mb-4"> 
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Author : {{ $book->author }}</h6>
            
            <!-- view button  -->
            <a href="{{route('user.books.show', $book->id)}}" class="btn btn-secondary">View</a>
            
            <!-- borrow button  -->
            <a href="{{route('user.books.borrow',$book->id)}}"  class="btn btn-success">Borrow</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
