<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <title>Customers</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Customers Information</h1>
        @if(session()->get('success'))
        <div class="toast toast-success">
            {{session()->get('success')}}
        </div>
        @endif
        <div class="mt-1">
            @yield('content')
        </div>
        
    </div>
</body>
</html>