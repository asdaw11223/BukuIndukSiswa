<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <!-- <a class="btn" href="/" type="button">Tambah Data</a> -->
                </div>
                <!-- <hr class="dark horizontal my-0"> -->
                <div class="content">
                    <div class="card-block">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>