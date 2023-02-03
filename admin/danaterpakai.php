<?php include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h3 class="box-title">LAPORAN PENGGUNAAN DANA ANGGARAN NPHD</h3>
    </section>
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h5 class="box-title">Filter Laporan</h5>
                    </div>
                    <div class="box-body">
                        <form method="get" action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="periode" class="form-control" required="required">
                                            <option value="semua">- Pilih -</option>
                                            <?php
                                            $periode = mysqli_query($koneksi, "SELECT * FROM bank");
                                            while ($p = mysqli_fetch_array($periode)) {
                                            ?>
                                            <option <?php if (isset($_GET['periode'])) {
                                                            if ($_GET['periode'] == $p['bank_id']) {
                                                                echo "selected='selected'";
                                                            }
                                                        } ?> value="<?php echo $p['bank_id']; ?>">
                                                <?php echo $p['periode']; ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" value="TAMPILKAN" class="btn btn-md btn-primary btn-block">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                $periode = mysqli_query($koneksi, "SELECT * FROM bank");
                if (isset($_GET['periode'])) {
                    $periode = $_GET['periode'];
                ?>
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>PERIODE : <?php
                                                $k = mysqli_query($koneksi, "select * from bank where bank_id='$periode'");
                                                $kk = mysqli_fetch_assoc($k);
                                                echo $kk['bank_pemilik']; ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="danaterpakai_print.php?periode=<?php echo $periode ?>" target="_blank"
                            class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp
                            PRINT</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%" rowspan="4">
                                            No
                                        </th>
                                        <th width="0%" rowspan="2" class="text-center">
                                            KATEGORI
                                        </th>
                                        <th rowspan="3" class="text-center">
                                            TOTAL PENGGUNAAN
                                        </th>
                                        <th width="20%" rowspan="2" class="text-center">
                                            SALDO
                                        </th>
                                        <th width="20%" rowspan="2" class="text-center">
                                            PERSENTASE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include '../koneksi.php';
                                        $no = 1;
                                        $tarif_nphd = 0;
                                        $transaksi_nominal = 0;
                                        $data = mysqli_query($koneksi, "SELECT nphd.id_nphd, SUM(nphd.tarif_nphd) AS tarif_nphd, kategori.kategori_id, kategori.kategori, SUM(transaksi.transaksi_nominal) AS transaksi_nominal, transaksi.transaksi_jenis, nphd.bank_id FROM nphd LEFT JOIN kategori ON nphd.kategori_nphd = kategori.kategori_id LEFT JOIN transaksi ON transaksi.transaksi_kategori = kategori.kategori_id WHERE transaksi.transaksi_jenis='Pengeluaran' AND nphd.bank_id='$periode' GROUP BY kategori.kategori_id");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $tarif_nphd = $d['tarif_nphd'];
                                            $transaksi_nominal = $d['transaksi_nominal'];
                                            $persentase = ($transaksi_nominal / $tarif_nphd) * 100;
                                        ?>
                                    <tr>
                                        <td width="5%">
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $d['kategori']; ?>
                                        </td>
                                        <td>
                                            <?php echo "Rp. " . number_format($transaksi_nominal) . " ,-"; ?>
                                        </td>
                                        <td>
                                            <?php echo "Rp. " . number_format($tarif_nphd) . " ,-"; ?>
                                        </td>
                                        </td>
                                        <td>
                                            <?php echo round($persentase, 2) . "%"; ?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </section>
        </div>
    </section>

</div>
<?php include 'footer.php'; ?>