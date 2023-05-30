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
    </div>
    
    <?php if($kelas != null) : ?>
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="col-md-12 mt-3">
                <div class="card mb-2">
                    <div class="card-header for-header p-3 pt-2">
                        <h6><b>Daftar Kelas</b></h6>
                    </div>
                    <div class="content">
                    <?php foreach($tahunajaran as $ta) : ?>
                        <div class="card-header for-header" style="padding-top: 0px!important;">
                            <h6><b><?= $ta['nama_tahunajaran']?></b></h6>
                        </div>
                        <div class="row">
                        <?php foreach($kelas as $k) : ?>
                        <?php if($ta['id_tahunajaran'] == $k['id_tahunajaran']) : ?>
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <div class="card-header p-3 pt-2" style="padding: 1rem 1rem 0rem!important;">
                                        <div class="pt-1">
                                            <p class="text-sm mb-0 text-capitalize">Siswa</p>
                                            <h4 class="mb-0"><?= $k['nama_kelas'] ?></h4>
                                        </div>
                                    </div>
                                    <a href="/nilai/<?= $k['id_kelas']?>" class="link card-footer p-3">
                                        <p class="mb-0">Buka Kelas</p>
                                        <span class="material-symbols-outlined">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>

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