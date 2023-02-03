<?php
// Include database connection file
include 'koneksi.php';

// Get parameters from the request
$draw = $_GET['draw'];
$start = $_GET['start'];
$length = $_GET['length'];
$search = $_GET['search']['value'];

// Build the query
$query = "SELECT * FROM transaksi WHERE transaksi_keterangan LIKE '%$search%'";

// Get total count of records
$total_records = mysqli_num_rows(mysqli_query($koneksi, $query));

// Get total count of filtered records
$filtered_records = mysqli_num_rows(mysqli_query($koneksi, $query));

// Append LIMIT clause to the query
$query .= " LIMIT $start, $length";

// Fetch the data
$data = mysqli_query($koneksi, $query);

// Prepare the response
$response = array(
  "draw" => $draw,
  "recordsTotal" => $total_records,
  "recordsFiltered" => $filtered_records,
  "data" => array()
);

// Add the data to the response
while ($row = mysqli_fetch_assoc($data)) {
  $response['data'][] = $row;
}

// Send the response in JSON format
echo json_encode($response);
