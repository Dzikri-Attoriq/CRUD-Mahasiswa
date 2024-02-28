<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurusan_id')->nullable()->unsigned(); 
            $table->foreign('jurusan_id')->references('id')->on('jurusans'); 
            $table->string('nim', 20)->required();
            $table->string('nama_mahasiswa', 80)->required();
            $table->string('no', 15)->required();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('image', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
