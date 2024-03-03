<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function create()
    {
        session(['start' => 'down']);
        return view('pages.users.daftar.daftar')->with('htmlStart', [
            'bs-icons' => true
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_masuk_pondok' => 'required|date',
            'cita_cita' => 'required|string',
            'anak_ke' => 'required|integer',
            'jumlah_saudara' => 'required|integer',
            'no_hp_santri' => 'required|string|max:20',
            'email_santri' => 'required|email|unique:santris,email_santri',
            'orang_pembayar_sekolah' => 'required|string',
            'kartu_keluarga' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ayah_kandung' => 'required|string|max:255',
            'status_ayah' => 'required|in:masih hidup,sudah meninggal',
            'pendidikan_ayah' => 'required|in:SD,SLTP,SLTA/Sederajat,D1,D2,D3,Sarjana/D4,S2,S3',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|integer',
            'no_hp_ayah' => 'required|string|max:20',
            'ibu_kandung' => 'required|string|max:255',
            'status_ibu' => 'required|in:masih hidup,sudah meninggal',
            'pendidikan_ibu' => 'required|in:SD,SLTP,SLTA/Sederajat,D1,D2,D3,Sarjana/D4,S2,S3',
            'no_hp_ibu' => 'required|string|max:20',
            'alamat_orangtua' => 'required|string',
            'status_rumah' => 'required|in:milik sendiri,milik orangtua,sewa/kontrak,lainnya',
            'tanggal_lahir_santri' => 'required|date',
            'tempat_lahir_santri' => 'required|string|max:255',
            'surat_sambung' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload Kartu Keluarga
        $kartuKeluargaName = time() . '_' . $request->file('kartu_keluarga')->getClientOriginalName();
        $request->file('kartu_keluarga')->move(storage_path('/app/kk/'), $kartuKeluargaName);

        // Upload Surat Sambung
        $suratSambungName = time() . '_' . $request->file('surat_sambung')->getClientOriginalName();
        $request->file('surat_sambung')->move(storage_path('/app/surat_sambung/'), $suratSambungName);

        // Upload KTP
        $ktpName = time() . '_' . $request->file('ktp')->getClientOriginalName();
        $request->file('ktp')->move(storage_path('/app/ktp/'), $ktpName);

        // Buat objek Santri
        $santri = new Santri([
            'nama' => $validatedData['nama'],
            'tanggal_masuk_pondok' => $validatedData['tanggal_masuk_pondok'],
            'cita_cita' => $validatedData['cita_cita'],
            'anak_ke' => $validatedData['anak_ke'],
            'jumlah_saudara' => $validatedData['jumlah_saudara'],
            'no_hp_santri' => $validatedData['no_hp_santri'],
            'email_santri' => $validatedData['email_santri'],
            'orang_pembayar_sekolah' => $validatedData['orang_pembayar_sekolah'],
            'kartu_keluarga' => $kartuKeluargaName,
            'ayah_kandung' => $validatedData['ayah_kandung'],
            'status_ayah' => $validatedData['status_ayah'],
            'pendidikan_ayah' => $validatedData['pendidikan_ayah'],
            'pekerjaan_ayah' => $validatedData['pekerjaan_ayah'],
            'penghasilan_ayah' => $validatedData['penghasilan_ayah'],
            'no_hp_ayah' => $validatedData['no_hp_ayah'],
            'ibu_kandung' => $validatedData['ibu_kandung'],
            'status_ibu' => $validatedData['status_ibu'],
            'pendidikan_ibu' => $validatedData['pendidikan_ibu'],
            'no_hp_ibu' => $validatedData['no_hp_ibu'],
            'alamat_orangtua' => $validatedData['alamat_orangtua'],
            'status_rumah' => $validatedData['status_rumah'],
            'tanggal_lahir_santri' => $validatedData['tanggal_lahir_santri'],
            'tempat_lahir_santri' => $validatedData['tempat_lahir_santri'],
            'surat_sambung' => $suratSambungName,
            'ktp' => $ktpName,
            'status_registrasi' => 'pending'
        ]);

        // Simpan Santri
        $santri->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data Santri berhasil disimpan!');
    }
}
