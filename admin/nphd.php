<?php
include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h3>
            ANGGARAN NPHD
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
                                <i class="fafa-plus"></i>&nbspTambah Anggaran
                            </button>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == 'gagal') {
                    ?>
                    <?php
                        } else if ($_GET['alert'] == "berhasil") {
                        ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fafa-check"></i>Success
                        </h4>
                        Berhasil Disimpan
                    </div>
                    <?php
                        } else if ($_GET['alert'] == "berhasil update") {
                        ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <h4>
                            <i class="icon fafa-check"></i>Success
                        </h4>
                        Berhasil Update
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="modal-body">
                    <form action="nphd_act.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Tambah NPHD</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">
                                                &times;</span>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori_nphd" class="form-control" id="kategori"
                                            onchange="showUraian()">
                                            <option value="">
                                                -Pilih-
                                            </option>
                                            <?php
                                    include '../koneksi.php';
                                    $kategori = mysqli_query($koneksi, "SELECT*FROM kategori ORDER BY kategori ASC");
                                    while ($k = mysqli_fetch_array($kategori)) {
                                    ?>
                                            <option value="<?php echo $k['kategori_id']; ?>">
                                                <b><?php echo $k['kategori']; ?></b>
                                            </option>
                                            <?php
                                    }
                                    ?>
                                        </select>
                                    </div>
                                    <label>Anggaran</label>
                                    <select name="tahun" class="form-control" id="periode">
                                        <option value="">
                                            -Pilih-
                                        </option>
                                        <?php
                                include '../koneksi.php';
                                $periode = mysqli_query($koneksi, "SELECT*FROM bank ORDER BY periode ASC");
                                while ($k = mysqli_fetch_array($periode)) {
                                ?>
                                        <option value="<?php echo $k['bank_id']; ?>">
                                            <b><?php echo $k['periode']; ?></b>
                                        </option>
                                        <?php
                                }
                                ?>
                                    </select>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="uraian_nphd" class="form-control"
                                            placeholder="Masukkan Keterangan..">
                                    </div>
                                    <div class="form-group">
                                        <label>Volume</label>
                                        <input type="number" name="volume_nphd" class="form-control"
                                            placeholder="Masukkan Volume..">
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan_nphd" class="form-control"
                                            placeholder="Masukkan Satuan..">
                                    </div>
                                    <div class="form-group">
                                        <label>Tarif</label>
                                        <input type="number" name="tarif_nphd" class="form-control"
                                            placeholder="Masukkan Tarif..">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Tutup
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table-datatable">
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
                                    <th rowspan="2" width="5%" class="text-center">
                                        OPSI
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
                    $tarif_nphd = 0;
                    $volume_nphd = 0;
                    $data = mysqli_query($koneksi, "SELECT*FROM nphd");
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
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#edit_nphd_<?php echo $d['id_nphd'] ?>">
                                            <i class="fa fa-cog">
                                            </i>
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#hapus_nphd_<?php echo $d['id_nphd'] ?>">
                                            <i class="fa fa-trash">
                                            </i>
                                        </button>
                                        <form action="nphd_update.php" method="post" enctype="multipart/form-data">
                                            <div class="modal fade" id="edit_nphd_<?php echo $d['id_nphd'] ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel">Edit
                                                                Anggaran</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="form-group">

                                                            <label>Kategori</label>
                                                            <input type="hidden" name="id_nphd"
                                                                value="<?php echo $d['id_nphd'] ?>">
                                                            <select name="kategori_nphd" class="form-control"
                                                                id="kategori" onchange="showUraian()">
                                                                <option value="">
                                                                    -Pilih-
                                                                </option>
                                                                <?php
                                    include '../koneksi.php';
                                    $kategori = mysqli_query($koneksi, "SELECT*FROM kategori ORDER BY kategori ASC");
                                    while ($k = mysqli_fetch_array($kategori)) {
                                    ?>
                                                                <option value="<?php echo $k['kategori_id']; ?>">
                                                                    <b><?php echo $k['kategori']; ?></b>
                                                                </option>
                                                                <?php
                                    }
                                    ?>
                                                            </select>
                                                        </div>
                                                        <label>Anggaran</label>
                                                        <select name="bank_id" class="form-control" id="periode">
                                                            <option value="">
                                                                -Pilih-
                                                            </option>
                                                            <?php
                                include '../koneksi.php';
                                $periode = mysqli_query($koneksi, "SELECT*FROM bank ORDER BY periode ASC");
                                while ($k = mysqli_fetch_array($periode)) {
                                ?>
                                                            <option value="<?php echo $k['bank_id']; ?>">
                                                                <b><?php echo $k['periode']; ?></b>
                                                            </option>
                                                            <?php
                                }
                                ?>
                                                        </select>
                                                        <div class="form-group">
                                                            <label>Keterangan</label>

                                                            <input type="text" name="uraian_nphd" class="form-control"
                                                                placeholder="Masukkan Keterangan..">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Volume</label>
                                                            <input type="number" name="volume_nphd" class="form-control"
                                                                placeholder="Masukkan Volume.."
                                                                value="<?php echo $d['volume_nphd'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Satuan</label>
                                                            <input type="text" name="satuan_nphd" class="form-control"
                                                                placeholder="Masukkan Satuan.."
                                                                value="<?php echo $d['satuan_nphd'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tarif</label>
                                                            <input type="number" name="tarif_nphd" class="form-control"
                                                                placeholder="Masukkan Tarif.."
                                                                value="<?php echo $d['tarif_nphd'] ?>">
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
                                        <div class="modal fade" id="hapus_nphd_<?php echo $d['id_nphd'] ?>"
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
                                                        <a href="nphd_hapus.php?id=<?php echo $d['id_nphd'] ?>"
                                                            class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </tr>
                                </td>
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
<script>
function showUraian() {
    // get the selected value of kategori
    var kategoriId = document.getElementById("kategori").value;

    // show or hide the uraian select element based on the kategori selection
    var uraianForm = document.getElementById("uraian-form");
    if (kategoriId === "") {
        uraianForm.style.display = "none";
    } else {
        uraianForm.style.display = "block";
    }
}
</script>
<?php include 'footer.php'; ?>