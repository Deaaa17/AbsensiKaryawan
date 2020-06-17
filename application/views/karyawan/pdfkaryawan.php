<!doctype html>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head><body>

    <h3 style="text-align: center">DATA KARYAWAN</h3>
    <br>
    <table border="1" width="100%">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>No. Telp</th>
        </tr>
        <?php
        $no = 1;
        foreach ($list_karyawan as $lk) : ?>

            <tr>
                <td><?php echo $lk->nip ?></td>
                <td><?php echo $lk->nama ?></td>
                <td><?php echo $lk->email ?></td>
                <td><?php echo $lk->jabatan ?></td>
                <td><?php echo $lk->telp ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</body></html>