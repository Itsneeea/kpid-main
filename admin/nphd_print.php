 <?php
         include '../koneksi.php';?>
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Laporan Anggaran NPHD</title>
     <style>
     .no-border td,
     .no-border th {
         border: 0;
     }

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
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <td width="10%" style="border:0;">
             <center>
                 <img src="../assets/kalsel.png" width="55" height="70" align="left">
         </td>
         </center>
         <?php
         include '../koneksi.php';
                $periode = mysqli_query($koneksi, "SELECT * FROM bank");
                if (isset($_GET['periode'])) {
                    $periode = $_GET['periode'];
                ?>
         <td width="80%" style="border:0;"><b>
                 <center>RENCANA KEGIATAN DAN RINCIAN ANGGARAN HIBAH<br>KOMISI PENYIARAN INDONESIA
                     DAERAH KALIMANTAN SELATAN <br>TAHUN ANGGARAN
                     <?php
                     
                    $k = mysqli_query($koneksi, "select * from bank where bank_id='$periode'");
                    $kk = mysqli_fetch_assoc($k);
                    echo $kk['bank_pemilik']; ?>
             </b>
             </center>
         </td><?php }?>
         <td width="10%">
             <center>
                 <font size="1px">Formulir</font>
                 <br />
                 <font size="1.2px "><b>RKA-KPID</b></font><br />
                 <font size="1px">2.2.1</font>
         </td>
         </center>
     </table>
     <table border="1" cellpadding="4" cellspacing="2" width="100%">
         <tr>
             <td width="40%" style="border:0;">
                 <small> Urusan Pemerintahan
                     <br /> Organisasi
                     <br /> Program
                     <br /> Kegiatan
                     <br /> Lokasi Kegiatan
                     <br /> Jumlah Anggaran Tahun <?php echo $kk['bank_pemilik'];?>
                 </small>
             </td>
             <td width="60%" style="border:0;"><small>
                     : Komunikasi dan Informasi<br />
                     : Komisi Penyiaran Daerah Kalimantan Selatan<br />
                     : Pengembangan dan Pengelolaan Komunikasi Publik<br />
                     : Mendukung Pelaksanaan Tugas dan Fungsi KPID Kalsel<br />
                     : Provinsi dan Kabupaten/Kota<br />
                     : <b> <?php
include '../koneksi.php';
$query = "SELECT tarif_nphd FROM nphd WHERE id_nphd = '1'";
$data = mysqli_query($koneksi, $query);
if(mysqli_num_rows($data) > 0){
    while($row = mysqli_fetch_assoc($data)){
        echo "Rp. ".number_format($row['tarif_nphd']).",-";
    }
}else{
    echo "No data found";
}
?></small></b>
             </td>
         </tr>
     </table>
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <font size="1pt">
             <th width="30%">
                 Indikator
             </th>
             <th width="40%">
                 <center>Tolak Ukur Kinerja</center>
             </th>
             <th width="30%">
                 <center>Target Kinerja</center>
             </th>
     </table>
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <td width="30%">
             Capaian Program
         </td>
         <td width="40%">
             : Pelaporan Capaian Kinerja dan Keuangan
         </td>
         <td width="30%">
             <center>100%</center>
         </td>
     </table>
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <td width="30%">
             Masukan
         </td>
         <td width="40%">
             : Dana yang Tersedia
         </td>
         <td width="30%">
             <center><b> <?php
include '../koneksi.php';
$query = "SELECT tarif_nphd FROM nphd WHERE id_nphd = '1'";
$data = mysqli_query($koneksi, $query);
if(mysqli_num_rows($data) > 0){
    while($row = mysqli_fetch_assoc($data)){
        echo "Rp. ".number_format($row['tarif_nphd']).",-";
    }
}else{
    echo "No data found";
}
?></b></center>
         </td>
     </table>
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <td width="30%">
             Keluaran
         </td>
         <td width="40%">
             : Tersedianya Anggaran Pelaksanaan Tugas KPID Kalsel
         </td>
         <td width="30%">
             <center></center>
         </td>
     </table>
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <td width="30%">
             Hasil
         </td>
         <td width="40%">
             : Terlaksananya Tugas dan Fungsi KPID Kalsel
         </td>
         <td width="30%">
             <center>100%</center>
         </td>
     </table>
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <td width="30%">
             Kelompok Sasaran Kegiatan
         </td>
         <td width="40%">
             : Provinsi Kalimantan Selatan dan Kabupaten/Kota
         </td>
         <td width="30%">
             <center>100%</center>
         </td>
     </table>
     <table border=" 1" cellpadding="4" cellspacing="0" width="100%">
         <td width="5pt" style="border:0;">
             <center><b>Rincian Anggaran Belanja Langsung
                     <br>Menurut Program dan Per Kegiatan Satuan Kerja Perangkat Daerah</b>
             </center>
         </td>
         </font>
     </table>

     <table border=" 1" cellpadding="4" cellspacing="0" width="100%">
         <tbody>
             <tr>
                 <td colspan="5" rowspan="2" width="5px"><b>
                         <center>Kode Rekening</center>
                     </b></td>
                 <td colspan="2" rowspan="2"><b>
                         <center>Uraian</center>
                     </b></td>
                 <td colspan="3"><b>
                         <center>Rincian Perhitungan</center>
                     </b></td>
                 <td rowspan="2"><b>
                         <center>Jumlah (Rp)</center>
                     </b></td>
             </tr>
             <tr>
                 <td><b>
                         <center>Volume</center>
                     </b></td>
                 <td><b>
                         <center>Satuan</center>
                     </b></td>
                 <td><b>
                         <center>Harga Satuan</center>
                     </b></td>
             </tr>
             <tr>
                 <td colspan="5"><b>
                         <center>1</center>
                     </b></td>
                 <td colspan="2"><b>
                         <center>2</center>
                     </b></td>
                 <td><b>
                         <center>3</center>
                     </b></td>
                 <td><b>
                         <center>4</center>
                     </b></td>
                 <td><b>
                         <center>5</center>
                     </b></td>
                 <td><b>
                         <center>6=(3 x 5)</center>
                     </b></td>
             </tr><?php include '../koneksi.php';
                        $no = 1;
                        $tarif_nphd = 0;
                        $volume_nphd = 0;
                        $data = mysqli_query($koneksi, "SELECT * FROM nphd");

                        while ($d = mysqli_fetch_assoc($data)) {
                            $tarif_nphd = $d['tarif_nphd'];
                            $volume_nphd = $d['volume_nphd'];
                        ?><tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td colspan="2"><?php echo $d['uraian_nphd'];?></td>
                 <td align="right">
                     <?php echo $d['volume_nphd'];
                                ?>
                 </td>
                 <td align="right"><?php echo $d['satuan_nphd'];
                                ?></td>
                 <td align="right"><?php echo "" . number_format($tarif_nphd) . "";
                                ?></td>
                 <td align="right"><?php echo "" . number_format($tarif_nphd * $volume_nphd) . "";
                                ?></td><?php
                                    }

                                        ?>
             </tr>
             <td colspan="10">Total</td>
             <td colspan="10">
                 <left>
                     <?php
include '../koneksi.php';
$query = "SELECT tarif_nphd FROM nphd WHERE id_nphd = '1'";
$data = mysqli_query($koneksi, $query);
if(mysqli_num_rows($data) > 0){
    while($row = mysqli_fetch_assoc($data)){
        echo "Rp. ".number_format($row['tarif_nphd']).",-";
    }
}else{
    echo "No data found";
}
?>
                 </left>
             </td>
         </tbody>
     </table>
     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <tr>
             <td width="300px" style="border:0;"></td>
             <td width="300px" style=" border:0;"></td>
             <td width="300px" style=" border:0;">
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
                 </p>
                 <br>
                 <br>
                 <br>
                 <center>
                     <?php    $sql = "SELECT * FROM staff WHERE jabatan = 'Ketua Umum'";
             $result = $koneksi->query($sql);

             if ($result->num_rows > 0) {
             // output data of each row
             while ($row = $result->fetch_assoc()) {
             echo ' <center>
                 <p>'.$row["nama_staff"].'
             </center>';
             }
             }
             ?>
                 </center><br>

             </td>
         </tr>
     </table>
     <script>
     window.print();

     $(document).ready(function() {}

     );
     </script>
 </body>

 </html>