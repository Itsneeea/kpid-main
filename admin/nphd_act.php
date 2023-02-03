<?php
include '../koneksi.php';
$ket = $_POST['uraian_nphd'];
$kategori  = $_POST['kategori_nphd'];
$volume  = $_POST['volume_nphd'];
$satuan  = $_POST['satuan_nphd'];
$tarif  = $_POST['tarif_nphd'];
$tahun = $_POST['tahun'];
// echo "insert into nphd values (NULL,'$ket','kategori','tahun','$volume','$satuan','$tarif')";
// if ($ket == "") {
// 	mysqli_query($koneksi, "insert into nphd values (NULL,'$kategori','$kategori','$tahun','$volume','$satuan','$tarif')") or die(mysqli_error($koneksi));
// 	header("location:nphd.php?alert=berhasil");
// } else {
// 	mysqli_query($koneksi, "insert into nphd values (NULL,'$ket','$tahun','$volume','$satuan','$tarif')") or die(mysqli_error($koneksi));
// 	header("location:nphd.php?alert=berhasil");
// }
// ;
mysqli_query($koneksi, "insert into nphd values (NULL,'$ket','$kategori','$volume','$satuan','$tarif','$tahun')") or die(mysqli_error($koneksi));
header("location:nphd.php");