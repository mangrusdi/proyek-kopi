<?php
include '../../config/db.php';
require_once '../../phpqrcode/qrlib.php';

$nomor = $_POST['nomor_meja'];

// Cek apakah meja sudah ada
$cek = mysqli_query($conn, "SELECT * FROM meja WHERE nomor_meja='$nomor'");
if(mysqli_num_rows($cek)){
    die("Meja sudah ada!");
}

// Pastikan folder QR ada
$folder = "../../qr/";
if(!is_dir($folder)){
    mkdir($folder, 0777, true);
}

// Link QR
$link = "http://localhost:8081/proyek1/pelanggan/meja.php?meja=" . $nomor;

// Nama file sesuai struktur tabel
$namaFile = "meja-" . $nomor . ".png";
$path = $folder . $namaFile;

// Generate QR
QRcode::png($link, $path, QR_ECLEVEL_H, 10);

// Simpan ke database
mysqli_query($conn, "INSERT INTO meja (nomor_meja, qr_file, status) 
VALUES ('$nomor', '$namaFile', 'kosong')");

header("Location: index.php");
