<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header for-header p-3 pt-2" style="padding: 15px 1.5rem 15px !important; background-color: #6777ef; border-radius: 12px 12px 0 0; color:#ffffff;">
                    Pilih Kelas
                </div>
                <div class="content">
                    <div class="card-block">

                    <form action="" method="post">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                                    <option value>Pilih Jurusan</option>
                                    <?php foreach($jurusan as $ta) : ?>
                                        <option value="<?= $ta['id_jurusan'] ?>"><?= $ta['nama_jurusan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="jurusan" class="form-label">Tingkat</label>
                                <select class="form-select" aria-label="Default select example" name="tingkat" id="tingkat">
                                    <option value>Pilih Tingkat</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" aria-label="Default select example" name="kelas" id="kelas">
                                    <option value>Pilih Kelas</option>
                                </select>
                            </div>  
                            <div class="col-md-12">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-add-siswa" style="width: 100%;">
                                Tampilkan
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>

        <?php if($kelas != null ) : ?>
        <div class="col-md-12 mt-3">
            <div class="card mb-2">
                <div class="card-header for-header p-3 pt-2">
                    Daftar Siswa
                </div>
                <div class="content">
                    <div class="card-block">
                        <div class="text-cover p-2 pt-2">
                            <?php foreach($kelas as $k) : ?>
                            <h6>Kelas : <?= $k['nama_kelas']?></h6>
                            <h6>Jurusan : <?= $k['nama_jurusan']?></h6>
                            <h6>Tahun Ajaran : <?= $k['nama_tahunajaran']?></h6>
                            <?php endforeach ?>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="jurusan" class="form-label">Matapelajaran</label>
                            <select class="form-select" aria-label="Default select example" name="filter" id="filter">
                                <option value="all">Tampil Semua</option>
                                <?php foreach($mapel as $ta) : ?>
                                    <option value="<?= $ta['id_matapelajaran'] ?>"><?= $ta['nama_matapelajaran'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

<form action="javascript:void(0)" method="post" name="formAddNilai" id="formAddNilai" onsubmit="return validateFormAddNilai()">
<?= csrf_field(); ?>

                        <div class="btn-cover p-3 pt-2 d-flex" style="padding-left: 0 !important;">
                            <button type="submit" class="btn btn-add-import" style="margin: 0px 5px;">Simpan</button>
                            <button type="button" class="btn green btn-add-import" style="margin: 0px 5px;" data-bs-toggle="modal">Import Nilai</button>
                        </div>

                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th rowspan="3">No.</th>
                                        <th rowspan="3">NISN</th>
                                        <th rowspan="3">Nama Siswa</th>
                                        <?php foreach($mapel as $mp) : ?>
                                        <th colspan="8" class="text-center"><?= $mp['nama_matapelajaran'] ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <?php foreach($mapel as $mp) : ?>
                                        <th colspan="4" class="text-center">Nilai Pengetahuan</th>
                                        <th colspan="4" class="text-center">Nilai Keterampilan</th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <?php foreach($mapel as $mp) : ?>
                                        <th style="padding-right: 50px;">KB</th>
                                        <th style="padding-right: 50px;">Angka</th>
                                        <th style="padding-right: 50px;">Predikat</th>
                                        <th style="padding-right: 50px;">Deskripsi Matapelajaran</th>
                                        <th style="padding-right: 50px;">KB</th>
                                        <th style="padding-right: 50px;">Angka</th>
                                        <th style="padding-right: 50px;">Predikat</th>
                                        <th style="padding-right: 50px;">Deskripsi Matapelajaran</th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($daftarSiswaKelas as $n) : ?>
                                    <tr>
                                        <td class="w-23"><?= $no++; ?></td>
                                        <td><?= $n['s_NISN'] ?></td>
                                        <td><?= $n['s_namalengkap'] ?>
                                            <input type="hidden" class="form-control" value="<?= $n['id_kelas'] ?>" name="id_kelas">
                                            <input type="hidden" class="form-control" value="<?= $mp['id_tingkat'] ?>" name="id_tingkat">
                                        </td>
                                        
                                        <input type="hidden" class="form-control" value="<?= $n['id_daftarsiswakelas'] ?>" name="id_dsk_<?= $mp['id_matapelajaran'] ?>">
                                        <input type="hidden" class="form-control" value="<?= $mp['nama_matapelajaran'] ?>" name="nama_mapel_<?= $mp['id_matapelajaran'] ?>">
                                        <input type="hidden" class="form-control" value="<?= $mp['id_matapelajaran'] ?>" name="id_mapel_<?= $mp['id_matapelajaran'] ?>">
                                        
                                        <?php if($nilai != null) :
                                         foreach($nilai as $dsk) : ?>
                                            <?php if($dsk['id_daftarsiswakelas'] == $n['id_daftarsiswakelas']) : ?>
                                                <td>
                                            <input type="hidden" class="form-control" value="<?= $dsk['id_nilai'] ?>" name="id_<?= $dsk['id_nilai'] ?>">
                                                    <input type="text" class="form-control" id="np_kb_<?= $mp['id_matapelajaran'] ?>" name="np_kb_<?= $mp['id_matapelajaran'] ?>" value="<?= $dsk['np_kb'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="np_angka_<?= $mp['id_matapelajaran'] ?>" name="np_angka_<?= $mp['id_matapelajaran'] ?>" value="<?= $dsk['np_angka'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="np_predikat_<?= $mp['id_matapelajaran'] ?>" name="np_predikat_<?= $mp['id_matapelajaran'] ?>" value="<?= $dsk['np_predikat'] ?>">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="np_deskripsi_<?= $mp['id_matapelajaran'] ?>" name="np_deskripsi_<?= $mp['id_matapelajaran'] ?>" rows="1"><?= $dsk['np_deskripsi'] ?></textarea>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="nk_kb_<?= $mp['id_matapelajaran'] ?>" name="nk_kb_<?= $mp['id_matapelajaran'] ?>" value="<?= $dsk['nk_kb'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="nk_angka_<?= $mp['id_matapelajaran'] ?>" name="nk_angka_<?= $mp['id_matapelajaran'] ?>" value="<?= $dsk['nk_angka'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="nk_predikat_<?= $mp['id_matapelajaran'] ?>" name="nk_predikat_<?= $mp['id_matapelajaran'] ?>" value="<?= $dsk['nk_predikat'] ?>">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="nk_deskripsi_<?= $mp['id_matapelajaran'] ?>" name="nk_deskripsi_<?= $mp['id_matapelajaran'] ?>"rows="1"><?= $dsk['nk_deskripsi'] ?></textarea>
                                                </td>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                        
                                    </tr>
                                    <?php else :
                                        foreach($mapel as $mp) :  ?>
                                                <td>
                                                    <input type="hidden" class="form-control" value="" name="id_nilai">
                                                    <input type="text" class="form-control" id="np_kb_<?= $mp['id_matapelajaran'] ?>" name="np_kb_<?= $mp['id_matapelajaran'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="np_angka_<?= $mp['id_matapelajaran'] ?>" name="np_angka_<?= $mp['id_matapelajaran'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="np_predikat_<?= $mp['id_matapelajaran'] ?>" name="np_predikat_<?= $mp['id_matapelajaran'] ?>">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="np_deskripsi_<?= $mp['id_matapelajaran'] ?>" name="np_deskripsi_<?= $mp['id_matapelajaran'] ?>" rows="1"></textarea>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="nk_kb_<?= $mp['id_matapelajaran'] ?>" name="nk_kb_<?= $mp['id_matapelajaran'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="nk_angka_<?= $mp['id_matapelajaran'] ?>" name="nk_angka_<?= $mp['id_matapelajaran'] ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="nk_predikat_<?= $mp['id_matapelajaran'] ?>" name="nk_predikat_<?= $mp['id_matapelajaran'] ?>">
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="nk_deskripsi_<?= $mp['id_matapelajaran'] ?>" name="nk_deskripsi_<?= $mp['id_matapelajaran'] ?>"rows="1"></textarea>
                                                </td>

                                        <?php endforeach;
                                     endif; ?>


                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">NISN</th>
                                        <th rowspan="2">Nama Siswa</th>
                                        <?php foreach($mapel as $mp) : ?>
                                        <th>KB</th>
                                        <th>Angka</th>
                                        <th>Predikat</th>
                                        <th>Deskripsi</th>
                                        <th>KB</th>
                                        <th>Angka</th>
                                        <th>Predikat</th>
                                        <th>Deskripsi</th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <?php foreach($mapel as $mp) : ?>
                                        <th colspan="4" class="text-center">Nilai Pengetahuan</th>
                                        <th colspan="4" class="text-center">Nilai Keterampilan</th>
                                        <?php endforeach; ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                            <button type="submit" class="btn btn-add-import" style="margin: 0px 5px;">Simpan</button>
</form>
            </div>
        </div>
        <?php endif ?>
    </div>

</section>

<script>
    
    function validateFormAddNilai() {
        $.ajax({
            url: "<?= site_url('Nilai/addNilai') ?>",
            method: "post",
            data: $("#formAddNilai").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    window.location.reload();
                }
            }
        });
    };

    $(document).ready(function() {
        
        $('#jurusan').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Nilai/jurusan') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#tingkat').html(response.data);
                }

            });
        });

        $('#tingkat').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Nilai/kelas') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#kelas').html(response.data);
                }

            });
        });
        
        $('#filter').change(function() {
            var id = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?= base_url('Nilai/jurusan') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#tingkat').html(response.data);
                }

            });
        });
    });
    
</script>

<?= $this->endSection(); ?>