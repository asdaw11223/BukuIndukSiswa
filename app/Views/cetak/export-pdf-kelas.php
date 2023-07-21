<?php 
$no = 1;
$noSiswa = 1;
$no_s=0;
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

<?php foreach($siswaKelas as $siswa) : ?>

    <table id="borderer" style="width: auto;">
        <tr>
            <td class="bold">No. Urut</td>
        </tr>
        <tr>
            <td class="bold text-center"><?= $noSiswa++; ?></td>
        </tr>
    </table>

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
            <td><?= $siswa['s_alamat']; ?> RT. <?= $siswa['s_rt']; ?> RW. <?= $siswa['s_rw']; ?> Kel. <?= $subdis_s[$no_s]; ?> Kec. <?= $dis_s[$no_s]; ?> Kab. <?= $city_s[$no_s]; ?> Prov. <?= $prov_s[$no_s++]; ?> No. Telepon <?= $siswa['s_telprumah']; ?></td>
        </tr>
        <tr>
            <td><?= $no++; ?>.</td>
            <td>Selama bersekolah tinggal dengan</td>
            <td>:</td>
            <td><?= $siswa['s_tinggal']; ?></td>
        </tr>
        <tr>
            <td><?= $no++; ?>.</td>
            <td>Jarak tempat tinggal ke sekolah</td>
            <td>:</td>
            <td><?= $siswa['s_jaraksekolah']; ?></td>
        </tr>
        <tr>
            <td><?= $no++; ?>.</td>
            <td>Kesekolah dengan (Jalan kaki/ Kendaraan)</td>
            <td>:</td>
            <td><?= $siswa['s_kendaraan'] ?></td>
        </tr>
    <tr>
        <td colspan="4">
            <h3>C. KETERANGAN JASMANI DAN KESEHATAN SISWA</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Berat badan pada waktu diterima <?= $siswa['s_bbterima'] ?> kg.  Pada waktu meninggalkan sekolah <?= $siswa['s_bbkeluar'] ?> kg.</td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">Tinggi badan pada waktu diterima <?= $siswa['s_tbterima'] ?> cm.  Pada waktu meninggalkan sekolah <?= $siswa['s_tbkeluar'] ?> cm.</td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Golongan Darah</td>
        <td>:</td>
        <td><?= $siswa['s_golongandarah'] ?></td>
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
                <?php if($penyakitKhusus != null ) : ?>
                    <?php $noo=1; foreach($penyakitKhusus as $pk) : ?>
                        <?php if($pk['s_NISN'] == $siswa['s_NISN']) : ?>
                            <tr>
                                <td><?= $noo++; ?></td>
                                <td><?= $pk['p_jenispenyakit']; ?></td>
                                <td><?= $pk['p_kelas']; ?></td>
                                <td><?= $pk['p_tahun']; ?></td>
                                <td><?= $pk['p_lamasakit']; ?></td>
                                <td><?= $pk['p_keterangan']; ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>           
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
        <td><?= $siswa['s_kelainan'] ?></td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>D. KETERANGAN TENTANG PENDIDIKAN SEBELUMNYA</h3>
        </td>
    </tr>
    <?php foreach($masuk as $m) : ?>
        <?php if($m['s_NISN'] == $siswa['s_NISN']) : ?>
            <tr>
                <td><?= $no++; ?>.</td>
                <td colspan="3">Diterima di sekolah ini sebagai siswa baru tanggal : <?php if($m == null){ echo('');}else{ echo($m['sp_diterimatgl']); } ?></td>
            <tr>
                <td>&nbsp;</td>
                <td>Asal SMP/MTs</td>
                <td>:</td>
                <td><?php  if($m == null){
                    echo('');
                    }else{
                        if($m['sp_diterimatgl'] == '0000-00-00' ){
                            echo('');
                        }else{
                            echo($m['sp_asalsekolah']); 
                        }
                    } ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal dan No. Ijazah</td>
                <td>:</td>
                <td><?php if($m == null){
                    echo('');
                    }else{ if($m['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($m['sp_tglnoijasah'] .', '. $m['sp_tglijasah']); }} ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tahun & No. SKHUN</td>
                <td>:</td>
                <td><?php if($m == null){
                    echo('');
                    }else{if($m['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($m['sp_thnskhun'] .', '. $m['sp_thnnoskhun']); }} ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php foreach($pindahan as $p) : ?>
        <?php if($p['s_NISN'] == $siswa['s_NISN']) : ?>
            <tr>
                <td><?= $no++; ?>.</td>
                <td colspan="3">Diterima di sekolah ini sebagai siswa pindahan pada tanggal : <?php if($p == null || $p['sp_diterimatgl'] == '0000-00-00' ){
                    echo('');
                    }else{
                        echo($p['sp_diterimatgl'] );
                    }
                    ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Di kelas</td>
                <td>:</td>
                <td><?php if($p == null){
                    echo('');
                    }else{ echo($p['sp_dikelas']);} ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Dari SMA/MA/SMK</td>
                <td>:</td>
                <td><?php if($p == null){
                    echo('');
                    }else{ echo($p['sp_drsekolah']);} ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Asal SMP/MTs</td>
                <td>:</td>
                <td><?php if($p == null){
                    echo('');
                    }else{ if($p['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($p['sp_asalsekolah']); }} ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tanggal dan No. Ijazah</td>
                <td>:</td>
                <td><?php if($p == null){
                    echo('');
                    }else{ if($p['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($p['sp_tglnoijasah'] .', '. $p['sp_tglijasah']); }} ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tahun & No. SKHUN</td>
                <td>:</td>
                <td><?php if($p == null){
                    echo('');
                    }else{ if($p['sp_diterimatgl'] == '0000-00-00'){ echo('');}else{ echo($p['sp_thnskhun'] .', '. $p['sp_thnnoskhun']); }} ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Alasan pindah ke sekolah ini</td>
                <td>:</td>
                <td><?php if($p == null){
                    echo('');
                    }else{ echo($p['sp_alasanpindah']); } ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>

    
    <tr>
        <td colspan="4">
            <h3>E. KETERANGAN TENTANG ORANG TUA KANDUNG</h3>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold">Data orang tua kandung</td>
                    <td class="bold">Ayah</td>
                </tr>
                <?php foreach ($orangtua as $ot) : ?>
                    <?php if($ot['s_NISN'] == $siswa['s_NISN'] && $ot['id_jeniskelamin'] == 1) : ?>
                        <tr>
                            <td>Nama</td>
                            <td><?= $ot['sa_nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat & tanggal lahir</td>
                            <td><?= $ot['sa_tempatlahir']; ?>, <?= $ot['sa_tgllahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Kewanegaraan</td>
                            <td><?= $ot['sa_kewanegaraan']; ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan tertinggi</td>
                            <td><?= $ot['sa_ptertinggi']; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td><?= $ot['sa_pekerjaan']; ?></td>
                        </tr>
                        <tr>
                            <td>Penghasilan</td>
                            <td><?= $ot['sa_penghasilan']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $ot['sa_alamat']; ?></td>
                        </tr>
                    <?php endif; ?>      
                <?php endforeach ?>          
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            <table id="borderer">
                <tr>
                    <td class="bold">Data orang tua kandung</td>
                    <td class="bold">Ibu</td>
                </tr>
                <?php foreach ($orangtua as $ot) : ?>
                    <?php if($ot['s_NISN'] == $siswa['s_NISN'] && $ot['id_jeniskelamin'] == 2) : ?>
                        <tr>
                            <td>Nama</td>
                            <td><?= $ot['sa_nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat & tanggal lahir</td>
                            <td><?= $ot['sa_tempatlahir']; ?>, <?= $ot['sa_tgllahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Kewanegaraan</td>
                            <td><?= $ot['sa_kewanegaraan']; ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan tertinggi</td>
                            <td><?= $ot['sa_ptertinggi']; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td><?= $ot['sa_pekerjaan']; ?></td>
                        </tr>
                        <tr>
                            <td>Penghasilan</td>
                            <td><?= $ot['sa_penghasilan']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $ot['sa_alamat']; ?></td>
                        </tr>
                    <?php endif; ?>      
                <?php endforeach ?>          
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
                <?php foreach ($wali as $w) : ?>
                    <?php if($w != null && $w['sw_nama'] != null) : ?>
                    <?php if($w['s_NISN'] == $siswa['s_NISN']) : ?>
                        <tr>
                            <td>Nama</td>
                            <td><?= $w['sw_nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Tempat & tanggal lahir</td>
                            <td><?= $w['sw_tempatlahir']; ?>, <?= $w['sw_tgllahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Kewanegaraan</td>
                            <td><?= $w['sw_kewanegaraan']; ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan tertinggi</td>
                            <td><?= $w['sw_ptertinggi']; ?></td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td><?= $w['sw_pekerjaan']; ?></td>
                        </tr>
                        <tr>
                            <td>Penghasilan</td>
                            <td><?= $w['sw_penghasilan']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $w['sw_alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Hubungan dengan peserta didik</td>
                            <td><?= $w['sw_hubunganpeserta']; ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach ?>
            </table>
        </td>
    </tr>
    
    <tr>
        <td colspan="4">
            <h3>G. KETERANGAN INTELEGENSI, KEPRIBADIAN DAN PRESTASI SISWA</h3>
        </td>
    </tr>
    <?php foreach($kepribadian_s as $kepribadian) : ?>
    <?php if($kepribadian['s_NISN'] == $siswa['s_NISN']) : ?>
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
    <?php endif; ?>
    <?php endforeach ?>
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
                <?php $pno = 1; if($prestasi_s != null) : ?>
                    <?php foreach($prestasi_s as $p) : ?>
                    <?php if($p['s_NISN'] == $siswa['s_NISN']) : ?>
                    <tr>
                        <td><?= $pno++?>.</td>
                        <td><?= $p['pre_jenisprestasi']; ?></td>
                        <td><?= $p['pre_keterangan']; ?></td>
                    </tr>
                    <?php endif; ?>
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
                <?php $bno = 1; if($beasiswa_s != null) : ?>
                    <?php foreach($beasiswa_s as $p) : ?>
                    <?php if($p['s_NISN'] == $siswa['s_NISN']) : ?>
                    <tr>
                        <td><?= $bno++?>.</td>
                        <td><?= $p['s_namabeasiswa']; ?></td>
                        <td><?= $p['s_tahunbeasiswa']; ?></td>
                        <td><?= $p['s_beasiswadari']; ?></td>
                    </tr>
                    <?php endif; ?> 
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
                <?php if($kehadiran_s != null) : ?>
                <?php foreach($kehadiran_s as $k) : ?>
                <?php if($k['s_NISN'] == $siswa['s_NISN']) : ?>
                    <tr>
                        <td><?= $k['nama_tahunajaran'] ?></td>
                        <td><?= $k['nama_kelas'] ?></td>
                        <td><?= $k['kh_semester'] ?></td>
                        <td><?= $k['kh_sakit'] ?></td>
                        <td><?= $k['kh_izin'] ?></td>
                        <td><?= $k['kh_alpa'] ?></td>
                    </tr>
                <?php endif; ?>      
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
        <td>
        <?php foreach($pendidikan_s as $pendidikan) : ?>
            <?php if($pendidikan['s_NISN'] == $siswa['s_NISN']) : ?>
                <?php if($pendidikan == null || $pendidikan['s_tgltamat'] == '0000-00-00' ){
                echo('');
                }else {echo('Tanggal '.$pendidikan['s_tgltamat'].' No. Ijasah '.$pendidikan['s_noijasah']);
                } ?>
            <?php endif; ?>      
        <?php endforeach; ?></td>
    </tr>
    <?php foreach($pendidikan_s as $pendidikan) : ?>
    <?php if($pendidikan['s_NISN'] == $siswa['s_NISN']) : ?>
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
    <?php endif; ?>      
    <?php endforeach; ?>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Pindah Sekolah ke</td>
        <td>:</td>
        <td>
        <?php foreach($pindah_s as $pindah) : ?>
    <?php if($pindah['s_NISN'] == $siswa['s_NISN']) : ?>
    <?php if($pindah == null){
             echo('');
            }else{ echo( $pindah['pp_kesekolah']);} ?>
            <?php endif; ?>      
            <?php endforeach; ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Tanggal pindah</td>
        <td>:</td>
        <td>
        <?php foreach($pindah_s as $pindah) : ?>
    <?php if($pindah['s_NISN'] == $siswa['s_NISN']) : ?>
            <?php if($pindah == null){
             echo('');
            }else{if($pindah['pp_tglpindah'] == '0000-00-00'){echo(''); }else{ echo('Tanggal '. $pindah['pp_tglpindah'].' dari kelas '. $pindah['pp_drkelas'] );}} ?>
            <?php endif; ?>      
            <?php endforeach; ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Alamat Sekolah</td>
        <td>:</td>
        <td>
        <?php foreach($pindah_s as $pindah) : ?>
    <?php if($pindah['s_NISN'] == $siswa['s_NISN']) : ?>
            <?php if($pindah == null){
             echo('');
            }else{ echo( $pindah['pp_alamatsekolah']);} ?>
            <?php endif; ?>      
            <?php endforeach; ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>Alasan Pindah</td>
        <td>:</td>
        <td>
        <?php foreach($pindah_s as $pindah) : ?>
    <?php if($pindah['s_NISN'] == $siswa['s_NISN']) : ?>
            <?php if($pindah == null){
             echo('');
            }else{ echo( $pindah['pp_alasanpindah']);} ?>
            <?php endif; ?>      
            <?php endforeach; ?>
        </td>
    </tr>
    <tr>
        <td><?= $no++; ?>.</td>
        <td>Putus Sekolah</td>
        <td>:</td>
        <td>
    <?php foreach($pendidikan_s as $pendidikan) : ?>
    <?php if($pendidikan['s_NISN'] == $siswa['s_NISN']) : ?>
            <?php if($pendidikan == null){
             echo('');
            }else{if($pendidikan['s_tglputus'] == '0000-00-00'){echo(''); }else{ echo('Tanggal '. $pendidikan['s_tglputus'].' Alasan '. $pendidikan['s_alasaputus'] );}} ?>
    <?php endif; ?>      
    <?php endforeach; ?>    
        </td>
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
    <?php foreach($catatan as $ct) : ?>
        <?php if($ct['s_NISN'] == $siswa['s_NISN']) : ?>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3"><?php if($ct == null){
                echo('');
                }else{ echo($ct['s_catatanpenting']);} ?></td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </table>
    <div class="next-page"></div>
    <?php $no = 1; ?>
<?php endforeach; ?>