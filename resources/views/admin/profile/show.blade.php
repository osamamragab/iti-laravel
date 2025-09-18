@extends('layouts.adminSidebar')

@section('title', 'Admin Profile')

@section('content')
<div class="container my-4">
  
  <h2>User Profile</h2>
  <div class="card p-4 shadow mb-4">
    <p><strong>ID:</strong> {{ Auth::guard('admin')->user()->id }}</p>
    <p><strong>Name:</strong> {{ Auth::guard('admin')->user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::guard('admin')->user()->email }}</p>
    <a href="{{ route('admin.books.index') }}" class="btn btn-secondary mt-3">Back to List</a>
  </div>


</div>
@endsection

