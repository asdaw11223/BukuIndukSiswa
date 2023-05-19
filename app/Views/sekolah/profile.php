<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
                    <button type="button" class="btn btn-edit-profile" data-bs-toggle="modal">Tambah Kelas</button>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <h4>Edit Profile Sekolah</h4>
                </div>
                <!-- <hr class="dark horizontal my-0"> -->
                <div class="content">
                    <div class="card-block">
                        <div id="isi-editor"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal ADD -->
<form action="javascript:void(0)" method="post" name="formAddkelas" id="formAddkelas" onsubmit="return validateFormAddkelas()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormEditProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-body">

                    <div id="editor"></div>

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
        .create( document.querySelector( '#editor' ) )
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