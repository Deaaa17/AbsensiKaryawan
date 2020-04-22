<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                Ubah Data Karyawan
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('karyawan/updatedata'); ?>
                <input type="hidden" name="idkaryawan" value="<?= $karyawan->id; ?>">
                <input type="hidden" name="fotolama" value="<?= $karyawan->foto; ?>">
                <div class="form-group">
                    <label for="NIP">NIP</label>
                    <input type="text" class="form-control" id="NIP" name="nip" value="<?= $karyawan->nip; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" class="form-control" id="Nama" name="nama" value="<?= $karyawan->nama; ?>">
                </div>
                <div class="form-group">
                    <label for="Nama">Email</label>
                    <input type="text" class="form-control" id="Email" name="email" value="<?= $karyawan->email; ?>">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $karyawan->jabatan; ?>">
                </div>
                <div class="form-group">
                    <label for="notelp">No Telepon</label>
                    <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $karyawan->telp ?>">
                </div>
                <div class="form-group">
                    <label for="foto">Example file input</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>
                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>