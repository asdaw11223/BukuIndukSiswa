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
                    <button type="button" class="btn btn-add-kelas" data-bs-toggle="modal">Tambah Kelas</button>
                </div>
                <!-- <hr class="dark horizontal my-0"> -->
                <div class="content">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th class=" text-center">Aksi</th>
                                        <th>Nama Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($kelas as $k) : ?>
                                        <tr>
                                            
                                            <td class="w-23"><?= $no++; ?></td>
                                            <td class="w-120 text-center">
                                                <a href="daftar-siswa/<?= $k['id_kelas']; ?>" class="btn-view btn-view-kelas" title="View"><span class="material-symbols-outlined">demography</span></a>
                                                <button type="button" class="btn-edit btn-update-kelas" data-id="<?= $k['id_kelas']; ?>" data-nama="<?= $k['nama_kelas']; ?>" data-tahunajaran="<?= $k['id_tahunajaran']; ?>" data-jurusann="<?= $k['id_jurusan']; ?>" data-bs-toggle="modal" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                                                <button type="button" class="btn-delete btn-delete-kelas"  data-id="<?= $k['id_kelas']; ?>" data-nama="<?= $k['nama_kelas']; ?>" data-bs-toggle="modal" title="Delete"><span class="material-symbols-outlined">delete</span></button>
                                            </td>
                                            <td><?= $k['nama_kelas'] ?></td>
                                            <td><?= $k['nama_tahunajaran'] ?></td>
                                            <td><?= $k['nama_jurusan'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th class=" text-center">Aksi</th>
                                        <th>Nama Kelas</th>
                                        <th>Tahun Ajaran</th>
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

<!-- Modal ADD -->
<form action="javascript:void(0)" method="post" name="formAddkelas" id="formAddkelas" onsubmit="return validateFormAddkelas()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama kelas</label>
                        <input type="text" class="form-control" placeholder="Nama Kelas" name="nama_kelas" id="nama_kelas">
                        <div class="invalid-feedback errorAddNama"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tahunajaran" class="form-label">Tahun Ajaran</label>
                        <select class="form-select" aria-label="Default select example" name="tahunajaran" id="tahunajaran">
                            <option value="" selected>Pilih Tahun Ajaran</option>
                            <?php $no=1; foreach ($tahunAjaran as $j) : ?>
                            <option value="<?= $j['id_tahunajaran']?>"><?= $j['nama_tahunajaran']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errorAddTahunAjaran"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                            <option value="" selected>Pilih Jurusan</option>
                            <?php $no=1; foreach ($jurusan as $t) : ?>
                            <option value="<?= $t['id_jurusan']?>"><?= $t['nama_jurusan']?></option>
                            <?php endforeach; ?>
                        </select>        
                        <div class="invalid-feedback errorAddJurusan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat/ Kelas</label>
                        <select class="form-select" aria-label="Default select example" name="tingkat" id="tingkat">
                            <option value="" selected>Pilih Tingkat</option>
                        </select>
                        <div class="invalid-feedback errorAddTingkat"></div>
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

<!-- Edit -->
<form action="javascript:void(0)" method="post" name="formEditKelas" id="formEditKelas" onsubmit="return validateFormEditKelas()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormUpdateKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="u_nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="u_nama_kelas" name="u_nama_kelas">
                        <input type="hidden" class="form-control" id="l_nama_kelas" name="l_nama_kelas">
                        <input type="hidden" class="form-control" id="u_id_kelas" name="u_id_kelas">
                        <div class="invalid-feedback errorUpdateNama"></div>
                    </div>
                    <div class="mb-3">
                        <label for="u_tahunajaran" class="form-label">Tahun Ajaran</label>
                        <select class="form-select" aria-label="Default select example" name="u_tahunajaran" id="u_tahunajaran">
                            <option value="" selected>Pilih Tahun Ajaran</option>
                            <?php $no=1; foreach ($tahunAjaran as $j) : ?>
                            <option value="<?= $j['id_tahunajaran']?>"><?= $j['nama_tahunajaran']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errorUpdateTahunAjaran"></div>
                    </div>
                    <div class="mb-3">
                        <label for="u_jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" aria-label="Default select example" name="u_jurusan" id="u_jurusan">
                            <option value="" selected>Pilih Jurusan</option>
                            <?php $no=1; foreach ($jurusan as $t) : ?>
                            <option value="<?= $t['id_jurusan']?>"><?= $t['nama_jurusan']?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errorUpdateJurusan"></div>
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

<!-- Delete -->
<form action="javascript:void(0)" method="post" name="formDeleteKelas" id="formDeleteKelas" onsubmit="return validateFormDeleteKelas()">
<?= csrf_field(); ?>
    <div class="modal delete fade" id="modalFormDeleteKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center mb-3">
                    <span class="material-symbols-outlined">close</span>
                    <div class="m-text mb-4">
                        <p>Apakah anda yakin akan menghapus kelas <span class="d_nama_kelas"></span>? proses ini tidak dapat di kembalikan</p>
                    </div>
                    <input type="hidden" class="form-control" id="d_id_kelas" name="d_id_kelas">
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

    function validateFormAddkelas() {
        $.ajax({
            url: "<?= site_url('Kelas/save') ?>",
            method: "post",
            data: $("#formAddkelas").serialize(),
            dataType: "json",
            success: function(response) {

                if (response.error) {

                    if (response.error.nama_kelas) {
                        $('#nama_kelas').addClass('is-invalid');
                        $('.errorAddNama').html(response.error.nama_kelas);
                        return false;
                    } else {
                        $('#nama_kelas').removeClass('is-invalid');
                    }
                    
                    if (response.error.tahunmasuk) {
                        $('#tahunmasuk').addClass('is-invalid');
                        $('.errorAddTahunMasuk').html(response.error.tahunmasuk);
                        return false;
                    } else {
                        $('#tahunmasuk').removeClass('is-invalid');
                    }

                    if (response.error.tahunajaran) {
                        $('#tahunajaran').addClass('is-invalid');
                        $('.errorAddTahunAjaran').html(response.error.tahunajaran);
                        return false;
                    } else {
                        $('#tahunajaran').removeClass('is-invalid');
                    }

                    if (response.error.jurusan) {
                        $('#jurusan').addClass('is-invalid');
                        $('.errorAddJurusan').html(response.error.jurusan);
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
    
    function validateFormEditKelas() {
        $.ajax({
            url: "<?= site_url('Kelas/update') ?>",
            method: "post",
            data: $("#formEditKelas").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    if(response.error.u_nama_kelas){
                        $('#u_nama_kelas').addClass('is-invalid');
                        $('.errorUpdateNama').html(response.error.u_nama_kelas);
                        return false;
                    }else{
                        $('#u_nama_kelas').removeClass('is-invalid');
                    }

                    if (response.error.u_tahunajaran) {
                        $('#u_tahunajaran').addClass('is-invalid');
                        $('.errorUpdateTahunAjaran').html(response.error.u_tahunajaran);
                        return false;
                    } else {
                        $('#u_tahunajaran').removeClass('is-invalid');
                    }

                    if (response.error.u_jurusan) {
                        $('#u_jurusan').addClass('is-invalid');
                        $('.errorUpdateJurusan').html(response.error.u_jurusan);
                        return false;
                    } else {
                        $('#u_jurusan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil diubah");
                    window.location.reload();
                }
            }
        });
    };
    
    function validateFormDeleteKelas() {
        $.ajax({
            url: "<?= site_url('Kelas/delete') ?>",
            method: "post",
            data: $("#formDeleteKelas").serialize(),
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

    <?php foreach($kelas as $k) : ?>
        function validateFormUbahKelas<?= $k['id_kelas'] ?>() {
            $.ajax({
                url: "<?= site_url('Kelas/ubahKelas/'. $k['id_kelas'] .'') ?>",
                method: "post",
                data: $("#formUbahKelas<?= $k['id_kelas'] ?>").serialize(),
                dataType: "json",
                success:function (response) {
                    
                    if(response.berhasil){
                        alert("Data berhasil diubah");
                        window.location.reload();
                    }
                }
            });
        };
    <?php endforeach; ?>
    
    $(document).ready(function(){
        
        $('#jurusan').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Kelas/getTingkat') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#tingkat').html(response.data);
                }

            });
        });

        //modal
        
        $('.btn-add-kelas').on('click',function(){

            $("#modalFormAddKelas").modal('show');
        });
        
        $('.btn-update-kelas').on('click',function(){

            const id = $(this).data('id');
            var nama = $(this).data('nama');
            var semester = $(this).data('semester');
            const tahunajaran = $(this).data('tahunajaran');
            const jurusan = $(this).data('jurusann');
            $('#u_id_kelas').val(id);
            $('#u_nama_kelas').val(nama);
            $('#u_tahunajaran').val(tahunajaran);
            $('#u_jurusan').val(jurusan);
            $('#l_nama_kelas').val(nama);

            $("#modalFormUpdateKelas").modal('show');
        });

        $('.btn-delete-kelas').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_kelas').text(dataNama);

            const id = $(this).data('id');
            $('#d_id_kelas').val(id);

            $('#modalFormDeleteKelas').modal('show');
        });

    });

</script>

<?= $this->endSection(); ?>