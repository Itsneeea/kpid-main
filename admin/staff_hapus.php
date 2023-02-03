<?php
include '../koneksi.php';
$id  = $_GET['id_staff'];

mysqli_query($koneksi, "delete from staff where id_staff='$id'");
header("location:staff.php");