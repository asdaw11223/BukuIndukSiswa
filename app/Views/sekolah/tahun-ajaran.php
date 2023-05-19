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
                    <button type="button" class="btn btn-add-tahunajaran" data-bs-toggle="modal">
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
                                        <th>Tahun Ajaran</th>
                                        <th class=" text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($tahunajaran as $ta) : ?>
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                        <td><?= $ta['nama_tahunajaran'] ?></td>
                                        <td class="w-120 text-center">
                                            <button type="button" class="btn-edit btn-update-tahunajaran" data-id="<?= $ta['id_tahunajaran']; ?>" data-nama="<?= $ta['nama_tahunajaran']; ?>" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                                            <button type="button" class="btn-delete btn-delete-tahunajaran"  data-id="<?= $ta['id_tahunajaran']; ?>" data-nama="<?= $ta['nama_tahunajaran']; ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tahun Ajaran</th>
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
<form action="javascript:void(0)" method="post" name="formAddTahunAjaran" id="formAddTahunAjaran" onsubmit="return validateformAddTahunAjaran()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddTahunAjaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Tahun Ajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_tahunajaran" class="form-label">Tahun Ajaran</label>
                    <input type="text" class="form-control" name="nama_tahunajaran" id="nama_tahunajaran">
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
<form action="javascript:void(0)" method="post" name="formEditTahunAjaran" id="formEditTahunAjaran" onsubmit="return validateFormEditTahunAjaran()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormUpdateTahunAjaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Tahun Ajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="u_nama_tahunajaran" class="form-label">Nama Tahun Ajaran</label>
                    <input type="text" class="form-control" id="u_nama_tahunajaran" name="u_nama_tahunajaran">
                    <input type="hidden" class="form-control" id="l_nama_tahunajaran" name="l_nama_tahunajaran">
                    <input type="hidden" class="form-control" id="u_id_tahunajaran" name="u_id_tahunajaran">
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
<form action="javascript:void(0)" method="post" name="formDeleteTahunAjaran" id="formDeleteTahunAjaran" onsubmit="return validateFormDeleteTahunAjaran()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteTahunAjaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Tahun Ajaran <span class="d_nama_tahunajaran"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_tahunajaran" name="d_id_tahunajaran">
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
    function validateformAddTahunAjaran() {
        $.ajax({
            url: "<?= site_url('TahunAjaran/save') ?>",
            method: "post",
            data: $("#formAddTahunAjaran").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.nama_tahunajaran){
                        $('#nama_tahunajaran').addClass('is-invalid');
                        $('.errorAddNama').html(response.error.nama_tahunajaran);
                        return false;
                    }else{
                        $('#nama_tahunajaran').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };
    
    function validateFormEditTahunAjaran() {
        $.ajax({
            url: "<?= site_url('TahunAjaran/update') ?>",
            method: "post",
            data: $("#formEditTahunAjaran").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.u_nama_tahunajaran){
                        $('#u_nama_tahunajaran').addClass('is-invalid');
                        $('.errorUbahNama').html(response.error.u_nama_tahunajaran);
                        return false;
                    }else{
                        $('#u_nama_tahunajaran').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    window.location.reload();
                }
            }
        });
    };
    
    function validateFormDeleteTahunAjaran() {
        $.ajax({
            url: "<?= site_url('TahunAjaran/delete') ?>",
            method: "post",
            data: $("#formDeleteTahunAjaran").serialize(),
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

        $('.btn-add-tahunajaran').on('click',function(){

            $("#modalFormAddTahunAjaran").modal('show');
            
        });
        
        $('.btn-update-tahunajaran').on('click',function(){

            const id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#u_id_tahunajaran').val(id);
            $('#u_nama_tahunajaran').val(nama);
            $('#l_nama_tahunajaran').val(nama);

            $("#modalFormUpdateTahunAjaran").modal('show');
        });

        $('.btn-delete-tahunajaran').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_tahunajaran').text(dataNama);

            const id = $(this).data('id');
            $('#d_id_tahunajaran').val(id);

            $('#modalFormDeleteTahunAjaran').modal('show');
        });

    });
    
</script>

<?= $this->endSection(); ?>