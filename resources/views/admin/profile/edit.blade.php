@extends('layouts.adminSidebar')

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
       action="{{ route('admin.profile.update') }}"
        method="POST">
        
    @csrf
    @method('PUT')

    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10 my-2">
        <input type="text"  class="form-control"  name="name"  value="{{ old('name', $admin->name) }}" >
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10 my-2">
        <input type="email"  class="form-control"  name="email"  value="{{ old('email', $admin->email) }}" >
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password (optional):</label>
      <div class="col-sm-10 my-2">
        <input type="password"  class="form-control"   name="password"  placeholder="Enter new password (leave blank if unchanged)">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd_confirmation">Confirm Password:</label>
      <div class="col-sm-10 my-2">
        <input type="password"  class="form-control"  name="password_confirmation"  placeholder="Confirm new password">
      </div>
    </div>

    <br>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Update</button>
          <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Back to List</a>
      </div>
    </div>
  </form>
</div>
@endsection

