        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Laporan Keterlambatan</h4>
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
                          <th>Tanggal Pulang</th>
                          <th>Tanggal Harus Kembali</th>
                          <th>Tanggal BRM Kembali</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporanketerlambatan as $data) { ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?= $data->no_rm ?></td>
                            <td><?= $data->nama_pasien ?></td>
                            <td><?= $data->tgl_lahir ?></td>
                            <td><?= $data->jekel ?></td>
                            <td><?= $data->ruangan ?></td>
                            <td><?= $data->bayar ?></td>
                            <td><?= $data->tgl_pulang ?></td>
                            <td><?= $data->tgl_haruskembali ?></td>
                            <td>
                                <?= $data->tgl_kembali ?> 
                                <?php 
                                if ($data->tgl_kembali > $data->tgl_haruskembali){
                                $tgl1 = strtotime($data->tgl_haruskembali); 
                                $tgl2 = strtotime($data->tgl_kembali); 
                                
                                $jarak = $tgl2 - $tgl1;

                                $hari = $jarak / 60 / 60 / 24;
                            
                                echo "<span class='text-danger'> (Telat $hari Hari)"; }?>
                                </span>
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