<div class="dt-responsive table-responsive">
    <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th rowspan="2">Tahun Ajaran</th>
                <th rowspan="2">Kelas</th>
                <th rowspan="2">Semester</th>
                <th colspan="3" class="text-center">Tidak Hadir</th>
                <th rowspan="2" class="text-center">Aksi</th>
            </tr>
            <tr>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alfa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kehadiran as $k) : ?>
            <tr>
                <td><?= $k['nama_tahunajaran'] ?></td>
                <td><?= $k['nama_kelas'] ?></td>
                <td><?= $k['kh_semester'] ?></td>
                <td><?= $k['kh_sakit'] ?></td>
                <td><?= $k['kh_izin'] ?></td>
                <td><?= $k['kh_alpa'] ?></td>
                <td class="w-120 text-center">
                    <button type="button" class="btn-edit btn-update-kehadiran" data-id="<?= $k['id_kehadiran']; ?>" data-kelas="<?= $k['id_kelas']; ?>" data-semester="<?= $k['kh_semester']; ?>" data-sakit="<?= $k['kh_sakit']; ?>" data-izin="<?= $k['kh_izin']; ?>"  data-alfa="<?= $k['kh_alpa']; ?>"  data-nisn="<?= $k['s_NISN']; ?>" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                    <button type="button" class="btn-delete btn-delete-kehadiran"  data-id="<?= $k['id_kehadiran']; ?>" data-kelas="<?= $k['id_kelas']; ?>" data-semester="<?= $k['kh_semester'] ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alfa</th>
                <th class="text-center">Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Delete Penyakit-->
<form action="javascript:void(0)" method="post" name="formDeleteKehadiran" id="formDeleteKehadiran" onsubmit="return validateFormDeleteKehadiran()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteKehadiran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Kehadiran Semester <span class="d_kh_semester"></span> Kelas <span class="d_idwd_kelas"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_Kehadiran" name="d_id_Kehadiran">
                    <div class="m-footer d-flex">
                        <button type="button" class="fly" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL UPDATE KEHADIRAN -->
<form action="javascript:void(0)" method="post" name="formUpdateKehadiran" id="formUpdateKehadiran" onsubmit="return validateFormUpdateKehadiran()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormUpdateKehadiran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kehadiran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="u_id_kelas" class="form-label for-header">Kelas</label>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="u_id_kehadiran" name="u_id_kehadiran">
                                    <select class="form-select" aria-label="Default select example" name="u_id_kelas" id="u_id_kelas">
                                        
                                        <option selected>Pilih Kelas</option>
                                        <?php foreach($search_kelas as $sk) : ?>
                                            <option value="<?= $sk['id_kelas']; ?>"><?= $sk['nama_kelas']; ?></option>
                                        <?php endforeach ?>
                                    
                                    </select>
                                    <input type="hidden" class="form-control" id="u_k_s_nisn" name="u_k_s_nisn">
                                    <div class="invalid-feedback erroru_id_kelas"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="u_kh_semester" class="form-label for-header">Semester</label>
                                    <select class="form-select" aria-label="Default select example" name="u_kh_semester" id="u_kh_semester">
                                        
                                        <option selected>Pilih Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    
                                    </select>
                                    <div class="invalid-feedback erroru_kh_semester"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="u_kh_sakit" class="form-label for-header">Tidak Hadir</label>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="u_kh_sakit" class="form-label">Sakit</label>
                                    <input type="number" class="form-control" id="u_kh_sakit" name="u_kh_sakit">
                                    <div class="invalid-feedback erroru_kh_sakit"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="u_kh_izin" class="form-label">Ijin</label>
                                    <input type="number" class="form-control" id="u_kh_izin" name="u_kh_izin">
                                    <div class="invalid-feedback erroru_kh_izin"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="u_kh_alfa" class="form-label">Alpa</label>
                                    <input type="number" class="form-control" id="u_kh_alfa" name="u_kh_alfa">
                                    <div class="invalid-feedback erroru_kh_alfa"></div>
                                </div>
                            </div>     

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                    <button class="btn " type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    
    function validateFormUpdateKehadiran() {
        $.ajax({
            url: "<?= site_url('Kehadiran/update') ?>",
            method: "post",
            data: $("#formUpdateKehadiran").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.u_idwd_kelas){
                        $('#u_idwd_kelas').addClass('is-invalid');
                        $('.erroru_idwd_kelas').html(response.error.u_idwd_kelas);
                        return false;
                    }else{
                        $('#u_idwd_kelas').removeClass('is-invalid');
                    }
                    
                    if(response.error.u_kh_semester){
                        $('#u_kh_semester').addClass('is-invalid');
                        $('.erroru_kh_semester').html(response.error.u_kh_semester);
                        return false;
                    }else{
                        $('#u_kh_semester').removeClass('is-invalid');
                    }


                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    $('#modalFormUpdateKehadiran').modal('hide');
                    RefreshTable();
                }
            }
        });
    };

    function validateFormDeleteKehadiran() {
        $.ajax({
            url: "<?= site_url('Kehadiran/delete') ?>",
            method: "post",
            data: $("#formDeleteKehadiran").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    alert("Data gagal dihapus");

                }else if(response.berhasil){
                    alert("Data berhasil dihapus");
                    $('#modalFormDeleteKehadiran').modal('hide');
                    RefreshTable();
                }
            }
        });
    };
    
    $('.btn-update-kehadiran').on('click',function(){
            
        var id = $(this).data('id');
        var kelas = $(this).data('kelas');
        var semester = $(this).data('semester');
        var sakit = $(this).data('sakit');
        var izin = $(this).data('izin');
        var alfa = $(this).data('alfa');
        var nisn = $(this).data('nisn');

        $('#u_id_kehadiran').val(id);
        $('#u_id_kelas').val(kelas);
        $('#u_kh_semester').val(semester);
        $('#u_kh_sakit').val(sakit);
        $('#u_kh_izin').val(izin);
        $('#u_kh_alfa').val(alfa);
        $('#u_k_s_nisn').val(nisn);


        $('#modalFormUpdateKehadiran').modal('show');
    });
    
    $('.btn-delete-kehadiran').on('click',function(){
            
        var dataNama = $(this).data('kelas');
        $('.d_idwd_kelas').text(dataNama);

        var semester = $(this).data('semester');
        $('.d_kh_semester').text(semester);

        var id = $(this).data('id');
        $('#d_id_Kehadiran').val(id);

        $('#modalFormDeleteKehadiran').modal('show');
    });

</script>