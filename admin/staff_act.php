<?php
include '../koneksi.php';

$nama  = $_POST['nama_staff'];
$jabatan  = $_POST['jabatan'];

mysqli_query($koneksi, "insert into staff values (NULL,'$nama','$jabatan')") or die(mysqli_error($koneksi));
header("location:staff.php");