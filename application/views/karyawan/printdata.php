<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

    <h3 style="text-align: center">DATA ABSENSI KARYAWAN</h3>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th width="200px">NIP</th>
                <th width="200px">Nama</th>
                <th width="200px">Jabatan</th>
                <th width="200px">Email</th>
                <th width="200px">Waktu Absen</th>
                <th width="200px">Jenis Absen</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            foreach ($list_absen as $la) : ?>

                <tr>
                    <td><?php echo $la->nip ?></td>
                    <td><?php echo $la->nama ?></td>
                    <td><?php echo $la->jabatan ?></td>
                    <td><?php echo $la->email ?></td>
                    <td><?php echo $la->waktu_absen ?></td>
                    <td><?php echo $la->jenis_absen ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>