<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <!-- <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#mingguan" role="tab" aria-controls="mingguan" aria-selected="true">Mingguan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#bulanan" role="tab" aria-controls="bulanan" aria-selected="false">Bulanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tahunan" role="tab" aria-controls="tahunan" aria-selected="false">Tahunan</a>
                    </li>
                    </ul> -->
                    <div>
                    <!-- <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div> -->
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="mingguan" role="tabpanel" aria-labelledby="mingguan"> 
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="statistics-details d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="statistics-title">Peminjaman</p>
                                        <h3 class="rate-percentage"><?= $countPeminjaman; ?></h3>
                                        <!-- <?php 
                                        if($countPeminjaman >= $countyesterdayPeminjaman) { ?>
                                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i>
                                                <span>
                                                    <?php
                                                    $a = $countPeminjaman-$countyesterdayPeminjaman;
                                                    $b = "";
                                                    if ($countyesterdayPeminjaman == 0){
                                                        $c = "infinity";
                                                    } else {
                                                        $b = $a/$countyesterdayPeminjaman;
                                                        $c = $b * 100;
                                                    }
                                                    echo "+$c%";
                                                    ?>
                                                </span>
                                            </p>
                                        <?php } else { ?>
                                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i>
                                                <span>
                                                    <?php
                                                    $a = $countyesterdayPeminjaman-$countPeminjaman;
                                                    $b = $a/$countyesterdayPeminjaman;
                                                    $c = $b * 100;
                                                    echo "-$c%";
                                                    ?>
                                                </span>
                                            </p>
                                        <?php } ?> -->
                                    </div>
                                    <div>
                                    <p class="statistics-title">Pengembalian</p>
                                    <h3 class="rate-percentage"><?= $countPengembalian; ?></h3>
                                    <!-- <?php 
                                        if($countPengembalian >= $countyesterdayPengembalian) { ?>
                                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i>
                                                <span>
                                                    <?php
                                                    $a = $countPengembalian-$countyesterdayPengembalian;
                                                    $b = "";
                                                    if ($countyesterdayPengembalian == 0){
                                                        $c = "infinity";
                                                    } else {
                                                        $b = $a/$countyesterdayPengembalian;
                                                        $c = $b * 100;
                                                    }
                                                    echo "+$c%";
                                                    ?>
                                                </span>
                                            </p>
                                        <?php } else { ?>
                                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i>
                                                <span>
                                                    <?php
                                                    $a = $countyesterdayPengembalian-$countPengembalian;
                                                    $b = $a/$countyesterdayPengembalian;
                                                    $c = $b * 100;
                                                    echo "-$c%";
                                                    ?>
                                                </span>
                                            </p>
                                        <?php } ?> -->
                                    </div>
                                    <div>
                                        <p class="statistics-title">Keterlambatan</p>
                                        <h3 class="rate-percentage"><?= $countKeterlambatan; ?></h3>
                                        <!-- <?php 
                                        if($countKeterlambatan >= $countyesterdayKeterlambatan) { ?>
                                            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i>
                                                <span>
                                                    <?php
                                                    $a = $countKeterlambatan-$countyesterdayKeterlambatan;
                                                    $b = "";
                                                    if ($countyesterdayKeterlambatan == 0){
                                                        $c = "infinity";
                                                    } else {
                                                        $b = $a/$countyesterdayKeterlambatan;
                                                        $c = $b * 100;
                                                    }
                                                    echo "+$c%";
                                                    ?>
                                                </span>
                                            </p>
                                        <?php } else { ?>
                                            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i>
                                                <span>
                                                    <?php
                                                    $a = $countyesterdayKeterlambatan-$countKeterlambatan;
                                                    $b = $a/$countyesterdayKeterlambatan;
                                                    $c = $b * 100;
                                                    echo "-$c%";
                                                    ?>
                                                </span>
                                            </p>
                                        <?php } ?> -->
                                    </div>
                                </div>
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Data Peminjaman</h4>
                                                        <h5 style="font-size:10pt" class="card-subtitle card-subtitle-dash">Grafik peminjaman dalam mingguan</h5>
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <div id="peminjaman-line-legend"></div>
                                                </div>
                                                <div class="chartjs-wrapper mt-5">
                                                    <canvas id="peminjamanWeek"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row flex-grow">
                                    <!-- <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                            <h4 class="card-title">Pengguna</h4>
                                            <canvas id="penggunaChart"></canvas>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                            <h4 class="card-title card-title-dash">Peminjaman Ruangan</h4>
                                            <canvas id="peminjamanruanganChart"></canvas>
                                            <h4 class="card-title card-title-dash">Pengembalian Ruangan</h4>
                                            <canvas id="pengembalianruanganChart"></canvas>
                                            <h4 class="card-title card-title-dash">Keterlambatan Ruangan</h4>
                                            <canvas id="keterlambatanruanganChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->