        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Laporan Peminjaman</h4>
              <?php 
                    $message = $this->session->flashdata('message'); 
                    if (isset($message)) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    } ?>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="" class="table exportpeminjaman">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor RM</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Ruangan</th>
                            <th>Tanggal Pinjam BRM</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporanpeminjaman as $data) { ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?= $data->no_rm ?></td>
                            <td><?= $data->nama_pasien ?></td>
                            <td><?= $data->tgl_lahir ?></td>
                            <td><?= $data->jekel ?></td>
                            <td><?= $data->ruangan ?></td>
                            <td><?= $data->tgl_pinjam ?></td>
                            <td>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-edit" id="laporanpeminjaman" data-toggle="modal" data-target="#editModal" data-id="<?= $data->id_peminjaman ?>" data-norm="<?=$data->no_rm?>" data-namapasien="<?=$data->nama_pasien?>" data-tgllahir="<?=$data->tgl_lahir?>" data-jekel="<?=$data->jekel?>" data-ruangan="<?=$data->ruangan?>" data-tglpinjam="<?=$data->tgl_pinjam?>">
                                Edit 
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger" id="deletepeminjaman" data-toggle="modal" data-target="#deleteModal" data-id="<?=$data->id_peminjaman?>" data-norm="<?=$data->no_rm?>">
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
                <h5 class="modal-title" id="editModalLabel">Ubah Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporanpeminjaman/update_laporanpeminjaman">
                <div class="modal-body">
                <input type="text" id="id_peminjaman" name="id_peminjaman" hidden>
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
                      <label for="tgl_pinjam">Tanggal Pinjam BRM</label>
                      <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Tanggal Pinjam BRM" readonly>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Menghapus data peminjaman</h5>
              </div>
              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporanpeminjaman/delete_laporanpeminjaman">
                <div class="modal-body">
                  <input type="text" class="form-control" id="id" name="id_peminjaman" readonly hidden>
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