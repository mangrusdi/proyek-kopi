<?php
include '../config/db.php';

$meja=$_POST['meja'];
$nama=$_POST['nama'];
$no_hp=$_POST['no_hp'];

mysqli_query($conn,"INSERT INTO pesanan(nomor_meja,nama_pelanggan,no_hp,status)
VALUES('$meja','$nama','$no_hp','dipesan')");

$pesanan_id=mysqli_insert_id($conn);

mysqli_query($conn,"UPDATE meja SET status='terpakai' WHERE nomor_meja='$meja'");

$menu=$_POST['menu'];
$harga=$_POST['harga'];
$qty=$_POST['qty'];

for($i=0;$i<count($menu);$i++){
 if($qty[$i]>0){
  $sub=$harga[$i]*$qty[$i];
  mysqli_query($conn,"INSERT INTO pesanan_detail
  (pesanan_id,nama_menu,harga,qty,subtotal)
  VALUES('$pesanan_id','$menu[$i]','$harga[$i]','$qty[$i]','$sub')");
 }
}

echo "<h2>Pesanan Berhasil</h2>";
