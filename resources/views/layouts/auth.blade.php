<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="icon" href="favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/components/style.css') }}">
  @vite(['resources/css/app.css'])
</head>
<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" />
</body>
</html>

