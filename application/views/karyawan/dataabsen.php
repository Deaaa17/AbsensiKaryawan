<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url(); ?>absen/excel/" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</button></a>
                <a href="<?= base_url(); ?>absen/pdf/" class="btn btn-warning" style="color:white;"><i class="fas fa-file-pdf"></i> Export PDF</button></a>
                <h3 class="card-title"></h3>
                <div class="card-tools">
                    <?php $attributes = array('class' => 'input-group input-group-sm', 'method' => 'get'); ?>
                    <?php echo form_open("absen", $attributes); ?>
                    <div class="input-group-append">
                        <input type="text" name="dari" class="form-control float-right datepicker" placeholder="Dari">
                        <input type="text" name="sampai" class="form-control float-right datepicker" placeholder="Sampai">
                        <button type="submit" name="search" class="btn btn-default"><i class="fas fa-filter"></i></button>
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
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Waktu Absen</th>
                            <th>Jenis Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_absen as $la) : ?>
                            <tr>
                                <td><?= $la->nip ?></td>
                                <td><?= $la->nama ?></td>
                                <td><?= $la->jabatan ?></td>
                                <td><?= $la->email ?></td>
                                <td><?= $la->waktu_absen ?></td>
                                <td><?= $la->jenis_absen ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.card-header -->