<?= $this->session->flashdata('message'); ?>
<a href="<?= base_url(); ?>karyawan/insertdata/" class="btn btn-primary mb-3">Tambah Data Karyawan</button></a>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <?php $attributes = array('class' => 'input-group input-group-sm', 'method' => 'get'); ?>
                    <?php echo form_open("karyawan", $attributes); ?>
                    <div class="input-group-append">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search" autocomplete="off">
                        <button type="submit" name="search" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>No. Telp</th>
                            <th>Foto</th>
                            <!-- <th>Detail</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_karyawan as $lk) : ?>
                            <tr>
                                <td><?= $lk->nip ?></td>
                                <td><?= $lk->nama ?></td>
                                <td><?= $lk->email ?></td>
                                <td><?= $lk->jabatan ?></td>
                                <td><?= $lk->telp ?></td>
                                <td><img src="<?= base_url() ?>assets/foto/<?= $lk->foto ?>" alt="" width="60px" height="60px"></td>
                                <!-- <td><a href="<?= base_url(); ?>karyawan/detail/" class="btn btn-success btn-sm">Detail</a></td> -->
                                <td>
                                    <a href="<?= base_url(); ?>karyawan/ubah/<?= $lk->id ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url(); ?>karyawan/hapus/<?= $lk->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>