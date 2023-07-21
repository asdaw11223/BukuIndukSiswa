<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header for-header p-3 pt-2" style="padding: 15px 1.5rem 15px !important; background-color: #6777ef; border-radius: 12px 12px 0 0; color:#ffffff;">
                    Filter Kelas
                </div>
                <div class="content">
                    <div class="card-block">

                    <form action="" method="post">
                    <div class="mb-3">
                        <div class="row">
                            <form action="" method="post">
                            <div class="col-md-4">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                                    <option value>Pilih Jurusan</option>
                                    <?php foreach($jurusan as $j) : ?>
                                    <option value="<?= $j['id_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="tahunajaran" class="form-label">Tahun Ajaran</label>
                                <select class="form-select" aria-label="Default select example" name="tahunajaran" id="tahunajaran">
                                    <option value>Pilih Tahun Ajaran</option>
                                    <?php foreach($tahunajaran as $ta) : ?>
                                    <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" aria-label="Default select example" name="kelas" id="kelas">
                                    <option value>Pilih Kelas</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-add-siswa" data-bs-toggle="modal" style="width: 100%;">
                                Tampilkan
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card mb-2">
                <div class="card-header for-header p-3 pt-2">
                    Daftar Siswa
                </div>
                <div class="content">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th class="text-center">Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama Peserta Didik</th>
                                        <th>Jurusan</th>
                                        <th>Tahun Ajaran Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($siswa as $s) : ?>
                                    <?php if($s['s_NISN'] == '0000000000') : ?>
                                    <?php else : ?>
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                            <td class="w-120 text-center">
                                                <a href="rapor/<?= $s['s_NISN'] ?>" class="btn-view btn-view-kelas"title="View"><span class="material-symbols-outlined">demography</span></a>
                                                <a href="rapor/nilai/<?= $s['s_NISN'] ?>" class="btn-view btn-view-kelas"title="View"><span class="material-symbols-outlined">inbox</span></a>
                                                <a href="/laporan/raporSiswaDetails/<?= $s['s_NISN'] ?>" class="btn-edit btn-update-kelas" title="Print"><span class="material-symbols-outlined">print</span></a>
                                            </td>
                                        <td><?= $s['s_NISN'] ?></td>
                                        <td><?= $s['s_namalengkap'] ?></td>
                                        <td><?= $s['nama_jurusan'] ?></td>
                                        <td><?= $s['nama_tahunajaran'] ?></td>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th class="text-center">Nilai Semester</th>
                                        <th>NISN</th>
                                        <th>Nama Peserta Didik</th>
                                        <th>Jurusan</th>
                                        <th>Tahun Ajaran Masuk</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function validateAddNilai() {
        $.ajax({
            url: "<?= site_url('Nilai/addNilai') ?>",
            method: "post",
            data: $("#formAddNilai").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.berhasil) {
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };

    function validateFormAddMatapelajaran() {
        $.ajax({
            url: "<?= site_url('Nilai/addMapel') ?>",
            method: "post",
            data: $("#formAddMatapelajaran").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.berhasil) {
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };
    
    $(document).ready(function(){
        
        $('#jurusan').change(function() {
            var id_jurusan = $(this).val();
            $('#tahunajaran').change(function() {
            var id_tahunajaran = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Rapor/getKelas') ?>",
                    data: {
                        id_tahunajaran: id_tahunajaran,
                        id_jurusan: id_jurusan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#kelas').html(response.data);
                    }

                });
            });
        });

    });
</script>

<?= $this->endSection(); ?>