<?php
include '../koneksi.php';
$id  = $_POST['id'];
$pemilik  = $_POST['pemilik'];
$periode  = $_POST['periode'];
$saldo  = $_POST['saldo'];
// echo "update bank set periode='$periode', bank_pemilik='$pemilik', bank_saldo='$saldo' where bank_id='$id'";
mysqli_query($koneksi, "update bank set periode='$periode', bank_pemilik='$pemilik', bank_saldo='$saldo' where bank_id='$id'")
    or die(mysqli_error($koneksi));

header("location:bank.php");
