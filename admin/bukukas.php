<?php include 'header.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            BUKU KAS UMUM
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="btn-group pull-right">
                            <a href="bukukas_print.php" target="_blank" class="btn btn-sm btn-primary"><i
                                    class="fa fa-print"></i> &nbsp
                                PRINT</a>
                        </div>
                    </div>
                    <div class="box-body">

                        <!-- Modal -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th rowspan="1" class="text-center">NO</th>
                                        <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                                        <th rowspan="2" class="text-center">PERIHAL</th>
                                        <th class="text-center">NO.KAS</th>
                                        <th class="text-center">MASUK</th>
                                        <th class="text-center">KELUAR</th>
                                        <th width="10%" rowspan="2" class="text-center">SALDO</th>
                                        <th rowspan="2" width="10%" class="text-center">OPSI</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <?php include '../koneksi.php';
                                $no = 1;

                                // Calculate the total income
                                $total_pemasukan = 0;
                                

                                // Calculate the total expenditure
                                $total_pengeluaran = 0;
                              

                                // Calculate the balance
                                $saldo = $total_pemasukan - $total_pengeluaran;

                                // Iterate over the transactions and update the balance
                                $data = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY transaksi_id ASC");
                                while ($d = mysqli_fetch_array($data)) {
                                    if ($d['transaksi_jenis'] == 'Pengeluaran') {
                                        // Subtract the amount of the transaction from the balance
                                        $saldo -= $d['transaksi_nominal'];
                                    } else if ($d['transaksi_jenis'] == 'Pemasukan') {
                                        // Subtract the amount of the transaction from the balance
                                        $saldo += $d['transaksi_nominal'];
                                    }
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td class="text-center">
                                            <?php
                                            $tanggal = date('d-M-y', strtotime($d['transaksi_tanggal']));
                                            $tanggal = str_replace(
                                                ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                                ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                                                $tanggal
                                            );
                                            echo $tanggal; // contoh hasil: "03-Jan-21"
                                            ?>
                                        </td>
                                        <td><?php echo $d['transaksi_keterangan']; ?></td>
                                        <td><?php echo $d['kode_rekening']; ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($d['transaksi_jenis'] == "Pemasukan") {
                                                echo "Rp. " . number_format($d['transaksi_nominal']) . " ,-";
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($d['transaksi_jenis'] == "Pengeluaran") {
                                                echo "Rp. " . number_format($d['transaksi_nominal']) . " ,-";
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center" width="20%">
                                            <?php
                                            echo "Rp. " . number_format($saldo) . " ,-";
                                            ?> </td>
                                        <td>

                                            <button type="button" class="btn btn-danger btn-sm text-center"
                                                data-toggle="modal"
                                                data-target="#hapus_transaksi_<?php echo $d['transaksi_id'] ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                        <!-- modal hapus -->
                                        <div class="modal fade" id="hapus_transaksi_<?php echo $d['transaksi_id'] ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">Peringatan!
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p>Yakin ingin menghapus data ini ?</p>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <a href="transaksi_hapus.php?id=<?php echo $d['transaksi_id'] ?>"
                                                            class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
            </section>
        </div>
    </section>

</div>


<?php include 'footer.php'; ?>