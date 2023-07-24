
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    #dashboard .siswa .nav-item{
        width: calc(100% / 2);
    }
    #addSiswa .nav-link.active ~ .slide{
        width: calc(100% / 2);
    }
</style>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    
    <div class="row card-container">
        
        <div class="col-md-12">
            <ul class="nav nav-tabs mb-3 card siswa" id="addSiswa" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nilai-tab" data-bs-toggle="tab" data-bs-target="#in-nilai" type="button" role="tab" aria-controls="in-nilai" aria-selected="true">Nilai</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kehadiran-tab" data-bs-toggle="tab" data-bs-target="#kehadiran" type="button" role="tab" aria-controls="kehadiran" aria-selected="true">Kehadiran</button>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>

        <div class="tab-content">

            <div class="col-md-12 mt-3 tab-pane active" id="in-nilai" role="tabpanel" aria-labelledby="nilai-tab">
                <div class="card mb-2">
                    <div class="card-header for-header p-3 pt-2">
                        Daftar Siswa
                    </div>
                    <div class="content">
                        <div class="card-block">
                            <div class="text-cover p-2 pt-2">
                                <h6>Kelas : <?= $kelas['nama_kelas']?></h6>
                                <h6>Jurusan : <?= $kelas['nama_jurusan']?></h6>
                                <h6>Tahun Ajaran : <?= $kelas['nama_tahunajaran']?></h6>
                                <h6>Semester : <?= $semester ?></h6>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <div class="text-cover p-2 pt-2">
                                    <form action="" method="get">
                                    <label class="form-label">Filter Matapelajaran</label>
                                    <select class="form-select" aria-label="Default select example" name="filter" id="filter">
                                        <option value="">Tampil Semua</option>
                
                                        <?php for($i = 0; $i < count($nama_mapel); $i++) : ?>
                                            <option value="<?= $id_mapel[$i] ?>"><b><?= $nama_mapel[$i] ?></b></option>
                                        <?php endfor ?>
                                    </select>
                                    <button type="submit" class="btn btn-add-nilai mt-2" style="margin: 0px 0px; width: 100%;">Filter</button>
                                    </form>
                                </div>
                            </div>

                            <form action="javascript:void(0)" method="post" name="formAddNilai" id="formAddNilai" onsubmit="return validateAddNilai()">

                                <div class="btn-cover p-3 pt-2 d-flex" style="padding-left: 0 !important; padding-right: 0 !important; justify-content: space-between;">
                                    <div class="right d-flex">
                                        <button type="button" class="btn green btn-add-import" style="margin: 0px 5px;" data-bs-toggle="modal">Import Nilai</button>
                                        <button type="button" class="btn yellow btn-add-matapelajaran" style="margin: 0px 5px; background-image:linear-gradient(310deg,#ff9c07,#fba73f) !important" data-bs-toggle="modal">Tambah Mapel</button>
                                    </div>
                                    <div class="left">
                                        <button type="submit" class="btn btn-add-nilai" style="margin: 0px 5px;">Simpan</button>
                                    </div>
                                </div>
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th rowspan="3">No.</th>
                                                <th rowspan="3">Aksi</th>
                                                <th rowspan="3">NISN</th>
                                                <th rowspan="3">Nama Siswa</th>
                                                <?php for($i = 0; $i < count($array); $i++) : ?>

                                                    <th colspan="8" class="text-center">
                                                        <div class="dropdown-center">
                                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; border: none;">
                                                                <?= $array[$i] ?>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="button" class="btn-delete btn-delete-mapel" style="background: transparent; border: none; width: 100%; display: flex; align-items: center;" data-bs-toggle="modal" title="Delete" data-nama="<?= $array[$i]; ?>" data-id="<?= $id_mapel[$i]; ?>"><span class="material-symbols-outlined">delete</span> Hapus</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </th>
                                                    
                                                <?php endfor ?>
                                            </tr>
                                            <tr>
                                                <?php for($i = 0; $i < count($array); $i++) : ?>
                                                <th colspan="4" class="text-center">Nilai Pengetahuan</th>
                                                <th colspan="4" class="text-center">Nilai Keterampilan</th>
                                                <?php endfor ?>
                                            </tr>
                                            <tr>
                                                <?php for($i = 0; $i < count($array); $i++) : ?>
                                                <th style="padding-right: 50px;">KB</th>
                                                <th style="padding-right: 50px;">Angka</th>
                                                <th style="padding-right: 50px;">Predikat</th>
                                                <th style="padding-right: 50px;">Deskripsi Matapelajaran</th>
                                                <th style="padding-right: 50px;">KB</th>
                                                <th style="padding-right: 50px;">Angka</th>
                                                <th style="padding-right: 50px;">Predikat</th>
                                                <th style="padding-right: 50px;">Deskripsi Matapelajaran</th>
                                                <?php endfor ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach($siswa as $s) : ?> 
                                            <tr>
                                                <td class="w-23"><?= $no++; ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn-view btn-view-catatan" data-id="<?= $s['s_NISN']; ?>" data-kelas="<?= $kelas['id_kelas']; ?>" data-bs-toggle="modal" title="View"><span class="material-symbols-outlined">demography</span></button>
                                                </td>
                                                <td><?= $s['s_NISN'] ?></td>
                                                <td><?= $s['s_namalengkap'] ?></td>
                                                
                                                <?php foreach($nilai as $n) : ?>
                                                <?php if($s['s_NISN'] == $n['s_NISN']) : ?>
                                                <td>
                                                    <input type="hidden" class="form-control" name="id_nilai<?= $n['id_nilai']?>" value="<?= $n['id_nilai'] ?>">
                                                    <input type="hidden" class="form-control" name="id_kelas" value="<?= $n['id_kelas'] ?>">
                                                    <input type="hidden" class="form-control" name="semester" value="<?= $semester?>">

                                                    <input onClick="this.select();" type="text" class="form-control" id="np_kb<?= $n['id_nilai']?>" name="np_kb<?= $n['id_nilai']?>" value="<?= $n['np_kb'] ?>">
                                                </td>
                                                <td>
                                                    <input onClick="this.select();" type="text" class="form-control" id="np_angka<?= $n['id_nilai']?>" name="np_angka<?= $n['id_nilai']?>" value="<?= $n['np_angka'] ?>">
                                                </td>
                                                <td>
                                                    <input onClick="this.select();" type="text" class="form-control" id="np_predikat<?= $n['id_nilai']?>" name="np_predikat<?= $n['id_nilai']?>" value="<?= $n['np_predikat'] ?>">
                                                </td>
                                                <td>
                                                    <textarea onClick="this.select();" class="form-control" id="np_deskripsi<?= $n['id_nilai']?>" name="np_deskripsi<?= $n['id_nilai']?>" rows="1"><?= $n['np_deskripsi'] ?></textarea>
                                                </td>
                                                <td>
                                                    <input onClick="this.select();" type="text" class="form-control" id="nk_kb<?= $n['id_nilai']?>" name="nk_kb<?= $n['id_nilai']?>" value="<?= $n['nk_kb'] ?>">
                                                </td>
                                                <td>
                                                    <input onClick="this.select();" type="text" class="form-control" id="nk_angka<?= $n['id_nilai']?>" name="nk_angka<?= $n['id_nilai']?>" value="<?= $n['nk_angka'] ?>">
                                                </td>
                                                <td>
                                                    <input onClick="this.select();" type="text" class="form-control" id="nk_predikat<?= $n['id_nilai']?>" name="nk_predikat<?= $n['id_nilai']?>" value="<?= $n['nk_predikat'] ?>">
                                                </td>
                                                <td>
                                                    <textarea onClick="this.select();" class="form-control" id="nk_deskripsi<?= $n['id_nilai']?>" name="nk_deskripsi<?= $n['id_nilai']?>" rows="1"><?= $n['nk_deskripsi'] ?></textarea>
                                                </td>
                                                <?php endif ?>
                                                <?php endforeach ?>

                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">Aksi</th>
                                                <th rowspan="2">NISN</th>
                                                <th rowspan="2">Nama Siswa</th>
                                                <?php for($i = 0; $i < count($array); $i++) : ?>
                                                    <th>KB</th>
                                                    <th>Angka</th>
                                                    <th>Predikat</th>
                                                    <th>Deskripsi</th>
                                                    <th>KB</th>
                                                    <th>Angka</th>
                                                    <th>Predikat</th>
                                                    <th>Deskripsi</th>
                                                <?php endfor ?>
                                            </tr>
                                            <tr>
                                                <?php for($i = 0; $i < count($array); $i++) : ?>
                                                    <th colspan="4" class="text-center">Nilai Pengetahuan</th>
                                                    <th colspan="4" class="text-center">Nilai Keterampilan</th>
                                                <?php endfor ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                <div class="btn-cover mt-3 p-3 pt-2 d-flex" style="padding-left: 0 !important; padding-right: 0 !important; justify-content: space-between;">
                                    <div class="right d-flex">

                                    </div>
                                    <div class="left">
                                        <button type="submit" class="btn btn-add-nilai" style="margin: 0px 5px;">Simpan</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 mt-3 tab-pane" id="kehadiran" role="tabpanel" aria-labelledby="kehadiran-tab"> 
                <div class="card mb-2">
                    <div class="card-header for-header">Kehadiran Siswa</div>
                    <div class="content">
                        <div class="card-block">
                            <div class="text-cover p-2 pt-2">
                                <h6>Kelas : <?= $kelas['nama_kelas']?></h6>
                                <h6>Jurusan : <?= $kelas['nama_jurusan']?></h6>
                                <h6>Tahun Ajaran : <?= $kelas['nama_tahunajaran']?></h6>
                                <h6>Semester : <?= $semester ?></h6>
                            </div>
                            
                            <form action="javascript:void(0)" method="post" name="formAddKehadiran" id="formAddKehadiran" onsubmit="return validateAddKehadiran()">

                                <div class="btn-cover p-3 pt-2 d-flex" style="padding-left: 0 !important; padding-right: 0 !important; justify-content: space-between;">
                                    <div class="right d-flex">
                                        <button type="button" class="btn yellow btn-update-kehadiran" style="margin: 0px 5px; background-image:linear-gradient(310deg,#ff9c07,#fba73f) !important" data-bs-toggle="modal">Tambah Form</button>
                                    </div>
                                    <div class="left">
                                        <button type="submit" class="btn btn-add-nilai" style="margin: 0px 5px;">Simpan</button>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="alert alert-warning" role="alert">
                                        Jika form tidak muncul klik tambah form terlebih dahulu!!!
                                    </div>
                                </div>

                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">NISN</th>
                                                <th rowspan="2">Nama Siswa</th>
                                                <th colspan="3" class="text-center">Tidak Hadir</th>
                                                <?php if($semester == 2) : ?>
                                                    <th rowspan="2" class="text-center">Naik/ Tidak Naik</th>
                                                    <th rowspan="2" class="text-center">Lulus/ Tidak Lulus</th>
                                                <?php endif; ?>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Sakit</th>
                                                <th class="text-center">Izin</th>
                                                <th class="text-center">Alfa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach($siswa as $s) : ?> 
                                            <tr>
                                                <td class="w-23"><?= $no++; ?></td>
                                                <td><?= $s['s_NISN'] ?></td>
                                                <td><?= $s['s_namalengkap'] ?></td>
                                                
                                                <?php foreach($kehadiran as $n) : ?>
                                                    <?php if($s['s_NISN'] == $n['s_NISN']) : ?>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="id_kehadiran" value="<?= $n['id_kehadiran'] ?>">
                                                            <input type="hidden" class="form-control" name="kh_semester" value="<?= $n['kh_semester'] ?>">
                                                            <input type="hidden" class="form-control" name="id_kelas" value="<?= $n['id_kelas'] ?>">
                                                            <input onClick="this.select();" type="text" class="form-control" id="kh_sakit<?= $n['id_kehadiran']?>" name="kh_sakit<?= $n['id_kehadiran']?>" value="<?= $n['kh_sakit'] ?>">
                                                        </td>
                                                        <td>
                                                            <input onClick="this.select();" type="text" class="form-control" id="kh_izin<?= $n['id_kehadiran']?>" name="kh_izin<?= $n['id_kehadiran']?>" value="<?= $n['kh_izin'] ?>">
                                                        </td>
                                                        <td>
                                                            <input onClick="this.select();" type="text" class="form-control" id="kh_alpa<?= $n['id_kehadiran']?>" name="kh_alpa<?= $n['id_kehadiran']?>" value="<?= $n['kh_alpa'] ?>">
                                                        </td>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                    
                                                <?php if($semester == 2) : ?>    
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <select class="form-select" aria-label="Default select example" name="dsk_naikkelas<?= $s['s_NISN']?>" id="dsk_naikkelas<?= $s['s_NISN']?>">
                                                                <option value="0"  <?php if($s['dsk_naikkelas'] == 0) { echo('selected'); } ?> >Pilih Aksi</option>
                                                                <option value="2" <?php if($s['dsk_naikkelas'] == 2) { echo('selected'); } ?> >Naik</option>
                                                                <option value="1" <?php if($s['dsk_naikkelas'] == 1) { echo('selected'); } ?> >Tidak Naik</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input onClick="this.select();" type="date" class="form-control" id="dsk_tglnaikkelas<?= $s['s_NISN'] ?>" name="dsk_tglnaikkelas<?= $s['s_NISN'] ?>" value="<?= $s['dsk_tglnaikkelas'] ?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <select class="form-select" aria-label="Default select example" name="dsk_lulus<?= $s['s_NISN']?>" id="dsk_lulus<?= $s['s_NISN']?>">
                                                                <option value="0" <?php if($s['dsk_lulus'] == 0) { echo('selected'); } ?> >Pilih Aksi</option>
                                                                <option value="2" <?php if($s['dsk_lulus'] == 2) { echo('selected'); } ?> >Lulus</option>
                                                                <option value="1" <?php if($s['dsk_lulus'] == 1) { echo('selected'); } ?> >Tidak Lulus</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input onClick="this.select();" type="date" class="form-control" id="dsk_tgllulus<?= $s['s_NISN']?>" name="dsk_tgllulus<?= $s['s_NISN']?>" value="<?= $s['dsk_tgllulus'] ?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php endif ?>

                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="2">No.</th>
                                                <th rowspan="2">NISN</th>
                                                <th rowspan="2">Nama Siswa</th>
                                                <th class="text-center">Sakit</th>
                                                <th class="text-center">Izin</th>
                                                <th class="text-center">Alfa</th>
                                                <?php if($semester == 2) : ?>
                                                <th rowspan="2" class="text-center">Naik/ Tidak Naik</th>
                                                <th rowspan="2" class="text-center">Lulus/ Tidak Lulus</th>
                                                <?php endif ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                <div class="btn-cover mt-3 p-3 pt-2 d-flex" style="padding-left: 0 !important; padding-right: 0 !important; justify-content: space-between;">
                                    <div class="right d-flex">

                                    </div>
                                    <div class="left">
                                        <button type="submit" class="btn btn-add-nilai" style="margin: 0px 5px;">Simpan</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<!-- ADD MATAPELAJARAN -->
<form action="javascript:void(0)" method="post" name="formAddMatapelajaran" id="formAddMatapelajaran" onsubmit="return validateFormAddMatapelajaran()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalAddMatapelajaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Matapelajaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <label class="form-label for-header">Kelompok A</label>
                            </div>

                            <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
                            <input type="hidden" name="semester" value="<?= $semester ?>">

                            <?php foreach($matapelajaran as $mp) : ?>
                                <?php if($mp['nama_kelompok'] == "Kelompok A") : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="matapelajaran<?= $mp['id_matapelajaran']?>" name="matapelajarans[]" value="<?= $mp['id_matapelajaran'] ?>">
                                    <label class="form-check-label" for="matapelajaran<?= $mp['id_matapelajaran']?>"><?= $mp['nama_matapelajaran'] ?></label>
                                </div>
                                <?php endif ?>
                            <?php endforeach ?>

                            <div class="mt-3">
                                <label class="form-label for-header">Kelompok B</label>
                            </div>
                            <?php foreach($matapelajaran as $mp) : ?>
                                <?php if($mp['nama_kelompok'] == "Kelompok B") : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="matapelajaran<?= $mp['id_matapelajaran']?>" name="matapelajarans[]" value="<?= $mp['id_matapelajaran'] ?>">
                                    <label class="form-check-label" for="matapelajaran<?= $mp['id_matapelajaran']?>"><?= $mp['nama_matapelajaran'] ?></label>
                                </div>
                                <?php endif ?>
                            <?php endforeach ?>
                                
                            <div class="mt-3">
                                <label class="form-label for-header">Kelompok C</label>
                            </div>
                            <?php foreach($matapelajaran as $mp) : ?>
                                <?php if($mp['nama_kelompok'] == "Kelompok C") : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="matapelajaran<?= $mp['id_matapelajaran']?>" name="matapelajarans[]" value="<?= $mp['id_matapelajaran'] ?>">
                                    <label class="form-check-label" for="matapelajaran<?= $mp['id_matapelajaran']?>"><?= $mp['nama_matapelajaran'] ?></label>
                                </div>
                                <?php endif ?>
                            <?php endforeach ?>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                        <button class="btn" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- ADD KEHADIRAN -->
<form action="javascript:void(0)" method="post" name="formUpdateKehadiran" id="formUpdateKehadiran" onsubmit="return validateFormUpdateKehadiran()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalUpdateKehadiran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-5">
                                <label class="form-label for-header text-center w-100">Tambah Kehadiran Kelas <?= $kelas['nama_kelas'] ?></label>
                            </div>

                            <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
                            <input type="hidden" name="kh_semester" value="<?= $semester ?>">

                            <div class="m-footer d-flex mt-5 mb-5">
                                <button type="button" class="fly" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn green">Tambah</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- ADD CATATAN -->
<div class="modal fade" id="modalAddCatatan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Siswa <span id="nama_siswa"></span> [ <span id="nisn_siswa"></span> ]</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="table_pkl mb-3">
                            <button type="button" class="btn green btn-add-pkl mb-3" style="margin: 0px 5px; width: auto;" data-bs-toggle="modal">Tambah PKL</button>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="table-active bold">No.</td>
                                        <td class="table-active bold">Nama DU/DI atau Instansi Relevan</td>
                                        <td class="table-active bold">Lokasi</td>
                                        <td class="table-active bold">Lamanya (bulan)</td>
                                        <td class="table-active bold">Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody id="table_pkl">

                                </tbody>
                            </table>
                        </div>

                        <div class="mb-3 table_ekstrakurikuler">
                            <button type="button" class="btn green btn-add-eskul mb-3" style="margin: 0px 5px; width: auto;" data-bs-toggle="modal">Tambah Ekstrakurikuler</button>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="table-active bold">No.</td>
                                        <td class="table-active bold">Kegiatan Ekstrakurikuler</td>
                                        <td class="table-active bold">Kelas</td>
                                        <td class="table-active bold">Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody id="table_ekstrakurikuler">

                                </tbody>
                            </table>
                        </div>

                        <div class="table_prestasi mb-3">
                            <button type="button" class="btn green btn-add-prestasi mb-3" style="margin: 0px 5px; width: auto;" data-bs-toggle="modal">Tambah Prestasi</button>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="table-active bold">No.</td>
                                        <td class="table-active bold">Jenis Prestasi</td>
                                        <td class="table-active bold">Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody id="table_prestasi">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ADD PKL -->
<div class="modal fade" id="modalAddPKL" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data PKL</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" method="post" name="formAddPKL" id="formAddPKL" onsubmit="return validateformAddPKL()">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="s_nisn" class="s_nisn">
                        <div class="mb-3">
                            <label for="pkl_namainstansi" class="form-label">Nama DU/DI atau Instansi Relevan</label>
                            <input type="text" class="form-control" name="pkl_namainstansi" id="pkl_namainstansi">
                            <div class="invalid-feedback errorAddpkl_namainstansi"></div>
                        </div>
                        <div class="mb-3">
                            <label for="pkl_lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="pkl_lokasi" id="pkl_lokasi">
                            <div class="invalid-feedback errorAddpkl_lokasi"></div>
                        </div>
                        <div class="mb-3">
                            <label for="pkl_lama" class="form-label">Lamanya (bulan)</label>
                            <input type="number" class="form-control"  name="pkl_lama" id="pkl_lama">
                            <div class="invalid-feedback errorAddpkl_lama"></div>
                        </div>
                        <div class="mb-3">
                            <label for="pkl_keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="pkl_keterangan" id="pkl_keterangan">
                            <div class="invalid-feedback errorAddpkl_keterangan"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                <button class="btn " type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD Eskul -->
<div class="modal fade" id="modalAddEskul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Eskul</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" method="post" name="formAddEskul" id="formAddEskul" onsubmit="return validateformAddEskul()">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="s_nisn" class="s_nisn">
                        <input type="hidden" name="id_kelas" class="id_kelas">
                        <div class="mb-3">
                            <label for="eskul_kegiatan" class="form-label">Kegiatan Ekstrakurikuler</label>
                            <input type="text" class="form-control" name="eskul_kegiatan" id="eskul_kegiatan">
                            <div class="invalid-feedback errorAddeskul_kegiatan"></div>
                        </div>
                        <div class="mb-3">
                            <label for="eskul_keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="eskul_keterangan" id="eskul_keterangan">
                            <div class="invalid-feedback errorAddeskul_keterangan"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                <button class="btn " type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD Prestasi -->
<div class="modal fade" id="modalAddPrestasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Prestasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:void(0)" method="post" name="formAddPrestasi" id="formAddPrestasi" onsubmit="return validateformAddPrestasi()">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="pre_jenisprestasi" class="form-label">Jenis Prestasi</label>
                            <input type="hidden" class="form-control s_nisn" id="pre_s_nisn" name="pre_s_nisn">
                            <input type="text" class="form-control" id="pre_jenisprestasi" name="pre_jenisprestasi">
                            <div class="invalid-feedback errorpre_jenisprestasi"></div>
                        </div>
                        <div class="mb-3">
                            <label for="pre_keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="pre_keterangan" name="pre_keterangan" rows="3"></textarea>
                            <div class="invalid-feedback errorAddpre_keterangan"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                <button class="btn " type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete -->
<form action="javascript:void(0)" method="post" name="formDeleteMapel" id="formDeleteMapel" onsubmit="return validateformDeleteMapel()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteMapel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Mataplejaran <span class="d_nama_mapel"></span> berserta nilainya? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_kelas" name="d_id_kelas" value="<?= $kelas['id_kelas']?>">
                    <input type="hidden" class="form-control" id="d_semester" name="d_semester" value="<?= $semester ?>">
                    <input type="hidden" class="form-control" id="d_id_mapel" name="d_id_mapel">
                    <div class="m-footer d-flex">
                        <button type="button" class="fly" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Import -->
<div class="modal fade" id="modalFormAddImport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Nilai Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo form_open_multipart('Nilai/import'); ?> 
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <a href="/template/<?= $kelas['id_kelas']; ?>/<?= $semester ?>" class="btn w-100">Download Template Nilai</a>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="file_nilai" class="form-label">File Excel Nilai</label>
                            <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
                            <input type="hidden" name="semester" value="<?= $semester ?>">
                            <input type="file" class="form-control" placeholder="File Excel Siswa" name="file_nilai" id="file_nilai" accept=".xls,.xlsx"> 
                            <div class="invalid-feedback errorAddNilai"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                <button class="btn " type="submit">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

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

    function validateAddKehadiran() {
        $.ajax({
            url: "<?= site_url('Kehadiran/updateKehadiranFull') ?>",
            method: "post",
            data: $("#formAddKehadiran").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.berhasil) {
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };

    function validateFormUpdateKehadiran() {
        $.ajax({
            url: "<?= site_url('Kehadiran/addKehadiran') ?>",
            method: "post",
            data: $("#formUpdateKehadiran").serialize(),
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

    function validateformDeleteMapel() {
        $.ajax({
            url: "<?= site_url('Nilai/deleteMapel') ?>",
            method: "post",
            data: $("#formDeleteMapel").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    alert("Data gagal dihapus");

                }else if(response.berhasil){
                    alert("Data berhasil dihapus");
                    window.location.reload();
                }
            }
        });
    };
    
    function validateformAddPKL() {
        $.ajax({
            url: "<?= site_url('PKL/save') ?>",
            method: "post",
            data: $("#formAddPKL").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.pkl_namainstansi){
                        $('#pkl_namainstansi').addClass('is-invalid');
                        $('.errorAddpkl_namainstansi').html(response.error.pkl_namainstansi);
                        return false;
                    }else{
                        $('#pkl_namainstansi').removeClass('is-invalid');
                    }
                    
                    if(response.error.pkl_lokasi){
                        $('#pkl_lokasi').addClass('is-invalid');
                        $('.errorAddpkl_lokasi').html(response.error.pkl_lokasi);
                        return false;
                    }else{
                        $('#pkl_lokasi').removeClass('is-invalid');
                    }
                    
                    if(response.error.pkl_lama){
                        $('#pkl_lama').addClass('is-invalid');
                        $('.errorAddpkl_lama').html(response.error.pkl_lama);
                        return false;
                    }else{
                        $('#pkl_lama').removeClass('is-invalid');
                    }
                    
                    if(response.error.pkl_keterangan){
                        $('#pkl_keterangan').addClass('is-invalid');
                        $('.errorAddpkl_keterangan').html(response.error.pkl_keterangan);
                        return false;
                    }else{
                        $('#pkl_keterangan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    $("#modalAddPKL").modal('hide');
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Rapor/catatan') ?>",
                        data: {
                            id: response.nisn_siswa
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $('#table_pkl').html(response.pkl);
                            $('#table_ekstrakurikuler').html(response.eskul);
                            $('#table_prestasi').html(response.prestasi);
                            $('#nama_siswa').html(response.nama_siswa);
                            $('#nisn_siswa').html(response.nisn_siswa);
                            $('.s_nisn').val(response.nisn_siswa);
                        }
                    });

                    $("#modalAddCatatan").modal('show');
                }
            }
        });
    };
    
    function validateformAddEskul() {
        $.ajax({
            url: "<?= site_url('Eskul/save') ?>",
            method: "post",
            data: $("#formAddEskul").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.eskul_kegiatan){
                        $('#eskul_kegiatan').addClass('is-invalid');
                        $('.erroreskul_kegiatan').html(response.error.eskul_kegiatan);
                        return false;
                    }else{
                        $('#eskul_kegiatan').removeClass('is-invalid');
                    }
                    
                    if(response.error.eskul_keterangan){
                        $('#eskul_keterangan').addClass('is-invalid');
                        $('.errorAddeskul_keterangan').html(response.error.eskul_keterangan);
                        return false;
                    }else{
                        $('#eskul_keterangan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    $("#modalAddEskul").modal('hide');
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Rapor/catatan') ?>",
                        data: {
                            id: response.nisn_siswa
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $('#table_pkl').html(response.pkl);
                            $('#table_ekstrakurikuler').html(response.eskul);
                            $('#table_prestasi').html(response.prestasi);
                            $('#nama_siswa').html(response.nama_siswa);
                            $('#nisn_siswa').html(response.nisn_siswa);
                            $('.s_nisn').val(response.nisn_siswa);
                        }
                    });

                    $("#modalAddCatatan").modal('show');
                }
            }
        });
    };
    
    function validateformAddPrestasi() {
        $.ajax({
            url: "<?= site_url('Prestasi/save') ?>",
            method: "post",
            data: $("#formAddPrestasi").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.pre_jenisprestasi){
                        $('#pre_jenisprestasi').addClass('is-invalid');
                        $('.errorpre_jenisprestasi').html(response.error.pre_jenisprestasi);
                        return false;
                    }else{
                        $('#pre_jenisprestasi').removeClass('is-invalid');
                    }
                    
                    if(response.error.pre_keterangan){
                        $('#pre_keterangan').addClass('is-invalid');
                        $('.errorAddpre_keterangan').html(response.error.pre_keterangan);
                        return false;
                    }else{
                        $('#pre_keterangan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    $("#modalAddPrestasi").modal('hide');
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Rapor/catatan') ?>",
                        data: {
                            id: response.nisn_siswa
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $('#table_pkl').html(response.pkl);
                            $('#table_ekstrakurikuler').html(response.eskul);
                            $('#table_prestasi').html(response.prestasi);
                            $('#nama_siswa').html(response.nama_siswa);
                            $('#nisn_siswa').html(response.nisn_siswa);
                            $('.s_nisn').val(response.nisn_siswa);
                        }
                    });

                    $("#modalAddCatatan").modal('show');
                }
            }
        });
    };
    
    
    $(document).ready(function(){

        //modal
        $('.btn-add-pkl').on('click',function(){
            $("#modalAddPKL").modal('show');
        });
        $('.btn-add-eskul').on('click',function(){
            $("#modalAddEskul").modal('show');
        });
        $('.btn-add-prestasi').on('click',function(){
            $("#modalAddPrestasi").modal('show');
        });


        $('.btn-add-import').on('click',function(){

            $("#modalFormAddImport").modal('show');
        });
        $('.btn-add-matapelajaran').on('click',function(){

            $("#modalAddMatapelajaran").modal('show');
        });
        $('.btn-update-kehadiran').on('click',function(){

            $("#modalUpdateKehadiran").modal('show');
        });
        $('.btn-view-catatan').on('click',function(){
            var id = $(this).data('id');
            var kelas = $(this).data('kelas');
            $.ajax({
                type: "POST",
                url: "<?= base_url('Rapor/catatan') ?>",
                data: {
                    id: id,
                    kelas: kelas
                },
                dataType: "JSON",
                success: function(response) {
                    $('#table_pkl').html(response.pkl);
                    $('#table_ekstrakurikuler').html(response.eskul);
                    $('#table_prestasi').html(response.prestasi);
                    $('#nama_siswa').html(response.nama_siswa);
                    $('#nisn_siswa').html(response.nisn_siswa);
                    $('.s_nisn').val(response.nisn_siswa);
                    $('.id_kelas').val(response.id_kelas);
                }

            });

            $("#modalAddCatatan").modal('show');
        });
        $('.btn-delete-mapel').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_mapel').text(dataNama);

            var id = $(this).data('id');
            $('#d_id_mapel').val(id);

            $('#modalFormDeleteMapel').modal('show');
        });
    });
</script>

<?= $this->endSection(); ?>