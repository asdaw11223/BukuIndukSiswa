<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4" id="dashboard">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-dark shadow-dark">
                        <span class="material-symbols-sharp">person</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Siswa</p>
                        <h4 class="mb-0">281</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                    <p class="mb-0">Lihat lainnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon red icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-primary shadow-primary">
                        <span class="material-symbols-outlined">door_front</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Kelas</p>
                        <h4 class="mb-0">10</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                    <p class="mb-0">Lihat lainnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon yellow icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-success shadow-success">
                        <span class="material-symbols-outlined">category</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jurusan</p>
                        <h4 class="mb-0">5</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                    <p class="mb-0">Lihat lainnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon blue icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-success shadow-success">
                        <span class="material-symbols-outlined">wysiwyg</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Matapelajaran</p>
                        <h4 class="mb-0">50</h4>
                    </div>
                </div>
                <div class="card-footer p-3">
                    <p class="mb-0">Lihat lainnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>