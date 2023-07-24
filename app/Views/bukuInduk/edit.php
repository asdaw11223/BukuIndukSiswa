<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="javascript:void(0)" method="post" name="formAddSiswa" id="formAddSiswa" onsubmit="return validateFormAddSiswa()" enctype="multipart/form-data">
<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
    
    <button class="btn blue" style="color:#fff !important;" type="submit">Simpan</button>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row">

        <div class="col-lg-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs mb-3 card siswa" id="addSiswa" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa" type="button" role="tab" aria-controls="siswa" aria-selected="true">Siswa</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="alamat-tab" data-bs-toggle="tab" data-bs-target="#alamat" type="button" role="tab" aria-controls="alamat" aria-selected="false">Alamat</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kesehatan-tab" data-bs-toggle="tab" data-bs-target="#kesehatan" type="button" role="tab" aria-controls="kesehatan" aria-selected="false">Kesehatan</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pendidikan-tab" data-bs-toggle="tab" data-bs-target="#pendidikan" type="button" role="tab" aria-controls="pendidikan" aria-selected="false">Pendidikan</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#orangtua" type="button" role="tab" aria-controls="orangtua" aria-selected="false">Orang Tua</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="wali-tab" data-bs-toggle="tab" data-bs-target="#wali" type="button" role="tab" aria-controls="wali" aria-selected="false">Wali</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kepribadian-tab" data-bs-toggle="tab" data-bs-target="#kepribadian" type="button" role="tab" aria-controls="kepribadian" aria-selected="false">Kepribadian</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="prestasi-tab" data-bs-toggle="tab" data-bs-target="#prestasi" type="button" role="tab" aria-controls="prestasi" aria-selected="false">Prestasi</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="kehadiran">
                    <button class="nav-link" id="kehadiran-tab" data-bs-toggle="tab" data-bs-target="#kehadiran" type="button" role="tab" aria-controls="kehadiran" aria-selected="false">Kehadiran</button>
                    <div class="slide"></div>
                </li>
                <li class="nav-item" role="catatan">
                    <button class="nav-link" id="catatan-tab" data-bs-toggle="tab" data-bs-target="#catatan" type="button" role="tab" aria-controls="catatan" aria-selected="false">Lainnya</button>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>
        
        <div class="col-lg-12">
            <div class="alert alert-danger align-items-center t-none errorEditDanger" role="alert">
                <div>An example danger alert with an icon</div>
            </div>
        </div>

        <div class="col-md-12">
            <!-- Tab panes -->
            <div class="tab-content">

                <div class="tab-pane active" id="siswa" role="tabpanel" aria-labelledby="siswa-tab"> 
                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Pribadi Siswa</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="siswa_jk" class="form-label">Tahun Ajaran</label>
                                                <select class="form-select" aria-label="Default select example" name="siswa_jk" id="siswa_jk">
                                                    <option value>Pilih Tahun Ajaran</option>
                                                    <?php foreach($tahunajaran as $jk) : ?>
                                                        <?php if($siswa['id_tahunajaran'] == $jk['id_tahunajaran']) : ?>
                                                            <option value="<?= $jk['id_tahunajaran'] ?>" selected><?= $jk['nama_tahunajaran'] ?></option>
                                                        <?php else: ?>
                                                            <option value="<?= $jk['id_tahunajaran'] ?>"><?= $jk['nama_tahunajaran'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback errorSiswaJK"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_jk" class="form-label">Jurusan</label>
                                                <select class="form-select" aria-label="Default select example" name="siswa_jk" id="siswa_jk">
                                                    <option value>Pilih Jurusan</option>
                                                    <?php foreach($jurusan as $jk) : ?>
                                                        <?php if($siswa['id_jurusan'] == $jk['id_jurusan']) : ?>
                                                            <option value="<?= $jk['id_jurusan'] ?>" selected><?= $jk['nama_jurusan'] ?></option>
                                                        <?php else: ?>
                                                            <option value="<?= $jk['id_jurusan'] ?>"><?= $jk['nama_jurusan'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback errorSiswaJK"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_nisn" class="form-label">Nomor Induk / NISN</label>
                                                <input type="hidden" class="form-control" id="id_siswa" name="id_siswa" value="<?= $siswa['id_siswa'] ?>">
                                                <input type="text" class="form-control" id="siswa_nisn" name="siswa_nisn" value="<?= $siswa['s_NISN'] ?>">
                                                <input type="hidden" class="form-control" id="siswa_nisn_lama" name="siswa_nisn_lama" value="<?= $siswa['s_NISN'] ?>">
                                                <div class="invalid-feedback errorSiswaNisn"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_nl" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="siswa_nl" name="siswa_nl" value="<?= $siswa['s_namalengkap'] ?>">
                                                <div class="invalid-feedback errorSiswaNL"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_np" class="form-label">Nama Panggilan</label>
                                                <input type="text" class="form-control" id="siswa_np" name="siswa_np" value="<?= $siswa['s_namapanggilan'] ?>">
                                                <div class="invalid-feedback errorSiswaNP"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_jk" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" aria-label="Default select example" name="siswa_jk" id="siswa_jk">
                                                    <option value>Pilih Jenis Kelamin</option>
                                                    <?php foreach($jeniskelamin as $jk) : ?>
                                                        <?php if($siswa['id_jeniskelamin'] == $jk['id_jeniskelamin']) : ?>
                                                            <option value="<?= $jk['id_jeniskelamin'] ?>" selected><?= $jk['nama_jeniskelamin'] ?></option>
                                                        <?php else: ?>
                                                            <option value="<?= $jk['id_jeniskelamin'] ?>"><?= $jk['nama_jeniskelamin'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback errorSiswaJK"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_tempatlahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="siswa_tempatlahir" name="siswa_tempatlahir" value="<?= $siswa['s_tempatlahir'] ?>">
                                                <div class="invalid-feedback errorSiswaTempatLahir"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_tgllahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="siswa_tgllahir" name="siswa_tgllahir" value="<?= $siswa['s_tanggallahir'] ?>">
                                                <div class="invalid-feedback errorSiswaTglLahir"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="siswa_foto" class="form-label">Foto</label>
                                                <button type="button" class="btn btn-add-profile w-100 mb-2" data-bs-toggle="modal" data-id="<?= $siswa['s_NISN'] ?>">Tambah Profile</button>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_agama" class="form-label">Agama</label>
                                                <input type="text" class="form-control" id="siswa_agama" name="siswa_agama" value="<?= $siswa['s_agama'] ?>">
                                                <div class="invalid-feedback errorSiswaAgama"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_kewanegaraan" class="form-label">Kewanegaraan</label>
                                                <input type="text" class="form-control" id="siswa_kewanegaraan" name="siswa_kewanegaraan" value="<?= $siswa['s_kewanegaraan'] ?>">
                                                <div class="invalid-feedback errorSiswaKewanegaraan"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_anakke" class="form-label">Anak ke-</label>
                                                <input type="number" class="form-control" id="siswa_anakke" name="siswa_anakke" value="<?= $siswa['s_anakke'] ?>">
                                                <div class="invalid-feedback errorSiswaAnakKe"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswa_anakke" class="form-label">Jumlah Saudara <span class="fz-12">(orang)</span></label>
                                                <div class="row">
                                                    <div class="col-md-4 p-0">
                                                        <label for="siswa_anakke" class="form-label">Kandung</label>
                                                        <input type="number" class="form-control" id="s_kandung" name="s_kandung" value="<?= $siswa['s_kandung'] ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="siswa_anakke" class="form-label">Tiri</label>
                                                        <input type="number" class="form-control" id="s_tiri" name="s_tiri" value="<?= $siswa['s_tiri'] ?>">
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <label for="siswa_anakke" class="form-label">Angkat</label>
                                                        <input type="number" class="form-control" id="s_angkat" name="s_angkat" value="<?= $siswa['s_angkat'] ?>">
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback errorSiswaAnakKe"></div>
                                            </div>
                                            <div class="mb-3">                                                
                                                <label for="siswa_anak" class="form-label">Anak <span class="fz-12">(masih ada/yatim/piatu/yatim piatu)</span></label>
                                                <select class="form-select" aria-label="Default select example" name="siswa_anak" id="siswa_anak">
                                                    <option value>Pilih Opsi</option>
                                                        <option value="Masih Ada" <?php if($siswa['s_anakyp'] == "Masih Ada"){ echo 'selected'; } ?>>Masih Ada</option> 
                                                        <option value="Yatim" <?php if($siswa['s_anakyp'] == "Yatim"){ echo 'selected'; } ?>>Yatim</option>
                                                        <option value="Piatu" <?php if($siswa['s_anakyp'] == "Piatu"){ echo 'selected'; } ?>>Piatu</option>
                                                        <option value="Yatim Piatu" <?php if($siswa['s_anakyp'] == "Yatim Piatu"){ echo 'selected'; } ?>>Yatim Piatu</option>
                                                </select>
                                                <div class="invalid-feedback errorSiswaAnak"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="s_bahasaharian" class="form-label">Bahasa Sehari-hari</label>
                                                <input type="text" class="form-control" id="s_bahasaharian" name="s_bahasaharian" value="<?= $siswa['s_bahasaharian'] ?>">
                                                <div class="invalid-feedback errorSiswaBahasa"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Tempat Tinggal Siswa</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="siswaAddAlamat" class="form-label">Alamat Peserta Didik</label>
                                                <input type="hidden" class="form-control" id="id_alamat" name="id_alamat" value="<?= $alamat['id_alamat'] ?>">
                                                <textarea class="form-control" id="siswaAddAlamat" name="siswaAddAlamat" rows="4"><?= $alamat['s_alamat']; ?></textarea>
                                                <div class="invalid-feedback errorAddAlamat"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaAddRT" class="form-label">RT</label>
                                                <input type="text" class="form-control" id="siswaAddRT" name="siswaAddRT" value="<?= $alamat['s_rt']; ?>">
                                                <div class="invalid-feedback errorAddRT"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaAddRW" class="form-label">RW</label>
                                                <input type="text" class="form-control" id="siswaAddRW" name="siswaAddRW" value="<?= $alamat['s_rw']; ?>">
                                                <div class="invalid-feedback errorAddRW"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaAddProv" class="form-label">Provinsi</label>
                                                <select class="form-select" aria-label="Default select example" name="siswaAddProv" id="siswaAddProv">
                                                    <option value >Pilih Provinsi</option>
                                                    <?php foreach($prov as $p) : ?>
                                                        <?php if($alamat['prov_id'] == $p['prov_id']) : ?>
                                                            <option value="<?= $p['prov_id']?>" style="text-transform: capitalize;" selected><?= $p['prov_name']?></option>
                                                        <?php else: ?>
                                                            <option value="<?= $p['prov_id']?>" style="text-transform: capitalize;"><?= $p['prov_name']?></option>
                                                        <?php endif; ?>
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
                                                <label for="siswaAddNoTelp" class="form-label">No. Telepon</label>
                                                <input type="text" class="form-control" id="siswaAddNoTelp" name="siswaAddNoTelp" value="<?= $alamat['s_telprumah']; ?>">
                                                <div class="invalid-feedback errorAddNoTelp"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaAddTinggalDengan" class="form-label">Selama bersekolah tinggal dengan</label>
                                                <input type="text" class="form-control" id="siswaAddTinggalDengan" name="siswaAddTinggalDengan" value="<?= $alamat['s_tinggal']; ?>">
                                                <div class="invalid-feedback errorAddTinggalDengan"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaAddJarakTinggal" class="form-label">Jarak tempat tinggal ke sekolah</label>
                                                <input type="text" class="form-control" id="siswaAddJarakTinggal" name="siswaAddJarakTinggal" value="<?= $alamat['s_jaraksekolah']; ?>">
                                                <div class="invalid-feedback errorAddJarakTinggal"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaKendaraan" class="form-label">Kesekolah dengan (Jalan kaki/ Kendaraan)</label>
                                                <select class="form-select" aria-label="Default select example" name="siswaKendaraan" id="siswaKendaraan">
                                                    <option value>Pilih Opsi</option>
                                                    <option value="Jalan Kaki" <?php if($alamat['s_kendaraan'] == "Jalan Kaki"){ echo 'selected'; } ?>>Jalan Kaki</option>
                                                    <option value="Kendaraan" <?php if($alamat['s_kendaraan'] == "Kendaraan"){ echo 'selected'; } ?>>Kendaraan</option>
                                                </select>
                                                <div class="invalid-feedback errorAddDengan"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="kesehatan" role="tabpanel" aria-labelledby="kesehatan-tab">
                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Jasmani dan Kesehatan Siswa</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="siswaBBmasuk" class="form-label">Berat Badan Waktu di terima</label>
                                                <input type="hidden" class="form-control" id="id_kesehatan" name="id_kesehatan" value="<?= $kesehatan['id_kesehatan'] ?>">
                                                <input type="number" class="form-control" id="siswaBBmasuk" name="siswaBBmasuk" value="<?= $kesehatan['s_bbterima'] ?>">
                                                <div class="invalid-feedback errorAddBBMasuk"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaBBKeluar" class="form-label">Berat Badan Waktu meninggalkan sekolah</label>
                                                <input type="number" class="form-control" id="siswaBBKeluar" name="siswaBBKeluar" value="<?= $kesehatan['s_bbkeluar'] ?>">
                                                <div class="invalid-feedback errorAddBBKeluar"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="siswaTBMasuk" class="form-label">Tinggi Badan Waktu di terima</label>
                                                <input type="number" class="form-control" id="siswaTBMasuk" name="siswaTBMasuk" value="<?= $kesehatan['s_tbterima'] ?>">
                                                <div class="invalid-feedback errorAddTBMasuk"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="siswaTBKeluar" class="form-label">Tinggi BadanWaktu meninggalkan sekolah</label>
                                                <input type="number" class="form-control" id="siswaTBKeluar" name="siswaTBKeluar" value="<?= $kesehatan['s_tbkeluar'] ?>">
                                                <div class="invalid-feedback errorAddTBKeluar"></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="siswaGolonganDarah" class="form-label">Golongan Darah</label>
                                            <input type="text" class="form-control" id="siswaGolonganDarah" name="siswaGolonganDarah" value="<?= $kesehatan['s_golongandarah'] ?>">
                                            <div class="invalid-feedback errorAddGolonganDarah"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="siswaKelainan" class="form-label">Kelainan jasmani/ lainnya</label>
                                            <textarea class="form-control" name="siswaKelainan" id="siswaKelainan" rows="4"><?= $kesehatan['s_kelainan'] ?></textarea>
                                            <div class="invalid-feedback errorAddKelainan"></div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="Penyakit" class="form-label for-header">Penyakit yang pernah di derita (Sakit Berat yang memerlukan perawatan khusus)</label>
                                            <div class="wrapper-btn d-flex">
                                                <button type="button" class="btn btn-add-penyakit mb-2 m-2" data-bs-toggle="modal" data-id="<?= $siswa['s_NISN'] ?>">Tambah Data</button>
                                                <button type="button" id="refresh-btn" class="btn mb-2 m-2">Refresh Table</button>
                                            </div>
                                            <div id="table_penyakit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Tentang Pendidikan Sebelumnya</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="sp_asalsekolah" class="form-label">Asal SMP/MTs</label>
                                                <input type="hidden" class="form-control" id="id_masuk" name="id_masuk" value="<?= $baru['id_masuk']; ?>">
                                                <input type="text" class="form-control" id="sp_asalsekolah" name="sp_asalsekolah" value="<?= $baru['sp_asalsekolah']; ?>">
                                                <div class="invalid-feedback errorsp_asalsekolah"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sp_tglijasah" class="form-label">Tanggal Ijasah</label>
                                                <input type="date" class="form-control" id="sp_tglijasah" name="sp_tglijasah" value="<?= $baru['sp_tglijasah']; ?>">
                                                <div class="invalid-feedback errorsp_tglijasah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sp_thnskhun" class="form-label">Tahun SKHUN</label>
                                                <input type="text" class="form-control" id="sp_thnskhun" name="sp_thnskhun" value="<?= $baru['sp_thnskhun']; ?>">
                                                <div class="invalid-feedback errorsp_thnskhun"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sp_tglnoijasah" class="form-label">Nomor Ijasah</label>
                                                <input type="text" class="form-control" id="sp_tglnoijasah" name="sp_tglnoijasah" value="<?= $baru['sp_tglnoijasah']; ?>">
                                                <div class="invalid-feedback errorsp_tglnoijasah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sp_thnnoskhun" class="form-label">Nomor SKHUN</label>
                                                <input type="text" class="form-control" id="sp_thnnoskhun" name="sp_thnnoskhun" value="<?= $baru['sp_thnnoskhun']; ?>">
                                                <div class="invalid-feedback errorsp_thnnoskhuns"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label for-header">Sebagai Siswa baru</label>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="sp_diterimatgl" class="form-label">Tanggal Diterima</label>
                                                <input type="date" class="form-control" id="sp_diterimatgl" name="sp_diterimatgl" value="<?= $baru['sp_diterimatgl']; ?>">
                                                <div class="invalid-feedback errorsp_diterimatgl"></div>
                                            </div>
                                        </div>
                                                        
                                        <div class="mb-3">
                                            <label for="" class="form-label for-header">Sebagai Siswa pindahan</label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="sp_diterimatgl_p" class="form-label">Tanggal Diterima</label>
                                                <input type="hidden" class="form-control" id="id_pindahan" name="id_pindahan" value="<?= $pindahan['id_masuk']; ?>">
                                                <input type="date" class="form-control" id="sp_diterimatgl_p" name="sp_diterimatgl_p" value="<?= $pindahan['sp_diterimatgl']; ?>">
                                                <div class="invalid-feedback errorsp_diterimatgl_p"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sp_drsekolah" class="form-label">Dari SMA/MA/SMK</label>
                                                <input type="text" class="form-control" id="sp_drsekolah" name="sp_drsekolah" value="<?= $pindahan['sp_drsekolah']; ?>">
                                                <div class="invalid-feedback errorsp_drsekolah"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sp_dikelas" class="form-label">Di Kelas</label>
                                                <input type="text" class="form-control" id="sp_dikelas" name="sp_dikelas" value="<?= $pindahan['sp_dikelas']; ?>">
                                                <div class="invalid-feedback errorsp_dikelas"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="sp_alasanpindah" class="form-label">Alasan Pindah Ke Sekolah Ini</label>
                                                <textarea class="form-control" id="sp_alasanpindah" name="sp_alasanpindah" rows="4"><?= $pindahan['sp_alasanpindah']; ?></textarea>
                                                <div class="invalid-feedback errorsp_alasanpindah"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-header for-header">Meninggalkan Sekolah</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">
                                        
                                        <div class="mb-3">
                                            <label for="" class="form-label for-header">Tamat Sekolah</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="s_tgltamat" class="form-label">Tanggal Lulus</label>
                                                <input type="hidden" class="form-control" id="id_pendidikan" name="id_pendidikan" value="<?= $pendidikan['id_pendidikan']; ?>">
                                            <input type="date" class="form-control" id="s_tgltamat" name="s_tgltamat" value="<?= $pendidikan['s_tgltamat']; ?>">
                                            <div class="invalid-feedback errors_tgltamat"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="s_noijasah" class="form-label">Nomor Ijasah</label>
                                            <input type="text" class="form-control" id="s_noijasah" name="s_noijasah" value="<?= $pendidikan['s_noijasah']; ?>">
                                            <div class="invalid-feedback errors_noijasah"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="s_melanjutkansekolah" class="form-label">Melanjutkan sekolah ke</label>
                                            <input type="text" class="form-control" id="s_melanjutkansekolah" name="s_melanjutkansekolah" value="<?= $pendidikan['s_melanjutkansekolah']; ?>">
                                            <div class="invalid-feedback errors_melanjutkansekolah"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="s_alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="s_alamat" name="s_alamat" rows="4"><?= $pendidikan['s_alamat']; ?></textarea>
                                            <div class="invalid-feedback errors_alamat"></div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="" class="form-label for-header">Pindah Sekolah</label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="pp_kesekolah" class="form-label">Pindah Sekolah ke</label>
                                                <input type="hidden" class="form-control" id="id_pindah" name="id_pindah" value="<?php if($pindah != null){ echo $pindah['id_pindah'];}  ?>">
                                                <input type="text" class="form-control" id="pp_kesekolah" name="pp_kesekolah" value="<?php if($pindah != null){ echo $pindah['pp_kesekolah'];}  ?>">
                                                <div class="invalid-feedback errorpp_kesekolah"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pp_tglpindah" class="form-label">Tanggal Pindah</label>
                                                <input type="date" class="form-control" id="pp_tglpindah" name="pp_tglpindah" value="<?php if($pindah != null){ echo $pindah['pp_tglpindah'];}  ?>">
                                                <div class="invalid-feedback errorpp_tglpindah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pp_alamatsekolah" class="form-label">Alamat Sekolah </label>
                                                <textarea class="form-control" id="pp_alamatsekolah" name="pp_alamatsekolah" rows="4"><?php if($pindah != null){ echo $pindah['pp_alamatsekolah'];}  ?></textarea>
                                                <div class="invalid-feedback errorpp_alamatsekolah"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="pp_drkelas" class="form-label">Dari Kelas</label>
                                                <input type="number" class="form-control" id="pp_drkelas" name="pp_drkelas" value="<?php if($pindah != null){ echo $pindah['pp_drkelas'];}  ?>">
                                                <div class="invalid-feedback errorpp_drkelas"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pp_alasanpindah" class="form-label">Alasan Pindah</label>
                                                <textarea class="form-control" id="pp_alasanpindah" name="pp_alasanpindah" rows="4"><?php if($pindah != null){ echo $pindah['pp_alasanpindah'];}  ?></textarea>
                                                <div class="invalid-feedback errorpp_alasanpindah"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label for-header">Putus Sekolah</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="s_tglputus" class="form-label">Tanggal Putus Sekolah</label>
                                            <input type="date" class="form-control" id="s_tglputus" name="s_tglputus" value="<?= $pendidikan['s_tglputus']; ?>">
                                            <div class="invalid-feedback errors_tglputus"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="s_alasaputus" class="form-label">Alasan</label>
                                            <textarea class="form-control" id="s_alasaputus" name="s_alasaputus" rows="4"><?= $pendidikan['s_alasaputus']; ?></textarea>
                                            <div class="invalid-feedback errors_alasaputus"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane" id="orangtua" role="tabpanel" aria-labelledby="orangtua-tab">
                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Tentang Orang Tua</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label for-header">Ayah</label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_nama_ayah" class="form-label">Nama Ayah</label>
                                                <input type="hidden" class="form-control" id="id_orangtua" name="id_orangtua_ayah" value="<?php if($ayah != null){ echo $ayah['id_orangtua']; } ?>">
                                                <input type="text" class="form-control" id="sa_nama_ayah" name="sa_nama_ayah" value="<?php if($ayah != null){ echo $ayah['sa_nama']; } ?>">
                                                <input type="hidden" class="form-control" id="id_jeniskelamin_ayah" name="id_jeniskelamin_ayah" value="1">
                                                <div class="invalid-feedback errorsa_nama_ayah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_tempatlahir_ayah" class="form-label">Tempat Lahir Ayah</label>
                                                <input type="text" class="form-control" id="sa_tempatlahir_ayah" name="sa_tempatlahir_ayah" value="<?php if($ayah != null){ echo $ayah['sa_tempatlahir']; } ?>">
                                                <div class="invalid-feedback errorsa_tempatlahir_ayah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_tgllahir_ayah" class="form-label">Tanggal Lahir Ayah</label>
                                                <input type="date" class="form-control" id="sa_tgllahir_ayah" name="sa_tgllahir_ayah" value="<?php if($ayah != null){ echo $ayah['sa_tgllahir']; } ?>">
                                                <div class="invalid-feedback errorsa_tgllahir_ayah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_kewanegaraan_ayah" class="form-label">Kewanegaraan Ayah</label>
                                                <input type="text" class="form-control" id="sa_kewanegaraan_ayah" name="sa_kewanegaraan_ayah" value="<?php if($ayah != null){ echo $ayah['sa_kewanegaraan']; } ?>">
                                                <div class="invalid-feedback errorsa_kewanegaraan_ayah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_ptertinggi_ayah" class="form-label">Pendidikan Tertinggi Ayah</label>
                                                <input type="text" class="form-control" id="sa_ptertinggi_ayah" name="sa_ptertinggi_ayah" value="<?php if($ayah != null){ echo $ayah['sa_ptertinggi']; } ?>">
                                                <div class="invalid-feedback errorsa_ptertinggi_ayah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                                <input type="text" class="form-control" id="sa_pekerjaan_ayah" name="sa_pekerjaan_ayah" value="<?php if($ayah != null){ echo $ayah['sa_pekerjaan']; } ?>">
                                                <div class="invalid-feedback errorsa_pekerjaan_ayah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_penghasilan_ayah" class="form-label">Penghasilan Ayah <span class="fz-12">(rupiah)</span></label>
                                                <input type="number" class="form-control" id="sa_penghasilan_ayah" name="sa_penghasilan_ayah" value="<?php if($ayah != null){ echo $ayah['sa_penghasilan']; } ?>">
                                                <div class="invalid-feedback errorsa_penghasilan_ayah"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_alamat_ayah" class="form-label">Alamat Ayah</label>
                                                <textarea class="form-control" id="sa_alamat_ayah" name="sa_alamat_ayah" rows="3"><?php if($ayah != null){ echo $ayah['sa_alamat']; } ?></textarea>
                                                <div class="invalid-feedback errorsa_alamat_ayah"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label for-header">Ibu</label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_nama_ibu" class="form-label">Nama Ibu</label>
                                                <input type="hidden" class="form-control" id="id_orangtua_ibu" name="id_orangtua_ibu" value="<?php if($ibu != null){ echo $ibu['id_orangtua'];; } ?>">
                                                <input type="text" class="form-control" id="sa_nama_ibu" name="sa_nama_ibu" value="<?php if($ibu != null){ echo $ibu['sa_nama']; } ?>">
                                                <input type="hidden" class="form-control" id="id_jeniskelamin_ibu" name="id_jeniskelamin_ibu" value="2">
                                                <div class="invalid-feedback errorsa_nama_ibu"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_tempatlahir_ibu" class="form-label">Tempat Lahir Ibu</label>
                                                <input type="text" class="form-control" id="sa_tempatlahir_ibu" name="sa_tempatlahir_ibu" value="<?php if($ibu != null){ echo $ibu['sa_tempatlahir']; } ?>">
                                                <div class="invalid-feedback errorsa_tempatlahir_ibu"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_tgllahir_ibu" class="form-label">Tanggal Lahir Ibu</label>
                                                <input type="date" class="form-control" id="sa_tgllahir_ibu" name="sa_tgllahir_ibu" value="<?php if($ibu != null){ echo $ibu['sa_tgllahir']; } ?>">
                                                <div class="invalid-feedback errorsa_tgllahir_ibu"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_kewanegaraan_ibu" class="form-label">Kewanegaraan Ibu</label>
                                                <input type="text" class="form-control" id="sa_kewanegaraan_ibu" name="sa_kewanegaraan_ibu" value="<?php if($ibu != null){ echo $ibu['sa_kewanegaraan']; } ?>">
                                                <div class="invalid-feedback errorsa_kewanegaraan_ibu"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_ptertinggi_ibu" class="form-label">Pendidikan Tertinggi Ibu</label>
                                                <input type="text" class="form-control" id="sa_ptertinggi_ibu" name="sa_ptertinggi_ibu" value="<?php if($ibu != null){ echo $ibu['sa_ptertinggi']; } ?>">
                                                <div class="invalid-feedback errorsa_ptertinggi_ibu"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                                <input type="text" class="form-control" id="sa_pekerjaan_ibu" name="sa_pekerjaan_ibu" value="<?php if($ibu != null){ echo $ibu['sa_pekerjaan']; } ?>">
                                                <div class="invalid-feedback errorsa_pekerjaan_ibu"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_penghasilan_ibu" class="form-label">Penghasilan Ibu <span class="fz-12">(rupiah)</span></label>
                                                <input type="number" class="form-control" id="sa_penghasilan_ibu" name="sa_penghasilan_ibu" value="<?php if($ibu != null){ echo $ibu['sa_penghasilan']; } ?>">
                                                <div class="invalid-feedback errorsa_penghasilan_ibu"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sa_alamat_ibu" class="form-label">Alamat Ibu</label>
                                                <textarea class="form-control" id="sa_alamat_ibu" name="sa_alamat_ibu" rows="3"><?php if($ibu != null){ echo $ibu['sa_alamat']; } ?></textarea>
                                                <div class="invalid-feedback errorsa_alamat_ibu"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="wali" role="tabpanel" aria-labelledby="wali-tab">
                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Tentang Wali</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="sw_nama_laki" class="form-label">Nama</label>
                                            <input type="hidden" class="form-control" id="id_wali" name="id_wali" value="<?php if($wali != null){ echo $wali['id_wali'];}  ?>">
                                                <input type="text" class="form-control" id="sw_nama" name="sw_nama" value="<?php if($wali != null){ echo $wali['sw_nama'];}  ?>">
                                                <div class="invalid-feedback errorsw_nama"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_tempatlahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="sw_tempatlahir" name="sw_tempatlahir" value="<?php if($wali != null){ echo $wali['sw_tempatlahir'];}  ?>">
                                                <div class="invalid-feedback errorsw_tempatlahir"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_tgllahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="sw_tgllahir" name="sw_tgllahir" value="<?php if($wali != null){ echo $wali['sw_tgllahir'];}  ?>">
                                                <div class="invalid-feedback errorsw_tgllahir"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_kewanegaraan" class="form-label">Kewanegaraan</label>
                                                <input type="text" class="form-control" id="sw_kewanegaraan" name="sw_kewanegaraan" value="<?php if($wali != null){ echo $wali['sw_kewanegaraan'] ;}  ?>">
                                                <div class="invalid-feedback errorsw_kewanegaraan"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_ptertinggi" class="form-label">Pendidikan Tertinggi</label>
                                                <input type="text" class="form-control" id="sw_ptertinggi" name="sw_ptertinggi" value="<?php if($wali != null){ echo $wali['sw_ptertinggi'] ;}  ?>">
                                                <div class="invalid-feedback errorsw_ptertinggi"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_pekerjaan" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" id="sw_pekerjaan" name="sw_pekerjaan" value="<?php if($wali != null){ echo $wali['sw_pekerjaan'] ;}  ?>">
                                                <div class="invalid-feedback errorsw_pekerjaan"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_penghasilan" class="form-label">Penghasilan <span class="fz-12">(rupiah)</span></label>
                                                <input type="number" class="form-control" id="sw_penghasilan" name="sw_penghasilan" value="<?php if($wali != null){ echo $wali['sw_penghasilan'] ;}  ?>">
                                                <div class="invalid-feedback errorsw_penghasilan"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_alamat" class="form-label">Alamat</label>
                                                <textarea class="form-control" id="sw_alamat" name="sw_alamat" rows="3"><?php if($wali != null){ echo $wali['sw_alamat'] ;}  ?></textarea>
                                                <div class="invalid-feedback errorsw_alamat"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sw_hubunganpeserta" class="form-label">Hubungan dengan peserta didik</label>
                                                <textarea class="form-control" id="sw_hubunganpeserta" name="sw_hubunganpeserta" rows="3"><?php if($wali != null){ echo $wali['sw_hubunganpeserta'] ;}  ?></textarea>
                                                <div class="invalid-feedback errorsw_hubunganpeserta"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="kepribadian" role="tabpanel" aria-labelledby="kepribadian-tab">
                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Intelegensi, dan Kepribadian Siswa</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                                <label for="" class="form-label for-header">Intelegensi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="s_intelegensi" class="form-label">Intelegensi (IQ)</label>
                                            <input type="hidden" class="form-control" id="id_kepribadian" name="id_kepribadian" value="<?php if($kepribadian != null){ echo $kepribadian['id_kepribadian'];}?>">
                                                <input type="text" class="form-control" id="s_intelegensi" name="s_intelegensi" value="<?php if($kepribadian != null){ echo $kepribadian['s_intelegensi'];}?>">
                                                <div class="invalid-feedback errors_intelegensi"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="s_tgltestiq" class="form-label">Tanggal Test Intelegensi (IQ)</label>
                                                <input type="date" class="form-control" id="s_tgltestiq" name="s_tgltestiq" value="<?php if($kepribadian != null){ echo $kepribadian['s_tgltestiq'];}?>">
                                                <div class="invalid-feedback errors_tgltestiq"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label for-header">Kepribadian</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                                <label for="" class="form-label for-header">Disiplin/ketertiban</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_disiplin" value="Baik" id="dk_baik" 
                                                <?php if($kepribadian != null){ 
                                                        if($kepribadian['sk_disiplin']=='Baik') {
                                                            echo 'checked';;
                                                            }
                                                        }
                                                ?>>
                                                <label class="form-check-label" for="dk_baik">
                                                    Baik
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_disiplin" value="Cukup" id="dk_cukup" <?php if($kepribadian != null){ if($kepribadian['sk_disiplin']=='Cukup') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="dk_cukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_disiplin" value="Kurang" id="dk_kurang" <?php if($kepribadian != null){ if($kepribadian['sk_disiplin']=='Kurang') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="dk_kurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                                <label for="" class="form-label for-header">Prakarsa/kreativitas</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kreativitas" value="Baik" id="pk_baik" <?php if($kepribadian != null){  if($kepribadian['sk_kreativitas']=='Baik') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="pk_baik">
                                                    Baik
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kreativitas" value="Cukup" id="pk_cukup" <?php if($kepribadian != null){  if($kepribadian['sk_kreativitas']=='Cukup') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="pk_cukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kreativitas" value="Kurang" id="pk_kurang" <?php if($kepribadian != null){  if($kepribadian['sk_kreativitas']=='Kurang') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="pk_kurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                                <label for="" class="form-label for-header">Tanggung Jawab</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_tanggungjawab" value="Baik" id="tj_baik" <?php if($kepribadian != null){  if($kepribadian['sk_tanggungjawab']=='Baik') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="tj_baik">
                                                    Baik
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_tanggungjawab" value="Cukup" id="tj_cukup" <?php if($kepribadian != null){  if($kepribadian['sk_tanggungjawab']=='Cukup') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="tj_cukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_tanggungjawab" value="Kurang" id="tj_kurang" <?php if($kepribadian != null){  if($kepribadian['sk_tanggungjawab']=='Kurang') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="tj_kurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                                <label for="" class="form-label for-header">Penyesuaian Diri</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_penyesuaiandiri" value="Baik" id="pd_baik" <?php if($kepribadian != null){  if($kepribadian['sk_penyesuaiandiri']=='Baik') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="pd_baik">
                                                    Baik
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_penyesuaiandiri" value="Cukup" id="pd_cukup" <?php if($kepribadian != null){  if($kepribadian['sk_penyesuaiandiri']=='Cukup') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="pd_cukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_penyesuaiandiri" value="Kurang" id="pd_kurang" <?php if($kepribadian != null){  if($kepribadian['sk_penyesuaiandiri']=='Kurang') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="pd_kurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="">
                                                <label for="" class="form-label for-header">Kamantapan Emosi</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kemantapanemosi" value="Baik" id="ke_baik" <?php if($kepribadian != null){  if($kepribadian['sk_kemantapanemosi']=='Baik') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="ke_baik">
                                                    Baik
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kemantapanemosi" value="Cukup" id="ke_cukup" <?php if($kepribadian != null){  if($kepribadian['sk_kemantapanemosi']=='Cukup') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="ke_cukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kemantapanemosi" value="Kurang" id="ke_kurang" <?php if($kepribadian != null){  if($kepribadian['sk_kemantapanemosi']=='Kurang') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="ke_kurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <label for="" class="form-label for-header">Kerjasama</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kerjasama" value="Baik" id="k_baik" <?php if($kepribadian != null){  if($kepribadian['sk_kerjasama']=='Baik') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="k_baik">
                                                    Baik
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kerjasama" value="Cukup" id="k_cukup" <?php if($kepribadian != null){  if($kepribadian['sk_kerjasama']=='Cukup') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="k_cukup">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sk_kerjasama" value="Kurang" id="k_kurang" <?php if($kepribadian != null){  if($kepribadian['sk_kerjasama']=='Kurang') {echo 'checked'; }};?>>
                                                <label class="form-check-label" for="k_kurang">
                                                    Kurang
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="prestasi" role="tabpanel" aria-labelledby="prestasi-tab">

                    <div class="card mb-2">
                        <div class="card-header for-header">Keterangan Tentang Prestasi dan Beasiswa</div>
                        <div class="content">
                            <div class="card-block">
                                    <div class="row">
                                        
                                        <div class="mb-3">
                                            <label for="" class="form-label for-header">Prestasi</label>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="wrapper-btn d-flex">
                                                <button type="button" class="btn btn-add-prestasi mb-2 m-2" data-bs-toggle="modal" data-id="<?= $siswa['s_NISN'] ?>">Tambah Data</button>
                                                <button type="button" id="refresh-btn" class="btn mb-2 m-2">Refresh Table</button>
                                            </div>
                                            <div id="table_prestasi">
                                                
                                            </div>
                                        </div>

                                        <div class="mb-3 mt-3">
                                            <label for="" class="form-label for-header">Beasiswa</label>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="wrapper-btn d-flex">
                                                <button type="button" class="btn btn-add-beasiswa mb-2 m-2" data-bs-toggle="modal" data-id="<?= $siswa['s_NISN'] ?>">Tambah Data</button>
                                                <button type="button" id="refresh-btn" class="btn mb-2 m-2">Refresh Table</button>
                                            </div>
                                            <div id="table_beasiswa">

                                            </div>
                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="kehadiran" role="tabpanel" aria-labelledby="kehadiran-tab">
                    
                    <div class="card mb-3">
                        <div class="card-header for-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="">Keterangan Kehadiran</span>
                            <div class="wrapper-btn d-flex">
                                <button type="button" class="btn btn-add-kehadiran mb-2 m-2" data-bs-toggle="modal" data-id="<?= $siswa['s_NISN'] ?>">Tambah Data</button>
                                <button type="button" id="refresh-btn" class="btn mb-2 m-2">Refresh Table</button>
                            </div>
                        </div>
                        <div class="content">
                            <div class="card-block">
                                <div id="table_kehadiran">
                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>

                <div class="tab-pane" id="catatan" role="tabpanel" aria-labelledby="catatan-tab">
                    <div class="card mb-2">
                        <div class="card-header for-header">Lain-lain</div>
                        <div class="content">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <div class="row">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="id_catatanpenting" name="id_catatanpenting" value="<?php if($catatan != null){ echo $catatan['id_catatanpenting'];; } ?>">
                                            <label for="s_catatanpenting" class="form-label">Catatan Penting Selama Siswa Belajar Di Sekolah</label>
                                            <textarea class="form-control" id="s_catatanpenting" name="s_catatanpenting" rows="3"><?php if($catatan != null){ echo $catatan['s_catatanpenting']; } ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
</section>

<!-- MODAL ADD PENYAKIT -->
<form action="javascript:void(0)" method="post" name="formAddPenyakit" id="formAddPenyakit" onsubmit="return validateFormAddPenyakit()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddPenyakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="p_jenispenyakit" class="form-label">Jenis Penyakit</label>
                        <input type="hidden" class="form-control" id="p_s_nisn" name="p_s_nisn">
                        <input type="text" class="form-control" id="p_jenispenyakit" name="p_jenispenyakit">
                        <div class="invalid-feedback errorp_jenispenyakit"></div>
                    </div>
                    <div class="mb-3">
                        <label for="p_kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="p_kelas" name="p_kelas">
                        <div class="invalid-feedback errorp_kelas"></div>
                    </div>
                    <div class="mb-3">
                        <label for="p_tahun" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="p_tahun" name="p_tahun">
                        <div class="invalid-feedback errorp_tahun"></div>
                    </div>
                    <div class="mb-3">
                        <label for="p_lamasakit" class="form-label">Lama Sakit</label>
                        <input type="text" class="form-control" id="p_lamasakit" name="p_lamasakit">
                        <div class="invalid-feedback errorp_lamasakit"></div>
                    </div>
                    <div class="mb-3">
                        <label for="p_keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="p_keterangan" name="p_keterangan" rows="3"></textarea>
                        <div class="invalid-feedback errorp_keterangan"></div>
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

<!-- MODAL ADD Profile -->
<form action="/Siswa/profile" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
    <div class="modal fade" id="modalFormAddProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3" style="display: flex; justify-content: center;" >
                        <img src="/assets/img/photo/<?= $siswa['s_photo']; ?>" class="card-img-top img-preview"  style="width: 170px;"> 
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" id="profile_s_nisn" name="profile_s_nisn">
                        <label for="s_photo" class="form-label form-label-foto">Foto</label>
                        <input class="form-control" type="file" id="s_photo" name="s_photo" onchange="priviewImg()">
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

<!-- MODAL ADD PRESTASI -->
<form action="javascript:void(0)" method="post" name="formAddPrestasi" id="formAddPrestasi" onsubmit="return validateFormAddPrestasi()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddPrestasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pre_jenisprestasi" class="form-label">Jenis Prestasi</label>
                        <input type="hidden" class="form-control" id="pre_s_nisn" name="pre_s_nisn">
                        <input type="text" class="form-control" id="pre_jenisprestasi" name="pre_jenisprestasi">
                        <div class="invalid-feedback errorpre_jenisprestasi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="pre_keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="pre_keterangan" name="pre_keterangan" rows="3"></textarea>
                        <div class="invalid-feedback errorAddpre_keterangan"></div>
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

<!-- MODAL ADD BEASISWA -->
<form action="javascript:void(0)" method="post" name="formAddBeasiswa" id="formAddBeasiswa" onsubmit="return validateFormAddBeasiswa()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddBeasiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="s_namabeasiswa" class="form-label">Nama Beasiswa</label>
                        <input type="hidden" class="form-control" id="b_s_nisn" name="b_s_nisn">
                        <input type="text" class="form-control" id="s_namabeasiswa" name="s_namabeasiswa">
                        <div class="invalid-feedback errors_namabeasiswa"></div>
                    </div>
                    <div class="mb-3">
                        <label for="s_tahunbeasiswa" class="form-label">Tahun Beasiswa</label>
                        <input type="text" class="form-control" id="s_tahunbeasiswa" name="s_tahunbeasiswa">
                        <div class="invalid-feedback errors_tahunbeasiswa"></div>
                    </div>
                    <div class="mb-3">
                        <label for="s_beasiswadari" class="form-label">Beasiswa Dari</label>
                        <input type="text" class="form-control" id="s_beasiswadari" name="s_beasiswadari">
                        <div class="invalid-feedback errors_beasiswadari"></div>
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

<!-- MODAL ADD KEHADIRAN -->
<form action="javascript:void(0)" method="post" name="formAddKehadiran" id="formAddKehadiran" onsubmit="return validateFormAddKehadiran()">
<?= csrf_field(); ?>
    <div class="modal fade" id="modalFormAddKehadiran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kehadiran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3">
                        <div class="row">

                            <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="k_s_nisn" name="k_s_nisn">
                                <div class="mb-3">
                                    <label for="id_kelas" class="form-label for-header">Kelas</label>
                                    <select class="form-select" aria-label="Default select example" name="id_kelas" id="id_kelas">
                                        
                                        <option selected>Pilih Kelas</option>
                                        <?php foreach($search_kelas as $sk) : ?>
                                            <option value="<?= $sk['id_kelas']; ?>"><?= $sk['nama_kelas']; ?></option>
                                        <?php endforeach ?>
                                    
                                    </select>
                                    <div class="invalid-feedback errorkh_kelas"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="kh_semester" class="form-label for-header">Semester</label>
                                    <select class="form-select" aria-label="Default select example" name="kh_semester" id="kh_semester">
                                        
                                        <option selected>Pilih Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    
                                    </select>
                                    <div class="invalid-feedback errorkh_semester"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="kh_sakit" class="form-label for-header">Tidak Hadir</label>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kh_sakit" class="form-label">Sakit</label>
                                    <input type="number" class="form-control" id="kh_sakit" name="kh_sakit">
                                    <div class="invalid-feedback errorkh_sakit"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kh_izin" class="form-label">Ijin</label>
                                    <input type="number" class="form-control" id="kh_izin" name="kh_izin">
                                    <div class="invalid-feedback errorkh_izin"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kh_alpa" class="form-label">Alpa</label>
                                    <input type="number" class="form-control" id="kh_alpa" name="kh_alpa">
                                    <div class="invalid-feedback errorkh_alpa"></div>
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

var prov;
var city;
var dis;
var sub;

    //VALIDASI
    function validateFormAddPenyakit() {
        $.ajax({
            url: "<?= site_url('Penyakit/save') ?>",
            method: "post",
            data: $("#formAddPenyakit").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.p_jenispenyakit){
                        $('#p_jenispenyakit').addClass('is-invalid');
                        $('.errorp_jenispenyakit').html(response.error.p_jenispenyakit);
                        return false;
                    }else{
                        $('#p_jenispenyakit').removeClass('is-invalid');
                    }
                    
                    if(response.error.p_kelas){
                        $('#p_kelas').addClass('is-invalid');
                        $('.errorp_kelas').html(response.error.p_kelas);
                        return false;
                    }else{
                        $('#p_kelas').removeClass('is-invalid');
                    }
                    
                    if(response.error.p_tahun){
                        $('#p_tahun').addClass('is-invalid');
                        $('.errorp_tahun').html(response.error.p_tahun);
                        return false;
                    }else{
                        $('#p_tahun').removeClass('is-invalid');
                    }
                    
                    if(response.error.p_lamasakit){
                        $('#p_lamasakit').addClass('is-invalid');
                        $('.errorp_lamasakit').html(response.error.p_lamasakit);
                        return false;
                    }else{
                        $('#p_lamasakit').removeClass('is-invalid');
                    }
                    
                    if(response.error.p_keterangan){
                        $('#p_keterangan').addClass('is-invalid');
                        $('.errorp_keterangan').html(response.error.p_keterangan);
                        return false;
                    }else{
                        $('#p_keterangan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    RefreshTable();
                    $("#modalFormAddPenyakit").modal('hide');
                }
            }
        });
    };
    
    function validateFormAddPrestasi() {
        $.ajax({
            url: "<?= site_url('Prestasi/save') ?>",
            method: "post",
            data: $("#formAddPrestasi").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.pre_jenisprestasi){
                        $('#pre_jenisprestasi').addClass('is-invalid');
                        $('.errorpre_jenisprestasi').html(response.error.pre_jenisprestasi);
                        return false;
                    }else{
                        $('#pre_jenisprestasi').removeClass('is-invalid');
                    }
                    
                    if(response.error.pre_keterangan){
                        $('#pre_keterangan').addClass('is-invalid');
                        $('.errorAddpre_keterangan').html(response.error.pre_keterangan);
                        return false;
                    }else{
                        $('#pre_keterangan').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    RefreshTable();
                    $("#modalFormAddPrestasi").modal('hide');
                }
            }
        });
    };

    function validateFormAddBeasiswa() {
        $.ajax({
            url: "<?= site_url('Beasiswa/save') ?>",
            method: "post",
            data: $("#formAddBeasiswa").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.s_namabeasiswa){
                        $('#s_namabeasiswa').addClass('is-invalid');
                        $('.errors_namabeasiswa').html(response.error.s_namabeasiswa);
                        return false;
                    }else{
                        $('#s_namabeasiswa').removeClass('is-invalid');
                    }
                    
                    if(response.error.s_tahunbeasiswa){
                        $('#s_tahunbeasiswa').addClass('is-invalid');
                        $('.errors_tahunbeasiswa').html(response.error.s_tahunbeasiswa);
                        return false;
                    }else{
                        $('#s_tahunbeasiswa').removeClass('is-invalid');
                    }
                    
                    if(response.error.s_beasiswadari){
                        $('#s_beasiswadari').addClass('is-invalid');
                        $('.errors_beasiswadari').html(response.error.s_beasiswadari);
                        return false;
                    }else{
                        $('#s_beasiswadari').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    RefreshTable();
                    $("#modalFormAddBeasiswa").modal('hide');
                }
            }
        });
    };

    function validateFormAddKehadiran() {
        $.ajax({
            url: "<?= site_url('Kehadiran/save') ?>",
            method: "post",
            data: $("#formAddKehadiran").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.kh_kelas){
                        $('#kh_kelas').addClass('is-invalid');
                        $('.errorkh_kelas').html(response.error.kh_kelas);
                        return false;
                    }else{
                        $('#kh_kelas').removeClass('is-invalid');
                    }
                    
                    if(response.error.kh_semester){
                        $('#kh_semester').addClass('is-invalid');
                        $('.errorkh_semester').html(response.error.kh_semester);
                        return false;
                    }else{
                        $('#kh_semester').removeClass('is-invalid');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    RefreshTable();
                    $("#modalFormAddKehadiran").modal('hide');
                }
            }
        });
    };

    function validateFormAddSiswa() {
        $.ajax({
            url: "<?= site_url('Siswa/update') ?>",
            method: "post",
            data: $("#formAddSiswa").serialize(),
            dataType: "json",
            success:function (response) {
                
                if(response.error){
                    //SISWA
                    if(response.error.siswa_nisn){
                        $('#siswa_nisn').addClass('is-invalid');
                        $('.errorSiswaNisn').html(response.error.siswa_nisn);
                        $('.errorEditDanger').html(response.error.siswa_nisn);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswa_nisn').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswa_nl){
                        $('#siswa_nl').addClass('is-invalid');
                        $('.errorSiswaNL').html(response.error.siswa_nl);
                        $('.errorEditDanger').html(response.error.siswa_nl);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswa_nl').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswa_jk){
                        $('#siswa_jk').addClass('is-invalid');
                        $('.errorSiswaJK').html(response.error.siswa_jk);
                        $('.errorEditDanger').html(response.error.siswa_jk);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswa_jk').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswa_tempatlahir){
                        $('#siswa_tempatlahir').addClass('is-invalid');
                        $('.errorSiswaTempatLahir').html(response.error.siswa_tempatlahir);
                        $('.errorEditDanger').html(response.error.siswa_tempatlahir);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswa_tempatlahir').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswa_tgllahir){
                        $('#siswa_tgllahir').addClass('is-invalid');
                        $('.errorSiswaTglLahir').html(response.error.siswa_tgllahir);
                        $('.errorEditDanger').html(response.error.siswa_tgllahir);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswa_tgllahir').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    //ALAMAT
                    
                    if(response.error.siswaAddAlamat){
                        $('#siswaAddAlamat').addClass('is-invalid');
                        $('.errorAddAlamat').html(response.error.siswaAddAlamat);
                        $('.errorEditDanger').html(response.error.siswaAddAlamat);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswaAddAlamat').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswaAddRT){
                        $('#siswaAddRT').addClass('is-invalid');
                        $('.errorAddRT').html(response.error.siswaAddRT);
                        $('.errorEditDanger').html(response.error.siswaAddRT);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswaAddRT').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswaAddRW){
                        $('#siswaAddRW').addClass('is-invalid');
                        $('.errorAddRW').html(response.error.siswaAddRW);
                        $('.errorEditDanger').html(response.error.siswaAddRW);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswaAddRW').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswaAddProv){
                        $('#siswaAddProv').addClass('is-invalid');
                        $('.errorAddProv').html(response.error.siswaAddProv);
                        $('.errorEditDanger').html(response.error.siswaAddProv);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswaAddProv').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswaAddCity){
                        $('#siswaAddCity').addClass('is-invalid');
                        $('.errorAddCity').html(response.error.siswaAddCity);
                        $('.errorEditDanger').html(response.error.siswaAddCity);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswaAddCity').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswaAddDis){
                        $('#siswaAddDis').addClass('is-invalid');
                        $('.errorAddDis').html(response.error.siswaAddDis);
                        $('.errorEditDanger').html(response.error.siswaAddDis);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswaAddDis').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }
                    
                    if(response.error.siswaAddSubdis){
                        $('#siswaAddSubdis').addClass('is-invalid');
                        $('.errorAddSubdis').html(response.error.siswaAddSubdis);
                        $('.errorEditDanger').html(response.error.siswaAddSubdis);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#siswaAddSubdis').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }

                    //KESEHATAN
                    
                    //PENDIDIKAN

                    if(response.error.sp_asalsekolah){
                        $('#sp_asalsekolah').addClass('is-invalid');
                        $('.errorsp_asalsekolah').html(response.error.sp_asalsekolah);
                        $('.errorEditDanger').html(response.error.sp_asalsekolah);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#sp_asalsekolah').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }

                    if(response.error.sp_diterimatgl){
                        $('#sp_diterimatgl').addClass('is-invalid');
                        $('.errorsp_diterimatgl').html(response.error.sp_diterimatgl);
                        $('.errorEditDanger').html(response.error.sp_diterimatgl);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#sp_diterimatgl').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }

                    if(response.error.sp_diterimatgl_p){
                        $('#sp_diterimatgl_p').addClass('is-invalid');
                        $('.errorsp_diterimatgl_p').html(response.error.sp_diterimatgl_p);
                        $('.errorEditDanger').html(response.error.sp_diterimatgl_p);
                        $('.errorEditDanger').removeClass('t-none');
                        return false;
                    }else{
                        $('#sp_diterimatgl_p').removeClass('is-invalid');
                        $('.errorEditDanger').addClass('t-none');
                    }

                }else if(response.berhasil){
                    alert("Data berhasil disimpan");
                    window.location =  response.id;

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

    $(document).ready(function() {
        var id = <?php if($alamat['prov_id'] == null){
                echo '0';
            }else{ 
                echo $alamat['prov_id'];
            } ?>;
        if(<?= $alamat['prov_id'] ?> != 0){
            city = <?= $alamat['city_id'] ?>
        }
        $.ajax({
                type: "POST",
                url: "<?= base_url('Siswa/getCity') ?>",
                data: {
                    id: id,
                    city: city
                },
                dataType: "JSON",
                success: function(response) {
                    $('#siswaAddCity').html(response.data);
                }

            });
    });
    
    $(document).ready(function() {
        var id = <?php if($alamat['city_id'] == null){
                echo '0';
            }else{ 
                echo $alamat['city_id'];
            } ?>;
        if(<?= $alamat['city_id'] ?> != 0){
            dis = <?= $alamat['dis_id'] ?>
        }
        $.ajax({
            type: "POST",
            url: "<?= base_url('Siswa/getDis') ?>",
            data: {
                id: id,
                dis: dis
            },
            dataType: "JSON",
            success: function(response) {
                $('#siswaAddDis').html(response.data);
            }

        });
    });
    
    $(document).ready(function() {
        var id = <?php if($alamat['dis_id'] == null){
                echo '0';
            }else{ 
                echo $alamat['dis_id'];
            } ?>;
        if(<?= $alamat['dis_id'] ?> != 0){
            sub = <?= $alamat['subdis_id'] ?>
        }
        $.ajax({
            type: "POST",
            url: "<?= base_url('Siswa/getSubdis') ?>",
            data: {
                id: id,
                subdis: sub
            },
            dataType: "JSON",
            success: function(response) {
                $('#siswaAddSubdis').html(response.data);
            }

        });
    });

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
    
    $( "#table_penyakit" ).load( 'penyakit/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
        if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            $( "#table_penyakit" ).html( msg + xhr.status + " " + xhr.statusText );
        }
    });
    $( "#table_prestasi" ).load( 'prestasi/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
        if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            $( "#table_prestasi" ).html( msg + xhr.status + " " + xhr.statusText );
        }
    });
    $( "#table_beasiswa" ).load( 'beasiswa/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
        if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            $( "#table_beasiswa" ).html( msg + xhr.status + " " + xhr.statusText );
        }
    });
    $( "#table_kehadiran" ).load( 'kehadiran/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
        if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            $( "#table_kehadiran" ).html( msg + xhr.status + " " + xhr.statusText );
        }
    });
    
    function RefreshTable() {
        $( "#table_penyakit" ).load( 'penyakit/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                $( "#table_penyakit" ).html( msg + xhr.status + " " + xhr.statusText );
            }
        });
        $( "#table_prestasi" ).load( 'prestasi/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                $( "#table_prestasi" ).html( msg + xhr.status + " " + xhr.statusText );
            }
        });
        $( "#table_beasiswa" ).load( 'beasiswa/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                $( "#table_beasiswa" ).html( msg + xhr.status + " " + xhr.statusText );
            }
        });
        $( "#table_kehadiran" ).load( 'kehadiran/'+<?= $siswa['s_NISN'] ?>, function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                $( "#table_kehadiran" ).html( msg + xhr.status + " " + xhr.statusText );
            }
        });
    }
    
    $("#refresh-btn").on("click", RefreshTable);

    $(document).ready(function(){
        //modal
        
        $('.btn-add-profile').on('click',function(){

            const id = $(this).data('id');
            $('#profile_s_nisn').val(id);

            $("#modalFormAddProfile").modal('show');
        });

        $('.btn-add-penyakit').on('click',function(){

            const id = $(this).data('id');
            $('#p_s_nisn').val(id);
            
            $("#modalFormAddPenyakit").modal('show');
        });

        $('.btn-add-prestasi').on('click',function(){

            const id = $(this).data('id');
            $('#pre_s_nisn').val(id);
            
            $("#modalFormAddPrestasi").modal('show');
        });

        $('.btn-add-beasiswa').on('click',function(){

            const id = $(this).data('id');
            $('#b_s_nisn').val(id);
            
            $("#modalFormAddBeasiswa").modal('show');
        });

        $('.btn-add-kehadiran').on('click',function(){

            const id = $(this).data('id');
            $('#k_s_nisn').val(id);
            
            $("#modalFormAddKehadiran").modal('show');
        });

        $('.btn-delete-siswa').on('click',function(){
            
            var dataNama = $(this).data('nama');
            $('.d_nama_Siswa').text(dataNama);

            var id = $(this).data('id');
            $('#d_id_Siswa').val(id);

            $('#modalFormDeleteSiswa').modal('show');
        });

    });

    function priviewImg(){
        const sampul = document.querySelector('#s_photo');
        const imgPreview = document.querySelector('.img-preview');

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e){
            imgPreview.src = e.target.result;
        }

    }

</script>

<?= $this->endSection(); ?>