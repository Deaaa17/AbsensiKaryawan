<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <i class="fas fa-business-time"></i>
            <a href="#" style="font-family: Futura Bk BT;"><b style="font-family: Swis721 Blk BT;">Absensi</b> Karyawan</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h5 class="login-box-msg" style="font-family: Arial;">Buat Kata Sandi Baru untuk</h5>
                <h6><?= $this->session->set_userdata('reset_email'); ?></h6>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth/ubahKatasandi'); ?>" method="post" class="user mb-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="password1" name="password1" placeholder="Kata Sandi Baru">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password1', '<small class="text-danger">'); ?></small>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="password2" name="password2" placeholder="Ulang Kata Sandi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password1', '<small class="text-danger">'); ?></small>
                    <div class="row">
                        <!-- /.col -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-block" style="font-family: Arial;">Ubah Sandi</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->