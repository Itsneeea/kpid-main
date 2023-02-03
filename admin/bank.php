<?php include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h3 class="box-title">
            REKENING AKUN
        </h3>
    </section>
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-plus"></i> &nbsp Tambah Akun
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <!-- Modal -->
                        <form action="bank_act.php" method="post">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Nama Akun</label>
                                                <input type="text" name="periode" required="required"
                                                    class="form-control" placeholder="Nama Akun ..">
                                            </div>

                                            <div class="form-group">
                                                <label>Periode</label>
                                                <input type="text" name="pemilik" class="form-control"
                                                    placeholder="Periode Akun ..">
                                            </div>

                                            <div class="form-group">
                                                <label>Saldo Awal</label>
                                                <input type="number" name="saldo" required="required"
                                                    class="form-control" placeholder="Saldo bank ..">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th width="1%">NO</th>
                                        <th>NAMA REKENING</th>
                                        <th>PERIODE</th>
                                        <th>SALDO</th>
                                        <th width="10%">OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM bank");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['periode']; ?></td>
                                        <td><?php echo $d['bank_pemilik']; ?></td>
                                        <td><?php echo "Rp. " . number_format($d['bank_saldo']) . " ,-"; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#edit_bank_<?php echo $d['bank_id'] ?>">
                                                <i class="fa fa-cog"></i>
                                            </button>

                                            <?php
                                                if ($d['bank_id'] != 1) {
                                                ?>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#hapus_bank_<?php echo $d['bank_id'] ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <?php
                                                }
                                                ?>

                                            <form action="bank_update.php" method="post">
                                                <div class="modal fade" id="edit_bank_<?php echo $d['bank_id'] ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Edit
                                                                    Rekening
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group"
                                                                    style="margin-bottom:15px;width: 100%">
                                                                    <label>Nama Akun</label>
                                                                    <input type="hidden" name="id" required="required"
                                                                        class="form-control" placeholder="Nama bank .."
                                                                        value="<?php echo $d['bank_id']; ?>">
                                                                    <input type="text" name="periode" style="width:100%"
                                                                        required="required" class="form-control"
                                                                        placeholder="Nama bank .."
                                                                        value="<?php echo $d['periode']; ?>">
                                                                </div>

                                                                <div class="form-group"
                                                                    style="margin-bottom:15px;width: 100%">
                                                                    <label>Periode</label>
                                                                    <input type="text" name="pemilik" style="width:100%"
                                                                        class="form-control"
                                                                        placeholder="Nama pemiliki rekening bank .."
                                                                        value="<?php echo $d['bank_pemilik']; ?>">
                                                                </div>
                                                                <div class="form-group"
                                                                    style="margin-bottom:15px;width: 100%">
                                                                    <label>Saldo Awal</label>
                                                                    <input type="number" name="saldo" style="width:100%"
                                                                        required="required" class="form-control"
                                                                        placeholder="Saldo bank .."
                                                                        value="<?php echo $d['bank_saldo']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- modal hapus -->
                                            <div class="modal fade" id="hapus_bank_<?php echo $d['bank_id'] ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Peringatan!
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <p>Yakin ingin menghapus data ini ?</p>
                                                            <p>Semua data yang berhubungan dengan akunini akan dipindah
                                                                ke akundefault.</p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <a href="bank_hapus.php?id=<?php echo $d['bank_id'] ?>"
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