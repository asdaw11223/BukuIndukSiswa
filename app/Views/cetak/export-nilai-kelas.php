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
            <td><?= $siswa['s_namalengkap']; ?></td>
        </tr>
        <tr>
            <td>No. Induk</td>
            <td>:</td>
            <td><?= $siswa['s_NISN']; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?php foreach($kelas as $k) : ?>
                    <?php if($k['id_kelas'] == $siswa['id_kelas']) : ?>
                        <?= $k['nama_kelas']; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><?php foreach($tahunajaran as $k) : ?>
                    <?php if($k['id_tahunajaran'] == $siswa['id_tahunajaran']) : ?>
                        <?= $k['nama_tahunajaran']; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
        </tr>
    </table>
    
    <table id="borderer">
            <tr>
                <td class="bold text-center" colspan="9">Semester 1</td>
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
                <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 1) : ?>
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
                <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 1) : ?>
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
                <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 1) : ?>
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
            <td class="bold text-center" colspan="9">Semester 2</td>
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
            <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 2) : ?>
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
            <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 2) : ?>
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
            <?php if($n['s_NISN'] == $siswa['s_NISN'] && $n['semester'] == 2) : ?>
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
    <?php $no = 1; ?>
    
<?php endforeach; ?>