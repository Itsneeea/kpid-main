<?php include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h3 class="box-title">
            DATA STAFF
            </h1>
    </section>
    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#exampleModal">
                            <i class="fa fa-plus"></i> &nbsp Tambah Staff
                        </button>
                        <!-- <a href="piutang_print.php" target="_blank" class="btn btn-sm btn-primary"><i
                                class="fa fa-print"></i> &nbsp
                            PRINT</a> -->
                    </div>
                    <div class="box-body">

                        <!-- Modal -->
                        <form action="staff_act.php" method="post">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Tambah Staff</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Staff</label>
                                                <input type="text" name="nama_staff" required="required"
                                                    class="form-control" placeholder="Masukkan Nama Staff...">
                                            </div>

                                            <div class="form-group">
                                                <label>POSISI</label>
                                                <input type="text" name="jabatan" required="required"
                                                    class="form-control" placeholder="Masukkan Jabatan Staff...">
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
                                        <th class="text-center">NAMA STAFF</th>
                                        <th class="text-center">POSISI</th>
                                        <th width="10%" class="text-center">OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM staff");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo $d['nama_staff']; ?></td>
                                        <td><?php echo $d['jabatan']; ?></td>
                                        <td> <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#edit_staff_<?php echo $d['id_staff'] ?>">
                                                <i class="fa fa-cog"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#hapus_staff_<?php echo $d['id_staff'] ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <form action="staff_update.php" method="post">
                                                <div class="modal fade" id="edit_staff_<?php echo $d['id_staff'] ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Edit
                                                                    Staff</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group"
                                                                    style="width:100%;margin-bottom:20px">
                                                                    <div class="form-group"
                                                                        style="width:100%;margin-bottom:20px">
                                                                        <label>Nama Staff</label>
                                                                        <input type="hidden" name="id"
                                                                            value="<?php echo $d['id_staff'] ?>">
                                                                        <input type="text" style="width:100%"
                                                                            name="nama_staff" required="required"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Nama Staff..."
                                                                            value="<?php echo $d['nama_staff'] ?>">
                                                                    </div>
                                                                    <div class="form-group" style="width:100%">
                                                                        <label>Posisi</label>
                                                                        <input type="text" style="width:100%"
                                                                            name="jabatan" required="required"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Nama Staff.."
                                                                            value="<?php echo $d['jabatan'] ?>">
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
                                            <div class="modal fade" id="hapus_staff_<?php echo $d['id_staff'] ?>"
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
                                                            <a href="staff_hapus.php?id=<?php echo $d['id_staff'] ?>"
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