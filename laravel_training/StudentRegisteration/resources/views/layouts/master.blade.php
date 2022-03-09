<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSS And JavaScript -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-laravel shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('students.index') }}">
                <h2 class="text-dark">STUDENT</h2>
            </a>
        </div>
    </nav>
    <div class="container mt-2">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @stack("js")
</body>

</html>
