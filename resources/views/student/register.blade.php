@extends('layouts.bootStrap_log')

@section('title', 'Student register')
@section('content')
<body>
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

    <form class="form-horizontal my-5" action="{{ route('register') }}"  method="POST">
      @csrf

      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10 my-2">
          <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10 my-2">
          <input type="email" class="form-control" id="email" placeholder="Enter Your email" name="email" value="{{ old('email') }}">
          @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10 my-2">
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
          @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      </div>

      <br>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-success" value="Register">
        </div>
      </div>
    </form>
</div>
@endsection
