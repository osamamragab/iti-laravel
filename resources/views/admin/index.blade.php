
@extends('layouts.adminSidebar')

@section('title', 'Student Dashboard')
@section('content')



<div class="container">
<a href="{{route('admin.books.create')}}"  class="btn btn-success">Add New Book</a>
<br>
<br>
  <div class="table-responsive ">          
  <table class="table">
    <thead>
      <tr class="table-success">
        <th>Title</th>
        <th>Author</th>
        <th>published year</th>
        <th>View</th>
        <th>Edit</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>

    @foreach($books as $book)
      <tr>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->published_year}}</td>
        <td><a href="{{route('admin.books.show',$book->id)}}"  class="btn btn-success">book details</a></td>
        <td><a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-success">Edit</a></td>
        <td>
            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove Book</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
@endsection