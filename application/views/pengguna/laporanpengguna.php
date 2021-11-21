        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Laporan Pengguna</h4>
              <?php 
                    $message = $this->session->flashdata('message'); 
                    if (isset($message)) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    } ?>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="" class="table exportpengguna">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporanpengguna as $data) { ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->password ?></td>
                            <td>
                                <?php 
                                    $txt = "";
                                    if ($data->level == "1") { 
                                        $txt = "Admin";
                                    } else if ($data->level == "2"){
                                        $txt = "Unit RI";
                                    } else if ($data->level == "3"){
                                        $txt = "Kepala RM";
                                    }
                                    echo "<span>$txt</span>";
                                ?>
                            </td>
                            <td class="text-center">
                                <?php 
                                    $txt = "";
                                    if ($data->status == "1") { 
                                        $txt = "Aktif";
                                        echo "<label class='badge badge-primary text-white'>$txt</label>";
                                    } else {
                                        $txt = "Tidak Aktif";
                                        echo "<label class='badge badge-info text-white'>$txt</label>";
                                    } 
                                ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-sm btn-outline-primary btn-edit" id="laporanpengguna" data-toggle="modal" data-target="#editModal" data-id="<?=$data->id_pengguna?>" data-username="<?=$data->username?>" data-password="<?=$data->password?>" data-level="<?=$data->level?>" data-status="<?=$data->status?>">
                                  Edit 
                              </button>
                              <button type="button" class="btn btn-sm btn-outline-danger" id="deletepengguna" data-toggle="modal" data-target="#deleteModal" data-id="<?=$data->id_pengguna?>" data-username="<?=$data->username?>">
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
                <h5 class="modal-title" id="editModalLabel">Ubah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporanpengguna/update_laporanpengguna">
                <div class="modal-body">
                  <input type="text" id="id_pengguna" name="id_pengguna" hidden>
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                      <label for="level">Level</label>
                      <select class="form-control" id="level" name="level" required>
                        <option value="1">Admin </option>
                        <option value="2">Unit RI </option>
                        <option value="3">Kepala RM </option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control" id="status" name="status" required>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                      </select>
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
                <h5 class="modal-title" id="exampleModalLabel">Menghapus data pengguna</h5>
              </div>
              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>laporanpengguna/delete_laporanpengguna">
                <div class="modal-body">
                  <input type="text" class="form-control" id="id" name="id_pengguna" readonly hidden>
                  <p>Anda yakin ingin mengapus data username <span class="text-danger" id="uname"></span>?</p>
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