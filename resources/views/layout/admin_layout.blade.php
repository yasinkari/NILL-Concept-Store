<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            height: 100vh; /* Make the sidebar stretch to the full height */
            position: fixed; /* Fix the sidebar position */
            top: 0;
            left: 0;
            background-color: #343a40; /* Dark background */
            color: white;
            padding-top: 20px;
            overflow-y: auto; /* Scrollable sidebar for content overflow */
        }

        .sidebar .nav-link {
            font-size: 16px;
            padding: 10px 20px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057; /* Slight hover effect */
            color: white;
        }

        .sidebar .logout-button {
            position: absolute;
            bottom: 20px;
            width: 100%;
            padding: 10px 20px;
        }

        main {
            margin-left: 200px; /* Leave space for the sidebar */
            padding: 20px;
            flex-grow: 1; /* Allow the main content to grow */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link text-white active" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="{{ route('products.index') }}">
                    <i class="fas fa-box"></i> Manage Products
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-shopping-cart"></i> Shopping Cart
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="#">
                    <i class="fas fa-chart-bar"></i> Reports
                </a>
            </li>
        </ul>
        <form method="POST" action="{{ route('admin.logout') }}" class="logout-button">
            @csrf
            <button type="submit" class="btn btn-link nav-link text-danger text-start w-100">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
