<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .form-label{
        font-weight: bold;
    }
    #addSiswa .nav-item.show .nav-link, #addSiswa .nav-link{
        color: #404e67;
        font-weight: 600;
        font-size: 12px;
        border-radius: 5px;
    }
    #addSiswa .nav-item.show .nav-link, #addSiswa .nav-link.active{
        color: white;
        font-weight: 600;
        font-size: 12px;
        background: #6777ef;
        border-radius: 5px;
    }
</style>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $siswa['s_namalengkap'] ?> [<?= $siswa['s_NISN'] ?>]
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row">

        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                Jika nilai tidak tampil silahkan filter kelas dan semester terlebih dahulu!!!
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-2">
                <div class="card-header for-header">Filter</div>
                <div class="content">
                    <div class="card-block">
                        <div class="row">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="id_tingkat" class="form-label">Tingkat</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="id_tingkat" name="id_tingkat">
                                        <option selected>Pilih Tingkat</option>
                                        <?php foreach($kelas as $k) : ?>
                                            <option value="<?= $k['id_tingkat'] ?>"><?= $k['nama_tingkat'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kelas" class="form-label">Kelas</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="id_kelas" name="id_kelas">
                                        <option selected>Pilih Kelas</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="semester" name="semester">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn w-100 mb-3">Tampilkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-9">

            <!-- Tab panes -->
            <div class="tab-content">

                <div class="card mb-2">
                    <div class="card-header for-header">Semester <?= $semester; ?></div>
                    <div class="content">
                        <div class="card-block">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="bold" rowspan="2">MATA PELAJARAN</td>
                                        <td class="bold" colspan="4">NILAI PENGETAHUAN</td>
                                        <td class="bold" colspan="4">NILAI KETERAMPILAN</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">KB</td>
                                        <td class="bold">Angka</td>
                                        <td class="bold">Predikat</td>
                                        <td class="bold">Deskripsi</td>
                                        <td class="bold">KB</td>
                                        <td class="bold">Angka</td>
                                        <td class="bold">Predikat</td>
                                        <td class="bold">Deskripsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="9" class="table-active">KELOMPOK A</td>
                                    </tr>

                                    <?php foreach($nilai as $n) : ?>
                                        <?php if($n['nama_kelompok'] == 'Kelompok A') : ?>
                                            <tr>
                                                <td><?= $n['nama_matapelajaran'] ?></td>
                                                <td><?= $n['np_kb'] ?></td>
                                                <td><?= $n['np_angka'] ?></td>
                                                <td><?= $n['np_predikat'] ?></td>
                                                <td><?= $n['np_deskripsi'] ?></td>
                                                <td><?= $n['nk_kb'] ?></td>
                                                <td><?= $n['nk_angka'] ?></td>
                                                <td><?= $n['nk_predikat'] ?></td>
                                                <td><?= $n['nk_deskripsi'] ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="9" class="table-active">KELOMPOK B</td>
                                    </tr>

                                    <?php foreach($nilai as $n) : ?>
                                        <?php if($n['nama_kelompok'] == 'Kelompok B') : ?>
                                            <tr>
                                                <td><?= $n['nama_matapelajaran'] ?></td>
                                                <td><?= $n['np_kb'] ?></td>
                                                <td><?= $n['np_angka'] ?></td>
                                                <td><?= $n['np_predikat'] ?></td>
                                                <td><?= $n['np_deskripsi'] ?></td>
                                                <td><?= $n['nk_kb'] ?></td>
                                                <td><?= $n['nk_angka'] ?></td>
                                                <td><?= $n['nk_predikat'] ?></td>
                                                <td><?= $n['nk_deskripsi'] ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <tr>
                                        <td colspan="9" class="table-active">KELOMPOK C</td>
                                    </tr>

                                    <?php foreach($nilai as $n) : ?>
                                        <?php if($n['nama_kelompok'] == 'Kelompok C') : ?>
                                            <tr>
                                                <td><?= $n['nama_matapelajaran'] ?></td>
                                                <td><?= $n['np_kb'] ?></td>
                                                <td><?= $n['np_angka'] ?></td>
                                                <td><?= $n['np_predikat'] ?></td>
                                                <td><?= $n['np_deskripsi'] ?></td>
                                                <td><?= $n['nk_kb'] ?></td>
                                                <td><?= $n['nk_angka'] ?></td>
                                                <td><?= $n['nk_predikat'] ?></td>
                                                <td><?= $n['nk_deskripsi'] ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-block mt-5">
                            <div class="for-header mb-3">Catatan Siswa</div>

                            
                            <div class="for-header mb-2">PRAKTIK KERJA LAPANGAN</div>

                            <table class="table table-bordered">
                            <tr>
                                <td class="bold">No.</td>
                                <td class="bold">Nama DU/DI atau Instansi Relevan</td>
                                <td class="bold">Lokasi</td>
                                <td class="bold">Lamanya (bulan)</td>
                                <td class="bold">Keterangan</td>
                            </tr>
                            <?php $no=1; foreach($pkl as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p['pkl_namainstansi']; ?></td>
                                    <td><?= $p['pkl_lokasi']; ?></td>
                                    <td><?= $p['pkl_lama']; ?></td>
                                    <td><?= $p['pkl_keterangan']; ?></td>
                                </tr>
                            <?php endforeach; ?>

                            </thead>
                            </table>

                            <div class="for-header mb-2">KEGIATAN EKSTRAKURIKULER</div>

                            <table class="table table-bordered">
                            <tr>
                                <td class="bold">No.</td>
                                <td class="bold">Kegiatan Ekstrakurikuler</td>
                                <td class="bold">Kelas</td>
                                <td class="bold">Keterangan</td>
                            </tr>
                            <?php $no=1; foreach($eskul as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p['eskul_kegiatan']; ?></td>
                                    <td><?= $p['nama_kelas']; ?></td>
                                    <td><?= $p['eskul_keterangan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </table>

                            <div class="for-header mb-2">PRESTASI</div>

                            <table class="table table-bordered">
                            <tr>
                                <td class="bold">No.</td>
                                <td class="bold">Jenis Prestasi</td>
                                <td class="bold">Keterangan</td>
                            </tr>
                            <?php $no=1; foreach($prestasi as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p['pre_jenisprestasi']; ?></td>
                                    <td><?= $p['pre_keterangan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </table>

                            <div class="for-header mb-2">KETIDAKHADIRAN</div>

                            <table class="table table-bordered">
                            <tr>
                                <td class="bold" rowspan="2">No.</td>
                                <td class="bold" rowspan="2">Tahun Ajaran</td>
                                <td class="bold" rowspan="2">Kelas</td>
                                <td class="bold" rowspan="2">Semester</td>
                                <td class="bold" colspan="3" class="text-center">Tidak Hadir</td>
                            </tr>
                            <tr>
                                <td class="bold">Sakit</td>
                                <td class="bold">Izin</td>
                                <td class="bold">Alfa</td>
                            </tr>
                            <?php $no=1; foreach($kehadiran as $k) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $k['nama_tahunajaran'] ?></td>
                                <td><?= $k['nama_kelas'] ?></td>
                                <td><?= $k['kh_semester'] ?></td>
                                <td><?= $k['kh_sakit'] ?></td>
                                <td><?= $k['kh_izin'] ?></td>
                                <td><?= $k['kh_alpa'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </table>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</form>
</section>

<script>
    
    $('#id_tingkat').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Rapor/getTingkatSiswa/'. $siswa['s_NISN']) ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#id_kelas').html(response.data);
                }

            });
        });
</script>

<?= $this->endSection(); ?>