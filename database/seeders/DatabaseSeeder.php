<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Jurusan::create([
            'nama_jurusan' => 'Sistem Informasi',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Informatika',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Manajemen Bisnis',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Pendidikan Agama Islam',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Pendidikan Kewarganegaraan',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Kedokteran',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Keperawatan',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Farmasi',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Psikologi',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Ekonomi Akuntansi',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Keguruan dan Pendidikan',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Hubungan Internasional',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Administrasi Bisnis',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Arsitektur',
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Perencanaan Wilayah dan Kota (Planologi)',
        ]);
    }
}
