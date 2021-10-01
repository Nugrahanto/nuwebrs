<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pengembalian Berkas</h4>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengembalian/update_pengembalian">
                    <input type="text" class="form-control col-sm-1" id="id_pengembalian" name="id_pengembalian" hidden>
                    <div class="form-group">
                        <label for="no_rm_adm">Nomor RM</label>
                        <input type="text" class="form-control" id="no_rm_adm" name="no_rm" placeholder="Cari Nomor RM">
                    </div>
                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jekel">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jekel" name="jekel" placeholder="Jenis Kelamin" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bayar">Pembayaran</label>
                        <input type="text" class="form-control" id="bayar" name="bayar" placeholder="Bayar" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pulang">Tanggal Pulang</label>
                        <input type="text" class="form-control" id="tgl_pulang" name="tgl_pulang" placeholder="Tanggal Pulang" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_haruskembali">Tanggal Harus Kembali</label>
                        <input type="text" class="form-control" id="tgl_haruskembali" name="tgl_haruskembali" placeholder="Tanggal Harus Kembali" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal BRM Kembali</label>
                        <input class="form-control" id="tgl_kembali" name="tgl_kembali" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy"/>
                    </div>
                    <input type="submit" class="btn btn-primary me-2" name="submit" value="Ubah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>