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
                <h1 class="text-xl text-semibold">Mahasiswa ( {{$total}} )</h1>
            </div>
            <div>
                <a href="/mahasiswa/create" class="px-5 py-2 bg-blue-500 rounded-md text-white text-lg shadow-md">Tambah</a>
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
                                        Foto
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        NIM
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Nama
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Jenis Kelamin
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Jurusan
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Nomor
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
 
                                @forelse ($mahasiswas as $mahasiswa)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration + ($mahasiswas->currentPage() - 1) * ($mahasiswas->perPage()) }}</td>
                                    <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                        <img class="rounded-full" style="width: 100px;" src="{{ asset('storage/' . $mahasiswa->image) }}" alt="image description">
                                    </td>
                                    <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                        {{$mahasiswa->nim}}
                                    </td>
                                    <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                        {{$mahasiswa->nama_mahasiswa}}
                                    </td>
                                    <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                        {{$mahasiswa->jenis_kelamin}}
                                    </td>
                                    <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                        {{$mahasiswa->jurusan->nama_jurusan}}
                                    </td>
                                    <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                        {{$mahasiswa->no}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/mahasiswa/{{ $mahasiswa->nim }}/edit" class="px-5 py-2 bg-blue-500 rounded-md text-white text-lg shadow-md">Edit</a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <form action="/mahasiswa/{{ $mahasiswa->nim }}" method="POST" class="inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" id="btn-delete" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md">Hapus</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <h2>Mahasiswa Not found</h2>
                                    </td>
                                </tr>
                                @endforelse
 
                            </tbody>
                        </table>
                        <div class="mt-2 p-2">{{ $mahasiswas->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection