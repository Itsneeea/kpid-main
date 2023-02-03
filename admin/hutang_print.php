 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Laporan Hutang</title>
     <style>
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
 <p align="center"><b>LAPORAN HUTANG</b></p>
 <table>
     <?php
         include '../koneksi.php';
$sql = "SELECT * FROM staff WHERE jabatan = 'Asisten Bidang Keuangan'";
$result = $koneksi->query($sql);

         if ($result->num_rows > 0) {
             // output data of each row
             while ($row = $result->fetch_assoc()) { 
        echo ' <tr>
             <td width="150px">Staff Keuangan</td>
             <td width="2px">: </td>
             <td>'.$row["nama_staff"].'</td>
         </tr>';
    }
}
?>
     <?php 
$sql = "SELECT * FROM staff WHERE jabatan = 'Bendahara'";
$result = $koneksi->query($sql);

         if ($result->num_rows > 0) {
             // output data of each row
             while ($row = $result->fetch_assoc()) { 
        echo '<tr>
             <td width="100px">Bendahara</td>
             <td width="4px">: </td>
             <td>'.$row["nama_staff"].'</td>
         </tr>';
    }
}
?>
     <tr>
         <td width="100px">Tahun</td>
         <td width="4px">: </td>
         <td> <?php
                    $tanggal = date('Y');
                    echo $tanggal; // contoh hasil: "03 January 2021"
                    ?></td>
     </tr>
 </table>

 <?php
        include '../koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM hutang");
        $hutang = mysqli_fetch_all($data, MYSQLI_ASSOC);
        $total_hutang = array_sum(array_column($hutang, 'hutang_nominal'));
        ?>

 <table border="1" cellpadding="4" cellspacing="0" width="100%">
     <thead>
         <tr>
             <th width="1%" rowspan="2">NO</th>
             <th width="10%" rowspan="2" class="text-center">KODE</th>
             <th rowspan="2" class="text-center">TANGGAL</th>
             <th rowspan="2" class="text-center">KETERANGAN</th>
             <th colspan="2" class="text-center">NOMINAL</th>
         </tr>
     </thead>
     <tbody>
         <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM hutang");
                    while ($d = mysqli_fetch_assoc($data)) {
                    ?>
         <tr>
             <td>
                 <center><?php echo $no++; ?> </center>
             </td>
             <td width="5%">
                 <center>HTG-000<?php echo $d['hutang_id']; ?> </center>
             </td>
             <td width="5%">
                 <center><?php
                                                            $tanggal = date('d-M-y', strtotime($d['hutang_tanggal']));
                                                            $tanggal = str_replace(
                                                                ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                                                ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                                                                $tanggal
                                                            );
                                                            echo $tanggal; // contoh hasil: "03-Jan-21"
                                                            ?></center>
             </td>
             <td><?php echo $d['hutang_keterangan']; ?></td>
             <td><?php echo "Rp. " . number_format($d['hutang_nominal']) . " ,-"; ?></td>
         </tr>
         <?php
                    }
                    ?>
         <tr>
             <th colspan="4" class="text-right">TOTAL</th>
             <td class="text-center text-bold text-success">
                 <?php echo "Rp. " . number_format($total_hutang) . " ,-"; ?>
             </td>
         </tr>
     </tbody>
 </table>
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