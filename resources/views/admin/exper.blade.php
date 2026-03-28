@extends('admin.layout.app')

@section('content')
<div class="min-h-screen p-6 bg-gray-100">
    <div class="flex items-center justify-center w-full h-56 p-6 ">
        <div x-data="{open : false}" @click="open = true" class="flex items-center justify-center w-full h-full text-white capitalize transition bg-gray-500 hover:bg-gray-600 ">add your experience
            <div x-show="open" class="fixed inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50" x-transition>
                <div @click.away="open = false" class="w-3/4 bg-gray-600 h-3/4" x-transition.scale>
                    <form action="{{ route('post-exp') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6 text-white rounded shadow">
                      @csrf
                      <div>
                          <label for="judul" class="block text-sm font-medium ">Judul</label>
                          <input type="text" name="judul" id="judul" value="" class="block w-full mt-1 bg-gray-500 rounded shadow-sm  focus:ring focus:ring-blue-200">
                      </div>
                      <div>
                          <label for="descript" class="block text-sm font-medium ">Deskripsi</label>
                          <textarea name="desc" id="descript" rows="4"
                                    class="block w-full mt-1 bg-gray-500 rounded shadow-sm  focus:ring focus:ring-blue-200"></textarea>
                      </div>
                      <div>
                          <label for="poto" class="block text-sm font-medium ">Foto</label>
                          <input type="file" name="foto" id="poto"
                                 class="block w-full mt-1 text-sm bg-gray-500  0 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                      </div>

                      {{-- Tombol Submit --}}
                      <div>
                          <button type="submit" class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">
                            submit
                          </button>
                      </div>
                  </form>
                </div>
                <h2 class="text-gray-300 ">tap outside to close</h2>
            </div>

        </div>

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

    <div class="w-full">
        @if ($exper->isnotEmpty())

        <table class="min-w-full bg-white border border-gray-200 shadow rounded-xl">
            <thead>
                <tr class="text-sm font-semibold text-left text-gray-700 bg-gray-100">
                    <th class="p-4 border-b">Foto</th>
                    <th class="p-4 border-b">Judul</th>
                    <th class="p-4 border-b">Deskripsi</th>
                    <th class="p-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exper as $exp )

                <tr class="hover:bg-gray-50 ">
                    <td class="p-4 border-b ">
                        <a href="{{ asset('storage/' . $exp->foto) }}" class="" target="_blank">
                            <img src="{{ asset('storage/' . $exp->foto) }}"
                            alt="Foto"
                            class="object-cover w-16 h-16 rounded-lg shadow-sm">
                        </a>

                    </td>
                    <td class="p-4 font-medium text-gray-800 border-b ">
                        {{ $exp->judul }}
                    </td>
                    <td class="p-4 text-gray-600 border-b">
                        {{ $exp->deskripsi }}

                    </td>
                    <td class="p-4 border-b">
                        <div class="flex items-center space-x-2">
                            <div x-data="{popup : false}" @click="popup = true" class="bg-blue-600 p-2 text-sm cursor-pointer rounded-[5px] text-white">Edit
                            <div class="fixed inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 " x-show="popup" x-transition>
                                <div class="w-3/4 bg-gray-600 h-3/4 " @click.away="popup = false" x-transition.scale>
                                    <form action="{{ route('edit-exp', $exp->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6 text-white rounded shadow">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <label for="judul" class="block text-sm font-medium ">Judul</label>
                                            <input type="text" name="judul-e" id="judul" value="{{ $exp->judul }}" class="block w-full mt-1 bg-gray-500 rounded shadow-sm  focus:ring focus:ring-blue-200">
                                        </div>
                                        <div>
                                            <label for="descript" class="block text-sm font-medium ">Deskripsi</label>
                                            <textarea name="desc-e" id="descript" rows="4" class="block w-full mt-1 bg-gray-500 rounded shadow-sm  focus:ring focus:ring-blue-200">{{ $exp->deskripsi }}</textarea>
                                        </div>
                                        <div>
                                            <label for="poto" class="block text-sm font-medium ">Foto</label>
                                            <input type="file" name="foto-e" id="poto"
                                                   class="block w-full mt-1 text-sm bg-gray-500  0 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                                            <img src="{{asset('storage/' . $exp->foto)  }}" alt="" class="w-32">
                                        </div>

                                        <div>
                                            <button type="submit" class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">
                                              save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <form action="{{ route('delete-exp', $exp->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 p-2 text-sm rounded-[5px] text-white">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @elseif ($exper->isEmpty())
        <h1 class="text-center text-gray-400">belum ada pengalaman yang diunggah</h1>
        @endif

    </div>
</div>
@endsection
