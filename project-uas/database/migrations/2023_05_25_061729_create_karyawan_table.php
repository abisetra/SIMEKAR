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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_karyawan');
            $table->string('email_karyawan')->unique();
            $table->string('nik')->unique();
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->string('kota_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat')->nullable();
            $table->string('kota_asal');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']);
            $table->string('telepon')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status_karyawan', ['Tetap', 'Kontrak', 'Magang']);
            $table->date('tgl_masuk');
            $table->timestamps();

            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('departement_id')->references('id')->on('departement')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
