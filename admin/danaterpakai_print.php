<?php include'../koneksi.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Anggaran Terpakai</title>

    <style type="text/css">
    .body {
        font-family: Arial;
    }

    .table {
        border-collapse: collapse;
    }

    @media print {
        .no-print {
            display: none;
        }
    }
    </style>
</head>

<body>
    <center>
        <table>
            <img src="../assets/logo.png" width="100" heigt="100" align="center">
            <tr>
                <td>
                    <center>
                        <font size="5"><b>KOMISI PENYIARAN INDONESIA </b></font><br>
                        <font size="5"><b>DAERAH KALIMANTAN SELATAN</b></font><br>
                        <font size="4" color="#Ff0000"><b>LEMBAGA NEGARA INDEPENDEN</b></font><br>
                        <font size="3">Jln. Dharma Praja II No. 2 Kawasan Perkantoran
                            Provinsi Kalimantan Selatan
                        </font>
                    </center>
                </td>
            </tr>
        </table>
    </center>
    <hr>
    <?php
                $periode = mysqli_query($koneksi, "SELECT * FROM bank");
                if (isset($_GET['periode'])) {
                    $periode = $_GET['periode'];
                ?>
    <p align="center"> <b>LAPORAN ANGGARAN TERPAKAI T.A <?php
                                                $k = mysqli_query($koneksi, "select * from bank where bank_id='$periode'");
                                                $kk = mysqli_fetch_assoc($k);
                                                echo $kk['bank_pemilik']; ?></b></p>

    <table>
        <tr>
            <td width="150px">Staff Keuangan</td>
            <td width="2px">: </td>
            <td>Drs.Milyani, M. AP</td>
        </tr>
        <tr>
            <td width="100px">Bendahara</td>
            <td width="4px">: </td>
            <td>Norliana, S.Sos.i</td>
        </tr>
        <tr>
            <td width="100px">Tahun</td>
            <td width="4px">: </td>
            <td> <?php
                    $tanggal = date('Y');
                    echo $tanggal; // contoh hasil: "03 January 2021"
                    ?></td>
        </tr>
    </table>
    <table border="1" cellpadding="4" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%" rowspan="4">
                    NO
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
                                        $no = 1;
                                        $tarif_nphd = 0;
                                        $transaksi_nominal = 0;
                                        $data = mysqli_query($koneksi, "SELECT nphd.id_nphd, SUM(nphd.tarif_nphd) AS tarif_nphd, kategori.kategori_id, kategori.kategori, SUM(transaksi.transaksi_nominal) AS transaksi_nominal, transaksi.transaksi_jenis, nphd.bank_id FROM nphd LEFT JOIN kategori ON nphd.kategori_nphd = kategori.kategori_id LEFT JOIN transaksi ON transaksi.transaksi_kategori = kategori.kategori_id WHERE transaksi.transaksi_jenis='Pengeluaran' AND nphd.bank_id='$periode' GROUP BY kategori.kategori_id");
                                        while ($d = mysqli_fetch_assoc($data)) {
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
    <?php
                                        }
                                        ?>
    <br>
    <br>
    <br>
    <br>

    <?php 
$sql = "SELECT * FROM staff WHERE jabatan = 'Asisten Bidang Keuangan'";
$result = $koneksi->query($sql);

         if ($result->num_rows > 0) {
             // output data of each row
             while ($row = $result->fetch_assoc()) { 
        echo '<table width="100%">
             <tr>
                 <td width="250px">
                     <p>
                         <br><br>
                         <br>
                         <center>Mengetahui,</center>
                     </p>
                     <br>
                     <br>
                     <br>
                     <center>
                         <p>'.$row["nama_staff"].'<br>
                     </center>
                 </td>';
    }
}
?>
    <td></td>
    <td width="250px">
        <center>
            <p>Banjarbaru, <?php
                                            $tanggal = date('d F Y');
                                            $tanggal = str_replace(
                                                ['January', 'February', 'March', 'April', 'May', 'June', 'Jule', 'August', 'September', 'October', 'November', 'December'],
                                                ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agutus', 'September', 'Oktober', 'November', 'Desember'],
                                                $tanggal
                                            );
                                            echo $tanggal; // contoh hasil: "03-Jan-21"
                                            ?>
            </p>
        </center>
        <center><b>Komisi Penyiaran Indonesia</b></center>
        <center>
            <b>Kalimantan Selatan</b>
        </center>
        <center>Bendahara</center>
        </p>
        <br>
        <br>
        <br>
        <?php    $sql = "SELECT * FROM staff WHERE jabatan = 'Bendahara'";
             $result = $koneksi->query($sql);

             if ($result->num_rows > 0) {
             // output data of each row
             while ($row = $result->fetch_assoc()) {
             echo ' <center>
                 <p>'.$row["nama_staff"].'
             </center>';
             }
             }
             ?><br>
    </td>
    </tr>
    </table>
    <script>
    window.print();
    $(document).ready(function() {});
    </script>

</body>

</html>