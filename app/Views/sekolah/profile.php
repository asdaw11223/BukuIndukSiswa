<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    table{
        width: 100%;
        border: transparent;
        line-height: 35px;
    }
</style>
<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
    <button type="button" class="btn btn-edit-profile" data-bs-toggle="modal">Ubah Profile</button>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                </div>
                <!-- <hr class="dark horizontal my-0"> -->
                <div class="content">
                    <div class="row">
                        <div class="card-block">
                            <div class="col-md-12">
                                <div id="isi-editor">
                                        <?= $profile['nama_profile'] ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal ADD -->
<form action="Profile/update" method="post">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormEditProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-body">
                            <input type="hidden" name="id_profile" id="id_profile" value="<?= $profile['id_profile'] ?>">
                            <textarea name="nama_profile" id="nama_profile" cols="30" rows="10"><?= $profile['nama_profile'] ?></textarea>
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


<script>
    ClassicEditor
        .create( document.querySelector( '#nama_profile' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>

    $(document).ready(function(){
        
        $('.btn-edit-profile').on('click',function(){

            $("#modalFormEditProfile").modal('show');
        });

    });
</script>


<?= $this->endSection(); ?>