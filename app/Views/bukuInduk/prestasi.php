<div class="dt-responsive table-responsive">
    <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jenis Prestasi</th>
                <th>Keterangan</th>
                <th class=" text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($prestasi as $j) : ?>
            <tr>
                <td class="w-23"><?= $no++; ?></td>
                <td><?= $j['pre_jenisprestasi'] ?></td>
                <td><?= $j['pre_keterangan'] ?></td>
                <td class="w-120 text-center">
                    <button type="button" class="btn-edit btn-update-prestasi" data-id="<?= $j['id_prestasi']; ?>" data-jenis="<?= $j['pre_jenisprestasi']; ?>" data-keterangan="<?= $j['pre_keterangan']; ?>"  data-nisn="<?= $j['s_NISN']; ?>" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                    <button type="button" class="btn-delete btn-delete-prestasi"  data-id="<?= $j['id_prestasi']; ?>" data-jenis="<?= $j['pre_jenisprestasi']; ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Jenis Prestasi</th>
                <th>Keterangan</th>
                <th class=" text-center">Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Delete PRESTASI-->
<form action="javascript:void(0)" method="post" name="formDeletePrestasi" id="formDeletePrestasi" onsubmit="return validateFormDeletePrestasi()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeletePrestasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Prestasi <span class="d_jenisprestasi"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_prestasi" name="d_id_prestasi">
                    <div class="m-footer d-flex">
                        <button type="button" class="fly" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL UPDATE PRESTASI -->
<form action="javascript:void(0)" method="post" name="formUpdatePrestasi" id="formUpdatePrestasi" onsubmit="return validateFormUpdatePrestasi()">
<?= csrf_field(); ?>
<div class="modal fade" id="modalFormUpdatePrestasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="u_pre_jenisprestasi" class="form-label">Jenis Prestasi</label>
                    <input type="hidden" class="form-control" id="u_id_prestasi" name="u_id_prestasi">
                    <input type="hidden" class="form-control" id="upre_s_nisn" name="upre_s_nisn">
                    <input type="text" class="form-control" id="u_pre_jenisprestasi" name="u_pre_jenisprestasi">
                    <div class="invalid-feedback erroru_pre_jenisprestasi"></div>
                </div>
                <div class="mb-3">
                    <label for="u_pre_keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="u_pre_keterangan" name="u_pre_keterangan" rows="3"></textarea>
                    <div class="invalid-feedback erroru_pre_keterangan"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                <button class="btn " type="submit">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    function validateFormUpdatePrestasi() {
        $.ajax({
            url: "<?= site_url('Prestasi/update') ?>",
            method: "post",
            data: $("#formUpdatePrestasi").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.u_pre_jenisprestasi){
                        $('#u_pre_jenisprestasi').addClass('is-invalid');
                        $('.erroru_pre_jenisprestasi').html(response.error.u_pre_jenisprestasi);
                        return false;
                    }else{
                        $('#u_pre_jenisprestasi').removeClass('is-invalid');
                    }
                    
                    if(response.error.u_pre_keterangan){
                        $('#u_pre_keterangan').addClass('is-invalid');
                        $('.erroru_pre_keterangan').html(response.error.u_pre_keterangan);
                        return false;
                    }else{
                        $('#u_pre_keterangan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    $('#modalFormUpdatePrestasi').modal('hide');
                    RefreshTable();
                }
            }
        });
    };

    function validateFormDeletePrestasi() {
        $.ajax({
            url: "<?= site_url('Prestasi/delete') ?>",
            method: "post",
            data: $("#formDeletePrestasi").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    alert("Data gagal dihapus");

                }else if(response.berhasil){
                    alert("Data berhasil dihapus");
                    $('#modalFormDeletePrestasi').modal('hide');
                    RefreshTable();
                }
            }
        });
    };
    
    $('.btn-update-prestasi').on('click',function(){
            
        var id = $(this).data('id');
        var jenis = $(this).data('jenis');
        var keterangan = $(this).data('keterangan');
        var nisn = $(this).data('nisn');
        $('#u_id_prestasi').val(id);
        $('#u_pre_jenisprestasi').val(jenis);
        $('#u_pre_keterangan').text(keterangan);
        $('#upre_s_nisn').val(nisn);


        $('#modalFormUpdatePrestasi').modal('show');
    });
    
    $('.btn-delete-prestasi').on('click',function(){
            
        var dataNama = $(this).data('jenis');
        $('.d_jenisprestasi').text(dataNama);

        var id = $(this).data('id');
        $('#d_id_prestasi').val(id);

        $('#modalFormDeletePrestasi').modal('show');
    });

</script>