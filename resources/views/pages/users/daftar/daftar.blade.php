<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('components.styleAndScript.htmlStart')
</head>

<body>
    <style>
        #content form .form-group>label {
            margin-bottom: 7px;
        }

        #content form .required::after {
            content: ' *';
            color: red;
        }

        @media screen and (min-width: 576px) {
            main .main-form-container {
                width: 65%;
            }
        }
    </style>
    <main class="container-fluid">
        <aside class="d-none d-sm-block bg-dark-subtle z-3 rounded-3 position-fixed overflow-auto shadow"
            style="top: 25px; bottom: 25px; left:25px; width: 30%">
            <header class="text-center py-3 position-sticky top-0 bg-body-secondary ">
                <h2>Informasi</h2>
            </header>
        </aside>
        <div id="content" class="offset-sm-3 m-4 ">
            <div class="">
                <div class="row-cols-sm-1">
                    <div class="col col-auto ms-sm-auto main-form-container" style="">
                        <header class="bg-body-tertiary mt-3 py-2 rounded-3 shadow-sm  ">
                            <h2 class="text-center">Form Pendaftaran</h2>
                        </header>
                        <div class="mt-1 mb-3 py-1 bg-body  position-sticky top-0 z-3">
                            <div class="progress shadow" id="progress-bar" role="progressbar"
                                aria-label="Success progress" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                                style="height: 5px">
                                <div class="progress-bar bg-success" style=""></div>
                            </div>
                        </div>
                        <form class="px-1" action="{{ route('santri-daftar.store') }}" method="POST"
                            enctype="multipart/form-data" style="display: flex; flex-direction: column; row-gap: 20px">
                            @csrf

                            <!-- Nama -->
                            <div class="form-group">
                                <label for="nama" class="required">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required
                                    onkeydown="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onchange="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onkeyup="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)" autofocus>
                            </div>

                            <!-- Tanggal Masuk Pondok -->
                            <div class="form-group">
                                <label for="tanggal_masuk_pondok"class="required">Tanggal Masuk:</label>
                                <input type="date" class="form-control" id="tanggal_masuk_pondok"
                                    name="tanggal_masuk_pondok" required onchange="validateDateInput(this)">
                            </div>

                            <!-- Cita-cita -->
                            <div class="form-group">
                                <label for="cita_cita" class="required">Cita-cita:</label>
                                <input type="text" class="form-control" id="cita_cita" name="cita_cita" required
                                    onkeydown="validateInput(this, /^[a-zA-Z.,\s]+$/, 0, 255)"
                                    onkeyup="validateInput(this, /^[a-zA-Z.,\s]+$/, 0, 255)"
                                    onchange="validateInput(this, /^[a-zA-Z.,\s]+$/, 0, 255)">
                            </div>

                            <div class="row row-cols-sm-2 ">
                                <!-- Jumlah Saudara -->
                                <div class="form-group">
                                    <label for="jumlah_saudara" class="required">Jumlah Saudara:</label>
                                    <input type="number" class="form-control" id="jumlah_saudara" name="jumlah_saudara"
                                        required aria-describedby="jumlah_saudara-help" max="20"
                                        onkeydown="jumlahSaudaraCheck(this)" onkeyup="jumlahSaudaraCheck(this)"
                                        onchange="jumlahSaudaraCheck(this)" ry-target="#anak_ke">
                                    <small id="jumlah_saudara-help" class="text-muted">Dihitung beserta kamu
                                        juga</small>
                                </div>

                                <!-- Anak Ke- -->
                                <div class="form-group">
                                    <label for="anak_ke" class="required">Anak Ke-:</label>
                                    <input type="number" class="form-control" id="anak_ke" name="anak_ke" required
                                        max="20" onkeyup="anak_keCheck(this)" onkeydown="anak_keCheck(this)"
                                        onchange="anak_keCheck(this)" disabled ry-from="#jumlah_saudara">
                                </div>
                            </div>

                            <!-- No HP Santri -->
                            <div class="form-group">
                                <label for="no_hp_santri"class="required">No HP Santri:</label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="number" class="form-control" id="no_hp_santri" name="no_hp_santri"
                                        required aria-describedby="no.hp-help" placeholder="8########"
                                        onkeydown="phoneNumberCheck(this)" onkeyup="phoneNumberCheck(this)"
                                        onchange="phoneNumberCheck(this)">
                                </div>
                                <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
                                    didepan</small>
                            </div>

                            <!-- Email Santri -->
                            <div class="form-group">
                                <label for="email_santri"class="required">Email Santri:</label>
                                <div class="input-group mb-3">
                                    <i class="input-group-text bi bi-envelope-fill"></i>
                                    <input type="email" class="form-control" id="email_santri" name="email_santri"
                                        required>
                                </div>
                            </div>

                            <!-- Orang yang membiayai sekolah santri -->
                            <div class="form-group">
                                <label for="orang_pembayar_sekolah"class="required">Orang yang membiayai sekolah
                                    santri:</label>
                                <input type="text" class="form-control" id="orang_pembayar_sekolah"
                                    name="orang_pembayar_sekolah"
                                    onkeydown="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onkeyup="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onchange="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)">
                            </div>

                            <!-- Nama Ayah -->
                            <div class="form-group">
                                <label for="ayah_kandung"class="required">Ayah Kandung:</label>
                                <input type="text" class="form-control" id="ayah_kandung" name="ayah_kandung"
                                    required onkeydown="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onkeyup="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onchange="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)">
                            </div>

                            <div class="row row-gap-4">
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

                            <div class="row row-gap-4">
                                <!-- Pekerjaan Utama Ayah -->
                                <div class="form-group col-md-6">
                                    <label for="pekerjaan_ayah"class="required">Pekerjaan Utama Ayah:</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah"
                                        name="pekerjaan_ayah" required
                                        onkeydown="validateInput(this, /^[a-zA-Z.,\s]+$/, 0, 255)"
                                        onkeyup="validateInput(this, /^[a-zA-Z.,\s]+$/, 0, 255)"
                                        onchange="validateInput(this, /^[a-zA-Z.,\s]+$/, 0, 255)">
                                </div>
                                <!-- Penghasilan Rata-rata per Bulan Ayah -->
                                <div class="form-group col-md-6">
                                    <label for="penghasilan_ayah"class="required">Penghasilan Ayah per Bulan:</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" id="penghasilan_ayah"
                                            onkeydown="currencyCheck(this)" onkeyup="currencyCheck(this)"
                                            onchange="currencyCheck(this)"
                                            onkeydown="validateInput(this,/^[0-9]+$/,7,14)"
                                            onkeyup="validateInput(this,/^[0-9]+$/,7,14)"
                                            onchange="validateInput(this,/^[0-9]+$/,7,14)">
                                        <input type="number" class="form-control" name="penghasilan_ayah" required
                                            hidden max="99999999999">
                                    </div>
                                </div>
                            </div>


                            <!-- No HP Ayah -->
                            <div class="form-group">
                                <label for="no_hp_ayah"class="required">No HP Ayah:</label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah"
                                        required aria-describedby="no.hp_ayah-help" placeholder="8########"
                                        onkeydown="phoneNumberCheck(this)" onkeyup="phoneNumberCheck(this)"
                                        onchange="phoneNumberCheck(this)">
                                </div>
                                <small id="no.hp_ayah-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
                                    didepan</small>
                            </div>

                            <!-- Nama Ibu -->
                            <div class="form-group">
                                <label for="ibu_kandung"class="required">Ibu Kandung:</label>
                                <input type="text" class="form-control" id="ibu_kandung" name="ibu_kandung"
                                    required onkeydown="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onkeyup="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)"
                                    onchange="validateInput(this, /^[a-zA-Z.\s\`]+$/, 0, 255)">
                            </div>

                            <div class="row row-gap-4">
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
                                    <input type="number" class="form-control" id="no_hp_ibu" name="no_hp_ibu"
                                        required aria-describedby="no.hp_ibu-help" placeholder="8########"
                                        onkeydown="phoneNumberCheck(this)" onkeyup="phoneNumberCheck(this)"
                                        onchange="phoneNumberCheck(this)">
                                </div>
                                <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
                                    didepan</small>
                            </div>

                            <!-- Alamat Tinggal Orangtua -->
                            <div class="form-group">
                                <label for="alamat_orangtua"class="required">Alamat Tinggal Orangtua:</label>
                                <textarea class="form-control" id="alamat_orangtua" name="alamat_orangtua" rows="3" required
                                    placeholder="Masukkan alamat sesuai KTP" onkeydown="validateInput(this, /^[a-zA-Z0-9,.\(\)\/\-\`\s]+$/, 0, 2000)"
                                    onkeyup="validateInput(this, /^[a-zA-Z0-9,.\(\)\/\-\`\s]+$/, 0, 2000)"
                                    onchange="validateInput(this, /^[a-zA-Z0-9,.\(\)\/\-\`\s]+$/, 0, 2000)"></textarea>
                            </div>

                            <!-- Status Kepemilikan Rumah -->
                            <div class="form-group">
                                <label for="status_rumah"class="required">Status Kepemilikan Rumah:</label>
                                <div class="input-group">
                                    <i class="input-group-text bi bi-house-door-fill"></i>
                                    <select class="form-select" id="status_rumah" name="status_rumah" required>
                                        <option value="" hidden disabled selected>Pilih</option>
                                        <option value="milik sendiri">Milik Sendiri</option>
                                        <option value="milik orangtua">Milik Orangtua</option>
                                        <option value="sewa/kontrak">Sewa/Kontrak</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tanggal Lahir Santri -->
                            <div class="form-group">
                                <label for="tanggal_lahir_santri"class="required">Tanggal Lahir Santri:</label>
                                <input type="date" class="form-control" id="tanggal_lahir_santri"
                                    name="tanggal_lahir_santri" required onchange="validateDateInput(this)">
                            </div>

                            <!-- Tempat Lahir Santri -->
                            <div class="form-group">
                                <label for="tempat_lahir_santri"class="required">Tempat Lahir Santri:</label>
                                <input type="text" class="form-control" id="tempat_lahir_santri"
                                    name="tempat_lahir_santri" required placeholder="Kota lahir"
                                    onkeydown="validateInput(this, /^[a-zA-Z\s]+$/, 0, 255)"
                                    onkeyup="validateInput(this, /^[a-zA-Z\s]+$/, 0, 255)"
                                    onchange="validateInput(this, /^[a-zA-Z\s]+$/, 0, 255)">
                            </div>

                            <!-- Kartu Keluarga -->
                            <div class="form-group">
                                <label for="kartu_keluarga"class="required">Kartu Keluarga:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="kartu_keluarga"
                                        name="kartu_keluarga" required aria-describedby="kartu_keluarga-help">
                                    <i class="input-group-text bi bi-paperclip" for="kartu_keluarga"></i>
                                </div>
                                <small id="kartu_keluarga-help" class="text-muted"><strong>Format:</strong> .jpg .jpeg
                                    .png</small>
                            </div>

                            <!-- KTP -->
                            <div class="form-group">
                                <label for="ktp"class="required">KTP:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="ktp" name="ktp"
                                        required aria-describedby="ktp-help">
                                    <i class="input-group-text bi bi-paperclip" for="ktp"></i>
                                </div>
                                <small id="ktp-help" class="text-muted"><strong>Format:</strong> .jpg .jpeg
                                    .png</small>
                            </div>

                            <!-- Surat Sambung -->
                            <div class="form-group">
                                <label for="surat_sambung"class="required">Surat Sambung:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="surat_sambung"
                                        name="surat_sambung" required aria-describedby="surat_sambung-help">
                                    <i class="input-group-text bi bi-paperclip" for="surat_sambung"></i>
                                </div>
                                <small id="surat_sambung-help" class="text-muted"><strong>Format:</strong>
                                    .pdf</small>
                            </div>

                            <button type="submit" class="btn btn-primary col-md-2 ms-sm-auto "
                                disabled>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        ['keydown', 'keyup', 'change', 'blur'].forEach(eventType => {
            let form = document.querySelector('form')
            form.addEventListener(eventType, () => {
                formIsEmpty(event.target)
                updateProgressBar()
            })
        });

        function bsValidityToogle(element, validity) {
            if (validity == 'valid' || validity == 'is-valid') {
                element.classList.remove('is-invalid')
                element.classList.add('is-valid')
            } else if (validity == 'invalid' || validity == 'is-invalid') {
                element.classList.remove('is-valid')
                element.classList.add('is-invalid')
            }
        }

        function formIsEmpty(element) {
            if (element.value.length <= 0 || element.value.trim() === '') {
                bsValidityToogle(element, 'invalid')
                return false
            }
        }

        function updateProgressBar() {
            const allFormInput = document.querySelectorAll('form :is(input,textarea,select):not([type=hidden])')
            const progressBar = document.querySelector('#content #progress-bar')
            const allProgress = allFormInput.length
            let currentProgress = document.querySelectorAll(
                'form :is(input,textarea,select):is(.is-valid):not([type=hidden])').length
            const persentaseProgress = currentProgress / allProgress * 100
            progressBar.querySelector('.progress-bar').style.width = persentaseProgress + '%';
            if (persentaseProgress >= 100) {
                document.querySelector('form button[type=submit]').disabled = false
            } else {
                document.querySelector('form button[type=submit]').disabled = true
            }
        }

        function getValidValueLength(element) {
            element.value = element.value.trimStart()
            return element.value.trim().length
        }

        function validateInput(element, regexp, minvalue, maxvalue) {
            let key = event.key;
            // Membuat regex dari pola yang diberikan
            const regex = new RegExp(regexp);

            // Memeriksa apakah nilai input sesuai dengan pola dan berada di antara minvalue dan maxvalue
            if (!regex.test(key) || (getValidValueLength(element) < minvalue || getValidValueLength(element) >
                    maxvalue)) {
                // Mencegah default action (input karakter)
                event.preventDefault();
                return
            }
            bsValidityToogle(element, 'valid')
        }

        function validateDateInput(element) {
            // Mendapatkan elemen input tanggal
            const inputDate = element.value;

            // Mendapatkan tanggal hari ini dalam format yang sama dengan input
            const today = new Date().toISOString().slice(0, 10);


            let returnValue = true;
            if (inputDate === '') {
                element.setCustomValidity("Tanggal tidak boleh kosong");
                returnValue = false
            }

            if (inputDate > today) {
                element.setCustomValidity("Tolong masukkan tanggal yang valid");
                returnValue = false
            }

            if (returnValue === false) {
                bsValidityToogle(element, 'invalid')
                return returnValue;
            }

            element.setCustomValidity("");
            bsValidityToogle(element, 'valid')
            return returnValue;
        }

        function jumlahSaudaraCheck(element) {
            const sibling = element.parentElement.parentElement.querySelector(element.getAttribute('ry-target'))
            if (element.value >= 1) {
                sibling.disabled = false
                element.setCustomValidity('')
                if (element.value > 20) {
                    element.value = 20
                }
                bsValidityToogle(element, 'valid')
            } else {
                element.value = ''
                sibling.disabled = true
                bsValidityToogle(element, 'invalid')
            }

            if (element.value == 0 || element.value == '') {
                element.setCustomValidity('Masukkan angka yang valid!')
                bsValidityToogle(element, 'invalid')
            }

            if (Number(element.value) < Number(sibling.value)) {
                sibling.value = element.value
                if (sibling.value == '') {
                    bsValidityToogle(sibling, 'invalid')
                }
            }
        }

        function anak_keCheck(element) {
            const siblingElement = element.parentElement.parentElement.querySelector(element.getAttribute('ry-from'))
            let returnValue = true
            if (Number(element.value) > Number(siblingElement.value)) {
                element.value = siblingElement.value
            }
            if (element.value == '' || element.value.length <= 0) {
                returnValue = false
            }
            if (element.value <= 0) {
                element.value = ''
                returnValue = false
            }

            returnValue ? bsValidityToogle(element, 'valid') : bsValidityToogle(element, 'invalid')
        }

        function validateFileInput(element, allowedExtensions) {
            // Mendapatkan elemen input file
            const fileInput = event.target;

            // Mendapatkan file yang dipilih
            const file = fileInput.files[0];

            // Jika tidak ada file yang dipilih
            if (!file) {
                element.setCustomValidity("Masukkan file terlebih dahulu");
                fileInput.value = ''; // Mengosongkan input file
                element.setAttribute('data-complete', 'false')
                updateProgressBar()
                return false;
            }

            // Mendapatkan nama file
            const fileName = file.name;

            // Mendapatkan ekstensi file
            const fileExtension = fileName.split('.').pop();

            // Memeriksa apakah ekstensi file diizinkan
            if (!allowedExtensions.includes(fileExtension.toLowerCase())) {
                element.setCustomValidity('Ekstensi file tidak diizinkan!');
                fileInput.value = ''; // Mengosongkan input file
                element.setAttribute('data-complete', 'false')
                updateProgressBar()
                return false;
            }

            element.setAttribute('data-complete', 'true')
            updateProgressBar()
            return true;
        }

        function phoneNumberCheck(element) {
            // Menghilangkan spasi dan karakter non-digit
            var cleanInput = element.value.replace(/\D/g, '');

            // Memeriksa apakah diawali dengan huruf "8" dan panjang 10-12 karakter
            if (cleanInput.startsWith('8') && cleanInput.length >= 10 && cleanInput.length <= 12) {
                element.setCustomValidity('')
                bsValidityToogle(element, 'valid')
                return true; // Sesuai dengan kriteria
            } else {
                element.setCustomValidity('Harap masukkan nomer HP yang valid!')
                bsValidityToogle(element, 'invalid')
                if (element.value <= 0) {
                    element.value = ''
                }
                return false; // Tidak sesuai dengan kriteria
            }
        }

        function currencyCheck(element) {
            var regex = /\d+/g;
            var angka = element.value.match(regex);
            if (angka) {
                element.nextElementSibling.value = angka.join('');
            }
            var formatter = new Intl.NumberFormat('id-ID').format(element.nextElementSibling.value);
            element.value = formatter
            if (element.value == '' || element.value.length < 7) {
                bsValidityToogle(element, 'invalid')
                element.setCustomValidity('Masukkan gaji yang valid!')
            } else {
                bsValidityToogle(element, 'valid')
                element.setCustomValidity('')
            }
        }
    </script>
</body>

</html>
