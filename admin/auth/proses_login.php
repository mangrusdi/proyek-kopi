<?php
session_start();
include '../../config/db.php';

$user = $_POST['username'];
$pass = md5($_POST['password']);

$q = mysqli_query($conn, "SELECT * FROM admin 
        WHERE username='$user' AND password='$pass'");

if(mysqli_num_rows($q)){
    $_SESSION['admin'] = $user;
    header("Location: ../pesanan/index.php");
} else {
    echo "Login gagal!";
}
