<!DOCTYPE html>
<html lang="en">

<head>
  <title>Student Tutorial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- CSS And JavaScript -->
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-laravel shadow">
    <div class="container">
      <a class="navbar-brand" href="{{route('students.index')}}"><h2 class="text-dark">STUDENT</h2></a>
    </div>
  </nav>
  <div class="container mt-2">
    @yield('content')
  </div>

</body>

</html>
