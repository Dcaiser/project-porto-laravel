@extends('admin.layout.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="flex justify-center w-full h-56 items-center p-6 ">
        <div x-data="{open : false}" @click="open = true" class="w-full h-full flex justify-center items-center  bg-gray-500 text-white capitalize hover:bg-gray-600 transition ">add your expertise
            <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center flex-col" x-transition>
                <div @click.away="open = false" class="w-3/4 h-3/4 bg-gray-600" x-transition.scale>
                    <form action="{{ route('post-skl') }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-white p-6 rounded shadow">
                      @csrf
                      <div>
                          <label for="judul" class="block font-medium text-sm ">nama</label>
                          <input type="text" name="nama" id="judul" value="" class=" bg-gray-500 mt-1 block w-full rounded  shadow-sm focus:ring focus:ring-blue-200">
                      </div>
                      <div>
                          <label for="poto" class="block font-medium text-sm ">icon (png)</label>
                          <input type="file" name="icon" id="poto" accept="image/png"
                                 class=" bg-gray-500 mt-1 block w-full text-sm 0 file:mr-4 file:py-2 file:px-4
                                        file:rounded file:border-0 file:text-sm file:font-semibold
                                        file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                      </div>

                      {{-- Tombol Submit --}}
                      <div>
                          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
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
        class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-300"
    >
        {{ session('success') }}
    </div>
@endif

    <div class="w-full">
        @if ($skll->isnotEmpty())

        <table class="min-w-full bg-white border border-gray-200 rounded-xl shadow">
            <thead>
                <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                    <th class="p-4 border-b">id</th>
                    <th class="p-4 border-b">icon</th>
                    <th class="p-4 border-b">nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skll as $skl )

                <tr class="hover:bg-gray-50 ">
                    <td class="p-4 border-b">
                        {{ $skl->id }}
                    </td>
                    <td class="p-4 border-b ">
                        <a href="{{ asset('storage/' . $skl->icon) }}" class="" target="_blank">
                            <img src="{{ asset('storage/' . $skl->icon) }}"
                            alt="Foto"
                            class="w-16 h-16 object-cover rounded-lg shadow-sm">
                        </a>

                    </td>
                    <td class="p-4 border-b font-medium text-gray-800 ">
                        {{ $skl->nama }}
                    </td>
                    <td class="p-4 border-b">
                        <div class="flex space-x-2 items-center">
                            <div x-data="{popup : false}" @click="popup = true" class="bg-blue-600 p-2 rounded-[5px] text-white text-sm cursor-pointer">Edit
                            <div class="fixed inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 " x-show="popup" x-transition>
                                <div class="w-3/4 h-3/4 bg-gray-600 " @click.away="popup = false" x-transition.scale>
                                    <form action="{{ route('edit-skl', $skl->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-white p-6 rounded shadow">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <label for="judul" class="block font-medium text-sm ">nama</label>
                                            <input type="text" name="nama-e" id="judul" value="{{ $skl->nama }}" class=" bg-gray-500 mt-1 block w-full rounded  shadow-sm focus:ring focus:ring-blue-200">
                                        </div>
                                        <div>
                                            <label for="poto" class="block font-medium text-sm ">Foto</label>
                                            <input type="file" name="icon-e" id="poto" accept="image/png"
                                                   class=" bg-gray-500 mt-1 block w-full text-sm 0 file:mr-4 file:py-2 file:px-4
                                                          file:rounded file:border-0 file:text-sm file:font-semibold
                                                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                                            <img src="{{asset('storage/' . $skl->icon)  }}" alt="" class="w-32">
                                        </div>

                                        <div>
                                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                              save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <form action="{{ route('delete-skl', $skl->id) }}" method="POST"
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
        @elseif ($skll->isEmpty())
        <h1 class="text-center text-gray-400">belum ada keahlian yang diunggah</h1>
        @endif

    </div>

</div>
@endsection
