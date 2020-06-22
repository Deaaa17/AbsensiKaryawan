<div class="row">
    <div class="col-lg-6 ml-5 mb-3">
        <span>Data Karyawan</span>
        <h4><b>Tambah Data</b></h4>
        <br>
        <?php echo form_open_multipart('karyawan/insertdata'); ?>
        <div class="form-group">
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" id="NIP" name="nip" method="post" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control" id="Nama" name="nama" method="post" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="Nama">Email</label>
            <input type="text" class="form-control" id="Email" name="email" method="post" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="email" method="post">
        </div>
        <div class="form-group">
            <label for="notelp">No Telepon</label>
            <input type="text" class="form-control" id="notelp" name="notelp" method="post" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary" value="upload">Simpan</button>
        <a href="<?= base_url(); ?>karyawan/datakaryawan/" class="btn btn-info">Kembali</a>
        <?php echo form_close(); ?>
    </div>
</div>