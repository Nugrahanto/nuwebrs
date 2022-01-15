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