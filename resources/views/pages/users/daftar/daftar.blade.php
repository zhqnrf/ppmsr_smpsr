@extends('pages.main')
@section('content')
    <style>
        .required::after {
            content: ' *';
            color: red;
        }

        .form-group>label {
            margin-bottom: 5px;
            font-weight: bold
        }
    </style>
    <div class="container-sm my-3">
        <div class="row-cols-sm-1">
            <div class="col">
                <h2>Form Input Data Santri</h2>
                <form action="{{ route('santri-registrasi.store') }}" method="POST" enctype="multipart/form-data"
                    style="display: flex; flex-direction: column; row-gap: 20px">
                    @csrf

                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama" class="required">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <!-- Tanggal Masuk Pondok -->
                    <div class="form-group">
                        <label for="tanggal_masuk_pondok"class="required">Tanggal Masuk Pondok:</label>
                        <input type="date" class="form-control" id="tanggal_masuk_pondok" name="tanggal_masuk_pondok"
                            required>
                    </div>

                    <!-- Cita-cita -->
                    <div class="form-group">
                        <label for="cita_cita" class="required">Cita-cita:</label>
                        <input type="text" class="form-control" id="cita_cita" name="cita_cita" required>
                    </div>

                    <!-- Anak Ke- -->
                    <div class="form-group">
                        <label for="anak_ke" class="required">Anak Ke-:</label>
                        <input type="number" class="form-control" id="anak_ke" name="anak_ke" required>
                    </div>

                    <!-- Jumlah Saudara -->
                    <div class="form-group">
                        <label for="jumlah_saudara" class="required">Jumlah Saudara:</label>
                        <input type="number" class="form-control" id="jumlah_saudara" name="jumlah_saudara" required
                            aria-describedby="jumlah_saudara-help">
                        <small id="jumlah_saudara-help" class="text-muted">Dihitung beserta kamu juga</small>
                    </div>

                    <!-- No HP Santri -->
                    <div class="form-group">
                        <label for="no_hp_santri"class="required">No HP Santri:</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" id="no_hp_santri" name="no_hp_santri" required
                                aria-describedby="no.hp-help" placeholder="8########">
                        </div>
                        <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
                            didepan</small>
                    </div>

                    <!-- Email Santri -->
                    <div class="form-group">
                        <label for="email_santri"class="required">Email Santri:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="email" class="form-control" id="email_santri" name="email_santri" required>
                        </div>
                    </div>

                    <!-- Orang yang membiayai sekolah santri -->
                    <div class="form-group">
                        <label for="orang_pembayar_sekolah"class="required">Orang yang membiayai sekolah santri:</label>
                        <input type="text" class="form-control" id="orang_pembayar_sekolah" name="orang_pembayar_sekolah"
                            required>
                    </div>

                    <!-- Nama Ayah -->
                    <div class="form-group">
                        <label for="nama_ayah"class="required">Nama Ayah:</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                    </div>

                    <div class="row">
                        <!-- Status Ayah -->
                        <div class="form-group col-md-6">
                            <label for="status_ayah"class="required">Status Ayah:</label>
                            <select class="form-select" id="status_ayah" name="status_ayah" required>
                                <option value="" hidden disabled selected>Pilih</option>
                                <option value="masih hidup">Masih Hidup</option>
                                <option value="sudah meninggal">Sudah Meninggal</option>
                            </select>
                        </div>
                        <!-- Pendidikan Terakhir Ayah -->
                        <div class="form-group col-md-6">
                            <label for="pendidikan_ayah"class="required">Pendidikan Terakhir Ayah:</label>
                            <select class="form-select" id="pendidikan_ayah" name="pendidikan_ayah" required>
                                <option value="" hidden disabled selected>Pilih</option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="Sarjana/D4">Sarjana/D4</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pekerjaan Utama Ayah -->
                        <div class="form-group col-md-6">
                            <label for="pekerjaan_ayah"class="required">Pekerjaan Utama Ayah:</label>
                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                required>
                        </div>
                        <!-- Penghasilan Rata-rata per Bulan Ayah -->
                        <div class="form-group col-md-6">
                            <label for="penghasilan_ayah"class="required">Penghasilan Rata-rata per Bulan Ayah:</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah"
                                    required>
                            </div>
                        </div>
                    </div>


                    <!-- No HP Ayah -->
                    <div class="form-group">
                        <label for="no_hp_ayah"class="required">No HP Ayah:</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah" required
                                aria-describedby="no.hp_ayah-help" placeholder="8########">
                        </div>
                        <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
                            didepan</small>
                    </div>

                    <!-- Nama Ibu -->
                    <div class="form-group">
                        <label for="nama_ibu"class="required">Nama Ibu:</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                    </div>

                    <div class="row">
                        <!-- Status Ibu -->
                        <div class="form-group col-md-6">
                            <label for="status_ibu"class="required">Status Ibu:</label>
                            <select class="form-select" id="status_ibu" name="status_ibu" required>
                                <option value="" hidden disabled selected>Pilih</option>
                                <option value="masih hidup">Masih Hidup</option>
                                <option value="sudah meninggal">Sudah Meninggal</option>
                            </select>
                        </div>

                        <!-- Pendidikan Terakhir Ibu -->
                        <div class="form-group col-md-6">
                            <label for="pendidikan_ibu"class="required">Pendidikan Terakhir Ibu:</label>
                            <select class="form-select" id="pendidikan_ibu" name="pendidikan_ibu" required>
                                <option value="" hidden disabled selected>Pilih</option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                <option value="D1">D1</option>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="Sarjana/D4">Sarjana/D4</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>

                    <!-- No HP Ibu -->
                    <div class="form-group">
                        <label for="no_hp_ibu"class="required">No HP Ibu:</label>
                        <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu" required
                                aria-describedby="no.hp_ibu-help" placeholder="8########">
                        </div>
                        <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
                            didepan</small>
                    </div>

                    <!-- Alamat Tinggal Orangtua -->
                    <div class="form-group">
                        <label for="alamat_orangtua"class="required">Alamat Tinggal Orangtua:</label>
                        <textarea class="form-control" id="alamat_orangtua" name="alamat_orangtua" rows="3" required
                            placeholder="Masukkan alamat sesuai KTP"></textarea>
                    </div>

                    <!-- Status Kepemilikan Rumah -->
                    <div class="form-group">
                        <label for="status_rumah"class="required">Status Kepemilikan Rumah:</label>
                        <select class="form-select" id="status_rumah" name="status_rumah" required>
                            <option value="" hidden disabled selected>Pilih</option>
                            <option value="milik sendiri">Milik Sendiri</option>
                            <option value="milik orangtua">Milik Orangtua</option>
                            <option value="sewa/kontrak">Sewa/Kontrak</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- Tanggal Lahir Santri -->
                    <div class="form-group">
                        <label for="tanggal_lahir_santri"class="required">Tanggal Lahir Santri:</label>
                        <input type="date" class="form-control" id="tanggal_lahir_santri" name="tanggal_lahir_santri"
                            required>
                    </div>

                    <!-- Tempat Lahir Santri -->
                    <div class="form-group">
                        <label for="tempat_lahir_santri"class="required">Tempat Lahir Santri:</label>
                        <input type="text" class="form-control" id="tempat_lahir_santri" name="tempat_lahir_santri"
                            required placeholder="Kota lahir">
                    </div>

                    <!-- Kartu Keluarga -->
                    <div class="form-group">
                        <label for="kartu_keluarga"class="required">Kartu Keluarga:</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga"
                                required aria-describedby="kartu_keluarga-help">
                            <label class="input-group-text" for="kartu_keluarga">Upload</label>
                        </div>
                        <small id="kartu_keluarga-help" class="text-muted"><strong>Format:</strong> .jpg .jpeg
                            .png</small>
                    </div>

                    <!-- KTP -->
                    <div class="form-group">
                        <label for="ktp"class="required">KTP:</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="ktp" name="ktp" required
                                aria-describedby="ktp-help">
                            <label class="input-group-text" for="ktp">Upload</label>
                        </div>
                        <small id="ktp-help" class="text-muted"><strong>Format:</strong> .jpg .jpeg .png</small>
                    </div>

                    <!-- Surat Sambung -->
                    <div class="form-group">
                        <label for="surat_sambung"class="required">Surat Sambung:</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="surat_sambung" name="surat_sambung" required
                                aria-describedby="surat_sambung-help">
                            <label class="input-group-text" for="surat_sambung">Upload</label>
                        </div>
                        <small id="surat_sambung-help" class="text-muted"><strong>Format:</strong> .pdf</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
