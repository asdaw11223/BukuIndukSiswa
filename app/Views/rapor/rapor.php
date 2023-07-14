<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
    .form-label{
        font-weight: bold;
    }
    #addSiswa .nav-item.show .nav-link, #addSiswa .nav-link{
        color: #404e67;
        font-weight: 600;
        font-size: 12px;
        border-radius: 5px;
    }
    #addSiswa .nav-item.show .nav-link, #addSiswa .nav-link.active{
        color: white;
        font-weight: 600;
        font-size: 12px;
        background: #6777ef;
        border-radius: 5px;
    }
</style>

<div class="header-pages"  style="display: flex; justify-content: space-between;">
    <?= $title ?>
</div>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row">

        <div class="col-md-3">
            <div class="card mb-2">
                <div class="content">
                    <div class="card-block">
                        <div class="header auto-center  mt-3 mb-3">
                            <div class="card mb-3"  style="width: 170px;" >
                                <img src="/assets/img/avatar/avatar-default.png" class="card-img-top"> 
                            </div>
                            <div class="auto-center">
                                <h4><?= $siswa['s_namalengkap'] ?></h4>
                                <p>NISN : <?= $siswa['s_NISN'] ?></p>
                            </div>
                            <div class="btn-container">
                                <a href="/siswa/edit/<?= $siswa['s_NISN']; ?>" class="btn-edit"title="Edit"><span class="material-symbols-outlined">edit</span></a>
                                <button type="button" class="btn-view" data-bs-toggle="modal" title="Nilai"><span class="material-symbols-outlined">inbox</span></button>
                                <button type="button" class="btn-delete btn-update-kelas" data-bs-toggle="modal" title="Print"><span class="material-symbols-outlined">print</span></button>
                            </div>
                        </div>
                        <hr class="line mb-3">
                        <div class="text p-3 pt-1 pb-1">
                            <b>Jurusan</b>
                            <p>
                                <?php foreach($jurusan as $jk) : ?>
                                    <?php if($siswa['id_jurusan'] == $jk['id_jurusan']) : ?>
                                        <?= $jk['nama_jurusan'] ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                    </p>
                            <b>Tahun Ajaran Masuk</b>
                            <p>
                                <?php foreach($tahunajaran as $jk) : ?>
                                    <?php if($siswa['id_tahunajaran'] == $jk['id_tahunajaran']) : ?>
                                        <?= $jk['nama_tahunajaran'] ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </p>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-9">
            
        <div class="col-lg-12">

<!-- Nav tabs -->
    <ul class="nav nav-tabs mb-3 card siswa" id="addSiswa" role="tablist">
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link active" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa" type="button" role="tab" aria-controls="siswa" aria-selected="true">Siswa</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link" id="alamat-tab" data-bs-toggle="tab" data-bs-target="#alamat" type="button" role="tab" aria-controls="alamat" aria-selected="false">Alamat</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link" id="kesehatan-tab" data-bs-toggle="tab" data-bs-target="#kesehatan" type="button" role="tab" aria-controls="kesehatan" aria-selected="false">Kesehatan</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link" id="pendidikan-tab" data-bs-toggle="tab" data-bs-target="#pendidikan" type="button" role="tab" aria-controls="pendidikan" aria-selected="false">Pendidikan</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#orangtua" type="button" role="tab" aria-controls="orangtua" aria-selected="false">Orang Tua</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link" id="wali-tab" data-bs-toggle="tab" data-bs-target="#wali" type="button" role="tab" aria-controls="wali" aria-selected="false">Wali</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link" id="kepribadian-tab" data-bs-toggle="tab" data-bs-target="#kepribadian" type="button" role="tab" aria-controls="kepribadian" aria-selected="false">Kepribadian</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="presentation">
            <button class="nav-link" id="prestasi-tab" data-bs-toggle="tab" data-bs-target="#prestasi" type="button" role="tab" aria-controls="prestasi" aria-selected="false">Prestasi</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="kehadiran">
            <button class="nav-link" id="kehadiran-tab" data-bs-toggle="tab" data-bs-target="#kehadiran" type="button" role="tab" aria-controls="kehadiran" aria-selected="false">Kehadiran</button>
        </li>
        <li class="nav-item" style="width: calc(100% / 5);" role="catatan">
            <button class="nav-link" id="catatan-tab" data-bs-toggle="tab" data-bs-target="#catatan" type="button" role="tab" aria-controls="catatan" aria-selected="false">Lainnya</button>
        </li>
    </ul>
</div>
            <!-- Tab panes -->
        <div class="tab-content">

            <div class="tab-pane active" id="siswa" role="tabpanel" aria-labelledby="siswa-tab"> 
                <div class="card mb-2">
                    <div class="card-header for-header">Keterangan Pribadi Siswa</div>
                    <div class="content">
                        <div class="card-block">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><label for="siswa_nisn" class="form-label">Nomor Induk / NISN</label></td>
                                        <td><?= $siswa['s_NISN'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_nl" class="form-label" >Nama Lengkap</label></td>
                                        <td><?= $siswa['s_namalengkap'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_np" class="form-label" >Nama Panggilan</label></td>
                                        <td><?= $siswa['s_namapanggilan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_jk" class="form-label" >Jenis Kelamin</label></td>
                                        <td><?php foreach($jeniskelamin as $jk) : ?>
                                                <?php if($siswa['id_jeniskelamin'] == $jk['id_jeniskelamin']) : ?>
                                                    <?= $jk['nama_jeniskelamin'] ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_tempatlahir" class="form-label" >Tempat Lahir</label></td>
                                        <td><?= $siswa['s_tempatlahir'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_tgllahir" class="form-label" >Tanggal Lahir</label></td>
                                        <td><?= $siswa['s_tanggallahir'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_agama" class="form-label" >Agama</label></td>
                                        <td><?= $siswa['s_agama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_kewanegaraan" class="form-label" >Kewanegaraan</label></td>
                                        <td><?= $siswa['s_kewanegaraan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_anakke" class="form-label" >Anak ke-</label></td>
                                        <td><?= $siswa['s_anakke'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 0px;"><label for="siswa_anakke" class="form-label" >Jumlah Saudara <span class="fz-12">(orang)</span></label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-md-4 p-0 w-100">
                                                <label for="siswa_anakke" class="form-label">Kandung : </label>
                                                <?= $siswa['s_kandung'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4 w-100">
                                                <label for="siswa_anakke" class="form-label">Tiri : </label>
                                                <?= $siswa['s_tiri'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-4 p-0 w-100">
                                                <label for="siswa_anakke" class="form-label">Angkat : </label>
                                                <?= $siswa['s_angkat'] ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswa_anak" class="form-label">Anak <span class="fz-12">(masih ada/yatim/piatu/yatim piatu)</span></label></td>
                                        <td><?= $siswa['s_anakyp']?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="s_bahasaharian" class="form-label">Bahasa Sehari-hari</label></td>
                                        <td><?= $siswa['s_bahasaharian'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                <div class="card mb-2">
                    <div class="card-header for-header">Keterangan Tempat Tinggal Siswa</div>
                    <div class="content">
                        <div class="card-block">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddAlamat" class="form-label">Alamat Peserta Didik</label></td>
                                        <td><?= $alamat['s_alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddRT" class="form-label">RT</label></td>
                                        <td><?= $alamat['s_rt']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddRW" class="form-label">RW</label></td>
                                        <td><?= $alamat['s_rw']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddProv" class="form-label">Provinsi</label></td>
                                        <td>
                                            <?php foreach($prov as $p) : ?>
                                                <?php if($alamat['prov_id'] == $p['prov_id']) : ?>
                                                    <?= $p['prov_name']?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddCity" class="form-label">Kabupaten</label></td>
                                        <td>
                                            <?php foreach($city as $p) : ?>
                                                <?php if($alamat['city_id'] == $p['city_id']) : ?>
                                                    <?= $p['city_name']?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddDis" class="form-label">Kecamatan</label></td>
                                        <td>
                                            <?php foreach($dis as $p) : ?>
                                                <?php if($alamat['dis_id'] == $p['dis_id']) : ?>
                                                    <?= $p['dis_name']?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddSubdis" class="form-label">Kelurahan</label></td>
                                        <td>
                                            <?php foreach($subdis as $p) : ?>
                                                <?php if($alamat['subdis_id'] == $p['subdis_id']) : ?>
                                                    <?= $p['subdis_name']?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddNoTelp" class="form-label">No. Telepon</label></td>
                                        <td><?= $alamat['s_telprumah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddTinggalDengan" class="form-label">Selama bersekolah tinggal dengan</label></td>
                                        <td><?= $alamat['s_tinggal']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaAddJarakTinggal" class="form-label">Jarak tempat tinggal ke sekolah</label></td>
                                        <td><?= $alamat['s_jaraksekolah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><label for="siswaKendaraan" class="form-label">Kesekolah dengan (Jalan kaki/ Kendaraan)</label></td>
                                        <td><?= $alamat['s_kendaraan'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="kesehatan" role="tabpanel" aria-labelledby="kesehatan-tab">
                <div class="card mb-2">
                    <div class="card-header for-header">Keterangan Jasmani dan Kesehatan Siswa</div>
                    <div class="content">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><label for="siswaBBmasuk" class="form-label">Berat Badan Waktu di terima</label></td>
                                                <td><?= $kesehatan['s_bbterima'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><label for="siswaBBKeluar" class="form-label">Berat Badan Waktu meninggalkan sekolah</label></td>
                                                <td><?= $kesehatan['s_bbkeluar'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><label for="siswaTBMasuk" class="form-label">Tinggi Badan Waktu di terima</label></td>
                                                <td><?= $kesehatan['s_tbterima'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><label for="siswaTBKeluar" class="form-label">Tinggi BadanWaktu meninggalkan sekolah</label></td>
                                                <td><?= $kesehatan['s_tbkeluar'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <div class="tbody">
                                            <tr>
                                                <td colspan="2"><label for="siswaGolonganDarah" class="form-label">Golongan Darah</label></td>
                                                <td><?= $kesehatan['s_golongandarah'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><label for="siswaKelainan" class="form-label">Kelainan jasmani/ lainnya</label></td>
                                                <td><?= $kesehatan['s_kelainan'] ?></td>
                                            </tr>
                                        </div>
                                    </table>
                                    <div class="form-label for-header">PENYAKIT YANG PERNAH DI DERITA (SAKIT BERAT YANG MEMERLUKAN PERAWATAN KHUSUS)</div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Penyakit</th>
                                                <th>Kelas</th>
                                                <th>Tahun</th>
                                                <th>Lama Sakit</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($penyakitKhusus == null) : ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No Data</td>
                                            </tr>

                                            <?php else : ?>

                                            <?php $no = 1; foreach($penyakitKhusus as $pk) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $penyakitKhusus['p_jenispenyakit'] ?></td>
                                                <td><?= $penyakitKhusus['p_kelas'] ?></td>
                                                <td><?= $penyakitKhusus['p_tahun'] ?></td>
                                                <td><?= $penyakitKhusus['p_lamasakit'] ?></td>
                                                <td><?= $penyakitKhusus['p_keterangan'] ?></td>
                                            </tr>
                                            <?php endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                <div class="card mb-3">
                    <div class="card-header for-header">Keterangan Tentang Pendidikan Sebelumnya</div>
                    <div class="content">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style=" max-width: 400px;"><label for="sp_asalsekolah" class="form-label">Asal SMP/MTs</label></td>
                                            <td><?= $masuk['sp_asalsekolah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_tglijasah" class="form-label">Tanggal Ijasah</label></td>
                                            <td><?= $masuk['sp_tglijasah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_thnskhun" class="form-label">Tahun SKHUN</label></td>
                                            <td><?= $masuk['sp_thnskhun']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_tglnoijasah" class="form-label">Nomor Ijasah</label></td>
                                            <td><?= $masuk['sp_tglnoijasah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_thnnoskhun" class="form-label">Nomor SKHUN</label></td>
                                            <td><?= $masuk['sp_thnnoskhun']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><label for="" class="form-label for-header pt-3"><b>Sebagai Siswa Baru</b></label></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_diterimatgl" class="form-label">Tanggal Diterima</label></td>
                                            <td><?= $masuk['sp_diterimatgl']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><label for="" class="form-label for-header pt-3"><b>Sebagai Siswa pindahan</b></label></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_diterimatgl_p" class="form-label">Tanggal Diterima</label></td>
                                            <td><?= $masuk['sp_diterimatgl']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_drsekolah" class="form-label">Dari SMA/MA/SMK</label></td>
                                            <td><?= $masuk['sp_drsekolah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_dikelas" class="form-label">Di Kelas</label></td>
                                            <td><?= $masuk['sp_dikelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="sp_alasanpindah" class="form-label">Alasan Pindah Ke Sekolah Ini</label></td>
                                            <td><?= $masuk['sp_alasanpindah']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header for-header">Tamat Sekolah</div>
                    <div class="content">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>                                        
                                            <td><label for="s_tgltamat" class="form-label">Tanggal Lulus</label></td>
                                            <td><?= $pendidikan['s_tgltamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="s_noijasah" class="form-label">Nomor Ijasah</label></td>
                                            <td><?= $pendidikan['s_noijasah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="s_melanjutkansekolah" class="form-label">Melanjutkan sekolah ke</label></td>
                                            <td><?= $pendidikan['s_melanjutkansekolah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="s_alamat" class="form-label">Alamat</label></td>
                                            <td><?= $pendidikan['s_alamat']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header for-header">Pindah Sekolah</div>
                    <div class="content">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><label for="pp_kesekolah" class="form-label">Pindah Sekolah ke</label></td>
                                            <td><?= $pindah['pp_kesekolah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="pp_tglpindah" class="form-label">Tanggal Pindah</label></td>
                                            <td><?= $pindah['pp_tglpindah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="pp_alamatsekolah" class="form-label">Alamat Sekolah </label></td>
                                            <td><?= $pindah['pp_alamatsekolah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="pp_drkelas" class="form-label">Dari Kelas</label></td>
                                            <td><?= $pindah['pp_drkelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="pp_alasanpindah" class="form-label">Alasan Pindah</label></td>
                                            <td><?= $pindah['pp_alasanpindah']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header for-header">Putus Sekolah</div>
                    <div class="content">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><label for="s_tglputus" class="form-label">Tanggal Putus Sekolah</label></td>
                                            <td><?= $pendidikan['s_tglputus']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label for="s_alasaputus" class="form-label">Alasan</label></td>
                                            <td><?= $pendidikan['s_alasaputus']; ?></td>
                                        </tr>                                        
                                    </tbody>
                                </table>
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
                                            <label for="" class="form-label for-header">Ayah</label>
                                        <table class="table">
                                            <tr>
                                                <td><label for="sa_nama_ayah" class="form-label">Nama Ayah</label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_nama']; } ?></td>
                                            </tr>
                                                <td><label for="sa_tempatlahir_ayah" class="form-label">Tempat Lahir Ayah</label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_tempatlahir']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_tgllahir_ayah" class="form-label">Tanggal Lahir Ayah</label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_tgllahir']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_kewanegaraan_ayah" class="form-label">Kewanegaraan Ayah</label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_kewanegaraan']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_ptertinggi_ayah" class="form-label">Pendidikan Tertinggi Ayah</label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_ptertinggi']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_pekerjaan']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_penghasilan_ayah" class="form-label">Penghasilan/bulan/tahun Ayah <span class="fz-12">(rupiah)</span></label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_penghasilan']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_alamat_ayah" class="form-label">Alamat Ayah</label></td>
                                                <td><?php if($ayah != null){ echo $ayah['sa_alamat']; } ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                            <label for="" class="form-label for-header">Ibu</label>
                                        <table class="table">
                                            <tr>
                                                <td><label for="sa_nama_ibu" class="form-label">Nama Ibu</label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_nama']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_tempatlahir_ibu" class="form-label">Tempat Lahir Ibu</label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_tempatlahir']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_tgllahir_ibu" class="form-label">Tanggal Lahir Ibu</label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_tgllahir']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_kewanegaraan_ibu" class="form-label">Kewanegaraan Ibu</label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_kewanegaraan']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_ptertinggi_ibu" class="form-label">Pendidikan Tertinggi Ibu</label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_ptertinggi']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_pekerjaan']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_penghasilan_ibu" class="form-label">Penghasilan/bulan/tahun Ibu <span class="fz-12">(rupiah)</span></label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_penghasilan']; } ?></td>
                                            </tr>
                                            <tr>
                                                <td><label for="sa_alamat_ibu" class="form-label">Alamat Ibu</label></td>
                                                <td><?php if($ibu != null){ echo $ibu['sa_alamat']; } ?></td>
                                            </tr>
                                        </table>
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
                                <table class="table">
                                    <tr>
                                        <td><label for="sw_nama_laki" class="form-label">Nama</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_nama'];}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_tempatlahir" class="form-label">Tempat Lahir</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_tempatlahir'];}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_tgllahir" class="form-label">Tanggal Lahir</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_tgllahir'];}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_kewanegaraan" class="form-label">Kewanegaraan</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_kewanegaraan'] ;}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_ptertinggi" class="form-label">Pendidikan Tertinggi</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_ptertinggi'] ;}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_pekerjaan" class="form-label">Pekerjaan</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_pekerjaan'] ;}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_penghasilan" class="form-label">Penghasilan/bulan/tahun <span class="fz-12">(rupiah)</span></label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_penghasilan'] ;}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_alamat" class="form-label">Alamat</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_alamat'] ;}  ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sw_hubunganpeserta" class="form-label">Hubungan dengan peserta didik</label></td>
                                        <td><?php if($wali != null){ echo $wali['sw_hubunganpeserta'] ;}  ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="tab-pane" id="kepribadian" role="tabpanel" aria-labelledby="kepribadian-tab">
                <div class="card mb-2">
                    <div class="card-header for-header">Keterangan Intelegensi</div>
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
                                        <div class="mb-3" style="padding: 8px;">
                                            <label for="s_intelegensi" class="form-label">Intelegensi (IQ)</label></br>
                                           <?php if($kepribadian != null){ echo $kepribadian['s_intelegensi'];}?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3" style="padding: 8px;">
                                            <label for="s_tgltestiq" class="form-label">Tanggal Test Intelegensi (IQ)</label></br>
                                            <?php if($kepribadian != null){ echo $kepribadian['s_tgltestiq'];}?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-header for-header">Kepribadian Siswa</div>
                    <div class="content">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <div class="mb-3">
                                    <table class="table">
                                        <tr>
                                            <td>Kepribadian</td>
                                            <td>Nilai</td>
                                        </tr>
                                        <tr>
                                            <td>Disiplin/ketertiban</td>
                                            <td><?php if($kepribadian != null){ echo $kepribadian['sk_disiplin']; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Prakarsa/kreativitas</td>
                                            <td><?php if($kepribadian != null){ echo $kepribadian['sk_kreativitas']; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggung Jawab</td>
                                            <td><?php if($kepribadian != null){ echo $kepribadian['sk_tanggungjawab']; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Penyesuaian Diri</td>
                                            <td><?php if($kepribadian != null){ echo $kepribadian['sk_penyesuaiandiri']; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Kamantapan Emosi</td>
                                            <td><?php if($kepribadian != null){ echo $kepribadian['sk_kemantapanemosi']; }?></td>
                                        </tr>
                                        <tr>
                                            <td>Kerjasama</td>
                                            <td><?php if($kepribadian != null){ echo $kepribadian['sk_kerjasama']; }?></td>
                                        </tr>
                                    </table>
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
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td>No.</td>
                                                <td>Jenis Prestasi</td>
                                                <td>Keterangan</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1; foreach($prestasi as $p) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $p['pre_jenisprestasi']; ?></td>
                                                        <td><?= $p['pre_keterangan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="" class="form-label for-header">Beasiswa</label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Nama Beasiswa</td>
                                                    <td>Tahun Beasiswa</td>
                                                    <td>Dari</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach($beasiswa as $b) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $b['s_namabeasiswa']; ?></td>
                                                    <td><?= $b['s_tahunbeasiswa']; ?></td>
                                                    <td><?= $b['s_beasiswadari']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
                            <div class="mb-3">
                                <label for="s_catatanpenting" class="form-label">Catatan Penting Selama Siswa Belajar Di Sekolah</label></br>
                                <?= $catatan['s_catatanpenting']; ?>
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


<?= $this->endSection(); ?>