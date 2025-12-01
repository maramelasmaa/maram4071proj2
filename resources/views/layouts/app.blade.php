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

    <!-- FORMAL FONT -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ===========================
           COLOR PALETTE
        =========================== */
        :root {
            --primary: #3B1E54;
            --secondary: #5A3472;
            --accent: #C9A959;

            --bg-light: #F4EEF8;
            --surface: #C5B4D6;
            --border: #D6D3DD;

            --text-dark: #1B1B1B;
            --text-light: #FFFFFF;
        }

        /* ===========================
           DARK MODE
        =========================== */
        [data-theme="dark"] {
            --bg-light: #140A1F;
            --surface: #2A1A3A;
            --border: #4A3A5A;

            --text-dark: #EAEAEA;
            --text-light: #FFFFFF;
        }

        /* ===========================
           FONT
        =========================== */
        body, h1, h2, h3, h4, h5, h6, p, a, button {
            font-family: 'IBM Plex Sans', sans-serif;
            letter-spacing: .2px;
        }

        body {
            background: var(--bg-light);
            color: var(--text-dark);
            transition: 0.3s ease-in-out;
        }

        /* ===========================
           SIDEBAR
        =========================== */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: var(--primary);
            color: var(--text-light);
            padding-top: 25px;
            position: fixed;
            left: 0;
            top: 0;
            transition: 0.3s;
        }

        .sidebar h3 {
            text-align: center;
            font-weight: 600;
            color: var(--accent);
        }

        .sidebar a {
            color: var(--surface);
            padding: 14px 20px;
            display: block;
            text-decoration: none;
            margin: 5px 15px;
            border-radius: 10px;
            transition: .3s;
            font-weight: 500;
        }

        .sidebar a i {
            margin-right: 10px;
            color: var(--accent);
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--secondary);
            color: var(--text-light);
            transform: translateX(7px);
            box-shadow: 0 4px 12px rgba(90, 52, 114, 0.4);
        }

        /* ===========================
           CONTENT
        =========================== */
        .content {
            margin-left: 250px;
            padding: 25px;
        }

        /* ===========================
           TOPBAR
        =========================== */
        .topbar {
            background: var(--secondary);
            color: var(--text-light);
            padding: 18px 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar i {
            color: var(--accent);
        }

        .theme-toggle {
            cursor: pointer;
            color: var(--accent);
            font-size: 1.4rem;
            transition: 0.3s;
        }

        .theme-toggle:hover {
            transform: scale(1.2);
        }

        /* =====================================================
           GLOBAL FORM + TABLE + CARD STYLING FOR BOOK PAGES
        ===================================================== */

        /* Cards */
        .card-custom {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            transition: .3s;
        }
        .card-custom:hover {
            background: var(--surface);
            transform: translateY(-4px);
            box-shadow: 0 4px 14px rgba(59, 30, 84, 0.2);
        }

        /* Inputs */
        .form-control {
            border-radius: 10px;
            border: 1px solid var(--border);
            background: #fff;
        }
        .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 5px rgba(90, 52, 114, 0.4);
        }

        /* Buttons */
        .btn-primary {
            background: var(--secondary);
            border-color: var(--secondary);
        }
        .btn-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary {
            border-color: var(--secondary);
            color: var(--secondary);
        }
        .btn-outline-primary:hover {
            background: var(--surface);
        }

        /* Tables */
        table {
            border-radius: 10px;
            overflow: hidden;
        }
        thead {
            background: var(--primary);
            color: var(--text-light);
        }
        tbody tr:hover {
            background: var(--surface);
        }

        /* ===========================
           GLOBAL DASHBOARD + CRUD STYLES
        =========================== */

        .stat-card {
            background: var(--bg-light);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            transition: 0.3s;
        }

        .stat-card:hover {
            background: var(--surface);
            transform: translateY(-5px);
            box-shadow: 0 4px 14px rgba(59, 30, 84, 0.2);
        }

        .stat-card h5 {
            color: var(--secondary);
            font-weight: 600;
        }

        .stat-card h2 {
            color: var(--primary);
            font-weight: 800;
        }

        /* TABLES (override bootstrap table styles where needed) */
        .table {
            border-color: var(--border) !important;
        }

        .table th {
            background: var(--primary) !important;
            color: var(--text-light) !important;
            font-weight: 600;
        }

        .table td {
            background: var(--bg-light) !important;
            color: var(--text-dark) !important;
        }

        /* FORMS */
        input, select, textarea {
            background: var(--bg-light);
            border: 1px solid var(--border);
            color: var(--text-dark);
            border-radius: 8px !important;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(90, 52, 114, 0.2);
        }

        /* BUTTONS */
        .f-btn {
            background: var(--secondary);
            color: var(--text-light);
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: 0.3s;
        }

        .f-btn:hover {
            background: var(--primary);
            color: var(--text-light);
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(59, 30, 84, 0.3);
        }

    </style>
</head>

<body data-theme="light">

<!-- SIDEBAR -->
<div class="sidebar">
    <h3>Dashboard</h3>

    <a href="{{ route('dashboard.index') }}" class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>

    <a href="{{ route('book.index') }}" class="{{ request()->routeIs('book.index') ? 'active' : '' }}">
        <i class="bi bi-book"></i> Books
    </a>

    <a href="{{ route('classification.index') }}" class="{{ request()->routeIs('classification.index') ? 'active' : '' }}">
        <i class="bi bi-list-ul"></i> Classifications
    </a>

    <a href="{{ route('category.index') }}" class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
        <i class="bi bi-folder2-open"></i> Categories
    </a>

    <a href="{{ route('type.index') }}" class="{{ request()->routeIs('type.index') ? 'active' : '' }}">
        <i class="bi bi-tags"></i> Types
    </a>

</div>

<!-- CONTENT -->
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar">
        <h5 class="m-0 fw-bold">Welcome Back..</h5>

        <span class="theme-toggle" onclick="toggleTheme()">
            <i class="bi bi-moon-stars-fill"></i>
        </span>
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

<script>
function toggleTheme() {
    const body = document.body;
    const current = body.getAttribute("data-theme");
    body.setAttribute("data-theme", current === "light" ? "dark" : "light");
}
</script>

</body>
</html>
