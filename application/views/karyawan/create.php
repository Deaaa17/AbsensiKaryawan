<div class="row">
    <div class="col-lg-6 ml-5">
        <h4><b>Buat Akun</b></h4>
        <br>
        <form class="user" method="post" action="<?= base_url('auth/regis'); ?>">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>" autocomplete="off">

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <?= form_error('name', '<small class="text-danger">'); ?></small>
            <div class="input-group mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <?= form_error('email', '<small class="text-danger">'); ?></small>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <?= form_error('password1', '<small class="text-danger">'); ?></small>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulang password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url(); ?>karyawan/datakaryawan/" class="btn btn-info">Kembali</a>
        </form>

    </div>
</div>