@extends('layouts.bootStrap_CDN')

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
        action="{{ route('user.profile.update') }}" 
        method="POST">
        
    @csrf
    @method('PUT')

    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10 my-2">
        <input type="text" 
               class="form-control" 
               id="name" 
               name="name" 
               value="{{ old('name', $user->name) }}" 
               >
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10 my-2">
        <input type="email" 
               class="form-control" 
               id="email" 
               name="email" 
               value="{{ old('email', $user->email) }}" 
               >
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password (optional):</label>
      <div class="col-sm-10 my-2">
        <input type="password" 
               class="form-control" 
               id="pwd" 
               name="password" 
               placeholder="Enter new password (leave blank if unchanged)">
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd_confirmation">Confirm Password:</label>
      <div class="col-sm-10 my-2">
        <input type="password" 
               class="form-control" 
               id="pwd_confirmation" 
               name="password_confirmation" 
               placeholder="Confirm new password">
      </div>
    </div>

    <br>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
  </form>
</div>
@endsection

