<?php
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama_staff'];
$jabatan  = $_POST['jabatan'];

// echo "update staff set nama_staff='$nama', jabatan='$jabatan' where id_staff='$id'";
mysqli_query($koneksi, "update staff set nama_staff='$nama', jabatan='$jabatan'where id_staff='$id'") or die(mysqli_error($koneksi));
header("location:staff.php");