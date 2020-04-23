<?= $this->session->flashdata('message'); ?>
<?php if ($user['role_id'] == 1) : ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Waktu :</h3>
                    <style>
                        h1,
                        h2,
                        p,
                        a {
                            font-family: sans-serif;
                            font-weight: normal;
                        }

                        .jam-digital-malasngoding {
                            overflow: hidden;
                            width: 330px;
                            margin: 20px;
                            border: 5px solid #efefef;
                        }

                        .kotak {
                            float: left;
                            width: 106px;
                            height: 100px;
                            background-color: #189fff;
                        }

                        .jam-digital-malasngoding p {
                            color: #fff;
                            font-size: 36px;
                            text-align: center;
                            margin-top: 30px;
                        }
                    </style>

                    <div class="jam-digital-malasngoding">
                        <div class="kotak">
                            <p id="jam"></p>
                        </div>
                        <div class="kotak">
                            <p id="menit"></p>
                        </div>
                        <div class="kotak">
                            <p id="detik"></p>
                        </div>
                    </div>

                    <script>
                        window.setTimeout("waktu()", 1000);

                        function waktu() {
                            var waktu = new Date();
                            setTimeout("waktu()", 1000);
                            document.getElementById("jam").innerHTML = waktu.getHours();
                            document.getElementById("menit").innerHTML = waktu.getMinutes();
                            document.getElementById("detik").innerHTML = waktu.getSeconds();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="<?= base_url(); ?>karyawan/editprofile" class="btn btn-primary">Edit Profile</button></a>
                    </div>
                    <div>
                        <h3><b>My Profile</b></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($user['role_id'] == 2) : ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Waktu :</h3>
                    <style>
                        h1,
                        h2,
                        p,
                        a {
                            font-family: sans-serif;
                            font-weight: normal;
                        }

                        .jam-digital-malasngoding {
                            overflow: hidden;
                            width: 330px;
                            margin: 20px;
                            border: 5px solid #efefef;
                        }

                        .kotak {
                            float: left;
                            width: 106px;
                            height: 100px;
                            background-color: #189fff;
                        }

                        .jam-digital-malasngoding p {
                            color: #fff;
                            font-size: 36px;
                            text-align: center;
                            margin-top: 30px;
                        }
                    </style>

                    <div class="jam-digital-malasngoding">
                        <div class="kotak">
                            <p id="jam"></p>
                        </div>
                        <div class="kotak">
                            <p id="menit"></p>
                        </div>
                        <div class="kotak">
                            <p id="detik"></p>
                        </div>
                    </div>

                    <script>
                        window.setTimeout("waktu()", 1000);

                        function waktu() {
                            var waktu = new Date();
                            setTimeout("waktu()", 1000);
                            document.getElementById("jam").innerHTML = waktu.getHours();
                            document.getElementById("menit").innerHTML = waktu.getMinutes();
                            document.getElementById("detik").innerHTML = waktu.getSeconds();
                        }
                    </script>

                    <div class="card-tools justify-content-center mr-3">
                        <a href="<?php echo base_url("absen/masuk") ?>" class="btn btn-warning">MASUK</a>
                        <a href="<?php echo base_url("absen/keluar") ?>" class="btn btn-info">PULANG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url(); ?>karyawan/editprofile" class="btn btn-primary">Edit Profile</button></a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="card">
    <div class="row ml-5 mt-4">
        <div class="col-md-4 mt-3">
            <img src="<?= base_url(); ?>assets/img/profile/interiordesain.jpg" alt="Profil">
        </div>
        <br>
        <div class="col-md-8 mt-2">
            <dl>
                <dt>NIP</dt>
                <dd><?= $user['nip'] ?></dd>
                <dt>Nama</dt>
                <dd><?= $user['nama'] ?></dd>
                <dt>Jabatan</dt>
                <dd><?= $user['jabatan'] ?></dd>
                <dt>Tempat, Tanggal Lahir</dt>
                <dd><?= $user['ttl'] ?></dd>
                <dt>Jenis Kelamin</dt>
                <dd><?= $user['kelamin'] ?></dd>
                <dt>Alamat</dt>
                <dd><?= $user['alamat'] ?></dd>
                <dt>No. Telepon</dt>
                <dd><?= $user['telp'] ?></dd>
                <dt>Email</dt>
                <dd><?= $user['email'] ?></dd>
            </dl>
        </div>

    </div>
</div>