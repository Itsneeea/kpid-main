<?php
include '../koneksi.php';
$id  = $_POST['id_nphd'];
$ket  = $_POST['uraian_nphd'];
$volume  = $_POST['volume_nphd'];
$satuan  = $_POST['satuan_nphd'];
$tarif  = $_POST['tarif_nphd'];
$periode = $_POST['bank_id'];
$kategori  = $_POST['kategori_nphd'];
// echo "update nphd set uraian_nphd='$ket',kategori_nphd= '$kategori', volume_nphd='$volume', satuan_nphd='$satuan',tarif_nphd='$tarif', bank_id='$periode' where id_nphd='$id'";
mysqli_query($koneksi, "update nphd set uraian_nphd='$ket',kategori_nphd= '$kategori', volume_nphd='$volume', satuan_nphd='$satuan',tarif_nphd='$tarif', bank_id='$periode' where id_nphd='$id'") or die(mysqli_error($koneksi));
header("location:nphd.php");