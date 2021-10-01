<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pengembalian Berkas</h4>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengembalian/tambah_pengembalian">
                    <div class="form-group">
                        <label for="no_rm_ri">Nomor RM</label>
                        <input type="text" class="form-control" id="no_rm_ri" name="no_rm" placeholder="Cari Nomor RM" required/>
                    </div>
                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="jekel">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jekel" name="jekel" placeholder="Jenis Kelamin" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="bayar">Pembayaran</label>
                        <select class="ruangan form-control" id="bayar" name="bayar" required>
                            <option selected disabled value="">Pilih Pembayaran</option>
                            <option value="BPJS">BPJS </option>
                            <option value="Umum">Umum </option>
                            <option value="Asuransi">Asuransi </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pulang">Tanggal Pulang</label>
                        <input type="date" class="form-control" id="tgl_pulang" name="tgl_pulang" placeholder="Tanggal Pulang"/>
                    </div>
                    <div class="form-group">
                        <label for="tgl_haruskembali">Tanggal Harus Kembali</label>
                        <input type="text" class="form-control" id="tgl_haruskembali" name="tgl_haruskembali" placeholder="Tanggal Harus Kembali" readonly/>
                    </div>
                    <input type="submit" class="btn btn-primary me-2" name="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>