<?php
include '../../config/db.php';

$id=$_GET['id'];
$d=mysqli_query($conn,"SELECT * FROM pesanan_detail WHERE pesanan_id='$id'");
$total=0;
?>

<table width="100%" border="1" cellpadding="8">
<tr><th>Menu</th><th>Harga</th><th>Qty</th><th>Subtotal</th></tr>

<?php while($x=mysqli_fetch_assoc($d)){ $total+=$x['subtotal']; ?>
<tr>
<td><?= $x['nama_menu'] ?></td>
<td><?= $x['harga'] ?></td>
<td><?= $x['qty'] ?></td>
<td><?= $x['subtotal'] ?></td>
</tr>
<?php } ?>

<tr><th colspan="3">Total</th><th><?= $total ?></th></tr>
</table>
