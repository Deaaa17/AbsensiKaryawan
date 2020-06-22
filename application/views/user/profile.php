<?= $this->session->flashdata('message'); ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-title">
                <h3 class="text-center mt-3 mb-3" style="font-family: Arial Black;">PROFIL SAYA</h3>
                <hr width="95%">
            </div>
            <div class="card-header">
                <?php if ($user['role_id'] == 1) : ?>
                    <div class="card-title mt-5">
                        <a href="<?= base_url("profile/editprofile/" . $user['id']); ?>" class="btn btn-warning" method="post" style="color:white;">Edit Profil</button></a>
                    </div>
                <?php endif; ?>
                <?php if ($user['role_id'] == 2) : ?>
                    <div class="card-title mt-3">
                        <a href="<?php echo base_url("absen/masuk") ?>" class="btn btn-primary" style="color: white;">Masuk</a>
                        <a href=" <?php echo base_url("absen/keluar") ?>" class="btn btn-info">Pulang</a>
                        <div class="mt-5">
                            <a href="<?= base_url("profile/editprofile/") ?>" class="btn btn-warning" method="post" style="color:white;">Edit Profil</button></a>
                        </div>
                    </div>
                <?php endif; ?>
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
                        /* border: 6px solid #efefef; */
                    }

                    .kotak {
                        float: left;
                        width: 100px;
                        height: 100px;
                        /* background-color: #afc9cf; */
                    }

                    .jam-digital-malasngoding p {
                        color: #000000;
                        font-size: 36px;
                        text-align: center;
                        margin-top: 30px;
                    }
                </style>

                <div class="jam-digital-malasngoding ml-auto">
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
            <div class="card-body">
                <div class="row ml-5 mt-4">
                    <div class="img-responsive img-circle col-md-4 mt-3">
                        <img src=" <?= base_url('assets/foto/') . $user['foto']; ?>" alt="Profil" style="max-width: 300px; max-height: 500px;">
                    </div>
                    <br>
                    <div class="col-md-8 mt-2 ml-auto">
                        <dl>
                            <label>NIP</label>
                            <input class="form-control" type="text" placeholder="<?= $user['nip'] ?>" readonly>
                            <label>Nama</label>
                            <input class="form-control" type="text" placeholder="<?= $user['nama'] ?>" readonly>
                            <label>Jabatan</label>
                            <input class="form-control" type="text" placeholder="<?= $user['jabatan'] ?>" readonly>
                            <label>Tempat, Tanggal Lahir</label>
                            <input class="form-control" type="text" placeholder="<?= $user['ttl'] ?>" readonly>
                            <label>Jenis Kelamin</label>
                            <input class="form-control" type="text" placeholder="<?= $user['kelamin'] ?>" readonly>
                            <label>Alamat</label>
                            <input class="form-control" type="text" placeholder="<?= $user['alamat'] ?>" readonly>
                            <label>No. Telepon</label>
                            <input class="form-control" type="text" placeholder="<?= $user['telp'] ?>" readonly>
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="<?= $user['email'] ?>" readonly>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>