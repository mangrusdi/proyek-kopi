<h2>Tambah Menu</h2>

<form method="post" action="proses.php" enctype="multipart/form-data">

Nama Menu<br>
<input type="text" name="nama_menu" required><br><br>

Harga<br>
<input type="number" name="harga" step="500" required><br><br>

Foto:<br>
<input type="file" name="foto" accept="image/*" required><br><br>

Status<br>
<select name="status">
    <option value="tersedia">Tersedia</option>
    <option value="habis">Habis</option>
</select><br><br>

<button type="submit" name="tambah">Simpan</button>
</form>
