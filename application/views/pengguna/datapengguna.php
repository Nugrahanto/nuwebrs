<div class="content-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between border-bottom mb-4"></div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Pengguna</h4>
                    <?php 
                    $message = $this->session->flashdata('message'); 
                    if (isset($message)) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    } ?>
                    <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengguna/tambah_pengguna">
                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telepon</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No. Telpon">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="level" name="level">
                            <option selected disabled value="">Pilih Level</option>
                            <?php 
                            foreach ($get_level as $data) { ?>
                            <option value="<?= $data->id_level; ?>"><?= $data->nama_level; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option selected disabled value="">Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div> -->
                    <input type="submit" class="btn btn-primary me-2" name="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>