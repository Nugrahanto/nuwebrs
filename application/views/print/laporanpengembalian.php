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
    <h1 style="text-align:center">Laporan Pengembalian</h1>
    <table class="table table-bordered">
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
                <td><?= $data->nama_ruangan ?></td>
                <td><?= $data->bayar ?></td>
                <td><?= $data->tgl_pulang ?></td>
                <td><?= $data->tgl_haruskembali ?></td>
                <td>
                    <?php 
                        if (!empty($data->tgl_kembali)) { 
                            echo $data->tgl_kembali;
                        } else {
                            echo "-";
                        } 
                    ?>
                </td>
                <td>
                    <?php 
                        if (!empty($data->tgl_kembali && $data->tgl_kembali != "0000-00-00")) { 
                            echo "Kembali";
                        } else {
                            echo "Dipinjam";
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