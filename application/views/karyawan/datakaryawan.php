<button class="btn btn-primary mb-3 mt-3 ml-2" data-toggle="modal" data-target="#tambahdata">Tambah Data Karyawan</button>
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
        </div>
    </div>
</div>
<!-- /.card-header -->

<div class="card-body table-responsive p-0" style="height: 300px;">

    <table class="table table-head-fixed">
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
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>

<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Karyawan
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('karyawan/insertdata'); ?>
                        <div class="form-group">
                            <label for="NIP">NIP</label>
                            <input type="text" class="form-control" id="NIP" name="nip">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Email</label>
                            <input type="text" class="form-control" id="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan">
                        </div>
                        <div class="form-group">
                            <label for="notelp">No Telepon</label>
                            <input type="text" class="form-control" id="notelp" name="notelp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>