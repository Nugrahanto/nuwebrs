<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style type="text/css">
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font-family: Arial, sans-serif;
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 74mm;
        height: 105mm;
        margin: 3mm auto;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        -webkit-print-color-adjust: exact !important;
    }

    .subpage {
        padding-top: 2px;
        padding-left: 30px;
        padding-right: 20px;
        border: 1px;
        height: 105mm;
    }

    @page {
        size: 74mm 105mm;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 74mm;
            height: 105mm;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>

<style>
    .md-font {
        font-size: 8pt;
    }

    .bold {
        font-weight: bold;
    }
</style>

<body>
    <div class="form">
        <div class="page">
            <div class="subpage" style="margin-top: 20px; margin-bottom: 12px;">
                <div style="text-align:center">

                    <span class="sm-font bold">Rumah Sakit Graha Sehat</span> <br>
                    <span class="md-font small" >Jl.Panglima Sudirman No.02, Sumber Armi, Sumberlele, Kec.Kraksaan, Kab.Probolinggo, Jawa Timur</span>
                    <hr>
                </div>
                <div style="text-align:center">
                    <span class="sm-font bold">TRACER RM</span> <br>
                    <hr>
                </div>
<pre>
No.RM           : <?php echo $dataRM->no_rm;?><br>
Nama Pasien     : <?php echo $dataRM->nama_pasien;?> <br>
Tanggal Lahir   : <?php echo $dataRM->tgl_lahir;?> <br>
Jenis Kelamin   : <?php echo $dataRM->jekel;?> <br>
Ruangan         : <?php echo $dataRM->nama_ruangan;?> <br>
Tanggal Pinjam  : <?php echo $dataRM->tgl_pinjam;?> 
</pre>
            </div>
        </div>
    </div>
</body>
<script>
  	window.print();
</script>

</html>