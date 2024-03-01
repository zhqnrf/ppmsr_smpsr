<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_masuk_pondok',
        'cita_cita',
        'anak_ke',
        'jumlah_saudara',
        'no_hp_santri',
        'santri_email',
        'orang_pembayar_sekolah',
        'kartu_keluarga',
        'nama_ayah',
        'status_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'no_hp_ayah',
        'nama_ibu',
        'status_ibu',
        'pendidikan_ibu',
        'no_hp_ibu',
        'alamat_orangtua',
        'status_rumah',
        'tanggal_lahir_santri',
        'tempat_lahir_santri',
        'surat_sambung',
        'ktp',
        'status_registrasi'
    ];
}
