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
                    <button type="button" class="btn btn-add-jurusan" data-bs-toggle="modal">
                    Tambah Data
                    </button>
                </div>
                <!-- <hr class="dark horizontal my-0"> -->
                <div class="content">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Jurusan</th>
                                        <th class=" text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($jurusan as $j) : ?>
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                        <td><?= $j['nama_jurusan'] ?></td>
                                        <td class="w-120 text-center">
                                            <button type="button" class="btn-edit btn-update-jurusan" data-id="<?= $j['id_jurusan']; ?>" data-nama="<?= $j['nama_jurusan']; ?>" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                                            <button type="button" class="btn-delete btn-delete-jurusan"  data-id="<?= $j['id_jurusan']; ?>" data-nama="<?= $j['nama_jurusan']; ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Jurusan</th>
                                        <th class=" text-center">Aksi</th>
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

<!-- Modal -->
<!-- Add -->
<form action="javascript:void(0)" method="post" name="formAddJurusan" id="formAddJurusan" onsubmit="return validateformAddJurusan()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddJurusan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Jurusan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan">
                    <div class="invalid-feedback errorAddNama">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Edit -->
<form action="javascript:void(0)" method="post" name="formEditJurusan" id="formEditJurusan" onsubmit="return validateFormEditJurusan()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormUpdateJurusan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Jurusan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="u_nama_jurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" class="form-control" id="u_nama_jurusan" name="u_nama_jurusan">
                    <input type="hidden" class="form-control" id="l_nama_jurusan" name="l_nama_jurusan">
                    <input type="hidden" class="form-control" id="u_id_jurusan" name="u_id_jurusan">
                    <div class="invalid-feedback errorUbahNama">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete -->
<form action="javascript:void(0)" method="post" name="formDeleteJurusan" id="formDeleteJurusan" onsubmit="return validateFormDeleteJurusan()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteJurusan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus jurusan <span class="d_nama_jurusan"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_jurusan" name="d_id_jurusan">
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
    
    //validasi
    function validateformAddJurusan() {
        $.ajax({
            url: "<?= site_url('Jurusan/save') ?>",
            method: "post",
            data: $("#formAddJurusan").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.nama_jurusan){
                        $('#nama_jurusan').addClass('is-invalid');
                        $('.errorAddNama').html(response.error.nama_jurusan);
                        return false;
                    }else{
                        $('#nama_jurusan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };
    
    function validateFormEditJurusan() {
        $.ajax({
            url: "<?= site_url('Jurusan/update') ?>",
            method: "post",
            data: $("#formEditJurusan").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.u_nama_jurusan){
                        $('#u_nama_jurusan').addClass('is-invalid');
                        $('.errorUbahNama').html(response.error.u_nama_jurusan);
                        return false;
                    }else{
                        $('#u_nama_jurusan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    window.location.reload();
                }
            }
        });
    };
    
    function validateFormDeleteJurusan() {
        $.ajax({
            url: "<?= site_url('Jurusan/delete') ?>",
            method: "post",
            data: $("#formDeleteJurusan").serialize(),
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

        $('.btn-add-jurusan').on('click',function(){

            $("#modalFormAddJurusan").modal('show');
        });
        
        $('.btn-update-jurusan').on('click',function(){

            const id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#u_id_jurusan').val(id);
            $('#u_nama_jurusan').val(nama);
            $('#l_nama_jurusan').val(nama);

            $("#modalFormUpdateJurusan").modal('show');
        });

        $('.btn-delete-jurusan').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_jurusan').text(dataNama);

            const id = $(this).data('id');
            $('#d_id_jurusan').val(id);

            $('#modalFormDeleteJurusan').modal('show');
        });

    });

</script>

<?= $this->endSection(); ?>