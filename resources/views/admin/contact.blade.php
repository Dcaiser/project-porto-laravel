@extends('admin.layout.app')

@section('content')
<div class="min-h-screen p-6 bg-gray-100">
  <div class="mx-auto max-w-7xl">
    <!-- Header -->
    <div class="w-full">
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

        @if ($contact->isnotEmpty())

        <table class="min-w-full bg-white border border-gray-200 shadow rounded-xl">
            <thead>
                <tr class="text-sm font-semibold text-left text-gray-700 bg-gray-100">
                    <th class="p-4 border-b">nama</th>
                    <th class="p-4 border-b">email</th>
                    <th class="p-4 border-b">no telepon</th>
                    <th class="p-4 border-b">tanggal</th>
                    <th class="p-4 border-b">pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $cont )

                <tr class="hover:bg-gray-50 ">
                    <td class="p-4 font-medium text-gray-800 border-b ">
                        {{ $cont->nama }}
                    </td>
                    <td class="p-4 text-gray-600 border-b">
                        {{ $cont->email }}

                    </td>
                    <td class="p-4 text-gray-600 border-b">
                        {{ $cont->telp }}

                    </td>
                    <td class="p-4 text-gray-600 border-b">
                        {{ $cont->created_at }}

                    </td>

                    <td class="p-4 border-b">
                        <div class="flex items-center space-x-2">
                            <div x-data="{popup : false}" @click="popup = true" class="bg-blue-600 p-2 text-sm cursor-pointer rounded-[5px] text-white">lihat pesan
                            <div class="fixed inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 " x-show="popup" x-transition>
                                <div class="flex items-center justify-center w-3/4 bg-gray-600 h-3/4 " @click.away="popup = false" x-transition.scale>
                                    <h2 class="text-center text-white">
                                        {{ $cont->pesan }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                            <form action="{{ route('delete-cont', $cont->id) }}" method="POST"
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
        @elseif ($contact->isEmpty())
        <h1 class="text-center text-gray-400">belum ada komentar</h1>
        @endif

    </div>
  </div>
</div>
@endsection
