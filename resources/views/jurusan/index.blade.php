@extends('template')
@section('content')
<div class="my-5">
    <div class="container mx-auto">
        @if (session()->has('success'))
        {{-- <div class="bg-green-500 text-black px-4 py-2">
            {{session('success')}}
        </div> --}}
        @endif
        <div class="flex justify-between items-center bg-gray-200 p-5 rounded-md">
            <div>
                <h1 class="text-xl text-semibold">Jurusan ( {{$total}} )</h1>
            </div>
            <div>
                <a href="/jurusan/create" class="px-5 py-2 bg-blue-500 rounded-md text-white text-lg shadow-md">Tambah</a>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Nama Jurusan
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Edit
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
 
                                @forelse ($jurusans as $jurusan)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration + ($jurusans->currentPage() - 1) * ($jurusans->perPage()) }}</td>
                                    <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                        {{$jurusan->nama_jurusan}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/jurusan/{{ $jurusan->nama_jurusan }}/edit" class="px-5 py-2 bg-blue-500 rounded-md text-white text-lg shadow-md">Edit</a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <form action="/jurusan/{{ $jurusan->nama_jurusan }}" method="POST" class="inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" id="btn-delete" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md">Hapus</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <h2>Jurusan Not found</h2>
                                    </td>
                                </tr>
                                @endforelse
 
                            </tbody>
                        </table>
                        <div class="mt-2 p-2">{{ $jurusans->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection