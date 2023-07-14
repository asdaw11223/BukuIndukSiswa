
<table border="1">
<thead>
    <tr>
        <th><b>Template Nilai</b></th>
    </tr>
    <tr>
        <th>Kelas</th>
        <td><?= $kelas['nama_kelas'] ?></td>
    </tr>
    <tr>
        <th>Semester</th>
        <td><?= $semester ?></td>
    </tr>
    <tr>
        <th>Paket Keahlian</th>
        <td><?= $kelas['nama_jurusan'] ?></td>
    </tr>
    <tr>
        <th>Tahun Pelajaran</th>
        <td><?= $kelas['nama_tahunajaran'] ?></td>
    </tr>
    <tr>
        <th rowspan="3">No.</th>
        <th rowspan="3">NISN</th>
        <th rowspan="3">Nama Siswa</th>
        <?php for($i = 0; $i < count($array); $i++) : ?>

            <th colspan="8">
                <?= $array[$i] ?>
            </th>
            
        <?php endfor ?>
        <th rowspan="2" colspan="4">Praktek Kerja Lapangan (PKL)</th>
        <th rowspan="2" colspan="6">Ekstrakurikuler</th>
        <th rowspan="2" colspan="6">Prestasi</th>
        <th rowspan="2" colspan="3">Ketidakhadiran</th>
    </tr>
    <tr>
        <?php for($i = 0; $i < count($array); $i++) : ?>
        <th colspan="4">Nilai Pengetahuan</th>
        <th colspan="4">Nilai Keterampilan</th>
        <?php endfor ?>
    </tr>
    <tr>
        <?php for($i = 0; $i < count($array); $i++) : ?>
        <th>KB</th>
        <th>Angka</th>
        <th>Predikat</th>
        <th>Deskripsi Matapelajaran</th>
        <th>KB</th>
        <th>Angka</th>
        <th>Predikat</th>
        <th>Deskripsi Matapelajaran</th>
        <?php endfor ?>
        <th>DU/DI</th>
        <th>Lokasi</th>
        <th>Lamanya (bulan)</th>
        <th>Keterangan</th>
        <th>Ekstrakurikuler 1</th>
        <th>Ekstrakurikuler 2</th>
        <th>Ekstrakurikuler 3</th>
        <th>Keterangan 1</th>
        <th>Keterangan 2</th>
        <th>Keterangan 3</th>
        <th>Prestasi 1</th>
        <th>Prestasi 2</th>
        <th>Prestasi 3</th>
        <th>Keterangan 1</th>
        <th>Keterangan 2</th>
        <th>Keterangan 3</th>
        <th>Sakit</th>
        <th>Izin</th>
        <th>Alfa</th>
    </tr>
    
</thead>
<tbody>
    <?php $no=1; foreach($siswa as $s) : ?> 
    <tr>
        <!-- Siswa -->
        <td><?= $no++; ?></td>
        <td><?= $s['s_NISN'] ?></td>
        <td><?= $s['s_namalengkap'] ?></td>
        
        <!-- Nilai -->
        <?php foreach($nilai as $n) : ?>
        <?php if($s['s_NISN'] == $n['s_NISN']) : ?>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        <td>
        </td>
        <td>
        </td>
        <?php endif ?>
        <?php endforeach ?>

        <!-- PKL -->
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>

        <!-- Ekstra -->
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>

        <!-- Prestasi -->
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>

        <!-- Ketidakhadiran -->
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>

    </tr>
    <?php endforeach ?>
</tbody>
</table>

<!-- // header("Content-type:application/vnd-ms-excel");
        // header("Content-Disposition: attachment; filename=Data Siswa.xlsx");
        
        // $kelas = $this->kelasModel->where('id_kelas', $id_kelas)
        // ->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_kelas.id_jurusan')
        // ->join('tb_tahunajaran', 'tb_tahunajaran.id_tahunajaran = tb_kelas.id_tahunajaran')
        // ->first();

        // $siswa = $this->daftarSiswaKelasModel->where('id_kelas', $id_kelas)
        // ->join('tb_siswa', 'tb_siswa.s_NISN = tb_daftarsiswakelas.s_NISN')
        // ->findAll();
        
        // $nilai = $this->nilaiModel->where('id_kelas', $id_kelas)->where('semester', $semester)
        // ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_nilai.id_matapelajaran')
        // ->join('tb_siswa', 'tb_siswa.s_NISN = tb_nilai.s_NISN')
        // ->findAll();

		// $id_siswa = $this->nilaiModel->where('id_kelas', $id_kelas)
        // ->first();

        // $array = [];
        // foreach($nilai as $nm){
        //     if($id_siswa['s_NISN'] == $nm['s_NISN']){
        //         $array[] = $nm['nama_matapelajaran'];
        //     }
        // }        

        // $data = [
        //     'title' => 'Nilai',
        //     'kelas' => $kelas,
        //     'siswa' => $siswa,
        //     'array' => $array,
        //     'semester' => $semester,
        //     'nilai' => $nilai
        // ];

        // return view('nilai/template', $data); -->