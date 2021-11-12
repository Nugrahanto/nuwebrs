        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Laporan Keterlambatan</h4>
              <?= $this->session->flashdata('message'); ?>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="" class="table table-responsive exportketerlambatan">
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
                          <th>Aksi</th>
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
                            <td>
                              <button type="button" class="btn btn-sm btn-outline-primary btn-edit" id="laporanketerlambatan" data-toggle="modal" data-target="#editModal" data-id="<?=$data->id_pengembalian?>" data-norm="<?=$data->no_rm?>" data-namapasien="<?=$data->nama_pasien?>" data-tgllahir="<?=$data->tgl_lahir?>" data-jekel="<?=$data->jekel?>" data-ruangan="<?=$data->ruangan?>" data-bayar="<?=$data->bayar?>" data-tglpulang="<?=$data->tgl_pulang?>" data-tglharuskembali="<?=$data->tgl_haruskembali?>" data-tglkembali="<?=$data->tgl_kembali?>">
                                  Edit 
                              </button>
                              <button type="button" class="btn btn-sm btn-outline-danger" id="deleteketerlambatan" data-toggle="modal" data-target="#deleteModal" data-id="<?=$data->id_pengembalian?>" data-norm="<?=$data->no_rm?>">
                                Hapus
                              </button>
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
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Ubah Data Keterlambatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporanketerlambatan/update_laporanketerlambatan">
                <div class="modal-body">
                <input type="text" id="id_pengembalian" name="id_pengembalian" hidden>
                  <div class="form-group">
                      <label for="no_rm">Nomor RM</label>
                      <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Nomor RM" readonly>
                  </div>
                  <div class="form-group">
                      <label for="nama_pasien">Nama Pasien</label>
                      <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" required>
                  </div>
                  <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input class="form-control" id="tgl_lahir" name="tgl_lahir" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" required/>
                  </div>
                  <div class="form-group row">
                      <label for="jekel">Jenis Kelamin</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jekel" id="jekel" value="Laki-Laki">
                            Laki-Laki
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jekel" id="jekel" value="Perempuan">
                            Perempuan
                          </label>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="ruangan">Ruangan</label>
                      <select class="form-control" id="ruangan" name="ruangan" required>
                        <option value="Maternal">Maternal</option>
                        <option value="Neo">Neo</option>
                        <option value="General">General</option>
                        <option value="Anak">Anak</option>
                        <option value="Pavilium">Pavilium</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="bayar">Pembayaran</label>
                      <select class="form-control" id="bayar" name="bayar" required>
                        <option value="BPJS">BPJS</option>
                        <option value="Umum">Umum</option>
                        <option value="Asuransi">Asuransi</option>
                      </select>
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
                      <label for="tgl_kembali">Tanggal Kembali</label>
                      <input type="text" class="form-control" id="tgl_kembali" name="tgl_kembali" placeholder="Tanggal Kembali" readonly>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary me-2" name="submit" value="Ubah">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menghapus data keterlambatan</h5>
              </div>
              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporanketerlambatan/delete_laporanketerlambatan">
                <div class="modal-body">
                  <input type="text" class="form-control" id="id" name="id_pengembalian" readonly hidden>
                  <p>Anda yakin ingin mengapus data nomor RM <span class="text-danger" id="norm"></span>?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  <input type="submit" class="btn btn-danger me-2" name="submit" value="Hapus">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal -->