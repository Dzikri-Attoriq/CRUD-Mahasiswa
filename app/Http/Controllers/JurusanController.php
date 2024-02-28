<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index()
    {
        $data['jurusans'] = Jurusan::orderBy('nama_jurusan')->paginate(10);
        $data['total'] = Jurusan::get()->count();
        $data['title'] = "Data Jurusan";
        return view('jurusan.index', $data);
    }

    public function create()
    {
        $data['title'] = "Tambah Data Jurusan";
        return view('jurusan.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_jurusan' => 'required|unique:jurusans',
        ]);

        DB::beginTransaction();
        try {
            $tipe_kamar = Jurusan::create($validate);
            DB::commit();
            
            return redirect('/jurusan')->with('success', "Berhasil menambahkan data jurusan ");

        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage());
            abort(403);

            session()->flash('gagal', $th->getMessage());
        }
    }

    public function show(Jurusan $jurusan)
    {
        //
    }

    public function edit(Jurusan $jurusan)
    {
        $data['title'] = "Edit Data Jurusan";
        $data['data_jurusan'] = $jurusan;
        return view('jurusan.edit', $data);
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $rules = [
            'nama_jurusan' => 'required',
        ];

        if($request->nama_jurusan != $jurusan->nama) {
            $rules['nama_jurusan'] = 'required|unique:jurusans';
        }

        $validate = $request->validate($rules);

        DB::beginTransaction();
        try {
            $jurusan->update($validate);
            DB::commit();
            
            return redirect('/jurusan')->with('success', "Berhasil edit data jurusan ");

        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage());
            abort(403);

            session()->flash('gagal', $th->getMessage());
        }
    }

    public function destroy(Jurusan $jurusan)
    {
        DB::beginTransaction();
        try {
            $relasi = Mahasiswa::select('jurusan_id')->where('jurusan_id', $jurusan->id)->count();
            if($relasi > 0) {
                return redirect()->back()->with('relasi', "Data telah di pakai di data mahasiswa, tidak bisa di-hapus!");
            } 
            $jurusan->delete();
            DB::commit();
            return redirect()->back()->with('success', "Berhasil hapus Data Jurusan");
        } catch (\Throwable $th) {
            DB::rollBack();
            abort(403);
        }
    }
}
