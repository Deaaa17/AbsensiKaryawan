<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

    <h3 style="text-align: center">DATA ABSENSI KARYAWAN</h3>
    <br>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Waktu Absen</th>
                <th>Jenis Absen</th>
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