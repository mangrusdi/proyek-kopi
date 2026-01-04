<?php
include '../../config/db.php';

$data = mysqli_query($conn, "SELECT * FROM menu ORDER BY id DESC");
?>

<h2>Manajemen Menu</h2>
<a href="tambah.php">+ Tambah Menu</a>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Nama Menu</th>
    <th>Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($m=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $m['nama_menu'] ?></td>
    <td>Rp <?= number_format($m['harga']) ?></td>
    <td><?= $m['status'] ?></td>
    <td>
        <a href="edit.php?id=<?= $m['id'] ?>">Edit</a> | 
        <a href="hapus.php?id=<?= $m['id'] ?>" onclick="return confirm('Hapus menu?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>
