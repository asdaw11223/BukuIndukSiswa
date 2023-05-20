<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
    
    <button type="button" class="btn btn-daftar-mapel" data-bs-toggle="modal">Daftar</button>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">

        <div class="col-md-12 mt-3">
            <div class="card mb-2">
                <div class="card-header for-header p-3 pt-2">
                </div>
                <div class="content">
                    <div class="card-block">

                        <div class="btn-cover p-3 pt-2 d-flex" style="padding-left: 0 !important;">
                            <button type="button" class="btn btn-add-mapel" data-bs-toggle="modal" style="margin-bottom: 10px; width: 210px; ">
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
                            <?php $no=1; foreach($matapelajaran as $mp) : ?>
                            <tr>
                                <td class="w-23"><?= $no++; ?></td>
                                <td><?= $mp['nama_matapelajaran'] ?></td>
                                <td><?= $mp['nama_kelompok'] ?></td>
                                <td class="w-120 text-center">
                                    <button type="button" class="btn-edit btn-update-mapel mlr5" title="Edit" data-bs-toggle="modal" data-id="<?= $mp['id_matapelajaran']; ?>" data-nama="<?= $mp['nama_matapelajaran']; ?>" data-kel="<?= $mp['nama_kelompok']; ?>" ><span class="material-symbols-outlined">edit</span></a>
                                    <button type="button" class="btn-delete btn-delete-mapel mlr5"  data-bs-toggle="modal" title="Delete" data-id="<?= $mp['id_matapelajaran']; ?>" data-nama="<?= $mp['nama_matapelajaran']; ?>" data-kel="<?= $mp['nama_kelompok']; ?>" ><span class="material-symbols-outlined">delete</span></button>
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

    </div>
</section>

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
                                <label for="nama_matapelajaran" class="form-label">Nama Matapelajaran</label>
                                <input type="text" class="form-control" placeholder="Nama Matapelajaran" name="nama_matapelajaran" id="nama_matapelajaran">
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
                            <label for="u_nama_matapelajaran" class="form-label">Nama Matapelajaran</label>
                            <input type="text" class="form-control" id="u_nama_matapelajaran" name="u_nama_matapelajaran">
                            <input type="hidden" class="form-control" id="u_id_matapelajaran" name="u_id_matapelajaran">
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

<script>
    
    var id;

    function validateFormAddMapel() {
        $.ajax({
            url: "<?= site_url('Matapelajaran/savemapel') ?>",
            method: "post",
            data: $("#formAddMapel").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    
                    if (response.error.nama_matapelajaran) {
                        $('#nama_matapelajaran').addClass('is-invalid');
                        $('.errorNamaMapel').html(response.error.nama_matapelajaran);
                        return false;
                    } else {
                        $('#nama_matapelajaran').removeClass('is-invalid');
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
                    
                    if(response.error.u_nama_matapelajaran){
                        $('#u_nama_matapelajaran').addClass('is-invalid');
                        $('.errorUbahMapel').html(response.error.u_nama_matapelajaran);
                        return false;
                    }else{
                        $('#u_nama_matapelajaran').removeClass('is-invalid');
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
        
        $('.btn-add-mapel').on('click',function(){

            $("#modalAddMapel").modal('show');
        });
        
        $('.btn-update-mapel').on('click',function(){

            const id = $(this).data('id');
            var nama = $(this).data('nama');
            var kel = $(this).data('kel');
            $('#u_id_matapelajaran').val(id);
            $('#u_nama_matapelajaran').val(nama);
            $('#u_nama_kelompok').val(kel);

            $("#modalFormUpdateMapel").modal('show');
        });

        $('.btn-delete-mapel').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_kelompok').text(dataNama);

            const id = $(this).data('id');
            $('#d_id_matapelajaran').val(id);

            $('#modalFormDeleteMapel').modal('show');
        });

    });

</script>

<?= $this->endSection(); ?>