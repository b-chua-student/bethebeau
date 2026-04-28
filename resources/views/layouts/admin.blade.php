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
        <div style="position:fixed; top:1rem; right:1rem; z-index:9999; display:flex; flex-direction:column; gap:0.5rem;">
            @foreach ($errors->all() as $error)
                <div class="error-banner alert alert-danger m-0">
                    {{ $error }}
                </div>
            @endforeach
        </div>
        <script>
            setTimeout(() => {
                document.querySelectorAll('.error-banner').forEach(el => el.style.display = 'none');
            }, 3000);
        </script>
    @endif

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" />
</body>
</html>


