<div class="dt-responsive table-responsive">
    <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Beasiswa</th>
                <th>Tahun Beasiswa</th>
                <th>Dari</th>
                <th class=" text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($beasiswa as $j) : ?>
            <tr>
                <td class="w-23"><?= $no++; ?></td>
                <td><?= $j['s_namabeasiswa'] ?></td>
                <td><?= $j['s_tahunbeasiswa'] ?></td>
                <td><?= $j['s_beasiswadari'] ?></td>
                <td class="w-120 text-center">
                    <button type="button" class="btn-edit btn-update-beasiswa" data-id="<?= $j['id_beasiswa']; ?>" data-nama="<?= $j['s_namabeasiswa']; ?>" data-tahun="<?= $j['s_tahunbeasiswa']; ?>" data-dari="<?= $j['s_beasiswadari']; ?>"  data-nisn="<?= $j['s_NISN']; ?>" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                    <button type="button" class="btn-delete btn-delete-beasiswa"  data-id="<?= $j['id_beasiswa']; ?>" data-nama="<?= $j['s_namabeasiswa']; ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Nama Beasiswa</th>
                <th>Tahun Beasiswa</th>
                <th>Dari</th>
                <th class=" text-center">Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Delete Beasiswa-->
<form action="javascript:void(0)" method="post" name="formDeleteBeasiswa" id="formDeleteBeasiswa" onsubmit="return validateFormDeleteBeasiswa()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteBeasiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Beasiswa <span class="d_namabeasiswa"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_beasiswa" name="d_id_beasiswa">
                    <div class="m-footer d-flex">
                        <button type="button" class="fly" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL UPDATE Beasiswa -->
<form action="javascript:void(0)" method="post" name="formUpdateBeasiswa" id="formUpdateBeasiswa" onsubmit="return validateFormUpdateBeasiswa()">
<?= csrf_field(); ?>
<div class="modal fade" id="modalFormUpdateBeasiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="u_s_namabeasiswa" class="form-label">Nama Beasiswa</label>
                    <input type="hidden" class="form-control" id="u_id_beasiswa" name="u_id_beasiswa">
                    <input type="hidden" class="form-control" id="ub_s_nisn" name="ub_s_nisn">
                    <input type="text" class="form-control" id="u_s_namabeasiswa" name="u_s_namabeasiswa">
                    <div class="invalid-feedback erroru_s_namabeasiswa"></div>
                </div>
                <div class="mb-3">
                    <label for="u_s_tahunbeasiswa" class="form-label">Tahun Beasiswa</label>
                    <input type="text" class="form-control" id="u_s_tahunbeasiswa" name="u_s_tahunbeasiswa">
                    <div class="invalid-feedback erroru_s_tahunbeasiswa"></div>
                </div>
                <div class="mb-3">
                    <label for="u_s_beasiswadari" class="form-label">Beasiswa Dari</label>
                    <input type="text" class="form-control" id="u_s_beasiswadari" name="u_s_beasiswadari">
                    <div class="invalid-feedback erroru_s_beasiswadari"></div>
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
    
    function validateFormUpdateBeasiswa() {
        $.ajax({
            url: "<?= site_url('Beasiswa/update') ?>",
            method: "post",
            data: $("#formUpdateBeasiswa").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.u_s_namabeasiswa){
                        $('#u_s_namabeasiswa').addClass('is-invalid');
                        $('.erroru_s_namabeasiswa').html(response.error.u_s_namabeasiswa);
                        return false;
                    }else{
                        $('#u_s_namabeasiswa').removeClass('is-invalid');
                    }

                    if(response.error.u_s_tahunbeasiswa){
                        $('#u_s_tahunbeasiswa').addClass('is-invalid');
                        $('.erroru_s_tahunbeasiswa').html(response.error.u_s_tahunbeasiswa);
                        return false;
                    }else{
                        $('#u_s_tahunbeasiswa').removeClass('is-invalid');
                    }
                    
                    if(response.error.u_s_beasiswadari){
                        $('#u_s_beasiswadari').addClass('is-invalid');
                        $('.erroru_s_beasiswadari').html(response.error.u_s_beasiswadari);
                        return false;
                    }else{
                        $('#u_s_beasiswadari').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    $('#modalFormUpdateBeasiswa').modal('hide');
                    RefreshTable();
                }
            }
        });
    };

    function validateFormDeleteBeasiswa() {
        $.ajax({
            url: "<?= site_url('Beasiswa/delete') ?>",
            method: "post",
            data: $("#formDeleteBeasiswa").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    alert("Data gagal dihapus");

                }else if(response.berhasil){
                    alert("Data berhasil dihapus");
                    $('#modalFormDeleteBeasiswa').modal('hide');
                    RefreshTable();
                }
            }
        });
    };
    
    $('.btn-update-beasiswa').on('click',function(){
            
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var tahun = $(this).data('tahun');
        var dari = $(this).data('dari');
        var nisn = $(this).data('nisn');
        $('#u_id_beasiswa').val(id);
        $('#u_s_namabeasiswa').val(nama);
        $('#u_s_tahunbeasiswa').val(tahun);
        $('#u_s_beasiswadari').val(dari);
        $('#ub_s_nisn').val(nisn);


        $('#modalFormUpdateBeasiswa').modal('show');
    });
    
    $('.btn-delete-beasiswa').on('click',function(){
            
        var dataNama = $(this).data('nama');
        $('.d_namabeasiswa').text(dataNama);

        var id = $(this).data('id');
        $('#d_id_beasiswa').val(id);

        $('#modalFormDeleteBeasiswa').modal('show');
    });

</script>