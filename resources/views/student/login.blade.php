@extends('layouts.bootStrap_log')

@section('title', 'Student login')
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


        <form class="form-horizontal my-5" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10 my-2">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2 my-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Login</button>
                    
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                </div>
            </div>
        </form>
    </div>
@endsection



