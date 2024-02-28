@extends('template')
@section('content')
<div class="my-5">
    <div class="container mx-auto max-w-xl shadow py-4 px-10">
        @if (session()->has('error'))
        <div class="bg-red-500 text-black px-4 py-2">
            {{session('error')}}
        </div>
        @endif
        <a href="/jurusan" class="px-5 py-2 bg-red-500 rounded-md text-white text-lg shadow-md">Kembali</a>
        <div class="my-3">
            <h1 class="text-center text-3xl font-bold">Tambah Jurusan</h1>
            <form action="/jurusan" method="POST">
                @csrf
                <div class="my-2 ">
                    <label for="nama_jurusan" class="text-md font-bold">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" value="{{ old('nama_jurusan') }}" class="block w-full border border-emerald-500 outline-emerald-800 px-2 py-2 text-md rounded-md my-2">
                    @error('nama_jurusan')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <button class="px-5 py-1 bg-emerald-500 rounded-md text-black text-lg shadow-md">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection