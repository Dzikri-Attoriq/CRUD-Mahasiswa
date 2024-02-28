@extends('template')
@section('content')
<div class="my-5">
    <div class="container mx-auto max-w-xl shadow py-4 px-10">
        @if (session()->has('error'))
        <div class="bg-red-500 text-black px-4 py-2">
            {{session('error')}}
        </div>
        @endif
        <a href="/mahasiswa" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md">Kembali</a>
        <div class="my-3">
            <h1 class="text-center text-3xl font-bold">Tambah Mahasiswa</h1>
            <form action="/mahasiswa" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="my-2 ">
                    <label for="nim" class="text-md font-bold">NIM</label>
                    <input type="text" name="nim" id="nim" value="{{ old('nim') }}" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-md rounded-md my-2">
                    @error('nim')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="my-2 ">
                    <label for="nama_mahasiswa" class="text-md font-bold">Nama mahasiswa</label>
                    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-md rounded-md my-2">
                    @error('nama_mahasiswa')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="my-2">
                    <label for="jenis_kelamin" class="text-md font-bold">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=" ">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="my-2">
                    <label for="jurusan_id" class="text-md font-bold">Jurusan</label>
                    <select id="jurusan_id" name="jurusan_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value=" ">Pilih Jurusan</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}"
                                {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                                {{ $jurusan->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jurusan_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="my-2 ">
                    <label for="no" class="text-md font-bold">No. Hp</label>
                    <input type="text" name="no" id="no" value="{{ old('no') }}" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-md rounded-md my-2">
                    @error('no')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="my-2 ">
                    <label for="image" class="text-md font-bold">Foto</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="image" id="image">
                    @error('image')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <button class="px-5 py-1 bg-emerald-500 rounded-md text-black text-lg shadow-md">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection