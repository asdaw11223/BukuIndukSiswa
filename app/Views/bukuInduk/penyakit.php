<div class="dt-responsive table-responsive">
    <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>Jenis Penyakit</th>
                <th>Kelas</th>
                <th>Tahun</th>
                <th>Lama Sakit</th>
                <th>Keterangan</th>
                <th class=" text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($penyakit as $j) : ?>
            <tr>
                <td class="w-23"><?= $no++; ?></td>
                <td><?= $j['p_jenispenyakit'] ?></td>
                <td><?= $j['p_kelas'] ?></td>
                <td><?= $j['p_tahun'] ?></td>
                <td><?= $j['p_lamasakit'] ?></td>
                <td><?= $j['p_keterangan'] ?></td>
                <td class="w-120 text-center">
                    <button type="button" class="btn-edit btn-update-penyakit" data-id="<?= $j['id_penyakit']; ?>" data-jenis="<?= $j['p_jenispenyakit']; ?>" data-kelas="<?= $j['p_kelas']; ?>" data-tahun="<?= $j['p_tahun']; ?>" data-lamasakit="<?= $j['p_lamasakit']; ?>" data-keterangan="<?= $j['p_keterangan']; ?>" data-nisn="<?= $j['s_NISN']; ?>" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                    <button type="button" class="btn-delete btn-delete-penyakit"  data-id="<?= $j['id_penyakit']; ?>" data-jenis="<?= $j['p_jenispenyakit']; ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Jenis Penyakit</th>
                <th>Kelas</th>
                <th>Tahun</th>
                <th>Lama Sakit</th>
                <th>Keterangan</th>
                <th class=" text-center">Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Delete Penyakit-->
<form action="javascript:void(0)" method="post" name="formDeletePenyakit" id="formDeletePenyakit" onsubmit="return validateFormDeletePenyakit()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeletePenyakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Penyakit <span class="d_jenispenyakit"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_penyakit" name="d_id_penyakit">
                    <div class="m-footer d-flex">
                        <button type="button" class="fly" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL UPDATE PENYAKIT -->
<form action="javascript:void(0)" method="post" name="formUpdatePenyakit" id="formUpdatePenyakit" onsubmit="return validateFormUpdatePenyakit()">
<?= csrf_field(); ?>
<div class="modal fade" id="modalFormUpdatePenyakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="u_p_jenispenyakit" class="form-label">Jenis Penyakit</label>
                    <input type="hidden" class="form-control" id="u_id_penyakit" name="u_id_penyakit">
                    <input type="hidden" class="form-control" id="u_s_nisn" name="u_s_nisn">
                    <input type="text" class="form-control" id="u_p_jenispenyakit" name="u_p_jenispenyakit">
                    <div class="invalid-feedback erroru_p_jenispenyakit"></div>
                </div>
                <div class="mb-3">
                    <label for="u_p_kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="u_p_kelas" name="u_p_kelas">
                    <div class="invalid-feedback erroru_p_kelas"></div>
                </div>
                <div class="mb-3">
                    <label for="u_p_tahun" class="form-label">Tahun</label>
                    <input type="text" class="form-control" id="u_p_tahun" name="u_p_tahun">
                    <div class="invalid-feedback erroru_p_tahun"></div>
                </div>
                <div class="mb-3">
                    <label for="u_p_lamasakit" class="form-label">Lama Sakit</label>
                    <input type="text" class="form-control" id="u_p_lamasakit" name="u_p_lamasakit">
                    <div class="invalid-feedback erroru_p_lamasakit"></div>
                </div>
                <div class="mb-3">
                    <label for="u_p_keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="u_p_keterangan" name="u_p_keterangan" rows="3"></textarea>
                    <div class="invalid-feedback erroru_p_keterangan"></div>
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
    
    function validateFormUpdatePenyakit() {
        $.ajax({
            url: "<?= site_url('Penyakit/update') ?>",
            method: "post",
            data: $("#formUpdatePenyakit").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.u_p_jenispenyakit){
                        $('#u_p_jenispenyakit').addClass('is-invalid');
                        $('.erroru_p_jenispenyakit').html(response.error.u_p_jenispenyakit);
                        return false;
                    }else{
                        $('#u_p_jenispenyakit').removeClass('is-invalid');
                    }

                    if(response.error.u_p_kelas){
                        $('#u_p_kelas').addClass('is-invalid');
                        $('.erroru_p_kelas').html(response.error.u_p_kelas);
                        return false;
                    }else{
                        $('#u_p_kelas').removeClass('is-invalid');
                    }
                    
                    if(response.error.u_p_tahun){
                        $('#u_p_tahun').addClass('is-invalid');
                        $('.erroru_p_tahun').html(response.error.u_p_tahun);
                        return false;
                    }else{
                        $('#u_p_tahun').removeClass('is-invalid');
                    }
                    
                    if(response.error.u_p_lamasakit){
                        $('#u_p_lamasakit').addClass('is-invalid');
                        $('.erroru_p_lamasakit').html(response.error.u_p_lamasakit);
                        return false;
                    }else{
                        $('#u_p_lamasakit').removeClass('is-invalid');
                    }
                    
                    if(response.error.u_p_keterangan){
                        $('#u_p_keterangan').addClass('is-invalid');
                        $('.erroru_p_keterangan').html(response.error.u_p_keterangan);
                        return false;
                    }else{
                        $('#u_p_keterangan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    $('#modalFormUpdatePenyakit').modal('hide');
                    RefreshTable();
                }
            }
        });
    };

    function validateFormDeletePenyakit() {
        $.ajax({
            url: "<?= site_url('Penyakit/delete') ?>",
            method: "post",
            data: $("#formDeletePenyakit").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    alert("Data gagal dihapus");

                }else if(response.berhasil){
                    alert("Data berhasil dihapus");
                    $('#modalFormDeletePenyakit').modal('hide');
                    RefreshTable();
                }
            }
        });
    };
    
    $('.btn-update-penyakit').on('click',function(){
            
        var id = $(this).data('id');
        var jenis = $(this).data('jenis');
        var tahun = $(this).data('tahun');
        var kelas = $(this).data('kelas');
        var lamasakit = $(this).data('lamasakit');
        var keterangan = $(this).data('keterangan');
        var nisn = $(this).data('nisn');
        $('#u_id_penyakit').val(id);
        $('#u_p_jenispenyakit').val(jenis);
        $('#u_p_tahun').val(tahun);
        $('#u_p_kelas').val(kelas);
        $('#u_p_lamasakit').val(lamasakit);
        $('#u_p_keterangan').text(keterangan);
        $('#u_s_nisn').val(nisn);


        $('#modalFormUpdatePenyakit').modal('show');
    });
    
    $('.btn-delete-penyakit').on('click',function(){
            
        var dataNama = $(this).data('jenis');
        $('.d_jenispenyakit').text(dataNama);

        var id = $(this).data('id');
        $('#d_id_penyakit').val(id);

        $('#modalFormDeletePenyakit').modal('show');
    });

</script>