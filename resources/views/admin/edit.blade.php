@extends('layouts.adminSidebar')

@section('title', 'Admin edit')
@section('content')
<div class="container">

    <!-- validation -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form class="form-horizontal my-5" 
      action="{{ route('admin.books.update', $book->id) }}" 
      method="POST">


        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title</label>
            <div class="col-sm-10 my-2">
                <input type="text"  class="form-control"  id="title"  name="title"  placeholder="Title" value="{{ old('title', $book->title) }}">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="author">Author:</label>
            <div class="col-sm-10 my-2">
                <input type="text"  class="form-control"  id="author"  name="author"  placeholder="Author" value="{{ old('author', $book->author) }}">
                @error('author') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="published_year">Year:</label>
            <div class="col-sm-10 my-2">
                <input type="number"  class="form-control"  id="published_year"  name="published_year"  placeholder="Year" value="{{ old('published_year', $book->published_year) }}">
                @error('published_year') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="available_copies">Copies:</label>
            <div class="col-sm-10 my-2">
                <input type="number"  class="form-control"  id="available_copies"  name="available_copies"  placeholder="Number of copies" value="{{ old('available_copies', $book->available_copies) }}">
                @error('available_copies') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <br>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" value="Update">
                  <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </form>
</div>
@endsection
