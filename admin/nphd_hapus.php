<?php
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from nphd where id_nphd='$id'");
header("location:nphd.php");
