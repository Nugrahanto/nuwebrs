        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Laporan Pengembalian</h4>
              <?= $this->session->flashdata('message'); ?>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-responsive">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor RM</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Ruangan</th>
                            <th>Bayar</th>
                            <th>Tanggal Pinjam BRM</th>
                            <th>Tanggal Pulang</th>
                            <th>Tanggal Harus Kembali</th>
                            <th>Tanggal BRM Kembali</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporanpengembalian as $data) { ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?= $data->no_rm ?></td>
                            <td><?= $data->nama_pasien ?></td>
                            <td><?= $data->tgl_lahir ?></td>
                            <td><?= $data->jekel ?></td>
                            <td><?= $data->ruangan ?></td>
                            <td><?= $data->bayar ?></td>
                            <td><?= $data->tgl_pinjam ?></td>
                            <td><?= $data->tgl_pulang ?></td>
                            <td><?= $data->tgl_haruskembali ?></td>
                            <td><?= $data->tgl_kembali ?></td>
                            <td>
                                <?php 
                                    if ($data->tgl_kembali != "0000-00-00") { 
                                        echo "<label class='badge badge-primary text-white'>Kembali</label>";
                                    } else {
                                        echo "<label class='badge badge-info text-white'>Dipinjam</label>";
                                    } 
                                ?>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>