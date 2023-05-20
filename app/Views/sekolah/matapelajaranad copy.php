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
                                    <label for="kelas" class="form-label">Jurusan</label>
                                    <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                                        <option value>Pilih Jurusan</option>
                                        <?php foreach($jurusan as $ja) : ?>
                                        <option value="<?= $ja['id_jurusan'] ?>"><?= $ja['nama_jurusan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-add-siswa" style="width: 100% !important;">
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

        <?php foreach($tingkat as $tg) : ?>
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
                                    <?php $no=1; foreach($matapelajaran as $m) : ?>
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


<!-- Modal -->
<div class="modal fade" id="modalDaftarMapel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Daftar Matapelajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-add-mapel" data-bs-toggle="modal" style="margin-bottom: 10px;">Tambah Mapel</button>
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
                            <?php $no=1; foreach($mapel as $mp) : ?>
                            <tr>
                                <td class="w-23"><?= $no++; ?></td>
                                <td><?= $mp['nama_mapel'] ?></td>
                                <td><?= $mp['nama_kelompok'] ?></td>
                                <td class="w-120 text-center">
                                    <button type="button" class="btn-edit btn-update-mapel mlr5" title="Edit" data-bs-toggle="modal" data-id="<?= $mp['id_mapel']; ?>" data-nama="<?= $mp['nama_mapel']; ?>" data-kel="<?= $mp['nama_kelompok']; ?>" ><span class="material-symbols-outlined">edit</span></a>
                                    <button type="button" class="btn-delete btn-delete-mapel mlr5"  data-bs-toggle="modal" title="Delete" data-id="<?= $mp['id_mapel']; ?>" data-nama="<?= $mp['nama_mapel']; ?>" data-kel="<?= $mp['nama_kelompok']; ?>" ><span class="material-symbols-outlined">delete</span></button>
                                </td>
                            </tr>
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

<!-- ADD MATAPELAJARAN -->
<?php foreach($tingkat as $tg) : ?>
<form action="javascript:void(0)" method="post" name="formAddMatapelajaran<?= $tg['id_tingkat'] ?>" id="formAddMatapelajaran<?= $tg['id_tingkat'] ?>" onsubmit="return validateFormAddMatapelajaran<?= $tg['id_tingkat'] ?>()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalAddMatapelajaran<?= $tg['id_tingkat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Matapelajaran <?= $tg['nama_tingkat']?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <input type="hidden" class="form-control" id="a_id_tingkat" name="a_id_tingkat" value="<?= $tg['id_tingkat']?>">

                            <div class="mt-3">
                                <label for="" class="form-label for-header">Kelompok A</label>
                            </div>
                            <?php foreach($mapel as $mp) : ?>
                                <?php if($mp['nama_kelompok'] == "Kelompok A") : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mapel<?= $mp['id_mapel']?><?= $tg['id_tingkat']?>" name="mapels[]" value="<?= $mp['nama_mapel'] ?>" checked>
                                    <input type="hidden" class="form-control" id="a_nama_kelompok<?= $mp['nama_mapel']?>" name="kelompok[]" value="<?= $mp['nama_kelompok']?>">
                                    <label class="form-check-label" for="mapel<?= $mp['id_mapel']?>"><?= $mp['nama_mapel'] ?></label>
                                </div>
                                <?php endif ?>
                            <?php endforeach ?>

                            <div class="mt-3">
                                <label for="" class="form-label for-header">Kelompok B</label>
                            </div>
                            <?php foreach($mapel as $mp) : ?>
                                <?php if($mp['nama_kelompok'] == "Kelompok B") : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mapel<?= $mp['id_mapel']?><?= $tg['id_tingkat']?>" name="mapels[]" value="<?= $mp['nama_mapel'] ?>" checked>
                                    <input type="hidden" class="form-control" id="a_nama_kelompok<?= $mp['nama_mapel']?>" name="kelompok[]" value="<?= $mp['nama_kelompok']?>">
                                    <label class="form-check-label" for="mapel<?= $mp['id_mapel']?>"><?= $mp['nama_mapel'] ?></label>
                                </div>
                                <?php endif ?>
                            <?php endforeach ?>
                                
                            <div class="mt-3">
                                <label for="" class="form-label for-header">Kelompok C</label>
                            </div>
                            <?php foreach($mapel as $mp) : ?>
                                <?php if($mp['nama_kelompok'] == "Kelompok C") : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mapel<?= $mp['id_mapel']?><?= $tg['id_tingkat']?>" name="mapels[]" value="<?= $mp['nama_mapel'] ?>">
                                    <label class="form-check-label" for="mapel<?= $mp['id_mapel']?>"><?= $mp['nama_mapel'] ?></label>
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
<?php endforeach; ?>

<!-- Delete MATAPELAJARAN -->
<form action="javascript:void(0)" method="post" name="formDeleteMatapelajaran" id="formDeleteMatapelajaran" onsubmit="return validateFormDeleteMatapelajaran()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteMatapelajaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">

                    <span class="material-symbols-outlined">close</span>
                    
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Matapelajaran <span class="d_nama_matapelajaran"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>

                    <input type="hidden" class="form-control" id="d_id_matapelajaran" name="d_id_matapelajaran">

                    <div class="m-footer d-flex">
                        <button type="button" class="fly" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn">Hapus</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<!-- ADD MAPEL -->
<form action="javascript:void(0)" method="post" name="formAddMapel" id="formAddMapel" onsubmit="return validateFormAddMapel()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalAddMapel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_mapel" class="form-label">Nama Matapelajaran</label>
                                <input type="text" class="form-control" placeholder="Nama Matapelajaran" name="nama_mapel" id="nama_mapel">
                                <div class="invalid-feedback errorNamaMapel"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_kelompok" class="form-label">Kelompok Matapelajaran</label>
                                <select class="form-select" aria-label="Default select example" name="nama_kelompok" id="nama_kelompok">
                                    <option value="" selected>Pilih Kelompok</option>
                                    <option value="Kelompok A">Kelompok A</option>
                                    <option value="Kelompok B">Kelompok B</option>
                                    <option value="Kelompok C">Kelompok C</option>
                                </select>
                                <div class="invalid-feedback errorKelMapel"></div>
                            </div>
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

<!-- Edit MAPEL -->
<form action="javascript:void(0)" method="post" name="formUpdateMapel" id="formUpdateMapel" onsubmit="return validateFormUpdateMapel()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormUpdateMapel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Matapelajaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    
                        <div class="mb-3">
                            <label for="u_nama_mapel" class="form-label">Nama Matapelajaran</label>
                            <input type="text" class="form-control" id="u_nama_mapel" name="u_nama_mapel">
                            <input type="hidden" class="form-control" id="u_id_mapel" name="u_id_mapel">
                            <div class="invalid-feedback errorUbahMapel"></div>
                        </div>

                        <div class="col-md-12">
                            <div class="mt-3">
                                <label for="u_nama_kelompok" class="form-label">Kelompok Matapelajaran</label>
                                <select class="form-select" aria-label="Default select example" name="u_nama_kelompok" id="u_nama_kelompok">
                                    <option value="" selected>Pilih Kelompok</option>
                                    <option value="Kelompok A">Kelompok A</option>
                                    <option value="Kelompok B">Kelompok B</option>
                                    <option value="Kelompok C">Kelompok C</option>
                                </select>
                                <div class="invalid-feedback errorUbahKelompok"></div>
                            </div>
                        </div>
                        
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn">Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>

<!-- Delete MAPEL -->
<form action="javascript:void(0)" method="post" name="formDeleteMapel" id="formDeleteMapel" onsubmit="return validateFormDeleteMapel()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteMapel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">

                    <span class="material-symbols-outlined">close</span>
                    
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Matapelajaran <span class="d_nama_kelompok"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>

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

<script>
    
    var id;

    function validateFormFilterMatkul() {
        $.ajax({
            url: "<?= site_url('Tingkat/filter') ?>",
            method: "post",
            data: $("#formFilterMatkul").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    
                }else if(response.berhasil){
                    RefreshTable();
                }
            }
        });
    };
    
    <?php foreach($tingkat as $tg) : ?>
    function validateFormAddMatapelajaran<?= $tg['id_tingkat'] ?>() {
        $.ajax({
            url: "<?= site_url('Matapelajaran/savematapelajaran') ?>",
            method: "post",
            data: $("#formAddMatapelajaran<?= $tg['id_tingkat'] ?>").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.lulus){
                    alert("Data berhasil lulus");
                    window.location.reload();
                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };
    <?php endforeach; ?>

    function validateFormDeleteMatapelajaran() {
        $.ajax({
            url: "<?= site_url('Matapelajaran/deletematapelajaran') ?>",
            method: "post",
            data: $("#formDeleteMatapelajaran").serialize(),
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

    function validateFormAddMapel() {
        $.ajax({
            url: "<?= site_url('Matapelajaran/savemapel') ?>",
            method: "post",
            data: $("#formAddMapel").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    
                    if (response.error.nama_mapel) {
                        $('#nama_mapel').addClass('is-invalid');
                        $('.errorNamaMapel').html(response.error.nama_mapel);
                        return false;
                    } else {
                        $('#nama_mapel').removeClass('is-invalid');
                    }

                    if (response.error.nama_kelompok) {
                        $('#nama_kelompok').addClass('is-invalid');
                        $('.errorKelMapel').html(response.error.nama_kelompok);
                        return false;
                    } else {
                        $('#nama_kelompok').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    RefreshTable();
                    document.getElementById("formAddMapel").reset();
                    $("#modalAddMapel").modal('hide');
                    $("#modalDaftarMapel").modal('show');

                }
            }
        });
    };
        
    function validateFormUpdateMapel() {
        $.ajax({
            url: "<?= site_url('Matapelajaran/updatemapel') ?>",
            method: "post",
            data: $("#formUpdateMapel").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    
                    if(response.error.u_nama_mapel){
                        $('#u_nama_mapel').addClass('is-invalid');
                        $('.errorUbahMapel').html(response.error.u_nama_mapel);
                        return false;
                    }else{
                        $('#u_nama_mapel').removeClass('is-invalid');
                    }

                    if(response.error.u_nama_kelompok){
                        $('#u_nama_kelompok').addClass('is-invalid');
                        $('.errorUbahKelompok').html(response.error.u_nama_kelompok);
                        return false;
                    }else{
                        $('#u_nama_kelompok').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    window.location.reload();
                }
            }
        });
    };
    
    function validateFormDeleteMapel() {
        $.ajax({
            url: "<?= site_url('Matapelajaran/deletemapel') ?>",
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
    
    $(document).ready(function(){
        //modal

        $('.btn-daftar-mapel').on('click',function(){

            $("#modalDaftarMapel").modal('show');
        });

        $('.btn-add-mapel').on('click',function(){

            $("#modalAddMapel").modal('show');
        });
        
        $('.btn-update-mapel').on('click',function(){

            const id = $(this).data('id');
            var nama = $(this).data('nama');
            var kel = $(this).data('kel');
            $('#u_id_mapel').val(id);
            $('#u_nama_mapel').val(nama);
            $('#u_nama_kelompok').val(kel);

            $("#modalFormUpdateMapel").modal('show');
        });

        $('.btn-delete-mapel').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_kelompok').text(dataNama);

            const id = $(this).data('id');
            $('#d_id_mapel').val(id);

            $('#modalFormDeleteMapel').modal('show');
        });
        
        <?php foreach($tingkat as $tg) : ?>
            $('.btn-add-<?= $tg['id_tingkat'] ?>').on('click',function(){

                $("#modalAddMatapelajaran<?= $tg['id_tingkat'] ?>").modal('show');
            });
        <?php endforeach; ?>
        
        $('.btn-delete-matapelajaran').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_matapelajaran').text(dataNama);

            const id = $(this).data('id');
            $('#d_id_matapelajaran').val(id);

            $('#modalFormDeleteMatapelajaran').modal('show');
        });

    });

</script>

<?= $this->endSection(); ?>