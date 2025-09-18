<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">

    <h2 class="mb-4 text-center">Admin Login</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email"  class="form-control @error('email') is-invalid @enderror"  id="email"  name="email"  placeholder="Enter Your Email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <input type="password"  class="form-control @error('password') is-invalid @enderror"  id="password"  name="password"  placeholder="Enter Your Password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="d-grid">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



