<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="icon" href="favicon.png">
  <link rel="stylesheet" href="{{ asset('css/components/style.css') }}">
  @vite(['resources/css/app.css'])
</head>
<body>

    @yield('content')

</body>
</html>

