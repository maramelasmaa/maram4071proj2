<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f3f6fb;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #2b0d59, #1b0440);
            color: white;
            padding-top: 25px;
        }

        .sidebar h3 {
            font-weight: 700;
            text-align: center;
            margin-bottom: 25px;
        }

        .sidebar a {
            color: #cfcfe8;
            padding: 14px 20px;
            text-decoration: none;
            display: block;
            margin: 5px 15px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #6a4cff;
            color: #fff;
            box-shadow: 0 0 10px rgba(106, 76, 255, 0.6);
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            padding: 25px;
        }

        .topbar {
            background: white;
            padding: 18px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
    </style>
</head>

<body>

 <!-- Sidebar -->
<div class="sidebar">
    <h3>Dashboard</h3>
     <a href="{{ route('dashboard.index') }}"
   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
   <i class="bi bi-speedometer2"></i> Dashboard
</a>
    <a href="{{ route('book.index') }}"
   class="{{ request()->routeIs('book.index') ? 'active' : '' }}">
    <i class="bi bi-book"></i> Books
</a>


    {{-- CLASSIFICATION --}}
    <a href="{{ route('classification.index') }}"
       class="{{ request()->routeIs('classification.index') ? 'active' : '' }}">
        <i class="bi bi-list-ul"></i> Classifications
    </a>

    {{-- CATEGORY --}}
    <a href="{{ route('category.index') }}"
       class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
        <i class="bi bi-folder2-open"></i> Categories
    </a>

    {{-- TYPE --}}
    <a href="{{ route('type.index') }}"
       class="{{ request()->routeIs('type.index') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> Types
    </a>
   


</div>

    <!-- Main Content -->
    <div class="content">

        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold">Welcome Back..</h5>
            <i class="bi bi-person-circle fs-3"></i>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Content -->
        @yield('content')

    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
