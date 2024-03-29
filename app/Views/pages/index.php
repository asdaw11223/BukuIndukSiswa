<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-dark shadow-dark">
                        <span class="material-symbols-sharp db">person</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Siswa</p>
                        <h4 class="mb-0"><?= count($siswa)-1 ?></h4>
                    </div>
                </div>
                <?php if(in_groups('admin')) : ?>
                <a href="/siswa" class="link card-footer p-3">
                    <p class="mb-0">Selengkapnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <?php else : ?>
                <a href="#" class="link card-footer p-3">
                    &nbsp;
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon red icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-primary shadow-primary">
                        <span class="material-symbols-outlined">door_front</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Jurusan</p>
                        <h4 class="mb-0"><?= count($siswa) ?></h4>
                    </div>
                </div>
                <?php if(in_groups('admin')) : ?>
                <a href="/jurusan" class="link card-footer p-3">
                    <p class="mb-0">Selengkapnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <?php else : ?>
                <a href="#" class="link card-footer p-3">
                    &nbsp;
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon yellow icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-success shadow-success">
                        <span class="material-symbols-outlined">category</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Matapelajaran</p>
                        <h4 class="mb-0"><?= count($matapelajaran) ?></h4>
                    </div>
                </div>
                <?php if(in_groups('admin')) : ?>
                <a href="/matapelajaran" class="link card-footer p-3">
                    <p class="mb-0">Selengkapnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <?php else : ?>
                <a href="#" class="link card-footer p-3">
                    &nbsp;
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card mb-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon blue icon-lg icon-shape shadow text-center border-radius-xl mt-n4 position-absolute bg-gradient-success shadow-success">
                        <span class="material-symbols-outlined">wysiwyg</span>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tahun Ajaran</p>
                        <h4 class="mb-0"><?= count($tahunajaran) ?></h4>
                    </div>
                </div>
                <?php if(in_groups('admin')) : ?>
                <a href="/tahunajaran" class="link card-footer p-3">
                    <p class="mb-0">Selengkapnya</p>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <?php else : ?>
                <a href="#" class="link card-footer p-3">
                    &nbsp;
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card mb-2">
                <div class="card-header">
                    <h4>Peserta Didik</h4>
                </div>
                <div class="content">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NISN</th>
                                        <th>Nama Peserta Didik</th>
                                        <th>L/P</th>
                                        <th>Angkatan</th>
                                        <?php if(in_groups('admin')) : ?>
                                        <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($siswa as $s) : ?>
                                    <?php if($s['s_NISN'] == '0000000000') : ?>
                                    <?php else : ?> 
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                        <td><?= $s['s_NISN'] ?></td>
                                        <td><?= $s['s_namalengkap'] ?></td>
                                        <td>
                                            <?php foreach ($jk as $j) : ?>
                                                <?php if($j['id_jeniskelamin'] == $s['id_jeniskelamin']) : ?>   
                                                    <?= $j['nama_jeniskelamin']; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>    
                                        </td>
                                        <td>
                                            <?php foreach ($tahunajaran as $ta) : ?>
                                                <?php if($ta['id_tahunajaran'] == $s['id_tahunajaran']) : ?>   
                                                    <?= $ta['nama_tahunajaran']; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <?php if(in_groups('admin')) : ?>
                                        <td class="w-120 text-center">
                                            <a href="/rapor/<?= $s['s_NISN'] ?>" class="btn-edit btn-update-jurusan" title="Edit"><span class="material-symbols-outlined">demography</span></a>  
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>NISN</th>
                                        <th>Nama Peserta Didik</th>
                                        <th>L/P</th>
                                        <th>Angkatan</th>
                                        <?php if(in_groups('admin')) : ?>
                                        <th>Aksi</th>
                                        <?php endif; ?>
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