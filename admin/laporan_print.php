 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Laporan Transaksi</title>


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
        if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['kategori'])) {
            $tgl_dari = $_GET['tanggal_dari'];
            $tgl_sampai = $_GET['tanggal_sampai'];
            $kategori = $_GET['kategori'];
        ?>

     <p align="center"><b>LAPORAN TRANSAKSI</b></p>
     <table>
         <tr>
             <td width="150px">DARI TANGGAL</td>
             <td width="2px">: </td>
             <td><?php echo date('d-m-Y', strtotime($tgl_dari)); ?></td>
         </tr>
         <tr>
             <td width="150px">SAMPAI TANGGAL</td>
             <td width="2px">:</td>
             <td><?php echo date('d-m-Y', strtotime($tgl_sampai)); ?></td>
         </tr>
         <tr>
             <td width="150px">KATEGORI</td>
             <td width="2px">:</td>
             <td>
                 <?php
                                if ($kategori == "semua") {
                                    echo "SEMUA KATEGORI";
                                } else {
                                    $k = mysqli_query($koneksi, "select * from kategori where kategori_id='$kategori'");
                                    $kk = mysqli_fetch_assoc($k);
                                    echo $kk['kategori'];
                                }
                                ?>

             </td>
         </tr>
     </table>

     </div>
     </div>

     <table border="1" cellpadding="4" cellspacing="0" width="100%">
         <thead>
             <tr>
                 <th width="1%" rowspan="2">NO</th>
                 <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                 <th rowspan="2" class="text-center">KATEGORI</th>
                 <th rowspan="2" class="text-center">KETERANGAN</th>
                 <th colspan="2" class="text-center">JENIS</th>
             </tr>
             <tr>
                 <th class="text-center">PEMASUKAN</th>
                 <th class="text-center">PENGELUARAN</th>
             </tr>
         </thead>
         <tbody>
             <?php
                        include '../koneksi.php';
                        $no = 1;
                        $total_pemasukan = 0;
                        $total_pengeluaran = 0;
                        if ($kategori == "semua") {
                            $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                        } else {
                            $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and kategori_id='$kategori' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai'");
                        }
                        while ($d = mysqli_fetch_array($data)) {

                            if ($d['transaksi_jenis'] == "Pemasukan") {
                                $total_pemasukan += $d['transaksi_nominal'];
                            } elseif ($d['transaksi_jenis'] == "Pengeluaran") {
                                $total_pengeluaran += $d['transaksi_nominal'];
                            }
                        ?>
             <tr>
                 <td class="text-center"><?php echo $no++; ?></td>
                 <td class="text-center">
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
                 <td><?php echo $d['kategori']; ?></td>
                 <td>
                     <center><?php echo $d['transaksi_keterangan']; ?></center>
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
             </tr>
             <?php
                        }
                        ?>
             <tr>
                 <th colspan="4" class="text-right">TOTAL</th>
                 <td class="text-center text-bold text-success">
                     <?php echo "Rp. " . number_format($total_pemasukan) . " ,-"; ?></td>
                 <td class="text-center text-bold text-danger">
                     <?php echo "Rp. " . number_format($total_pengeluaran) . " ,-"; ?></td>
             </tr>
             <tr>
                 <th colspan="4" class="text-right">SALDO</th>
                 <td colspan="2" class="text-center text-bold text-white bg-primary">
                     <?php echo "Rp. " . number_format($total_pemasukan - $total_pengeluaran) . " ,-"; ?></td>
             </tr>
         </tbody>
     </table>



     </div>

     <?php
        } else {
        ?>

     <div class="alert alert-info text-center">
         Silahkan Filter Laporan Terlebih Dulu.
     </div>

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
     $(document).ready(function() {

     });
     </script>

 </body>

 </html>