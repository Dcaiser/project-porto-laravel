@extends('admin.layout.app')

@section('content')
<div class="min-h-screen p-6 bg-gray-100">
  <div class="mx-auto max-w-7xl">
    <!-- Header -->
    <div class="flex mb-6 ">
        <h1 class="text-4xl font-bold">about</h1>
    </div>
    @if(session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="px-4 py-3 mb-4 text-green-800 bg-green-100 border border-green-300 rounded"
    >
        {{ session('success') }}
    </div>
@endif

    <div class="">
        @if($about->isEmpty())
        <div class="p-4 bg-yellow-100 border border-yellow-300 rounded">
            <p class="mb-2 text-yellow-800">Belum ada data yang diunggah.</p>

            <!-- Form Tambah Data -->
            <form method="POST" action="{{ route('post-ab') }}" enctype="multipart/form-data">
                @csrf
                <input name="poto" type="file" placeholder="poto" class="w-full p-2 mb-2 border rounded" required />
                <textarea name="desc" placeholder="Isi..." class="w-full p-2 mb-2 border rounded"></textarea>
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Simpan</button>
            </form>
        </div>
    @endif
            @if($about->isnotEmpty())
            @foreach ($about as $ab)

            <div class="p-4 text-white bg-gray-600 border rounded">
                <form method="POST" action="{{ route('edit-ab', $ab->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input name="poto1" type="file" placeholder="poto" class="w-full p-2 mb-2 border rounded" />
                    <label for="poto">foto saat ini:
                        <a href="{{ asset('storage/' . $ab->poto) }}" target="_blank">
                        <img src="{{ asset('storage/' . $ab->poto) }}" alt="Foto"
                             class="w-32 transition duration-300 rounded hover:opacity-80">
                    </a></label>
                    <textarea name="desc1" placeholder="Isi..."  class="w-full p-2 mb-2 border rounded bg-slate-500">{{  $ab->descript }}</textarea>
                    <button type="submit" class="px-4 py-2 bg-blue-600 rounded">Simpan</button>
                </form>


            </div>
            @endforeach

            @endif

    </div>
  </div>
</div>
@endsection
