<!DOCTYPE html>
<html>
<head>
    <title>Records</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @yield('content')
</body>
</html>
