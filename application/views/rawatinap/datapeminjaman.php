<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Peminjaman</h4>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>peminjaman/tambah_peminjaman">
                    <div class="form-group">
                        <label for="userno_rmname">Nomor RM</label>
                        <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Masukkan Nomor RM" required/>
                    </div>
                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukkan Nama Pasien" required/>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input class="form-control" id="tgl_lahir" name="tgl_lahir" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" required/>
                    </div>
                    <div class="form-group">
                        <label for="jekel">Jenis Kelamin</label>
                        <div class="row">
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jekel" id="jekel1" value="Laki-Laki" required/>
                                Laki-Laki
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-2">
                              <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jekel" id="jekel2" value="Perempuan" required/>
                                Perempuan
                                </label>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <select class="ruangan form-control" id="ruangan" name="ruangan" required>
                            <option selected disabled value="">Pilih Ruangan</option>
                            <option value="Maternal">Maternal</option>
                            <option value="Neo">Neo</option>
                            <option value="General">General</option>
                            <option value="Anak">Anak</option>
                            <option value="Pavilium">Pavilium</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary me-2" name="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>