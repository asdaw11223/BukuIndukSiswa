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
    .text-center{
        text-align: center;
    }
    .next-page{
        page-break-after: always;
    }
    #borderer td{
        font-size: 14px;
        border: 1px solid #000;
    }
</style>

<h3>DAFTAR PESERTA DIDIK SMK PASUNDAN RANCAEKEK</h3>

<?php if($kelas != null) : ?>
    <table>
        <tr>
            <td>Nama Kelas</td>
            <td>:</td>
            <td><?= $kelas['nama_kelas'] ?></td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><?= $kelas['nama_tahunajaran'] ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td><?= $kelas['nama_jurusan'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
<?php endif; ?>

<table id="borderer">
    <tr>
        <td class="bold">No.</td>
        <td class="bold">No. Induk/ NISN</td>
        <td class="bold">Nama Peserta Didik</td>
        <td class="bold">Jenis Kelamin</td>
        <td class="bold">Tahun Ajaran Masuk</td>
        <td class="bold">Jurusan</td>
    </tr>
    <?php if($siswa != null) : ?>
    <?php foreach($siswa as $k) : ?>
        <?php if($k['s_NISN'] == '0000000000') : ?>
        <?php else : ?>
        <tr>
            <td class="text-center"><?= $no++; ?>.</td>
            <td><?= $k['s_NISN'] ?></td>
            <td><?= $k['s_namalengkap'] ?></td>
            <td><?= $k['nama_jeniskelamin'] ?></td>
            <td><?= $k['nama_tahunajaran'] ?></td>
            <td><?= $k['nama_jurusan'] ?></td>
        </tr>
    <?php endif; endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6" style="text-align: center;">Tidak ada data</td>
        </tr>
    <?php endif; ?>                
</table>