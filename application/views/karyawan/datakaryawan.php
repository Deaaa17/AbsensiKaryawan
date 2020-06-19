<?= $this->session->flashdata('message'); ?>

<a href="<?= base_url(); ?>karyawan/insertdata/" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data Karyawan</button></a>
<a href="<?= base_url(); ?>auth/create/" class="ml-auto btn btn-info mb-3"><i class="fas fa-plus"></i> Buat Akun</button></a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url(); ?>karyawan/print/" class="btn btn-primary"><i class="fas fa-print"></i> Print</button></a>
                <a href="<?= base_url(); ?>karyawan/excel/" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</button></a>
                <a href="<?= base_url(); ?>karyawan/pdf/" class="btn btn-warning" style="color: white;"><i class="fas fa-file-pdf"></i> Export PDF</button></a>
                <div class="card-tools">
                    <!-- <?php $attributes = array('class' => 'input-group input-group-sm', 'method' => 'get'); ?> -->
                    <form action="<?= base_url('karyawan/search') ?>" method="POST">
                        <div class="input-group-append">
                            <input type="text" name="keyword" class="form-control float-right" placeholder="Cari..." autocomplete="off">
                            <button type="submit" name="search" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
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
                                <td>
                                    <a href="<?= base_url(); ?>karyawan/resetsandi/" class="btn btn-warning btn-sm" style="color: white;"><i class="fas fa-key"></i></a>
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