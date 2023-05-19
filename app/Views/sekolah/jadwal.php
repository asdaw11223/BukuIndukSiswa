<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
    
    <button type="button" class="btn btn-daftar-mapel" data-bs-toggle="modal">Daftar</button>
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
                                        <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                                            <option value>Pilih Tahun Ajaran</option>
                                            <?php foreach($tahunAjaran as $ta) : ?>
                                                <option value="<?= $ta['id_tahunajaran'] ?>"><?= $ta['nama_tahunajaran'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="kelas" class="form-label">Jurusan</label>
                                        <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
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

                        <?= dd($jadwal)?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection(); ?>