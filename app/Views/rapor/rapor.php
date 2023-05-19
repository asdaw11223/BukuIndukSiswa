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
                    Pilih Kelas
                </div>
                <div class="content">
                    <div class="card-block">

                    <form action="" method="post">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                                    <option value>Pilih Jurusan</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" aria-label="Default select example" name="kelas" id="kelas">
                                    <option value>Pilih Kelas</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="" class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-add-siswa" data-bs-toggle="modal">
                                Tampilkan
                                </button>
                            </div>
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
                                        <th>Naik/Tidak Naik</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($siswa as $s) : ?>
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                            <td class="w-120 text-center">
                                                <button type="button" class="btn-view btn-view-kelas" data-bs-toggle="modal" title="View"><span class="material-symbols-outlined">demography</span></button>
                                                <button type="button" class="btn-edit btn-update-kelas" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">print</span></button>
                                            </td>
                                        <td><?= $s['s_NISN'] ?></td>
                                        <td><?= $s['s_namalengkap'] ?></td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th class="text-center">Nilai Semester</th>
                                        <th>NISN</th>
                                        <th>Nama Peserta Didik</th>
                                        <th>Naik/Tidak Naik</th>
                                        <th>Lulus/Tidak Lulus</th>
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


<?= $this->endSection(); ?>