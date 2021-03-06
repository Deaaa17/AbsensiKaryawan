<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<i class="fas fa-business-time"></i>
			<a href="#" style="font-family: Futura Bk BT;"><b style="font-family: Swis721 Blk BT;">Absensi</b> Karyawan</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<h4 class="login-box-msg" style="font-family: Swis721 Blk BT;">MASUK</h4>

				<?= $this->session->flashdata('message'); ?>

				<form action="<?= base_url('auth'); ?>" method="post" class="user mb-2">
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
								<i id="icon" class="fa fa-eye-slash"></i>
							</div>
						</div>
					</div>
					<script>
						var input = document.getElementById('password'),
							icon = document.getElementById('icon');

						icon.onclick = function() {

							if (input.getAttribute("type") == 'password') {
								input.setAttribute('type', 'text');
								icon.className = 'fa fa-eye';
							} else {
								input.setAttribute('type', 'password');
								icon.className = 'fa fa-eye-slash';
							}

						}
					</script>

					<?= form_error('password', '<small class="text-danger">'); ?></small>
					<div class="row">
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-warning btn-block" style="font-family: Arial; color:white;">Masuk</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<!-- /.social-auth-links -->
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->