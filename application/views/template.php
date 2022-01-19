<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/new/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/new/css/jquery-ui.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link href="<?php echo base_url() . 'assets/vendors/datatables/buttons.dataTables.min.css' ?>" rel="stylesheet">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <!-- custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- endcustom CSS -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>
<body class="<?php 
    $url = $this->uri->segment(1);
    if(strpos($url, 'laporan') !== false) {
        echo 'sidebar-icon-only';
    } ?>">
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0 pt-2">
            <h1 class="welcome-text"><span class="text-black fw-bold"> Sistem Reminder <br>
            <small class="lead small">Peminjaman dan Pengembalian Berkas Rekam Medis Rawat Inap</small></span></h1>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        <?php if ($this->session->userdata('level') == 1) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              <?php if($notiftoday + $notifyesterday != 0){ ?>
                <span class="count text-white"><?= $notiftoday + $notifyesterday; ?></span>
              <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <div class="text-center bg-primary text-white py-3">
                  <p class="mb-0 font-weight-medium">Anda mempunyai <?= $notiftoday + $notifyesterday; ?> notification </p>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item" data-toggle="modal" data-target="#todayModal">
                  <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject font-weight-medium text-dark">Sekarang</p>
                  <p class="fw-light small-text mb-0"> <?= $notiftoday; ?> Berkas permintaan peminjaman </p>
                  </div>
              </a>
              <a class="dropdown-item preview-item" data-toggle="modal" data-target="#yesterdayModal">
                  <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject font-weight-medium text-dark">Kemarin</p>
                  <p class="fw-light small-text mb-0"> <?= $notifyesterday; ?> Berkas permintaan peminjaman </p>
                  </div>
              </a>
            </div> 
          </li>
          <?php } else if ($this->session->userdata('level') == 2) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              <?php if($notiftoday + $notifterlambat != 0){ ?>
                <span class="count text-white"><?= $notiftoday + $notifterlambat; ?></span>
              <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <div class="text-center bg-primary text-white py-3">
                  <p class="mb-0 font-weight-medium">Anda mempunyai <?= $notiftoday + $notifterlambat; ?> notification </p>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item" data-toggle="modal" data-target="#todayModal">
                  <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject font-weight-medium text-dark">Sekarang</p>
                  <p class="fw-light small-text mb-0"> <?= $notiftoday; ?> Berkas harus kembali </p>
                  <p class="fw-light small-text mb-0"> <?= $notifterlambat; ?> Berkas terlambat dikembalikan </p>
                  </div>
              </a>
            </div>
          </li>
          <?php } ?>
          <li class="nav-item dropdown d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-user"></i> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <p class="mb-1 font-weight-semibold text-uppercase"><?= $this->session->userdata('username'); ?></p>
              </div>
              <a data-toggle="modal" data-target="#signoutModal" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Keluar</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <?php if ($this->session->userdata('level') == 1) { ?>
          <li class="nav-item <?php if($this->uri->segment(1) == "dashboard"){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Data</li>
          <li class="nav-item <?php if($this->uri->segment(1) == "pengguna"){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url(); ?>pengguna">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Data Pengguna</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "peminjaman" || $this->uri->segment(2) != ""){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url(); ?>peminjaman">
              <i class="mdi mdi-folder-plus menu-icon"></i>
              <span class="menu-title">Data Peminjaman</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "pengembalian"){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url(); ?>pengembalian">
              <i class="mdi mdi-folder-remove menu-icon"></i>
              <span class="menu-title">Data Pengembalian</span>
            </a>
          </li>
          <li class="nav-item nav-category">Laporan</li>
          <li class="nav-item <?php 
          $url = $this->uri->segment(1);
          if(strpos($url, 'laporan') !== false) {
              echo 'active';
          } ?>">
            <a class="nav-link" data-bs-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Laporan</span>
              <?php if(strpos($this->uri->segment(1), 'laporan') === false) { echo '<i class="menu-arrow"></i>'; } ?>
            </a>
            <div class="collapse" id="laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanloan"> Laporan Peminjaman </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanreturn"> Laporan Pengembalian </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanlate"> Laporan Keterlambatan </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanuser"> Laporan Pengguna </a></li>
              </ul>
            </div>
          </li>
        <?php } else if ($this->session->userdata('level') == 2) { ?>
          <li class="nav-item <?php if($this->uri->segment(1) == "dashboard"){ echo 'active';}?>">
          <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Data</li>
          <li class="nav-item <?php if($this->uri->segment(1) == "peminjaman"){ echo 'active';}?>">
          <a class="nav-link" href="<?php echo base_url(); ?>peminjaman">
              <i class="mdi mdi-folder-plus menu-icon"></i>
              <span class="menu-title">Data Peminjaman</span>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1) == "pengembalian"){ echo 'active';}?>">
          <a class="nav-link" href="<?php echo base_url(); ?>pengembalian">
              <i class="mdi mdi-folder-remove menu-icon"></i>
              <span class="menu-title">Data Kepulangan</span>
            </a>
          </li>
        <?php } else { ?>
          <li class="nav-item <?php if($this->uri->segment(1) == "dashboard"){ echo 'active';}?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Laporan</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanloan"> Laporan Peminjaman </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanreturn"> Laporan Pengembalian </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanlate"> Laporan Keterlambatan </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>laporanuser"> Laporan Pengguna </a></li>
              </ul>
            </div>
          </li>
        <?php } ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
      <?php if ($this->session->userdata('level') == 1) { ?>
      <!-- Modal -->
      <div class="modal fade" id="todayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <?php
                      foreach ($get_notiftoday as $data) { ?>
                          <a href="<?php echo base_url(); ?>peminjaman/<?= $data->id_history; ?>">
                            <p> Permintaan berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?> ruangan <?= $data->nama_ruangan ?></p>
                          </a>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="yesterdayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <?php
                      foreach ($get_notifyesterday as $data) { ?>
                          <a href="<?php echo base_url(); ?>peminjaman/<?= $data->id_history; ?>">
                          <p> Permintaan berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?> ruangan <?= $data->nama_ruangan ?></p>
                          </a>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>
      <?php } else if ($this->session->userdata('level') == 2) { ?>
      <!-- Modal -->
      <div class="modal fade" id="todayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <?php
                      foreach ($get_notiftoday as $data) { ?>
                          <div>
                              <span class="text-notif"> Berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?> di ruangan <?= $data->nama_ruangan ?> harus kembali hari ini</span>
                              <button class="btn-detail text-primary" id="detailnotifikasi" data-toggle="modal" data-target="#notifModal" data-dismiss="modal" data-id="<?= $data->id_history ?>" data-idpass="<?=$data->id_pasien?>" data-norm="<?=$data->no_rm?>" data-namapasien="<?=$data->nama_pasien?>" data-tgllahir="<?=date('d-m-Y', strtotime($data->tgl_lahir))?>" data-jekel="<?=$data->jekel?>" data-ruangan="<?=$data->nama_ruangan?>" data-bayar="<?=$data->bayar?>" data-tglpulang="<?=date('d-m-Y', strtotime($data->tgl_pulang))?>" data-tglharuskembali="<?=date('d-m-Y', strtotime($data->tgl_haruskembali))?>" data-tglkembali="<?php if(!empty($data->tgl_kembali)){echo date('d-m-Y', strtotime($data->tgl_kembali));}?>" data-notelp="<?= $data->telp?>">
                                <i class="fa fa-external-link"></i></button>
                          </div>
                      <?php } ?>
                      <?php
                      foreach ($get_notifterlambat as $data) { ?>
                          <div>
                              <span class="text-danger text-notif"> Berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?> di ruangan <?= $data->nama_ruangan ?> batas waktu pengembalian telah terlewat</span>
                              <button class="btn-detail text-primary" id="detailnotifikasi" data-toggle="modal" data-target="#notifModal" data-dismiss="modal" data-id="<?= $data->id_history ?>" data-idpass="<?=$data->id_pasien?>" data-norm="<?=$data->no_rm?>" data-namapasien="<?=$data->nama_pasien?>" data-tgllahir="<?=date('d-m-Y', strtotime($data->tgl_lahir))?>" data-jekel="<?=$data->jekel?>" data-ruangan="<?=$data->nama_ruangan?>" data-bayar="<?=$data->bayar?>" data-tglpulang="<?=date('d-m-Y', strtotime($data->tgl_pulang))?>" data-tglharuskembali="<?=date('d-m-Y', strtotime($data->tgl_haruskembali))?>" data-tglkembali="<?php if(!empty($data->tgl_kembali)){echo date('d-m-Y', strtotime($data->tgl_kembali));}?>" data-notelp="<?= $data->telp?>">
                                <i class="fa fa-external-link"></i></button>
                          </div>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>
      <?php } ?>
      <div class="modal fade" id="signoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Tekan "Logout" jika anda yakin ingin keluar.</p>
            </div>
            <div class="modal-footer">
              <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
          </div>
        </div>
      </div>
        <?php 
            $this->load->view($main_view);
        ?>
        <!-- partial -->
        <!-- Modal -->
        <div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Detail Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <input type="text" readonly class="form-control-plaintext" id="id_pengembalian" hidden>
                  <input type="text" readonly class="form-control-plaintext" id="id_pasien" hidden>
                  <div class="row">
                    <p class="col-5 col-sm-4">Nomor RM</p>
                    <div class="col-7 col-sm-8">
                      <p id="no_rm" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Nama Pasien</p>
                    <div class="col-7 col-sm-8">
                      <p id="nama_pasien" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Tanggal Lahir</p>
                    <div class="col-7 col-sm-8">
                      <p id="tgl_lahir_date" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Jenis Kelamin</p>
                    <div class="col-7 col-sm-8">
                      <p id="jekel" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Ruangan</p>
                    <div class="col-7 col-sm-8">
                      <p id="ruangan" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Pembayaran</p>
                    <div class="col-7 col-sm-8">
                      <p id="bayar" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Tanggal Pulang</p>
                    <div class="col-7 col-sm-8">
                      <p id="tgl_pulang" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Tanggal Harus Kembali</p>
                    <div class="col-7 col-sm-8">
                      <p id="tgl_haruskembali" class="h5"></p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="col-5 col-sm-4">Nomor Telp Pegawai</p>
                    <div class="col-7 col-sm-8">
                      <p id="notelp" class="h5"></p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Bootstrap admin template from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright &copy; SI Peminjaman dan Pengembalian BRM RI RS Graha Sehat | NFF | <?= date('Y'); ?></span>
          </div>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <script src="<?php echo base_url(); ?>assets/vendors/new/js/jquery-3.3.1.js"></script>
  <!-- plugins:js -->
  <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/new/js/bootstrap.js'"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/new/js/jquery-ui.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/inputmask/jquery.inputmask.bundle.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/template.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url(); ?>assets/js/inputmask.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/Chart.roundedBarCharts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/data-table.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/alerts.js"></script>
  <!-- End custom js for this page-->
  <!-- start - This is for export functionality only -->
  <script src="<?= base_url('assets/'); ?>vendors/datatables/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables/buttons.flash.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables/libs/jszip.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables/libs/pdfmake.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables/libs/vfs_fonts.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables/buttons.print.min.js"></script>
  <!-- end - This is for export functionality only -->
  <script type="text/javascript">
    $('.exportpeminjaman').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print',
                action: function ( e, dt, node, config ) {
                    window.open('laporanpeminjaman/cetak');
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            }
        ]
    });
    $('.buttons-pdf, .buttons-excel, .buttons-print').addClass('btn btn-primary me-1');
  </script>
  <script type="text/javascript">
    $('.exportpengembalian').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print',
                action: function ( e, dt, node, config ) {
                    window.open('laporanpengembalian/cetak');
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            }
        ]
    });
    $('.buttons-pdf, .buttons-excel, .buttons-print').addClass('btn btn-primary me-1');
  </script>
  <script type="text/javascript">
    $('.exportketerlambatan').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print',
                action: function ( e, dt, node, config ) {
                    window.open('laporanketerlambatan/cetak');
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            }
        ]
    });
    $('.buttons-pdf, .buttons-excel, .buttons-print').addClass('btn btn-primary me-1');
  </script>
  <script type="text/javascript">
    $('.exportketerlambatanfilter').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print',
                action: function ( e, dt, node, config ) {
                    window.open('laporanketerlambatan/cetak?isfiltering=filter');
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            }
        ]
    });
    $('.buttons-pdf, .buttons-excel, .buttons-print').addClass('btn btn-primary me-1');
  </script>
  <script type="text/javascript">
    $('#ruangan').on('change', function(){
      var x = document.getElementById("tableexportketerlambatan");
      var y = document.getElementById("tableexportketerlambatanfilter");

      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
        y.style.display = "block";
      }
    });
  </script>
  <script type="text/javascript">
    $('.exportpengguna').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print',
                action: function ( e, dt, node, config ) {
                    window.open('laporanpengguna/cetak');
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            }
        ]
    });
    $('.buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
  </script>
  <script type="text/javascript">
    $('.export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                orientation: 'landscape',
                exportOptions: {
                    columns: ':not(:last-child)',
                },
                customize: function (doc) {
                  doc.content[1].table.widths = 
                      Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            }
        ]
    });
    $('.buttons-pdf, .buttons-excel, .buttons-print').addClass('btn btn-primary me-1');
  </script>
  <script type="text/javascript">  
    $(document).ready(function() {

        $('#no_rm_adm').autocomplete({
            source: "<?php echo site_url('pengembalian/get_auto_fill_adm'); ?>",

            select: function(event, ui) {
                $('[name="no_rm"]').val(ui.item.label);
                $('[name="id_pengembalian"]').val(ui.item.id_pengembalian);
                $('[name="nama_pasien"]').val(ui.item.nama_pasien);
                $('[name="tgl_lahir"]').val(ui.item.tgl_lahir);
                $('[name="jekel"]').val(ui.item.jekel);
                $('[name="ruangan"]').val(ui.item.ruangan);
                $('[name="bayar"]').val(ui.item.bayar);
                $('[name="tgl_pulang"]').val(ui.item.tgl_pulang);
                $('[name="tgl_haruskembali"]').val(ui.item.tgl_haruskembali);
            }
        });

    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {

        $('#no_rm_ri').autocomplete({
            source: "<?php echo site_url('pengembalian/get_auto_fill_ri'); ?>",

            select: function(event, ui) {
                $('[name="no_rm"]').val(ui.item.label);
                $('[name="id_peminjaman"]').val(ui.item.id_peminjaman);
                $('[name="nama_pasien"]').val(ui.item.nama_pasien);
                $('[name="tgl_lahir"]').val(ui.item.tgl_lahir);
                $('[name="jekel"]').val(ui.item.jekel);
                $('[name="ruangan"]').val(ui.item.ruangan);
                $('[name="tgl_pulang"]').val(ui.item.tgl_pulang);
                $('[name="tgl_haruskembali"]').val(ui.item.tgl_haruskembali);
            }
        });

    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#no_rm_auto').autocomplete({
            source: "<?php echo site_url('peminjaman/get_auto_fill_rm'); ?>",

            select: function(event, ui) {
                $('[name="no_rm"]').val(ui.item.label);
                $('[name="id_pasien"]').val(ui.item.id_pasien);
                $('[name="nama_pasien"]').val(ui.item.nama_pasien);
                $('[name="tgl_lahir"]').val(ui.item.tgl_lahir);
                $('[name=jekel][value=' + ui.item.jekel + ']').prop("checked", true);
            }
        });

    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','#laporanpeminjaman',function(){
        var id = $(this).data('id');
        var idpass = $(this).data('idpass');
        var norm = $(this).data('norm');
        var namapasien = $(this).data('namapasien');
        var tgllahir = $(this).data('tgllahir');
        var jekel = $(this).data('jekel');
        var ruangan = $(this).data('ruangan');
        var tglpinjam = $(this).data('tglpinjam');

        $('#id_peminjaman').val(id);
        $('#id_pasien').val(idpass);
        $('#no_rm').val(norm);
        $('#nama_pasien').val(namapasien);
        $('#tgl_lahir_date').val(tgllahir);
        $("input[name=jekel][value=" + jekel + "]").prop('checked', true);
        $('#ruangan').val(ruangan);
        $('#tgl_pinjam').val(tglpinjam);
      });
      $(document).on('click','#deletepeminjaman',function(){
        var id = $(this).data('id');
        var norm = $(this).data('norm');
        $('#id').val(id);
        $('#norm').text(norm);
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','#laporanpengembalian',function(){  
        var id = $(this).data('id');
        var idpass = $(this).data('idpass');
        var norm = $(this).data('norm');
        var namapasien = $(this).data('namapasien');
        var tgllahir = $(this).data('tgllahir');
        var jekel = $(this).data('jekel');
        var ruangan = $(this).data('ruangan');
        var bayar = $(this).data('bayar');
        var tglpulang = $(this).data('tglpulang');
        var tglharuskembali= $(this).data('tglharuskembali');
        var tglkembali= $(this).data('tglkembali');

        $('#id_pengembalian').val(id);
        $('#id_pasien').val(idpass);
        $('#no_rm').val(norm);
        $('#nama_pasien').val(namapasien);
        $('#tgl_lahir_date').val(tgllahir);
        $("input[name=jekel][value=" + jekel + "]").prop('checked', true);
        $('#ruangan').val(ruangan);
        $('#bayar').val(bayar);
        $('#tgl_pulang').val(tglpulang);
        $('#tgl_haruskembali').val(tglharuskembali);
        $('#tgl_kembali').val(tglkembali);
      });
      $(document).on('click','#deletepengembalian',function(){
        var id = $(this).data('id');
        var norm = $(this).data('norm');
        $('#id').val(id);
        $('#norm').text(norm);
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','#laporanketerlambatan',function(){
        var id = $(this).data('id');
        var idpass = $(this).data('idpass');
        var norm = $(this).data('norm');
        var namapasien = $(this).data('namapasien');
        var tgllahir = $(this).data('tgllahir');
        var jekel = $(this).data('jekel');
        var ruangan = $(this).data('ruangan');
        var bayar = $(this).data('bayar');
        var tglpulang = $(this).data('tglpulang');
        var tglharuskembali= $(this).data('tglharuskembali');
        var tglkembali= $(this).data('tglkembali');

        $('#id_pengembalian').val(id);
        $('#id_pasien').val(idpass);
        $('#no_rm').val(norm);
        $('#nama_pasien').val(namapasien);
        $('#tgl_lahir_date').val(tgllahir);
        $("input[name=jekel][value=" + jekel + "]").prop('checked', true);
        $('#ruangan').val(ruangan);
        $('#bayar').val(bayar);
        $('#tgl_pulang').val(tglpulang);
        $('#tgl_haruskembali').val(tglharuskembali);
        $('#tgl_kembali').val(tglkembali);
      });
      $(document).on('click','#deleteketerlambatan',function(){
        var id = $(this).data('id');
        var norm = $(this).data('norm');
        $('#id').val(id);
        $('#norm').text(norm);
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','#laporanpengguna',function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var username = $(this).data('username');
        var password = $(this).data('password');
        var telp = $(this).data('telp');
        var level = $(this).data('level');
        var status = $(this).data('status');

        $('#id_pengguna').val(id);
        $('#nama').val(nama);
        $('#username').val(username);
        $('#password').val(password);
        $('#telp').val(telp);
        $('#level').val(level);
        $('#status').val(status);
      });
      $(document).on('click','#deletepengguna',function(){
        var id = $(this).data('id');
        var uname = $(this).data('username');
        $('#uname').text(uname);
        $('#id').val(id);
      });
    });
  </script>

<script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click','#detailnotifikasi',function(){  
        var id = $(this).data('id');
        var idpass = $(this).data('idpass');
        var norm = $(this).data('norm');
        var namapasien = $(this).data('namapasien');
        var tgllahir = $(this).data('tgllahir');
        var jekel = $(this).data('jekel');
        var ruangan = $(this).data('ruangan');
        var bayar = $(this).data('bayar');
        var tglpulang = $(this).data('tglpulang');
        var tglharuskembali= $(this).data('tglharuskembali');
        var notelp= $(this).data('notelp');

        $('#id_pengembalian').val(id);
        $('#id_pasien').val(idpass);
        $('#no_rm').text(norm);
        $('#nama_pasien').text(namapasien);
        $('#tgl_lahir_date').text(tgllahir);
        $('#jekel').text(jekel);
        $('#ruangan').text(ruangan);
        $('#bayar').text(bayar);
        $('#tgl_pulang').text(tglpulang);
        $('#tgl_haruskembali').text(tglharuskembali);
        $('#notelp').text(notelp);
      });
    });
  </script>

  <script type="text/javascript">
      $(function () {
        var date = new Date();
        date.setDate(date.getDate());

        $("#tgl_pulang_date").datepicker({
          startDate: date,
          format: "dd-mm-yyyy"
        }).on("change", function() {
          var pick = $('#tgl_pulang_date').datepicker('getDate', '+1d'); 
          pick.setDate(pick.getDate()+2); 

          var now = new Date(pick);
          var day = ("0" + now.getDate()).slice(-2);
          var month = ("0" + (now.getMonth() + 1)).slice(-2);

          var today = (day)+"-"+"-"+(month)+"-"+now.getFullYear();

          $('#tgl_haruskembali_date').val(today);
        });
      });
  </script>

  <script type="text/javascript">
      $(function () {
        $("#tgl_lahir_date").datepicker({
          format: "dd-mm-yyyy",
          useCurrent: false
        });
      });
  </script>

  <script type="text/javascript">
      $(function () {
        $("#tgl_kembali_date").datepicker({
          format: "dd-mm-yyyy",
          useCurrent: false
        });
      });
  </script>

<script type="text/javascript">
<?php
$level = "";
$jumlahPeng = null;
foreach ($penggunaChart as $data)
{
    $level     .= "'$data->nama_level'". ", ";
    $jumPeng       = $data->count;
    $jumlahPeng   .= "$jumPeng". ", ";
}
?>
    var penggunaChart = document.getElementById("penggunaChart").getContext("2d");

    var myChart = new Chart(penggunaChart, {
        type: 'pie',
        data: {
          labels: [<?php echo $level; ?>],
          datasets: [{
            data: [<?php echo $jumlahPeng; ?>],
            backgroundColor: [
              'rgba(255, 99, 132, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(255, 206, 86, 0.5)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)'
            ]
          }]
        },
        options: {
          responsive: true,
          animation: {
            animateScale: true,
            animateRotate: true
          }
       }
   });
  </script>
  
  <script type="text/javascript">
<?php
$ruangan = "";
$jumlahRu = null;
foreach ($ruanganpeminjamanChart as $data)
{
  $ruang    = $data->nama_ruangan;
  $ruangan  .= "'$ruang'". ", ";
  $jumRu      = $data->count;
  $jumlahRu   .= "$jumRu". ", ";
}
?>
    var peminjamanruanganChart = document.getElementById("peminjamanruanganChart").getContext("2d");

    var myChart = new Chart(peminjamanruanganChart, {
        type: 'bar',
        data: {
          labels: [<?php echo $ruangan; ?>],
          datasets: [{
            label: 'Peminjaman',
            data: [<?php echo $jumlahRu; ?>],
            backgroundColor: [
              'rgba(54, 162, 235, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(54, 162, 235, 0.5)'
            ],
            borderColor: [
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
    });
  </script>

  <script type="text/javascript">
<?php
$ruangan = "";
$jumlahRu = null;
foreach ($ruanganpengembalianChart as $data)
{
  $ruang    = $data->nama_ruangan;
  $ruangan  .= "'$ruang'". ", ";
  $jumRu      = $data->count;
  $jumlahRu   .= "$jumRu". ", ";
}
?>
    var pengembalianruanganChart = document.getElementById("pengembalianruanganChart").getContext("2d");

    var myChart = new Chart(pengembalianruanganChart, {
        type: 'bar',
        data: {
          labels: [<?php echo $ruangan; ?>],
          datasets: [{
            label: 'Pengembalian',
            data: [<?php echo $jumlahRu; ?>],
            backgroundColor: [
              'rgba(255, 206, 86, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(255, 206, 86, 0.5)'
            ],
            borderColor: [
              'rgba(255, 206, 86, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
    });
  </script>

  <script type="text/javascript">
<?php
$ruangan = "";
$jumlahRu = null;
foreach ($ruanganketerlambatanChart as $data)
{
  $ruang    = $data->nama_ruangan;
  $ruangan  .= "'$ruang'". ", ";
  $jumRu      = $data->count;
  $jumlahRu   .= "$jumRu". ", ";
}
?>
    var keterlambatanruanganChart = document.getElementById("keterlambatanruanganChart").getContext("2d");

    var myChart = new Chart(keterlambatanruanganChart, {
        type: 'bar',
        data: {
          labels: [<?php echo $ruangan; ?>],
          datasets: [{
            label: 'Keterlambatan',
            data: [<?php echo $jumlahRu; ?>],
            backgroundColor: [
              'rgba(255, 99, 132, 0.5)',
              'rgba(255, 99, 132, 0.5)',
              'rgba(255, 99, 132, 0.5)',
              'rgba(255, 99, 132, 0.5)',
              'rgba(255, 99, 132, 0.5)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(255, 99, 132, 1)',
              'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1,
            fill: false
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 0
            }
          }
        }
    });
  </script>

  <script type="text/javascript">
    var graphGradient = document.getElementById("peminjamanWeek").getContext('2d');
    var graphGradient2 = document.getElementById("peminjamanWeek").getContext('2d');
    var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
    saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.18)');
    saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.02)');
    var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
    saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
    saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');
    var salesTopData = {
        labels: ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"],
        datasets: [{
            label: 'Minggu ini',
            data: [ <?php 
                $weekNumber = date("W");
                $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber)
                        ->where('DAYOFWEEK(tgl_pinjam)', 1)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
                echo $day;
              ?>, <?php 
                $weekNumber = date("W");
                $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber)
                        ->where('DAYOFWEEK(tgl_pinjam)', 2)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
                echo $day;
              ?>, <?php 
                $weekNumber = date("W");
                $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber)
                        ->where('DAYOFWEEK(tgl_pinjam)', 3)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
                echo $day;
              ?>, <?php 
                $weekNumber = date("W");
                $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber)
                        ->where('DAYOFWEEK(tgl_pinjam)', 4)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
                echo $day;
              ?>, <?php 
                $weekNumber = date("W");
                $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber)
                          ->where('DAYOFWEEK(tgl_pinjam)', 5)
                          ->where('tgl_kembali', NULL)
                          ->from('tb_history')
                          ->count_all_results();
                echo $day;
              ?>, <?php 
                $weekNumber = date("W");
                $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber)
                          ->where('DAYOFWEEK(tgl_pinjam)', 6)
                          ->where('tgl_kembali', NULL)
                          ->from('tb_history')
                          ->count_all_results();
                echo $day;
              ?>, <?php 
                $weekNumber = date("W");
                $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber)
                        ->where('DAYOFWEEK(tgl_pinjam)', 7)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
                echo $day;
              ?>
              ],
            backgroundColor: saleGradientBg,
            borderColor: [
                '#4e73df',
            ],
            borderWidth: 1.5,
            fill: true, // 3: no fill
            pointBorderWidth: 1,
            pointRadius: [4, 4, 4, 4, 4, 4, 4],
            pointHoverRadius: [2, 2, 2, 2, 2, 2, 2],
            pointBackgroundColor: ['#4e73df', '#4e73df', '#4e73df', '#4e73df','#4e73df', '#4e73df', '#4e73df'],
            pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff'],
        },{
          label: 'Minggu kemarin',
          data: [<?php 
              $weekNumber = date("W");
              $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('DAYOFWEEK(tgl_pinjam)', 1)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
              echo $day;
            ?>, <?php 
              $weekNumber = date("W");
              $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('DAYOFWEEK(tgl_pinjam)', 2)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
              echo $day;
            ?>, <?php 
              $weekNumber = date("W");
              $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('DAYOFWEEK(tgl_pinjam)', 3)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
              echo $day;
            ?>, <?php 
              $weekNumber = date("W");
              $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('DAYOFWEEK(tgl_pinjam)', 4)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
              echo $day;
            ?>, <?php 
              $weekNumber = date("W");
              $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('DAYOFWEEK(tgl_pinjam)', 5)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
              echo $day;
            ?>, <?php 
              $weekNumber = date("W");
              $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('DAYOFWEEK(tgl_pinjam)', 6)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
              echo $day;
            ?>, <?php 
              $weekNumber = date("W");
              $day = $this->db->where('WEEK(tgl_pinjam)', $weekNumber-1)
                        ->where('DAYOFWEEK(tgl_pinjam)', 7)
                        ->where('tgl_kembali', NULL)
                        ->from('tb_history')
                        ->count_all_results();
              echo $day;
            ?>
            ],
          backgroundColor: saleGradientBg2,
          borderColor: [
              '#52CDFF',
          ],
          borderWidth: 1.5,
          fill: true, // 3: no fill
          pointBorderWidth: 1,
          pointRadius: [4, 4, 4, 4, 4, 4, 4],
          pointHoverRadius: [2, 2, 2, 2, 2, 2, 2],
          pointBackgroundColor: ['#52CDFF', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF', '#52CDFF', '#52CDFF'],
            pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff'],
      }]
    };

    var salesTopOptions = {
      responsive: true,
      maintainAspectRatio: false,
        scales: {
            yAxes: [{
                gridLines: {
                    display: true,
                    drawBorder: false,
                    color:"#F0F0F0",
                    zeroLineColor: '#F0F0F0',
                },
                ticks: {
                  beginAtZero: false,
                  autoSkip: true,
                  maxTicksLimit: 4,
                  fontSize: 10,
                  color:"#6B778C"
                },
                scaleLabel: {
                  display: true,
                  fontColor: '#3C3750',
                  fontSize: 10,
                  labelString: 'Jumlah Berkas',
                },
            }],
            xAxes: [{
              gridLines: {
                  display: false,
                  drawBorder: false,
              },
              ticks: {
                beginAtZero: false,
                autoSkip: true,
                maxTicksLimit: 7,
                fontSize: 10,
                color:"#6B778C"
              },
              scaleLabel: {
                display: true,
                fontColor: '#3C3750',
                fontSize: 10,
                labelString: 'Hari',
              },
          }],
        },
        legend:false,
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            console.log(chart.data.datasets[i]); // see what's inside the obj.
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        
        elements: {
            line: {
                tension: 0.4,
            }
        },
        tooltips: {
            backgroundColor: 'rgba(31, 59, 179, 1)',
        }
    }
    var salesTop = new Chart(graphGradient, {
        type: 'line',
        data: salesTopData,
        options: salesTopOptions
    });
    document.getElementById('peminjaman-line-legend').innerHTML = salesTop.generateLegend();
  </script>
</body>
</html>

