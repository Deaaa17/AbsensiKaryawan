<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <i class="fas fa-business-time"></i>
            <a href="#" style="font-family: Futura Bk BT;"><b style="font-family: Swis721 Blk BT;">Absensi</b> Karyawan</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h5 class="login-box-msg" style="font-family: Arial;">Lupa Kata Sandi</h5>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth/forgot'); ?>" method="post" class="user mb-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger">'); ?></small>
                    <div class="row">
                        <!-- /.col -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-block" style="font-family: Arial;">Atur Ulang Kata Sandi</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                <!-- /.social-auth-links -->
                <div class="text-center">
                    <a href="<?= base_url('auth'); ?>" style="font-family: Arial;">Kembali ke Login</a>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->