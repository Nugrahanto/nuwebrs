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
    <h1 style="text-align:center">Laporan Keterlambatan</h1>
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
</body>
<script>
  	window.print();
    setTimeout(window.close, 0);
</script>
</html>