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
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
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
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text"><span class="text-black fw-bold"><?= $this->session->userdata('username'); ?></span></h1>
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
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
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
          <li class="nav-item <?php if($this->uri->segment(1) == "peminjaman"){ echo 'active';}?>">
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
          <li class="nav-item nav-category">Lainnya</li>
          <li class="nav-item <?php if($this->uri->segment(1) == "grafik"){ echo 'active';}?>">
            <a class="nav-link" href="index.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Grafik</span>
            </a>
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
              <span class="menu-title">Data Pengembalian</span>
            </a>
          </li>
          <li class="nav-item nav-category">Lainnya</li>
          <li class="nav-item <?php if($this->uri->segment(1) == "grafik"){ echo 'active';}?>">
            <a class="nav-link" href="index.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Grafik</span>
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
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Lainnya</li>
          <li class="nav-item <?php if($this->uri->segment(1) == "grafik"){ echo 'active';}?>">
            <a class="nav-link" href="index.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Grafik</span>
            </a>
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
                      <h5 class="modal-title" id="exampleModalLabel">Detail Notifikasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <?php
                      foreach ($get_notiftoday as $data) { ?>
                          <a href="<?php echo base_url(); ?>peminjaman/<?= $data->id_peminjaman; ?>">
                            <p> Permintaan berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?></p>
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
                      <h5 class="modal-title" id="exampleModalLabel">Detail Notifikasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <?php
                      foreach ($get_notifyesterday as $data) { ?>
                          <a href="<?php echo base_url(); ?>peminjaman/<?= $data->id_peminjaman; ?>">
                            <p> Permintaan berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?></p>
                          </a>
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>
      <?php } else { ?>
      <!-- Modal -->
      <div class="modal fade" id="todayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Notifikasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <?php
                      foreach ($get_notiftoday as $data) { ?>
                          <div>
                              <p> Berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?> harus kembali hari ini</p>
                          </div>
                      <?php } ?>
                      <?php
                      foreach ($get_notifterlambat as $data) { ?>
                          <div>
                              <p class="text-danger"> Berkas <?= $data->no_rm ?> atas nama <?= $data->nama_pasien ?> batas waktu pengembalian telah terlewat</p>
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
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Bootstrap admin template from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
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
  <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
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
    $('.export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                className: 'btn-primary',
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
    $('.buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
  </script>
  <script type="text/javascript">
    $('.exportpengguna').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                className: 'btn-primary',
                exportOptions: {
                    columns: ':not(:last-child)',
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
  <script>
    $(document).ready(function(){
      $(document).on('click','#laporanpeminjaman',function(){
        var norm = $(this).data('norm');
        var namapasien = $(this).data('namapasien');
        var tgllahir = $(this).data('tgllahir');
        var jekel = $(this).data('jekel');
        var ruangan = $(this).data('ruangan');
        var tglpinjam = $(this).data('tglpinjam');

        $('#no_rm').val(norm);
        $('#nama_pasien').val(namapasien);
        $('#tgl_lahir').val(tgllahir);
        $('#jekel').val(jekel);
        $("input[name=jekel][value=" + jekel + "]").prop('checked', true);
        $('#ruangan').val(ruangan);
        $('#tgl_pinjam').val(tglpinjam);
      });
      $(document).on('click','#deletepeminjaman',function(){
        var id = $(this).data('id');
        $('#id').text(id);
        $('#rm').val(id);
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $(document).on('click','#laporanpengembalian',function(){  
        var norm = $(this).data('norm');
        var namapasien = $(this).data('namapasien');
        var tgllahir = $(this).data('tgllahir');
        var jekel = $(this).data('jekel');
        var ruangan = $(this).data('ruangan');
        var bayar = $(this).data('bayar');
        var tglpulang = $(this).data('tglpulang');
        var tglharuskembali= $(this).data('tglharuskembali');
        var tglkembali= $(this).data('tglkembali');

        $('#no_rm').val(norm);
        $('#nama_pasien').val(namapasien);
        $('#tgl_lahir').val(tgllahir);
        $('#jekel').val(jekel);
        $("input[name=jekel][value=" + jekel + "]").prop('checked', true);
        $('#ruangan').val(ruangan);
        $('#bayar').val(bayar);
        $('#tgl_pulang').val(tglpulang);
        $('#tgl_haruskembali').val(tglharuskembali);
        $('#tgl_kembali').val(tglkembali);
      });
      $(document).on('click','#deletepengembalian',function(){
        var id = $(this).data('id');
        $('#id').text(id);
        $('#rm').val(id);
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $(document).on('click','#laporanketerlambatan',function(){
          
          var norm = $(this).data('norm');
          var namapasien = $(this).data('namapasien');
          var tgllahir = $(this).data('tgllahir');
          var jekel = $(this).data('jekel');
          var ruangan = $(this).data('ruangan');
          var bayar = $(this).data('bayar');
          var tglpulang = $(this).data('tglpulang');
          var tglharuskembali= $(this).data('tglharuskembali');
          var tglkembali= $(this).data('tglkembali');

          $('#no_rm').val(norm);
          $('#nama_pasien').val(namapasien);
          $('#tgl_lahir').val(tgllahir);
          $('#jekel').val(jekel);
          $("input[name=jekel][value=" + jekel + "]").prop('checked', true);
          $('#ruangan').val(ruangan);
          $('#bayar').val(bayar);
          $('#tgl_pulang').val(tglpulang);
          $('#tgl_haruskembali').val(tglharuskembali);
          $('#tgl_kembali').val(tglkembali);
      });
      $(document).on('click','#deleteketerlambatan',function(){
        var id = $(this).data('id');
        $('#id').text(id);
        $('#rm').val(id);
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $(document).on('click','#laporanpengguna',function(){
        var id = $(this).data('id');
        var username = $(this).data('username');
        var password = $(this).data('password');
        var level = $(this).data('level');
        var status = $(this).data('status');

        $('#id_pengguna').val(id);
        $('#username').val(username);
        $('#password').val(password);
        $('#level').val(level);
        $('#status').val(status);
      });
      $(document).on('click','#deletepengguna',function(){
        var idpeng = $(this).data('id');
        var uname = $(this).data('username');
        $('#unametxt').text(uname);
        $('#idpeng').val(idpeng);
      });
    });
  </script>
</body>

</html>

