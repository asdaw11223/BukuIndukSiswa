
<?php $no=1; foreach ($siswa as $s) : ?>
    <tr>
        <td><input class="form-check-input" type="checkbox" value="siswa[]" id="<?= $s['s_NISN'] ?>"></td>
        <td class="w-23"><?= $no++; ?></td>
        <td class="w-120 text-center">
        </td>
        <td><?= $s['s_NISN'] ?></a></td>
        <td><?= $s['s_namalengkap'] ?></td>
        <td><?= $s['nama_tahunajaran'] ?></td>
        <td><?= $s['nama_jurusan'] ?></td>
    </tr>
<?php endforeach; ?>