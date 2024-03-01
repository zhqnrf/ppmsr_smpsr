<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_masuk_pondok');
            $table->text('cita_cita');
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
            $table->string('no_hp_santri');
            $table->string('santri_email')->unique();
            $table->string('orang_pembayar_sekolah');
            $table->string('kartu_keluarga');
            $table->string('nama_ayah');
            $table->enum('status_ayah', ['masih hidup', 'sudah meninggal']);
            $table->enum('pendidikan_ayah', ['SD', 'SLTP', 'SLTA/Sederajat', 'D1', 'D2', 'D3', 'Sarjana/D4', 'S2', 'S3']);
            $table->string('pekerjaan_ayah');
            $table->integer('penghasilan_ayah');
            $table->string('no_hp_ayah');
            $table->string('nama_ibu');
            $table->enum('status_ibu', ['masih hidup', 'sudah meninggal']);
            $table->enum('pendidikan_ibu', ['SD', 'SLTP', 'SLTA/Sederajat', 'D1', 'D2', 'D3', 'Sarjana/D4', 'S2', 'S3']);
            $table->string('no_hp_ibu');
            $table->text('alamat_orangtua');
            $table->enum('status_rumah', ['milik sendiri', 'milik orangtua', 'sewa/kontrak', 'lainnya']);
            $table->date('tanggal_lahir_santri');
            $table->string('tempat_lahir_santri');
            $table->string('surat_sambung');
            $table->string('ktp');
            $table->enum('status_registrasi', ['pending', 'diterima', 'ditolak']);
            $table->string('ktp');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('santris');
    }
};
