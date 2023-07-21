<?php 
$no = 1;
?>

<style>
    table{
        width: 100%;
    }
    td{
        vertical-align: text-top;
    }
    #borderer{
        width: 100%;
        border-collapse: collapse;
        text-align: start;
    }
    #borderer .bold{
        border: 1px solid #000;
        font-weight: bold;
    }
    #borderer td{
        border: 1px solid #000;
    }
    .next-page{
        page-break-after: always;
    }
    .text-center{
        text-align: center;
    }
</style>

<h3>LEMBAR BUKU INDUK PESERTA DIDIK</h3>
Nomor Induk / NISN : <?= $siswa['s_NISN'] ?>

<table border="0">
    <tr>
        <td colspan="4">
            <h3>A. KETERANGAN PRIBADI SISWA</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><?= $siswa['s_namalengkap'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Nama Panggilan</td>
        <td>:</td>
        <td><?= $siswa['s_namapanggilan'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $siswa['nama_jeniskelamin'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Tempat dan tanggal lahir</td>
        <td>:</td>
        <td><?= $siswa['s_tempatlahir'] ?>, <?= $siswa['s_tanggallahir'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Agama</td>
        <td>:</td>
        <td><?= $siswa['s_agama'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Kewanegaraan</td>
        <td>:</td>
        <td><?= $siswa['s_kewanegaraan'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Anak ke-</td>
        <td>:</td>
        <td><?= $siswa['s_anakke'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Jumlah Saudara (orang)</td>
        <td>:</td>
        <td>Kandung <?= $siswa['s_kandung'] ?> Orang, Tiri <?= $siswa['s_tiri'] ?> Orang, Angkat <?= $siswa['s_angkat'] ?> Orang</td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Anak (masih ada/yatim/piatu/yatim piatu)</td>
        <td>:</td>
        <td><?= $siswa['s_anakyp']?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Bahasa Sehari-hari</td>
        <td>:</td>
        <td><?= $siswa['s_bahasaharian'] ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>B. KETERANGAN TEMPAT TINGGAL SISWA</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Alamat Peserta Didik</td>
        <td>:</td>
        <td><?= $alamat['s_alamat']; ?> RT. <?= $alamat['s_rt']; ?> RW. <?= $alamat['s_rw']; ?> Kel. <?= $subdis[0]['subdis_name']; ?> Kec. <?= $dis[0]['dis_name']; ?> Kab. <?= $city[0]['city_name']; ?> Prov. <?= $prov[0]['prov_name']; ?> No. Telepon <?= $alamat['s_telprumah']; ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Selama bersekolah tinggal dengan</td>
        <td>:</td>
        <td><?= $alamat['s_tinggal']; ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Jarak tempat tinggal ke sekolah</td>
        <td>:</td>
        <td><?= $alamat['s_jaraksekolah']; ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Kesekolah dengan (Jalan kaki/ Kendaraan)</td>
        <td>:</td>
        <td><?= $alamat['s_kendaraan'] ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>C. KETERANGAN JASMANI DAN KESEHATAN SISWA</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Berat badan pada waktu diterima <?= $kesehatan['s_bbterima'] ?> kg.  Pada waktu meninggalkan sekolah <?= $kesehatan['s_bbkeluar'] ?> kg.</td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Tinggi badan pada waktu diterima <?= $kesehatan['s_tbterima'] ?> cm.  Pada waktu meninggalkan sekolah <?= $kesehatan['s_tbkeluar'] ?> cm.</td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Golongan Darah</td>
        <td>:</td>
        <td><?= $kesehatan['s_golongandarah'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Penyaikit yang pernah diderita (sakit berat yang memerlukan perawatan khusus) : </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold">No.</td>
                    <td class="bold">Jenis Penyakit</td>
                    <td class="bold">Kelas</td>
                    <td class="bold">Tahun</td>
                    <td class="bold">Lama Sakit</td>
                    <td class="bold">Keterangan</td>
                </tr>
                <?php if($penyakitKhusus != null) : ?>
                    <?php $noo=1; foreach($penyakitKhusus as $pk) : ?>
                    <tr>
                        <td><?= $noo++; ?></td>
                        <td><?= $pk['p_jenispenyakit']; ?></td>
                        <td><?= $pk['p_kelas']; ?></td>
                        <td><?= $pk['p_tahun']; ?></td>
                        <td><?= $pk['p_lamasakit']; ?></td>
                        <td><?= $pk['p_keterangan']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>                
            </table>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Kelainan jasmaniah/ lainnya</td>
        <td>:</td>
        <td><?= $kesehatan['s_kelainan'] ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>D. KETERANGAN TENTANG PENDIDIKAN SEBELUMNYA</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Diterima di sekolah ini sebagai siswa baru tanggal : <?php if($masuk == null){ echo('');}else{ echo($masuk['sp_diterimatgl']); } ?></td>
    <tr>
        <td>&nbsp;</td>
        <td>Asal SMP/MTs</td>
        <td>:</td>
        <td><?php  if($masuk == null){
             echo('');
            }else{
                if($masuk['sp_diterimatgl'] == '0000-00-00' ){
                    echo('');
                }else{
                    echo($masuk['sp_asalsekolah']); 
                }
            } ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Tanggal dan No. Ijazah</td>
        <td>:</td>
        <td><?php if($masuk == null){
             echo('');
            }else{ if($masuk['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($masuk['sp_tglnoijasah'] .', '. $masuk['sp_tglijasah']); }} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Tahun & No. SKHUN</td>
        <td>:</td>
        <td><?php if($masuk == null){
             echo('');
            }else{if($masuk['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($masuk['sp_thnskhun'] .', '. $masuk['sp_thnnoskhun']); }} ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Diterima di sekolah ini sebagai siswa pindahan pada tanggal : <?php if($pindahan == null || $pindahan['sp_diterimatgl'] == '0000-00-00' ){
             echo('');
            }else{
                echo($pindahan['sp_diterimatgl'] );
            }
            ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Di kelas</td>
        <td>:</td>
        <td><?php if($pindahan == null){
             echo('');
            }else{ echo($pindahan['sp_dikelas']);} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Dari SMA/MA/SMK</td>
        <td>:</td>
        <td><?php if($pindahan == null){
             echo('');
            }else{ echo($pindahan['sp_drsekolah']);} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Asal SMP/MTs</td>
        <td>:</td>
        <td><?php if($pindahan == null){
             echo('');
            }else{ if($pindahan['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($pindahan['sp_asalsekolah']); }} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Tanggal dan No. Ijazah</td>
        <td>:</td>
        <td><?php if($pindahan == null){
             echo('');
            }else{ if($pindahan['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($pindahan['sp_tglnoijasah'] .', '. $pindahan['sp_tglijasah']); }} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Tahun & No. SKHUN</td>
        <td>:</td>
        <td><?php if($pindahan == null){
             echo('');
            }else{ if($pindahan['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($pindahan['sp_thnskhun'] .', '. $pindahan['sp_thnnoskhun']); }} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Alasan pindah ke sekolah ini</td>
        <td>:</td>
        <td><?php if($pindahan == null){
             echo('');
            }else{ echo($pindahan['sp_alasanpindah']); } ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>E. KETERANGAN TENTANG ORANG TUA KANDUNG</h3>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold"><?= $no++; ?>. Data orang tua kandung</td>
                    <td class="bold">Ayah</td>
                    <td class="bold">Ibu</td>
                </tr>
                <?php if($ayah != null && $ibu != null) : ?>
                    <tr>
                        <td>Nama</td>
                        <td><?= $ayah['sa_nama']; ?></td>
                        <td><?= $ibu['sa_nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat & tanggal lahir</td>
                        <td><?= $ayah['sa_tempatlahir']; ?>, <?= $ayah['sa_tgllahir']; ?></td>
                        <td><?= $ibu['sa_tempatlahir']; ?>, <?= $ibu['sa_tgllahir']; ?></td>
                    </tr>
                    <tr>
                        <td>Kewanegaraan</td>
                        <td><?= $ayah['sa_kewanegaraan']; ?></td>
                        <td><?= $ibu['sa_kewanegaraan']; ?></td>
                    </tr>
                    <tr>
                        <td>Pendidikan tertinggi</td>
                        <td><?= $ayah['sa_ptertinggi']; ?></td>
                        <td><?= $ibu['sa_ptertinggi']; ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><?= $ayah['sa_pekerjaan']; ?></td>
                        <td><?= $ibu['sa_pekerjaan']; ?></td>
                    </tr>
                    <tr>
                        <td>Penghasilan</td>
                        <td><?= $ayah['sa_penghasilan']; ?></td>
                        <td><?= $ibu['sa_penghasilan']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $ayah['sa_alamat']; ?></td>
                        <td><?= $ibu['sa_alamat']; ?></td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>                
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>F. KETERANGAN TENTANG WALI</h3>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold" colspan="2"><?= $no++; ?>. Data wali</td>
                </tr>
                <?php if($wali != null && $wali['sw_nama'] != null) : ?>
                    <tr>
                        <td>Nama</td>
                        <td><?= $wali['sw_nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat & tanggal lahir</td>
                        <td><?= $wali['sw_tempatlahir']; ?>, <?= $wali['sw_tgllahir']; ?></td>
                    </tr>
                    <tr>
                        <td>Kewanegaraan</td>
                        <td><?= $wali['sw_kewanegaraan']; ?></td>
                    </tr>
                    <tr>
                        <td>Pendidikan tertinggi</td>
                        <td><?= $wali['sw_ptertinggi']; ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><?= $wali['sw_pekerjaan']; ?></td>
                    </tr>
                    <tr>
                        <td>Penghasilan</td>
                        <td><?= $wali['sw_penghasilan']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $wali['sw_alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Hubungan dengan peserta didik</td>
                        <td><?= $wali['sw_hubunganpeserta']; ?></td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>                
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>G. KETERANGAN INTELEGENSI, KEPRIBADIAN DAN PRESTASI SISWA</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Intelegensi (IQ) : <?php if($kepribadian == null){
             echo('');
            }else{ echo($kepribadian['s_intelegensi']); } ?> berdasarkan tes pada tanggal <?php if($kepribadian == null){
                echo('');
               }else{ echo($kepribadian['s_tgltestiq']);} ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Kepribadian : </td>
        <td colspan="2">
            <table id="borderer">
                <tr>
                    <td class="bold">No.</td>
                    <td class="bold">Aspek yang dinilai</td>
                    <td class="bold">Nilai</td>
                </tr>
                <?php $nooo=1; if($kepribadian != null) : ?>
                    <tr>
                        <td><?= $nooo++; ?>.</td>
                        <td>Disiplin/ ketertiban</td>
                        <td><?= $kepribadian['sk_disiplin']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $nooo++; ?>.</td>
                        <td>Prakarsa/ kreativitas</td>
                        <td><?= $kepribadian['sk_kreativitas']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $nooo++; ?>.</td>
                        <td>Tanggung jawab</td>
                        <td><?= $kepribadian['sk_tanggungjawab']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $nooo++; ?>.</td>
                        <td>Penyesuian diri</td>
                        <td><?= $kepribadian['sk_penyesuaiandiri']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $nooo++; ?>.</td>
                        <td>Kemantapan Emosi</td>
                        <td><?= $kepribadian['sk_kemantapanemosi']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $nooo++; ?>.</td>
                        <td>Kerjasama</td>
                        <td><?= $kepribadian['sk_kerjasama']; ?></td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>                
            </table>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?></td>
        <td colspan="4">Prestasi yang pernah dicapai dalam bidang : </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold">No.</td>
                    <td class="bold">Jenis Prestasi</td>
                    <td class="bold">Keterangan</td>
                </tr>
                <?php $pno = 1; if($prestasi != null) : ?>
                    <?php foreach($prestasi as $p) : ?>
                    <tr>
                        <td><?= $pno++?>.</td>
                        <td><?= $p['pre_jenisprestasi']; ?></td>
                        <td><?= $p['pre_keterangan']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>                
            </table>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?></td>
        <td colspan="4">Penerimaan bea siswa : </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold">No.</td>
                    <td class="bold">Nama Beasiswa</td>
                    <td class="bold">Tahun Beasiswa</td>
                    <td class="bold">Dari</td>
                </tr>
                <?php $bno = 1; if($beasiswa != null) : ?>
                    <?php foreach($beasiswa as $p) : ?>
                    <tr>
                        <td><?= $bno++?>.</td>
                        <td><?= $p['s_namabeasiswa']; ?></td>
                        <td><?= $p['s_tahunbeasiswa']; ?></td>
                        <td><?= $p['s_beasiswadari']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>                
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>H. KETERANGAN KEHADIRAN</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?></td>
        <td colspan="4">Jumlah hari kehadiran tiap semester : </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold" rowspan="2">Tahun Ajaran</td>
                    <td class="bold" rowspan="2">Kelas</td>
                    <td class="bold" rowspan="2">Semester</td>
                    <td class="bold" colspan="3" class="text-center">Tidak Hadir</td>
                </tr>
                <tr>
                    <td class="bold" >Sakit</td>
                    <td class="bold" >Izin</td>
                    <td class="bold" >Alfa</td>
                </tr>
                <?php if($kehadiran != null) : ?>
                <?php foreach($kehadiran as $k) : ?>
                <tr>
                    <td><?= $k['nama_tahunajaran'] ?></td>
                    <td><?= $k['nama_kelas'] ?></td>
                    <td><?= $k['kh_semester'] ?></td>
                    <td><?= $k['kh_sakit'] ?></td>
                    <td><?= $k['kh_izin'] ?></td>
                    <td><?= $k['kh_alpa'] ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada data</td>
                    </tr>
                <?php endif; ?>                
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>I. MENINGGALKAN SEKOLAH</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Tamat Belajar</td>
        <td>:</td>
        <td><?php if($pendidikan == null || $pendidikan['s_tgltamat'] == '0000-00-00' ){
             echo('');
            }else {echo('Tanggal '.$pendidikan['s_tgltamat'].' No. Ijasah '.$pendidikan['s_noijasah']);
            } ?> </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Melanjutkan sekolah ke</td>
        <td>:</td>
        <td><?= $pendidikan['s_melanjutkansekolah'] ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $pendidikan['s_alamat'] ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Pindah Sekolah ke</td>
        <td>:</td>
        <td><?php if($pindah == null){
             echo('');
            }else{ echo( $pindah['pp_kesekolah']);} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Tanggal pindah</td>
        <td>:</td>
        <td><?php if($pindah == null){
             echo('');
            }else{if($pindah['pp_tglpindah'] == '0000-00-00'){echo(''); }else{ echo('Tanggal '. $pindah['pp_tglpindah'].' dari kelas '. $pindah['pp_drkelas'] );}} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Alamat Sekolah</td>
        <td>:</td>
        <td><?php if($pindah == null){
             echo('');
            }else{ echo( $pindah['pp_alamatsekolah']);} ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Alasan Pindah</td>
        <td>:</td>
        <td><?php if($pindah == null){
             echo('');
            }else{ echo( $pindah['pp_alasanpindah']);} ?></td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Putus Sekolah</td>
        <td>:</td>
        <td><?php if($pendidikan == null){
             echo('');
            }else{if($pendidikan['s_tglputus'] == '0000-00-00'){echo(''); }else{ echo('Tanggal '. $pendidikan['s_tglputus'].' Alasan '. $pendidikan['s_alasaputus'] );}} ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>J. LAIN- LAIN</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Catatan Penting Selama Siswa Belajar Di Sekolah Ini</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3"><?php if($catatan == null){
             echo('');
            }else{ echo($catatan['s_catatanpenting']);} ?></td>
    </tr>
</table>

<div class="next-page"></div>

<?php foreach($siswaKelas as $siswa) : ?>

<table style="width: auto;">
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td><?= $siswa_s['s_NISN']; ?></td>
    </tr>
    <tr>
        <td>No. Induk</td>
        <td>:</td>
        <td><?= $siswa_s['s_namalengkap']; ?></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?= $siswa['nama_kelas']; ?></td>
    </tr>
    <tr>
        <td>Tahun Ajaran</td>
        <td>:</td>
        <td><?= $siswa['nama_tahunajaran']; ?></td>
    </tr>
</table>

<table id="borderer">
        <tr>
            <td class="bold text-center" colspan="9">SEMESTER 1</td>
        </tr>
        <tr>
            <td class="bold" rowspan="2">MATA PELAJARAN</td>
            <td class="bold" colspan="4">NILAI PENGETAHUAN</td>
            <td class="bold" colspan="4">NILAI KETERAMPILAN</td>
        </tr>
        <tr>
            <td class="bold">KB</td>
            <td class="bold">Angka</td>
            <td class="bold">Predikat</td>
            <td class="bold">Deskripsi</td>
            <td class="bold">KB</td>
            <td class="bold">Angka</td>
            <td class="bold">Predikat</td>
            <td class="bold">Deskripsi</td>
        </tr>
        <tr>
            <td colspan="9" class="table-active">KELOMPOK A</td>
        </tr>

        <?php foreach($nilai as $n) : ?>
            <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 1 && $n['id_kelas'] == $siswa['id_kelas']) : ?>
            <?php if($n['nama_kelompok'] == 'Kelompok A') : ?>
                <tr>
                    <td><?= $n['nama_matapelajaran'] ?></td>
                    <td><?= $n['np_kb'] ?></td>
                    <td><?= $n['np_angka'] ?></td>
                    <td><?= $n['np_predikat'] ?></td>
                    <td><?= $n['np_deskripsi'] ?></td>
                    <td><?= $n['nk_kb'] ?></td>
                    <td><?= $n['nk_angka'] ?></td>
                    <td><?= $n['nk_predikat'] ?></td>
                    <td><?= $n['nk_deskripsi'] ?></td>
                </tr>
            <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td colspan="9" class="table-active">KELOMPOK B</td>
        </tr>

        <?php foreach($nilai as $n) : ?>
            <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 1 && $n['id_kelas'] == $siswa['id_kelas']) : ?>
            <?php if($n['nama_kelompok'] == 'Kelompok B') : ?>
                <tr>
                    <td><?= $n['nama_matapelajaran'] ?></td>
                    <td><?= $n['np_kb'] ?></td>
                    <td><?= $n['np_angka'] ?></td>
                    <td><?= $n['np_predikat'] ?></td>
                    <td><?= $n['np_deskripsi'] ?></td>
                    <td><?= $n['nk_kb'] ?></td>
                    <td><?= $n['nk_angka'] ?></td>
                    <td><?= $n['nk_predikat'] ?></td>
                    <td><?= $n['nk_deskripsi'] ?></td>
                </tr>
            <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>

        <tr>
            <td colspan="9" class="table-active">KELOMPOK C</td>
        </tr>

        <?php foreach($nilai as $n) : ?>
            <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 1 && $n['id_kelas'] == $siswa['id_kelas']) : ?>
            <?php if($n['nama_kelompok'] == 'Kelompok C') : ?>
                <tr>
                    <td><?= $n['nama_matapelajaran'] ?></td>
                    <td><?= $n['np_kb'] ?></td>
                    <td><?= $n['np_angka'] ?></td>
                    <td><?= $n['np_predikat'] ?></td>
                    <td><?= $n['np_deskripsi'] ?></td>
                    <td><?= $n['nk_kb'] ?></td>
                    <td><?= $n['nk_angka'] ?></td>
                    <td><?= $n['nk_predikat'] ?></td>
                    <td><?= $n['nk_deskripsi'] ?></td>
                </tr>
            <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
</table>

<table id="borderer">
    <tr>
        <td class="bold text-center" colspan="9">SEMESTER 2</td>
    </tr>
    <tr>
        <td class="bold" rowspan="2">MATA PELAJARAN</td>
        <td class="bold" colspan="4">NILAI PENGETAHUAN</td>
        <td class="bold" colspan="4">NILAI KETERAMPILAN</td>
    </tr>
    <tr>
        <td class="bold">KB</td>
        <td class="bold">Angka</td>
        <td class="bold">Predikat</td>
        <td class="bold">Deskripsi</td>
        <td class="bold">KB</td>
        <td class="bold">Angka</td>
        <td class="bold">Predikat</td>
        <td class="bold">Deskripsi</td>
    </tr>
    <tr>
        <td colspan="9" class="table-active">KELOMPOK A</td>
    </tr>

    <?php foreach($nilai as $n) : ?>
        <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 2 && $n['id_kelas'] == $siswa['id_kelas']) : ?>
        <?php if($n['nama_kelompok'] == 'Kelompok A') : ?>
            <tr>
                <td><?= $n['nama_matapelajaran'] ?></td>
                <td><?= $n['np_kb'] ?></td>
                <td><?= $n['np_angka'] ?></td>
                <td><?= $n['np_predikat'] ?></td>
                <td><?= $n['np_deskripsi'] ?></td>
                <td><?= $n['nk_kb'] ?></td>
                <td><?= $n['nk_angka'] ?></td>
                <td><?= $n['nk_predikat'] ?></td>
                <td><?= $n['nk_deskripsi'] ?></td>
            </tr>
        <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <tr>
        <td colspan="9" class="table-active">KELOMPOK B</td>
    </tr>

    <?php foreach($nilai as $n) : ?>
        <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 2 && $n['id_kelas'] == $siswa['id_kelas']) : ?>
        <?php if($n['nama_kelompok'] == 'Kelompok B') : ?>
            <tr>
                <td><?= $n['nama_matapelajaran'] ?></td>
                <td><?= $n['np_kb'] ?></td>
                <td><?= $n['np_angka'] ?></td>
                <td><?= $n['np_predikat'] ?></td>
                <td><?= $n['np_deskripsi'] ?></td>
                <td><?= $n['nk_kb'] ?></td>
                <td><?= $n['nk_angka'] ?></td>
                <td><?= $n['nk_predikat'] ?></td>
                <td><?= $n['nk_deskripsi'] ?></td>
            </tr>
        <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <tr>
        <td colspan="9" class="table-active">KELOMPOK C</td>
    </tr>

    <?php foreach($nilai as $n) : ?>
        <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 2 && $n['id_kelas'] == $siswa['id_kelas']) : ?>
        <?php if($n['nama_kelompok'] == 'Kelompok C') : ?>
            <tr>
                <td><?= $n['nama_matapelajaran'] ?></td>
                <td><?= $n['np_kb'] ?></td>
                <td><?= $n['np_angka'] ?></td>
                <td><?= $n['np_predikat'] ?></td>
                <td><?= $n['np_deskripsi'] ?></td>
                <td><?= $n['nk_kb'] ?></td>
                <td><?= $n['nk_angka'] ?></td>
                <td><?= $n['nk_predikat'] ?></td>
                <td><?= $n['nk_deskripsi'] ?></td>
            </tr>
        <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

<div class="next-page"></div>

<?php endforeach; ?>

<h3>PRAKTIK KERJA LAPANGAN</h3>

<table id="borderer">
<tr>
    <td class="bold">No.</td>
    <td class="bold">Nama DU/DI atau Instansi Relevan</td>
    <td class="bold">Lokasi</td>
    <td class="bold">Lamanya (bulan)</td>
    <td class="bold">Keterangan</td>
</tr>
<?php $no=1; foreach($pkl as $p) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $p['pkl_namainstansi']; ?></td>
        <td><?= $p['pkl_lokasi']; ?></td>
        <td><?= $p['pkl_lama']; ?></td>
        <td><?= $p['pkl_keterangan']; ?></td>
    </tr>
<?php endforeach; ?>

</thead>
</table>

<h3>KEGIATAN EKSTRAKURIKULER</h3>

<table id="borderer">
<tr>
    <td class="bold">No.</td>
    <td class="bold">Kegiatan Ekstrakurikuler</td>
    <td class="bold">Kelas</td>
    <td class="bold">Keterangan</td>
</tr>
<?php $no=1; foreach($eskul as $p) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $p['eskul_kegiatan']; ?></td>
        <td><?= $p['nama_kelas']; ?></td>
        <td><?= $p['eskul_keterangan']; ?></td>
    </tr>
<?php endforeach; ?>
</table>

<h3>PRESTASI</h3>

<table id="borderer">
<tr>
    <td class="bold">No.</td>
    <td class="bold">Jenis Prestasi</td>
    <td class="bold">Keterangan</td>
</tr>
<?php $no=1; foreach($prestasi as $p) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $p['pre_jenisprestasi']; ?></td>
        <td><?= $p['pre_keterangan']; ?></td>
    </tr>
<?php endforeach; ?>
</table>

<h3>KETIDAKHADIRAN</h3>

<table id="borderer">
<tr>
    <td class="bold" rowspan="2">No.</td>
    <td class="bold" rowspan="2">Tahun Ajaran</td>
    <td class="bold" rowspan="2">Kelas</td>
    <td class="bold" rowspan="2">Semester</td>
    <td class="bold" colspan="3" class="text-center">Tidak Hadir</td>
</tr>
<tr>
    <td class="bold">Sakit</td>
    <td class="bold">Izin</td>
    <td class="bold">Alfa</td>
</tr>
<?php $no=1; foreach($kehadiran as $k) : ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $k['nama_tahunajaran'] ?></td>
    <td><?= $k['nama_kelas'] ?></td>
    <td><?= $k['kh_semester'] ?></td>
    <td><?= $k['kh_sakit'] ?></td>
    <td><?= $k['kh_izin'] ?></td>
    <td><?= $k['kh_alpa'] ?></td>
</tr>
<?php endforeach; ?>
</table>