<!DOCTYPE html>
<html>
<head>
    <title>Grafik</title>
    <!-- Load file plugin Chart.js -->
    <script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>
</head>
<body>
<br>
<h4>Grafik</h4>
<canvas id="myChart"></canvas>
    <?php
    //Inisialisasi nilai variabel awal
    $ruangan= "";
    $jumlah=null;
    foreach ($hasil as $ruangan)
    {
        $ruangan .= "'$ruangan'". ", ";
        $jum=$ruangan->total;
        $jumlah .= "$jum". ", ";
    }
    ?>