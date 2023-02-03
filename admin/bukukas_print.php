 <?php
 include 'fungsi.php';
  include '../koneksi.php';?>

 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>LAPORAN BUKU KAS UMUM</title>
     <meta http-equiv=Content-Type content="text/html; charset=utf-8">
     <meta name=Generator content="Microsoft Word 15 (filtered)">
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

 <body lang=EN-US style='word-wrap:break-word'>

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
     <p align="center"><b>BUKU KAS UMUM T.A <?php echo date('Y');?></b></p>
     <table>
         <?php 
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

     <body>
         <div class="row">
             <div class="col-lg-6">
                 <table>
                     <tr></br>
                         </td>
                     </tr>
                 </table>
             </div>
         </div>

         <?php
                
                $data = mysqli_query($koneksi, "SELECT * FROM transaksi");
                ?>


         <table border="1" cellpadding="4" cellspacing="0" width="100%">
             <thead>
                 <tr>
                     <th width="5%" rowspan="2">
                         <center>TANGGAL</center>
                     </th>
                     <th rowspan="2" width="120px">PERIHAL</th>
                     <th width="5px">No.KAS</th>
                     <th>MASUK</th>
                     <th>KELUAR</th>
                     <th rowspan="2">SALDO</th>
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
                     <td>
                         <center><?php
                                                            $tanggal = date('d-M-y', strtotime($d['transaksi_tanggal']));
                                                            $tanggal = str_replace(
                                                                ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                                                ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                                                                $tanggal
                                                            );
                                                            echo $tanggal; // contoh hasil: "03-Jan-21"
                                                            ?></center>

                     </td>
                     <td><?php echo $d['transaksi_keterangan']; ?></td>
                     <td>
                         <center><?php echo $d['kode_rekening']; ?></center>
                     </td>

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
                     <td class="text-center">
                         <?php
                                        echo "Rp. " . number_format($saldo) . " ,-";
                                        ?> </td>
                     <?php
                            }
                                ?>

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