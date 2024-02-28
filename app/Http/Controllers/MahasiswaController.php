<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data['mahasiswas'] = Mahasiswa::with('jurusan')->orderBy('nama_mahasiswa')->paginate();
        $data['total'] = Mahasiswa::get()->count();
        $data['title'] = "Data Mahasiswa";
        return view('mahasiswa.index', $data);
    }

    public function create()
    {
        $data['jurusans'] = Jurusan::orderBy('nama_jurusan')->get();
        $data['title'] = "Tambah Data Mahasiswa";
        return view('mahasiswa.tambah', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'no' => 'required|numeric|unique:mahasiswas|min_digits:9|max_digits:15',
            'jurusan_id' => 'required',
            'image' => 'required|image|file|max:2024|mimes:jpg,jpeg,png',
        ]);

        DB::beginTransaction();
        try {
            $filePath = Storage::disk('public')->put('images/mahasiswa', request()->file('image'), 'public');
            $validate['image'] = $filePath;
            Mahasiswa::create($validate);
            DB::commit();
            
            return redirect('/mahasiswa')->with('success', "Berhasil menambahkan data mahasiswa ");

        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage());
            abort(403);
        }
    }

    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $data['title'] = "Edit Data Mahasiswa";
        $data['data_mahasiswa'] = $mahasiswa;
        $data['jurusans'] = Jurusan::orderBy('nama_jurusan')->get();
        return view('mahasiswa.edit', $data);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'no' => 'required|numeric|min_digits:9|max_digits:15',
            'jurusan_id' => 'required',
            'image' => 'image|file|max:2024|mimes:jpg,jpeg,png',
        ];

        if($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'required|unique:mahasiswas';
        }
        if($request->no != $mahasiswa->no) {
            $rules['no'] = 'required|numeric|unique:mahasiswas|min_digits:9|max_digits:15';
        }

        $validate = $request->validate($rules);

        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($mahasiswa->image);
    
                $filePath = Storage::disk('public')->put('images/mahasiswa', request()->file('image'), 'public');
                $validate['image'] = $filePath;
            }

            $mahasiswa->update($validate);
            DB::commit();
            
            return redirect('/mahasiswa')->with('success', "Berhasil edit data mahasiswa ");

        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage());
            abort(403);

            session()->flash('gagal', $th->getMessage());
        }
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        DB::beginTransaction();
        try {
            Storage::disk('public')->delete($mahasiswa->image);
            $mahasiswa->delete();
            DB::commit();
            return redirect()->back()->with('success', "Berhasil hapus Data Mahasiswa");
        } catch (\Throwable $th) {
            DB::rollBack();
            abort(403);
        }
    }
}
