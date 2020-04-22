<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="index2.html"><b>Absensi</b>Karyawan</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<h4 class="login-box-msg">MASUK</h4>

				<?= $this->session->flashdata('message'); ?>

				<form action="<?= base_url('auth'); ?>" method="post" class=user>
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('email', '<small class="text-danger">'); ?></small>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<?= form_error('password', '<small class="text-danger">'); ?></small>
					<div class="row">
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Masuk</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<!-- /.social-auth-links -->

				<p class="mb-0">
					<a href="<?= base_url('auth/regis'); ?>" class="text-center">Belum punya akun?Buat akun</a>
				</p>

			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->