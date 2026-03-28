@extends('admin.layout.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-6 flex items-center">
        <div class="w-3/4">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
            <p class="text-gray-500">Selamat datang di halaman dashboard, {{ Auth::user()->name }}.</p>
        </div>
        <div class="w-1/4 ">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="p-1 border-2 w-32 border-gray-400 rounded-[5px] hover:bg-gray-300 transition-all">
                    Logout
                </button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
