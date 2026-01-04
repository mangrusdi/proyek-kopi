<?php
include '../../config/db.php';

if(isset($_POST['tambah'])){

    $nama   = $_POST['nama_menu'];
    $harga  = $_POST['harga'];
    $status = $_POST['status'];

    // Proses upload foto
    $foto = $_FILES['foto'];
    $ext  = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $namaFile = time() . '_' . rand() . '.' . $ext;

    move_uploaded_file($foto['tmp_name'], "../../uploads/menu/" . $namaFile);

    mysqli_query($conn, "INSERT INTO menu (nama_menu, harga, foto, status) VALUES (
        '$nama',
        '$harga',
        '$namaFile',
        '$status'
    )");
}

if(isset($_POST['update'])){

    $id     = $_POST['id'];
    $nama   = $_POST['nama_menu'];
    $harga  = $_POST['harga'];
    $status = $_POST['status'];

    // Jika admin upload foto baru
    if(!empty($_FILES['foto']['name'])){
        $foto = $_FILES['foto'];
        $ext  = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $namaFile = time() . '_' . rand() . '.' . $ext;

        move_uploaded_file($foto['tmp_name'], "../../uploads/menu/" . $namaFile);

        mysqli_query($conn, "UPDATE menu SET
            nama_menu='$nama',
            harga='$harga',
            foto='$namaFile',
            status='$status'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($conn, "UPDATE menu SET
            nama_menu='$nama',
            harga='$harga',
            status='$status'
            WHERE id='$id'
        ");
    }
}

header("Location: index.php");
