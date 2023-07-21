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
        margin-bottom: 10px;
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