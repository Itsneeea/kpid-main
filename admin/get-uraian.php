<?php
  // Koneksi ke database
  $koneksi = mysqli_connect("host", "username", "password", "database");

  // Menerima parameter kategori_id dari permintaan client
  $kategoriId = $_GET['kategori_id'];

  // Query untuk mengambil data uraian yang sesuai dengan kategori yang dipilih
  $query = "SELECT * FROM uraian WHERE kategori_id = '$kategoriId'";
  $result = mysqli_query($koneksi, $query);

  // Menyimpan data uraian ke dalam array
  $data = array();
  while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
  }

  // Mengirim data uraian dalam bentuk JSON ke client
  echo json_encode($data);
