<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Peminjaman Berkas</h4>
                    <form>
                    <div class="form-group">
                        <label for="no_rm">Nomor RM</label>
                        <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?= $dataRM->no_rm ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $dataRM->nama_pasien ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?=date('d-m-Y', strtotime($dataRM->tgl_lahir))?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jekel">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jekel" name="jekel" value="<?= $dataRM->jekel ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" value="<?= $dataRM->ruangan ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Pinjam BRM</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?=date('d-m-Y', strtotime($dataRM->tgl_pinjam))?>" readonly>
                        </div>
                    </div>
                    <a href="<?= base_url('peminjaman/cetak/'.$dataRM->id_peminjaman.''); ?>" target="_blank">
                        <button type="button" class="btn btn-primary me-2">Cetak Tracer</button>
                    </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>