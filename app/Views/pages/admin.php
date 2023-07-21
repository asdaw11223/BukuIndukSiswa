<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header for-header">Keterangan Pribadi Siswa</div>
                <div class="content">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td class="bold text-center">No. </td>
                                    <td class="bold">Username</td>
                                    <td class="bold">Email</td>
                                    <td class="bold">Role</td>
                                    <td class="bold text-center">Aksi</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($users as $user) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td><?= $user->name; ?></td>
                                    <td class="text-center">
                                        <?php if($user->userid != user_id()) :?>
                                            <button type="button" class="btn-delete btn-delete-user" data-id="<?= $user->userid; ?>" data-nama="<?= $user->username; ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete -->
<form action="javascript:void(0)" method="post" name="formDeleteUser" id="formDeleteUser" onsubmit="return validateFormDeleteUser()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus User <span class="d_nama_User"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_User" name="d_id_User">
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
    
    function validateFormDeleteUser() {
        $.ajax({
            url: "<?= site_url('Admin/delete') ?>",
            method: "post",
            data: $("#formDeleteUser").serialize(),
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

    
    $('.btn-delete-user').on('click',function(){
            
        var dataNama = $(this).data('nama');
        $('.d_nama_User').text(dataNama);

        const id = $(this).data('id');
        $('#d_id_User').val(id);

        $('#modalFormDeleteUser').modal('show');
    });

</script>

<?= $this->endSection(); ?>