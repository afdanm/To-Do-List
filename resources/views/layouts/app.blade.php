<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('lists.index') }}">To-Do App</a>
    </div>
</nav>

@yield('content')

</body>
</html>
