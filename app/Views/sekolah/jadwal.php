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
                    Filter Matapelajaran
                </div>
                <div class="content">
                    <div class="card-block">

                        <form action="" method="post">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="kelas" class="form-label">Tahun Ajaran</label>
                                        <select class="form-select" aria-label="Default select example" name="id_tahunajaran" id="id_tahunajaran">
                                            <option value>Pilih Tahun Ajaran</option>
                                            <?php foreach($tahunAjaran as $ta) : ?>
                                                <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="kelas" class="form-label">Jurusan</label>
                                        <select class="form-select" aria-label="Default select example" name="id_jurusan" id="id_jurusan">
                                            <option value>Pilih Jurusan</option>
                                            <?php foreach($jurusan as $js) : ?>
                                                <option value="<?= $js['id_jurusan'] ?>"><?= $js['nama_jurusan'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="form-label">&nbsp;</label>
                                        <button type="submit" class="btn btn-add-siswa" style="width: 100% !important;">Tampilkan</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        
        <?php
        foreach($tingkat as $tg) : ?>
        <div class="col-md-12 mt-3">
            <div class="card mb-2">
                <div class="card-header for-header p-3 pt-2">
                    <?= $tg['nama_tingkat']; ?> </br>
                    <?php foreach($jurusan as $j){
                        if($tg['id_jurusan'] == $j['id_jurusan']){
                            echo $j['nama_jurusan'];
                        }
                    }
                    ?>
                </div>
                <div class="content">
                    <div class="card-block">

                        <div class="btn-cover p-3 pt-2 d-flex" style="padding-left: 0 !important;">
                            <button type="button" class="btn btn-add-<?= $tg['id_tingkat'] ?>" style="margin: 0px 5px ; width: auto;" data-bs-toggle="modal">
                            Tambah Matapelajaran
                            </button>
                        </div>
                    
                        <div class="dt-responsive table-responsive">
                            <table id="kelas1" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Matapelajaran</th>
                                        <th>Kelompok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($jadwal as $m) : ?>
                                        <?php if($m['id_tingkat'] == $tg['id_tingkat']) : ?>
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                        <td><?= $m['nama_matapelajaran'] ?></td>
                                        <td><?= $m['nama_kelompok'] ?></td>
                                        <td>
                                            <button type="button" class="btn-delete btn-delete-matapelajaran mlr5"  data-bs-toggle="modal" title="Delete" data-id="<?= $m['id_matapelajaran']; ?>" data-nama="<?= $m['nama_matapelajaran']; ?>" data-kel="<?= $m['nama_kelompok']; ?>" ><span class="material-symbols-outlined">delete</span></button>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Matapelajaran</th>
                                        <th>Kelompok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>

<?= $this->endSection(); ?>