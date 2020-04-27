<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Tambah Data Karyawan
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('karyawan/insertdata'); ?>
                <div class="form-group">
                    <label for="NIP">NIP</label>
                    <input type="text" class="form-control" id="NIP" name="nip" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" class="form-control" id="Nama" name="nama" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="Nama">Email</label>
                    <input type="text" class="form-control" id="Email" name="email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan">
                </div>
                <div class="form-group">
                    <label for="notelp">No Telepon</label>
                    <input type="text" class="form-control" id="notelp" name="notelp" autocomplete="off">
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