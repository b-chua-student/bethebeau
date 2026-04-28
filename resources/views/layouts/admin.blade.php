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

    <x-admin-navbar />

    @if (session('success'))
        <div id="success-banner" class="alert alert-success" style="position:absolute; top:1rem; right:1rem; z-index:9999;">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('success-banner').style.display = 'none';
            }, 3000);
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div id="error-banner" class="alert alert-error" style="position:absolute; top:1rem; right:1rem; z-index:9999;">
                <p>{{ $error }}</p>
            </div>
        @endforeach

        <script>
            setTimeout(() => {
                document.getElementById('error-banner').style.display = 'none';
            }, 3000);
        </script>
    @endif

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" />
</body>
</html>


