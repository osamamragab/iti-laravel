
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard')</title>

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- CoreUI CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.1.0/dist/css/coreui.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/free.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">

  {{-- Sidebar --}}
  <div class="sidebar border-end">
    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">User Details </div>
    </div>

    <ul class="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.profile') }}">
          <i class="nav-icon cil-shield-alt"></i> Profile
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.profile.edit') }}">
        <i class="nav-icon cil-warning"></i> Update Data
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.student.search') }}">
            <i class="nav-icon cil-magnifying-glass"></i> Search Student
        </a>
    </li>


    <li class="nav-item">
    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
        @csrf

        <button type="submit" class="nav-link btn btn-link" >
            <i class="nav-icon cil-account-logout"></i>
            <span>Logout</span>
        </button>
    </form>
</li>





  </div>

  {{-- Main Content --}}
  <div class="flex-grow-1 p-4">
    @yield('content')
  </div>
</div>

{{-- Bootstrap + CoreUI JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.1.0/dist/js/coreui.bundle.min.js"></script>

</body>
</html>
