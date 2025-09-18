
@extends('layouts.adminSidebar')

@section('title', 'Admin create')
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

    <form class="form-horizontal my-5" action="{{ route('admin.books.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title</label>
            <div class="col-sm-10 my-2">
                <input type="text" 
                       class="form-control" 
                       id="title" 
                       placeholder="Title" 
                       name="title"
                       value="{{ old('title') }}">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="author">Author:</label>
            <div class="col-sm-10 my-2">
                <input type="text" 
                       class="form-control" 
                       id="author" 
                       placeholder="Author" 
                       name="author"
                       value="{{ old('author') }}">
                @error('author') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="published_year">Year:</label>
            <div class="col-sm-10 my-2">
                <input type="number" 
                       class="form-control" 
                       id="published_year" 
                       placeholder="Year" 
                       name="published_year"
                       value="{{ old('published_year') }}">
                @error('published_year') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="available_copies">Copies:</label>
            <div class="col-sm-10 my-2">
                <input type="number" 
                       class="form-control" 
                       id="available_copies" 
                       placeholder="Number of copies" 
                       name="available_copies"
                       value="{{ old('available_copies') }}">
                @error('available_copies') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <br>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
        </div>
    </form>
</div>
@endsection
