<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleLogin.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />

</head>

<body class="bg-gradient-primary">
<div class="container container-main">

<!-- Outer Row -->
<div class="row justify-content-center container-body">

    <div class="col-xl-10 col-lg-12 col-md-12">
        <div class="card o-hidden border-1 shadow-lg my-5">
            <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
                <div class="text-center brand-logo">
                    <img src="<?= base_url() ?>/assets/images/logo.png">
                </div>

                <?php 
                    $message = $this->session->flashdata('message'); 
                    if (isset($message)) {
                        echo $message;
                        $this->session->unset_userdata('message');
                    } ?>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="container-form">
                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small
                                class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?= set_value('password'); ?>">
                                <?= form_error('password', '<small
                                class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

</div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendors/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendors/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>jss/sb-admin-2.min.js"></script>

 </body>

 </html>