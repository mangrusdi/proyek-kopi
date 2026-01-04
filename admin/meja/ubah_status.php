<?php
include '../../config/db.php';


$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($conn,"UPDATE pesanan SET status='$status' WHERE id='$id'");

if($status == 'lunas'){

    $p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pesanan WHERE id='$id'"));
    $d = mysqli_query($conn,"SELECT * FROM pesanan_detail WHERE pesanan_id='$id'");

    $total = 0;
    while($x = mysqli_fetch_assoc($d)){
        $total += $x['subtotal'];
    }

    // simpan ke laporan
    mysqli_query($conn,"INSERT INTO laporan(nomor_meja,nama_pelanggan,no_hp,total)
    VALUES('$p[nomor_meja]','$p[nama_pelanggan]','$p[no_hp]','$total')");


    // kosongkan meja
    mysqli_query($conn,"UPDATE meja SET status='kosong' WHERE nomor_meja='$p[nomor_meja]'");

    // hapus pesanan aktif
    mysqli_query($conn,"DELETE FROM pesanan_detail WHERE pesanan_id='$id'");
    mysqli_query($conn,"DELETE FROM pesanan WHERE id='$id'");
}

header("Location: ../pesanan/index.php");
