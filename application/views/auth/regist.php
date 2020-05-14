<div class="register-box">
    <div class="register-logo">
        <i class="fas fa-business-time"></i>
        <a href="#" style="font-family: Futura Bk BT;"><b style="font-family: Swis721 Blk BT;">Absensi</b> Karyawan</a>
        <div class="card">
            <div class="card-body register-card-body">
                <h4 class="login-box-msg" style="font-family: Arial;">Daftar</h4>

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
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-warning btn-block" style="font-family: Arial;">Daftar </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <a href="<?= base_url('auth') ?>" class="text-center" style="font-family: Arial;">Sudah punya akun? Masuk</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->