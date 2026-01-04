<?php
include '../config/db.php';

$data = [];
$q = mysqli_query($conn, "SELECT * FROM menu ORDER BY id ASC");

while($m = mysqli_fetch_assoc($q)){
    $data[] = $m;
}

echo json_encode($data);
