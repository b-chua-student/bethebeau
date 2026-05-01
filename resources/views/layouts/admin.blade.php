<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="icon" href="favicon.png">
  @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">

    <div class="flex min-h-screen">
        <!-- Sidebar (Fixed width) -->
        <div class="sticky top-0 h-screen w-64 shrink-0 overflow-y-auto">
            <x-admin-navbar />
        </div>

        <!-- Main Content (Flexible width) -->
        <main class="flex-1">
            <!-- Notifications Container -->
            <div class="fixed top-4 right-4 z-[9999] flex flex-col gap-3 pointer-events-none">
                @if (session('success'))
                    <div id="success-banner" class="pointer-events-auto min-w-[300px] border-l-4 border-green-500 bg-white p-4 shadow-xl">
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-900">Success</p>
                        <p class="text-sm text-gray-600">{{ session('success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error-banner pointer-events-auto min-w-[300px] border-l-4 border-red-500 bg-white p-4 shadow-xl">
                            <p class="text-xs font-bold uppercase tracking-widest text-gray-900">Error</p>
                            <p class="text-sm text-gray-600">{{ $error }}</p>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Page Content -->
            <main class="flex-1 bg-gray-50">
            <div class="p-8 lg:p-12">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // Auto-hide notifications
        setTimeout(() => {
            const success = document.getElementById('success-banner');
            if(success) success.style.display = 'none';

            document.querySelectorAll('.error-banner').forEach(el => {
                el.style.display = 'none';
            });
        }, 4000);
    </script>
</body>
</html>
