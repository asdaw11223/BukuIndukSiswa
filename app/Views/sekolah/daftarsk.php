<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?> <?= $kelas['nama_kelas'] ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <button type="button" class="btn btn-add-siswa mb-3" data-bs-toggle="modal">
                    Tambah Siswa
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
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Angkatan</th>
                                        <th>Jurusan</th>
                                        <th class=" text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="siswaKelas">
                                    <?php $no=1; foreach($siswa as $s) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $s['s_NISN'] ?></td>
                                        <td><?= $s['s_namalengkap'] ?></td>
                                        <td><?= $s['nama_tahunajaran'] ?></td>
                                        <td><?= $s['nama_jurusan'] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn-view btn-pindah-siswaKelas"  data-daftar="<?= $s['id_daftarsiswakelas'] ?>" data-id="<?= $s['s_NISN'] ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">move_up</span></button>
                                            <button type="button" class="btn-delete btn-delete-siswaKelas"  data-id="<?= $s['id_daftarsiswakelas'] ?>" data-nama="<?= $s['s_namalengkap'] ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Angkatan</th>
                                        <th>Jurusan</th>
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

<!-- PINDAH -->
<form action="javascript:void(0)" method="post" name="formPindah" id="formPindah" onsubmit="return validateFormPindah()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormPindah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pindah Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="u_tahunajaran" class="form-label">Tahun Ajaran</label>
                        <select class="form-select" aria-label="Default select example" name="u_tahunajaran" id="u_tahunajaran">
                            <option value="" selected>Pilih Tahun Ajaran</option>
                            <?php $no=1; foreach ($tahunAjaran as $t) : ?>
                            <option value="<?= $t['id_tahunajaran']?>"><?= $t['nama_tahunajaran']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errorUpdateNama"></div>
                    </div>
                    <div class="mb-3">
                        <label for="u_kelas" class="form-label">Ke Kelas</label>
                        <select class="form-select" aria-label="Default select example" name="u_kelas" id="u_kelas">
                            <option value="" selected>Pilih Kelas</option>
                        </select>
                        <input type="hidden" class="form-control" id="u_NISN" name="u_NISN">
                        <input type="hidden" class="form-control" id="u_daftar" name="u_daftar">
                        <div class="invalid-feedback errorUpdateNama"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn">Pindah</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal ADD Siswa -->
<div class="modal fade" id="modalFormAddSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Siswa Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

        <form action="javascript:void(0)" method="post" name="formFilter" id="formFilter" onsubmit="return validateFormFilter()">
        <?= csrf_field(); ?>

                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                                <option value="" selected>Pilih Jurusan</option>
                                <?php $no=1; foreach ($jurusan as $t) : ?>
                                <option value="<?= $t['id_jurusan']?>"><?= $t['nama_jurusan']?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorAddSJurusan"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tahunmasuk" class="form-label">Tahun Masuk</label>
                            <select class="form-select" aria-label="Default select example" name="tahunmasuk" id="tahunmasuk">
                                <option value="" selected>Pilih Tahun Masuk</option>
                                <?php $no=1; foreach ($tahunAjaran as $t) : ?>
                                <option value="<?= $t['id_tahunajaran']?>"><?= $t['nama_tahunajaran']?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback errorAddSTahun"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <button class="btn" style="width: 100%;" type="submit">Terapkan</button>
                        </div>
                    </div>

        </form>
                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input class="form-control" aria-label="Default select example" name="search" id="search" placeholder="Cari">
                            <div class="invalid-feedback errorAddTingkat"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
        <form action="javascript:void(0)" method="post" name="formAddSiswa" id="formAddSiswa" onsubmit="return validateFormAddSiswa()">
        <?= csrf_field(); ?>

                            <input type="hidden" name="id_kelas" id="id_kelas" value="<?= $kelas['id_kelas'] ?>">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px;">&nbsp;</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addSiswaFilter">
                                            <th colspan="3" class="text-center">Terapkan kategori siswa</th>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                    </div>
                    
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn">Simpan</button>
                </div>

        </form>


        </div>
    </div>
</div>

<!-- Delete -->
<form action="javascript:void(0)" method="post" name="formDeleteSiswaKelas" id="formDeleteSiswaKelas" onsubmit="return validateFormDeleteSiswaKelas()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteSiswaKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus siswa <span class="d_nama_siswa"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_siswa_siswa" name="d_siswa_siswa">
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
    
    var idKelas; 

    function validateFormPindah() {
        $.ajax({
            url: "<?= site_url('Kelas/pindah') ?>",
            method: "post",
            data: $("#formPindah").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.error) {

                    if (response.error.jurusan) {
                        $('#jurusan').addClass('is-invalid');
                        $('.errorAddSJurusan').html(response.error.jurusan);
                        return false;
                    } else {
                        $('#jurusan').removeClass('is-invalid');
                    }

                } else if (response.berhasil) {
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };

    function validateFormAddSiswa() {
        $.ajax({
            url: "<?= site_url('Kelas/addSiswa') ?>",
            method: "post",
            data: $("#formAddSiswa").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.error) {

                    if (response.error.jurusan) {
                        $('#jurusan').addClass('is-invalid');
                        $('.errorAddSJurusan').html(response.error.jurusan);
                        return false;
                    } else {
                        $('#jurusan').removeClass('is-invalid');
                    }
                    
                    if (response.error.tahunmasuk) {
                        $('#tahunmasuk').addClass('is-invalid');
                        $('.errorAddSTahun').html(response.error.tahunmasuk);
                        return false;
                    } else {
                        $('#tahunmasuk').removeClass('is-invalid');
                    }

                } else if (response.berhasil) {
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };

    function validateFormFilter() {
        $.ajax({
            url: "<?= site_url('Kelas/filter') ?>",
            method: "post",
            data: $("#formFilter").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.error) {

                    if (response.error.jurusan) {
                        $('#jurusan').addClass('is-invalid');
                        $('.errorAddSJurusan').html(response.error.jurusan);
                        return false;
                    } else {
                        $('#jurusan').removeClass('is-invalid');
                    }
                    
                    if (response.error.tahunmasuk) {
                        $('#tahunmasuk').addClass('is-invalid');
                        $('.errorAddSTahun').html(response.error.tahunmasuk);
                        return false;
                    } else {
                        $('#tahunmasuk').removeClass('is-invalid');
                    }

                } else if (response.berhasil) {
                    $('#addSiswaFilter').html(response.filter);
                }
            }
        });
    };

    function validateFormDeleteSiswaKelas() {
        $.ajax({
            url: "<?= site_url('Kelas/deleteSiswaKelas') ?>",
            method: "post",
            data: $("#formDeleteSiswaKelas").serialize(),
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
        
        $('#u_tahunajaran').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Kelas/getKelas') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#u_kelas').html(response.data);
                }

            });
        });

        $('.btn-pindah-siswaKelas').on('click',function(){
            
            const daftar = $(this).data('daftar');
            $('#u_daftar').val(daftar);

            const siswa = $(this).data('id');
            $('#u_NISN').val(siswa);
            
            $("#modalFormPindah").modal('show');
        });

        $('.btn-add-siswa').on('click',function(){
            
            $("#modalFormAddSiswa").modal('show');
        });

        $('.btn-delete-siswaKelas').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_siswa').text(dataNama);

            const siswa = $(this).data('id');
            $('#d_siswa_siswa').val(siswa);

            $("#modalFormDeleteSiswaKelas").modal('show');
        });
        
    });

</script>

<?= $this->endSection(); ?>