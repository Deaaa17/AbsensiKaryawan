<div class="row">
    <div class="col-lg-6 ml-5 mb-5">
        <span>Profil</span>
        <h4><b>Edit Profil</b></h4>
        <br>
        <?php echo form_open_multipart('profile/editprofile/' . $profile->id); ?>
        <input type="hidden" name="idkaryawan" value="<?= $profile->id; ?>">
        <input type="hidden" name="fotolama" value="<?= $profile->foto; ?>">
        <div class="form-group">
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" id="NIP" name="nip" value="<?= $profile->nip; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control" id="Nama" name="nama" value="<?= $profile->nama; ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $profile->jabatan; ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Tempat, Tanggal Lahir</label>
            <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $profile->ttl; ?>">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jabatan">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $profile->alamat; ?>">
        </div>
        <div class="form-group">
            <label for="Nama">Email</label>
            <input type="text" class="form-control" id="Email" name="email" value="<?= $profile->email; ?>">
        </div>
        <div class="form-group">
            <label for="notelp">No Telepon</label>
            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $profile->telp; ?>">
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <div class="row">
                <div class="col-sm-3">
                    <img src="<?= base_url('assets/foto/') . $profile->foto; ?>" class="img-thumbnail">
                </div>
            </div>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url(); ?>profile" class="btn btn-info">Kembali</a>
        <?php echo form_close(); ?>
        <br>
    </div>
</div>