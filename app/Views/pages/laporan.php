<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    Cetak <?= $title ?>
</div>

<section class="mt-4 mb-4" id="dashboard">
    <div class="row">

        <div class="col-lg-12">
            <ul class="nav nav-tabs mb-3 card siswa" id="addSiswa" role="tablist">
                <li class="nav-item" style="width: calc(100% / 3);" role="daftar">
                    <button class="nav-link active" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#daftar" type="button" role="tab" aria-controls="daftar" aria-selected="true">Siswa</button>
                    <div class="slide" style="width: calc(100% / 3);" ></div>
                </li>
                <li class="nav-item" style="width: calc(100% / 3);" role="kehadiran">
                    <button class="nav-link" id="kehadiran-tab" data-bs-toggle="tab" data-bs-target="#kehadiran" type="button" role="tab" aria-controls="kehadiran" aria-selected="false">Bio Data Siswa</button>
                    <div class="slide" style="width: calc(100% / 3);" ></div>
                </li>
                <li class="nav-item" style="width: calc(100% / 3);" role="catatan">
                    <button class="nav-link" id="catatan-tab" data-bs-toggle="tab" data-bs-target="#catatan" type="button" role="tab" aria-controls="catatan" aria-selected="false">Nilai Siswa</button>
                    <div class="slide" style="width: calc(100% / 3);" ></div>
                </li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tab-content">

                <div class="tab-pane active" id="daftar" role="tabpanel" aria-labelledby="daftar-tab">
                    <div class="card mb-2">
                        <div class="content">
                            <div class="card-block">
                                
                            <div class="mb-3">
                                    <label class="form-label for-header">Daftar siswa di sekolah</label>
                                    <a href="/laporan/daftar-siswa-sekolah" class="btn mb-3 w-100 btn-update-kelas" title="Print">Cetak</a>
                                </div>

                                <hr>
                                
                                <div class="mb-3">
                                    <label class="form-label for-header">Daftar siswa berdasarkan kelas</label>

                                    <form action="/Laporan/daftarSiswaKelas" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran</label>
                                            <select class="form-select" aria-label="Default select example" name="id_tahunajaran1" id="id_tahunajaran1">
                                                <option selected>Pilih Tahun Ajaran</option>
                                                <?php foreach($tahunajaran as $ta) : ?>
                                                    <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-select" aria-label="Default select example" name="id_kelas1" id="id_kelas1">
                                                <option value="">Pilih Kelas</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn w-100 mb-3 btn-update-kelas" title="Print">Cetak</button>
                                    </form>
                                </div>

                                <hr>

                                <div class="mb-3">
                                    <label class="form-label for-header">Rapor Siswa</label>

                                    <form action="/laporan/raporSiswa" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran Masuk</label>
                                            <select class="form-select" aria-label="Default select example" name="id_tahunajaran2" id="id_tahunajaran2">
                                                <option selected>Pilih Tahun Ajaran Masuk</option>
                                                <?php foreach($tahunajaran as $ta) : ?>
                                                    <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Siswa</label>
                                            <select class="form-select" aria-label="Default select example" name="id_siswa1" id="id_siswa1">
                                                <option>Pilih Siswa</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn w-100 mb-3 btn-update-kelas" title="Print">Cetak</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="kehadiran" role="tabpanel" aria-labelledby="kehadiran-tab">
                    <div class="card mb-3">
                        <div class="content">
                            <div class="card-block">

                                <div class="mb-3">
                                    <label class="form-label for-header">Detail siswa</label>

                                    <form action="/Laporan/siswaDetailslaporan" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran Masuk</label>
                                            <select class="form-select" aria-label="Default select example" name="id_tahunajaran3" id="id_tahunajaran3">
                                                <option selected>Pilih Tahun Ajaran Masuk</option>
                                                <?php foreach($tahunajaran as $ta) : ?>
                                                    <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Siswa</label>
                                            <select class="form-select" aria-label="Default select example" name="id_siswa2" id="id_siswa2">
                                                <option value="">Pilih Siswa</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn w-100 mb-3 btn-update-kelas" title="Print">Cetak</button>
                                    </form>
                                </div>

                                <hr>
                                
                                <div class="mb-3">
                                    <label class="form-label for-header">Detail siswa Kelas</label>

                                    <form action="/laporan/siswaKelaslaporan" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran</label>
                                            <select class="form-select" aria-label="Default select example" name="id_tahunajaran4" id="id_tahunajaran4">
                                                <option selected>Pilih Tahun Ajaran</option>
                                                <?php foreach($tahunajaran as $ta) : ?>
                                                    <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                                            <select class="form-select" aria-label="Default select example" name="id_kelas2" id="id_kelas2">
                                                <option selected>Pilih Kelas</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn w-100 mb-3 btn-update-kelas" title="Print">Cetak</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="catatan" role="tabpanel" aria-labelledby="catatan-tab">
                    <div class="card mb-2">
                        <div class="content">
                            <div class="card-block">

                                <div class="mb-3">
                                    <label class="form-label for-header">Detail nilai siswa</label>

                                    <form action="laporan/nilaiLaporan" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran Masuk</label>
                                            <select class="form-select" aria-label="Default select example" name="id_tahunajaran5" id="id_tahunajaran5">
                                                <option selected>Pilih Tahun Ajaran Masuk</option>
                                                <?php foreach($tahunajaran as $ta) : ?>
                                                    <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Siswa</label>
                                            <select class="form-select" aria-label="Default select example" name="id_siswa3" id="id_siswa3">
                                                <option selected>Pilih Kelas</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn w-100 mb-3 btn-update-kelas" title="Print">Cetak</button>
                                    </form>
                                </div>
                                
                                <hr>
                                
                                <div class="mb-3">
                                    <label class="form-label for-header">Nilai siswa pada kelas</label>

                                    <form action="laporan/nilaiLaporanKelas" method="post">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran</label>
                                            <select class="form-select" aria-label="Default select example" name="id_tahunajaran6" id="id_tahunajaran6">
                                                <option selected>Pilih Tahun Ajaran</option>
                                                <?php foreach($tahunajaran as $ta) : ?>
                                                    <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                                            <select class="form-select" aria-label="Default select example" name="id_kelas3" id="id_kelas3">
                                                <option selected>Open this select menu</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn w-100 mb-3 btn-update-kelas" title="Print">Cetak</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        
        $('#id_tahunajaran1').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/getKelas') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id_kelas1').html(response.data);
                }

            });
        });

        $('#id_tahunajaran2').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/getSiswa') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id_siswa1').html(response.data);
                }

            });
        });

        $('#id_tahunajaran3').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/getSiswa') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id_siswa2').html(response.data);
                }

            });
        });

        $('#id_tahunajaran4').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/getKelas') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id_kelas2').html(response.data);
                }

            });
        });
        
        $('#id_tahunajaran5').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/getSiswa') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id_siswa3').html(response.data);
                }

            });
        });

        $('#id_tahunajaran6').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/getKelas') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id_kelas3').html(response.data);
                }

            });
        });
        
    });
</script>

<?= $this->endSection(); ?>