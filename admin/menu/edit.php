<?php
include '../../config/db.php';

$id = $_GET['id'];
$m = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id='$id'"));
?>

<h2>Edit Menu</h2>

<form method="post" action="proses.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $m['id'] ?>">

Nama Menu<br>
<input type="text" name="nama_menu" value="<?= $m['nama_menu'] ?>" required><br><br>

Harga<br>
<input type="number" name="harga" value="<?= $m['harga'] ?>" step="500" required><br><br>

Foto Baru (opsional):<br>
<input type="file" name="foto" accept="image/*"><br><br>

Status<br>
<select name="status">
    <option value="tersedia" <?= $m['status']=='tersedia'?'selected':'' ?>>Tersedia</option>
    <option value="habis" <?= $m['status']=='habis'?'selected':'' ?>>Habis</option>
</select><br><br>

<button type="submit" name="update">Update</button>
</form>
