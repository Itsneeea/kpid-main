<?php include 'header.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h3 class="box-title">LAPORAN ANGGARAN DANA NPHD</h3>
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

                <div class="box box-info">
                    <div class="box-body">
                        <?php
                        $periode = mysqli_query($koneksi, "SELECT * FROM bank");
                        if (isset($_GET['periode'])) {
                            $periode = $_GET['periode'];
                        ?>
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
                                <?php
                            }
                                ?>
                            </div>
                        </div>

                        <!-- <a href="laporan_excel.php?periode=<?php echo $periode ?>" target="_blank"
                            class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i>
                            &nbsp
                            CETAK
                            EXCEL</a> -->
                        <a href="nphd_print.php?periode=<?php echo $periode ?>" target="_blank"
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
                                            Uraian
                                        </th>
                                        <th colspan="3" class="text-center">
                                            Rincian
                                            Penghitungan
                                        </th>
                                        <th width="20%" rowspan="2" class="text-center">
                                            Jumlah(Rp)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">
                                            Volume
                                        </th>
                                        <th class="text-center">
                                            Satuan
                                        </th>
                                        <th class="text-center">
                                            Tarif/Harga
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include '../koneksi.php';
                                        $no = 1;
                                        $volume_nphd = 0;
                                        $tarif_nphd = 0;
                                        $data = mysqli_query($koneksi, "SELECT * FROM nphd where bank_id='$periode'");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $tarif_nphd = $d['tarif_nphd'];
                                            $volume_nphd = $d['volume_nphd'];

                                        ?>
                                    <tr>
                                        <td width="5%">
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $d['uraian_nphd']; ?>
                                        </td>
                                        <td>
                                            <?php echo $d['volume_nphd']; ?>
                                        </td>
                                        <td>
                                            <?php echo $d['satuan_nphd']; ?>
                                        </td>
                                        <td>
                                            <?php echo "" . number_format($tarif_nphd) . ""; ?>
                                        </td>
                                        </td>
                                        <td>
                                            <?php echo "Rp. " . number_format($tarif_nphd * $volume_nphd) . " ,-"; ?>
                                        </td>
                                    </tr>


                                    <!-- <?php
                                                    // }else{
                                                    ?> -->

                                    <!-- <div class="alert alert-info text-center">
                                        Silahkan Filter Laporan Terlebih Dulu.
                                    </div> -->

                                    <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

</div>
<?php include 'footer.php'; ?>