<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2 d-flex">
                    <button type="button" class="btn btn-add-siswa" style="margin: 0px 5px ;" data-bs-toggle="modal">
                    Tambah Siswa
                    </button>
                    <button type="button" class="btn green btn-add-import" style="margin: 0px 5px ;" data-bs-toggle="modal">
                    Import Siswa
                    </button>
                </div>
                <div class="content">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama Peserta Didik</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Angkatan</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($siswa as $s) : ?>
                                    <?php if($s['s_NISN'] == '0000000000') : ?>
                                        <?php else : ?>
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                        <td class="w-120 text-center">
                                            <a href="/siswa/edit/<?= $s['s_NISN'] ?>" class="btn-edit btn-update-siswa" title="Edit"><span class="material-symbols-outlined">edit</span></a>
                                            <button type="button" class="btn-delete btn-delete-siswa"  data-bs-toggle="modal" title="Delete" data-id="<?= $s['id_siswa']; ?>" data-nama="<?= $s['s_namalengkap']; ?>" ><span class="material-symbols-outlined">delete</span></button>
                                        </td>
                                        <td><?= $s['s_NISN'] ?></td>
                                        <td><?= $s['s_namalengkap'] ?></td>
                                        <td>
                                            <?php foreach ($jk as $j) : ?>
                                                <?php if($j['id_jeniskelamin'] == $s['id_jeniskelamin']) : ?>   
                                                    <?= $j['nama_jeniskelamin']; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>    
                                        </td>
                                        <td>
                                            <?php foreach ($tahunajaran as $ta) : ?>
                                                <?php if($ta['id_tahunajaran'] == $s['id_tahunajaran']) : ?>   
                                                    <?= $ta['nama_tahunajaran']; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($jurusan as $j) : ?>
                                                <?php if($j['id_jurusan'] == $s['id_jurusan']) : ?>   
                                                    <?= $j['nama_jurusan']; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama Peserta Didik</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Angkatan</th>
                                        <th>Jurusan</th>
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
<form action="javascript:void(0)" method="post" name="formAddSiswa" id="formAddSiswa" onsubmit="return validateformAddSiswa()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="id_tahunajaran" class="form-label">Tahun Ajaran</label>
                                <select class="form-select" aria-label="Default select example" name="id_tahunajaran" id="id_tahunajaran">
                                    <option value="" selected>Pilih Tahun Ajaran</option>
                                    <?php $no=1; foreach ($tahunajaran as $ta) : ?>
                                    <option value="<?= $ta['id_tahunajaran']?>"><?= $ta['nama_tahunajaran']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback errorAddTahunAjaran"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" aria-label="Default select example" name="id_jurusan" id="id_jurusan">
                                    <option value="" selected>Pilih Jurusan</option>
                                    <?php $no=1; foreach ($jurusan as $jrs) : ?>
                                    <option value="<?= $jrs['id_jurusan']?>"><?= $jrs['nama_jurusan']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback errorAddJurusan"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="s_NISN" class="form-label">NISN</label>
                                <input type="text" class="form-control" placeholder="NISN" name="s_NISN" id="s_NISN" maxlength="10" minlength="10">
                                <div class="invalid-feedback errorAddNISN"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="s_namalengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="s_namalengkap" id="s_namalengkap">
                                <div class="invalid-feedback errorAddNamaLengkap"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_jeniskelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" aria-label="Default select example" name="id_jeniskelamin" id="id_jeniskelamin">
                                    <option value="" selected>Pilih Jenis Kelamin</option>
                                    <?php $no=1; foreach ($jk as $j) : ?>
                                    <option value="<?= $j['id_jeniskelamin']?>"><?= $j['nama_jeniskelamin']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback errorAddJK"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="s_tempatlahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="s_tempatlahir" id="s_tempatlahir">
                                <div class="invalid-feedback errorAddTempatLahir"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="s_tanggallahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="s_tanggallahir" id="s_tanggallahir">
                                <div class="invalid-feedback errorAddTglLahir"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="s_rt" class="form-label">RT</label>
                                <input type="number" class="form-control" id="s_rt" name="s_rt">
                                <div class="invalid-feedback errorAddRT"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="s_rw" class="form-label">RW</label>
                                <input type="number" class="form-control" id="s_rw" name="s_rw">
                                <div class="invalid-feedback errorAddRW"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="siswaAddProv" class="form-label">Provinsi</label>
                                <select class="form-select" aria-label="Default select example" name="siswaAddProv" id="siswaAddProv">
                                    <option value="" selected>Pilih Provinsi</option>
                                    <?php foreach($prov as $p) : ?>
                                        <option value="<?= $p['prov_id']?>" style="text-transform: capitalize;"><?= $p['prov_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback errorAddProv"></div>
                            </div>
                            <div class="mb-3">
                                <label for="siswaAddCity" class="form-label">Kabupaten</label>
                                <select class="form-select" aria-label="Default select example" name="siswaAddCity" id="siswaAddCity">
                                    
                                    <option selected>Pilih Kabupaten</option>

                                </select>
                                <div class="invalid-feedback errorAddCity"></div>
                            </div>
                            <div class="mb-3">
                                <label for="siswaAddDis" class="form-label">Kecamatan</label>
                                <select class="form-select" aria-label="Default select example" name="siswaAddDis" id="siswaAddDis">
                                    
                                    <option selected>Pilih Kecamatan</option>
                                
                                </select>
                                <div class="invalid-feedback errorAddDis"></div>
                            </div>
                            <div class="mb-3">
                                <label for="siswaAddSubdis" class="form-label">Kelurahan</label>
                                <select class="form-select" aria-label="Default select example" name="siswaAddSubdis" id="siswaAddSubdis">
                                    
                                    <option selected>Pilih Kelurahan</option>

                                </select>
                                <div class="invalid-feedback errorAddSubdis"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="s_alamat" class="form-label">Alamat Peserta Didik</label>
                                <textarea class="form-control" id="s_alamat" name="s_alamat" rows="4" value=""></textarea>
                                <div class="invalid-feedback errorAddAlamat"></div>
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
    </div>
</form>

<!-- Modal -->
    <div class="modal fade" id="modalFormAddImport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Import Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('Siswa/import'); ?> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <a href="assets/file/template_siswa.xlsx" class="btn green w-100" download>Download Template</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="id_tahunajaran" class="form-label">Tahun Ajaran</label>
                                <select class="form-select" aria-label="Default select example" name="id_tahunajaran" id="id_tahunajaran">
                                    <option value="" selected>Pilih Tahun Ajaran</option>
                                    <?php $no=1; foreach ($tahunajaran as $ta) : ?>
                                    <option value="<?= $ta['id_tahunajaran']?>"><?= $ta['nama_tahunajaran']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback errorAddTahunAjaran"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="id_jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" aria-label="Default select example" name="id_jurusan" id="id_jurusan">
                                    <option value="" selected>Pilih Jurusan</option>
                                    <?php $no=1; foreach ($jurusan as $jrs) : ?>
                                    <option value="<?= $jrs['id_jurusan']?>"><?= $jrs['nama_jurusan']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback errorAddJurusan"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="file_siswa" class="form-label">File Excel Siswa</label>
                                <input type="file" class="form-control" placeholder="File Excel Siswa" name="file_siswa" id="file_siswa" accept=".xls,.xlsx"> 
                                <div class="invalid-feedback errorAddTglLahir"></div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                        <button class="btn " type="submit">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<!-- Comp -->
<form action="siswa/edit/baru/" method="post" name="formComp" id="formComp">
    <div class="modal delete fade" id="modalFormComp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined" style="color: #2ebd2e;">done</span>
                    <div class="m-text mb-4">
                        <p>Inti Data Siswa Berhasil tersimpan.</p>
                    </div>
                    <div id="nisn_id_place">
                                        
                    </div>
                    <div class="m-footer d-flex" style="flex-direction: column-reverse;">
                        <a href="/siswa" class="fly">Nanti</a>
                        <button type="submit" class="btn" data-id="" style="margin-bottom: 15px; width:200px; background-image: linear-gradient(310deg,#2ebd2e,#2ebd2e);">Lanjut Isi Data Siswa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete -->
<form action="javascript:void(0)" method="post" name="formDeleteSiswa" id="formDeleteSiswa" onsubmit="return validateFormDeleteSiswa()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus Siswa <span class="d_nama_Siswa"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_Siswa" name="d_id_Siswa">
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
    
    function validateformAddSiswa() {
        $.ajax({
            url: "<?= site_url('Siswa/save') ?>",
            method: "post",
            data: $("#formAddSiswa").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.error) {

                    if (response.error.id_tahunajaran) {
                        $('#id_tahunajaran').addClass('is-invalid');
                        $('.errorAddTahunAjaran').html(response.error.id_tahunajaran);
                        return false;
                    } else {
                        $('#id_tahunajaran').removeClass('is-invalid');
                    }

                    if (response.error.id_jurusan) {
                        $('#id_jurusan').addClass('is-invalid');
                        $('.errorAddJurusan').html(response.error.id_jurusan);
                        return false;
                    } else {
                        $('#id_jurusan').removeClass('is-invalid');
                    }

                    if (response.error.s_NISN) {
                        $('#s_NISN').addClass('is-invalid');
                        $('.errorAddNISN').html(response.error.s_NISN);
                        return false;
                    } else {
                        $('#s_NISN').removeClass('is-invalid');
                    }

                    if (response.error.s_namalengkap) {
                        $('#s_namalengkap').addClass('is-invalid');
                        $('.errorAddNamaLengkap').html(response.error.s_namalengkap);
                        return false;
                    } else {
                        $('#s_namalengkap').removeClass('is-invalid');
                    }

                    if (response.error.id_jeniskelamin) {
                        $('#id_jeniskelamin').addClass('is-invalid');
                        $('.errorAddJK').html(response.error.id_jeniskelamin);
                        return false;
                    } else {
                        $('#id_jeniskelamin').removeClass('is-invalid');
                    }

                    if (response.error.s_tempatlahir) {
                        $('#s_tempatlahir').addClass('is-invalid');
                        $('.errorAddTempatLahir').html(response.error.s_tempatlahir);
                        return false;
                    } else {
                        $('#s_tempatlahir').removeClass('is-invalid');
                    }

                    if (response.error.s_tanggallahir) {
                        $('#s_tanggallahir').addClass('is-invalid');
                        $('.errorAddTglLahir').html(response.error.s_tanggallahir);
                        return false;
                    } else {
                        $('#s_tanggallahir').removeClass('is-invalid');
                    }

                    if (response.error.s_rt) {
                        $('#s_rt').addClass('is-invalid');
                        $('.errorAddRT').html(response.error.s_rt);
                        return false;
                    } else {
                        $('#s_rt').removeClass('is-invalid');
                    }

                    if (response.error.s_rw) {
                        $('#s_rw').addClass('is-invalid');
                        $('.errorAddRW').html(response.error.s_rw);
                        return false;
                    } else {
                        $('#s_rw').removeClass('is-invalid');
                    }

                    if (response.error.siswaAddProv) {
                        $('#siswaAddProv').addClass('is-invalid');
                        $('.errorAddProv').html(response.error.siswaAddProv);
                        return false;
                    } else {
                        $('#siswaAddProv').removeClass('is-invalid');
                    }

                    if (response.error.siswaAddCity) {
                        $('#siswaAddCity').addClass('is-invalid');
                        $('.errorAddCity').html(response.error.siswaAddCity);
                        return false;
                    } else {
                        $('#siswaAddCity').removeClass('is-invalid');
                    }

                    if (response.error.siswaAddDis) {
                        $('#siswaAddDis').addClass('is-invalid');
                        $('.errorAddDis').html(response.error.siswaAddDis);
                        return false;
                    } else {
                        $('#siswaAddDis').removeClass('is-invalid');
                    }

                    if (response.error.siswaAddSubdis) {
                        $('#siswaAddSubdis').addClass('is-invalid');
                        $('.errorAddSubdis').html(response.error.siswaAddSubdis);
                        return false;
                    } else {
                        $('#siswaAddSubdis').removeClass('is-invalid');
                    }

                    if (response.error.s_alamat) {
                        $('#s_alamat').addClass('is-invalid');
                        $('.errorAddAlamat').html(response.error.s_alamat);
                        return false;
                    } else {
                        $('#s_alamat').removeClass('is-invalid');
                    }

                } else if (response.berhasil) {
                    alert("Data berhasil disimpan");
                    $("#modalFormAddSiswa").modal('hide');
                    $('#nisn_id_place').html(response.berhasil.data);
                    $('#modalFormComp').modal('show');
                }
            }
        });
    };
    
    function validateFormDeleteSiswa() {
        $.ajax({
            url: "<?= site_url('Siswa/delete') ?>",
            method: "post",
            data: $("#formDeleteSiswa").serialize(),
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
    
    //INPUT ALAMAT
    $(document).ready(function() {
        $('#siswaAddProv').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Siswa/getCity') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#siswaAddCity').html(response.data);
                }

            });
        });

        $('#siswaAddCity').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Siswa/getDis') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#siswaAddDis').html(response.data);
                }

            });
        });

        $('#siswaAddDis').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Siswa/getSubdis') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#siswaAddSubdis').html(response.data);
                }

            });
        });
        
    });

    $(document).ready(function(){
        //modal

        $('.btn-add-siswa').on('click',function(){

            $("#modalFormAddSiswa").modal('show');
        });

        $('.btn-add-import').on('click',function(){

            $("#modalFormAddImport").modal('show');
        });

        $('.btn-delete-siswa').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_Siswa').text(dataNama);

            var id = $(this).data('id');
            $('#d_id_Siswa').val(id);

            $('#modalFormDeleteSiswa').modal('show');
        });

    });

</script>

<?= $this->endSection(); ?>