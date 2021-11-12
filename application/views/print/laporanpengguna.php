<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <!-- endcustom CSS -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
    <style>
    @media print {
        @page{
            margin-top: 0;
            margin-bottom: 0;
        }
        body  {
            padding-top: 72px;
            padding-bottom: 72px ;
        }
    }
    </style>
</head>

<body>
    <h1 style="text-align:center">Laporan Pengguna</h1>
    <table class="table table-bordered">
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
                            echo "$txt";
                        } else {
                            $txt = "Tidak Aktif";
                            echo "$txt";
                        } 
                    ?>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
</body>
<script>
  	window.print();
    setTimeout(window.close, 0);
</script>
</html>