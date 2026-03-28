<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard')</title>
  <link rel="icon" href="{{ asset('storage/Dzik_logo.png') }}" type="image/png">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
  <div class="flex h-screen">

    <!-- Sidebar (global) -->
    <aside class="hidden w-64 text-white bg-gray-800 shadow-lg md:block">
      <div class="p-6">
        <h1><a class="text-3xl text-[#fff] font-bold" href="#header" >MY<span class="text-[#F5DD62]">PORTO</span></a></h1>      </div>
      <nav class="px-4">
        <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-600">Dashboard</a>
        <a href="{{ route('ab') }}" class="block px-4 py-2 hover:bg-gray-600">About</a>
        <a href="{{ route('gall') }}" class="block px-4 py-2 hover:bg-gray-600">gallery</a>
        <a href="{{ route('exp') }}" class="block px-4 py-2 hover:bg-gray-600">experience</a>
        <a href="{{ route('skl') }}" class="block px-4 py-2 hover:bg-gray-600">skill</a>
        <a href="{{ route('cont') }}" class="block px-4 py-2 hover:bg-gray-600">contact</a>

      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
      @yield('content')
    </main>

  </div>
</body>
</html>
