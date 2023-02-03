<?php include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php
                        $tanggal = date('Y-m-d');
                        $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'");
                        $p = mysqli_fetch_assoc($pemasukan);
                        ?>
                        <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?>
                        </h4>
                        <p>Pemasukan Hari Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="laporan.php?tanggal_dari=2022-12-31&tanggal_sampai=2022-12-31&kategori=semua" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <?php
                        $bulan = date('m');
                        $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan'");
                        $p = mysqli_fetch_assoc($pemasukan);
                        ?>
                        <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?>
                        </h4>
                        <p>Pemasukan Bulan Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <?php
                        $tahun = date('Y');
                        $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$tahun'");
                        $p = mysqli_fetch_assoc($pemasukan);
                        ?>
                        <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?>
                        </h4>
                        <p>Pemasukan Tahun Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-black">
                    <div class="inner">
                        <?php
                        $pemasukan = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan'");
                        $p = mysqli_fetch_assoc($pemasukan);
                        ?>
                        <h4 style="font-weight: bolder"><?php echo "Rp. " . number_format($p['total_pemasukan']) . " ,-" ?>
                        </h4>
                        <p>Seluruh Pemasukan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>



            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php
                        $tanggal = date('Y-m-d');
                        $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and transaksi_tanggal='$tanggal'");
                        $p = mysqli_fetch_assoc($pengeluaran);
                        ?>

                        <h4 style="font-weight: bolder">
                            <?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
                        <p>Pengeluaran Hari Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php
                        $bulan = date('m');
                        $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and month(transaksi_tanggal)='$bulan'");
                        $p = mysqli_fetch_assoc($pengeluaran);
                        ?>

                        <h4 style="font-weight: bolder">
                            <?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
                        <p>Pengeluaran Bulan Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php
                        $tahun = date('Y');
                        $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and year(transaksi_tanggal)='$tahun'");
                        $p = mysqli_fetch_assoc($pengeluaran);
                        ?>

                        <h4 style="font-weight: bolder">
                            <?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
                        <p>Pengeluaran Tahun Ini</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-black">
                    <div class="inner">
                        <?php
                        $pengeluaran = mysqli_query($koneksi, "SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran'");
                        $p = mysqli_fetch_assoc($pengeluaran);
                        ?>
                        <h4 style="font-weight: bolder">
                            <?php echo "Rp. " . number_format($p['total_pengeluaran']) . " ,-" ?></h4>
                        <p>Seluruh Pengeluaran</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h3>Grafik Transaksi Perbulan</h3>
                                    <canvas id="grafik1" style="position: relative; height: 240px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h3>Grafik Transaksi Tahunan</h3>
                                    <canvas id="grafik2" style="position: relative; height: 240px;"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    </section>
</div>

<?php include 'footer.php'; ?>