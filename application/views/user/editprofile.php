<div class="row">
    <div class="col-lg-6">

        <span>Profil</span>
        <h4><b>Edit Profil</b></h4>

        <?php echo form_open_multipart('profile/editprofile'); ?>
        <input type="hidden" name="idkaryawan" value="<?= $karyawan->id; ?>">
        <input type="hidden" name="fotolama" value="<?= $karyawan->foto; ?>">
        <div class="form-group">
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" id="NIP" name="nip" value="<?= $user['nip']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control" id="Nama" name="nama" value="<?= $user['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user['jabatan']; ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Tempat, Tanggal Lahir</label>
            <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $user['ttl']; ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Jenis Kelamin</label>
            <input type="text" class="form-control" id="kelamin" name="kelamin" value="<?= $user['kelamin']; ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
        </div>
        <div class="form-group">
            <label for="Nama">Email</label>
            <input type="text" class="form-control" id="Email" name="email" value="<?= $user['email']; ?>">
        </div>
        <div class="form-group">
            <label for="notelp">No Telepon</label>
            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $user['telp']; ?>">
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/foto/') . $user['foto']; ?>" class="img-thumbnail">
                </div>
            </div>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
        <?php echo form_close(); ?>

    </div>
</div>