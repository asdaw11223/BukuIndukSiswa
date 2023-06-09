
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-3" id="in-nilai">
            
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
                                        <option value="<?= $id_mapel[$i] ?>"><?= $nama_mapel[$i] ?></option>
                                    <?php endfor ?>
                                </select>
                                <button type="submit" class="btn btn-add-import mt-2" style="margin: 0px 0px; width: 100%;">Filter</button>
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
                                    <button type="submit" class="btn btn-add-import" style="margin: 0px 5px;">Simpan</button>
                                </div>
                            </div>
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">No.</th>
                                            <th rowspan="3">NISN</th>
                                            <th rowspan="3">Nama Siswa</th>
                                            <?php for($i = 0; $i < count($array); $i++) : ?>
                                                <th colspan="8" class="text-center"><?= $array[$i] ?></th>
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
                                            <td><?= $s['s_NISN'] ?></td>
                                            <td><?= $s['s_namalengkap'] ?></td>
                                            
                                            <?php foreach($nilai as $n) : ?>
                                            <?php if($s['s_NISN'] == $n['s_NISN']) : ?>
                                            <td>
                                                <input type="hidden" class="form-control"
                                                name="id_nilai<?= $n['id_nilai']?>" value="<?= $n['id_nilai'] ?>">
                                                <input type="hidden" class="form-control"
                                                name="id_kelas" value="<?= $n['id_kelas'] ?>">
                                                <input type="hidden" class="form-control"
                                                name="semester" value="<?= $semester?>">

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
                                    <button type="submit" class="btn btn-add-import" style="margin: 0px 5px;">Simpan</button>
                                </div>
                            </div>

                        </form>

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
        //modal
        $('.btn-add-matapelajaran').on('click',function(){

            $("#modalAddMatapelajaran").modal('show');
        });
    });
</script>

<?= $this->endSection(); ?>