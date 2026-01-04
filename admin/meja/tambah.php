<?php
include '../../config/db.php';


// ambil semua nomor meja yang sudah ada
$terpakai = [];
$q = mysqli_query($conn, "SELECT nomor_meja FROM meja");
while($m = mysqli_fetch_assoc($q)){
        $terpakai[] = $m['nomor_meja'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Meja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-2xl mx-auto p-6">
        <header class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Tambah Meja</h1>
            <nav class="space-x-2">
                <a href="../laporan/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Laporan</a>
                <a href="../pesanan/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Kembali ke Dashboard</a>
                <a href="index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Manajemen Meja</a>
            </nav>
        </header>

        <section class="bg-white shadow rounded-lg overflow-hidden">
            <div class="p-4 border-b">
                <h2 class="text-lg font-medium text-gray-700">Pilih Nomor Meja</h2>
            </div>

            <div class="p-6">
                <form method="post" action="proses.php" class="space-y-4">
                    <div>
                        <label for="nomor_meja" class="block text-sm font-medium text-gray-700 mb-2">Nomor Meja</label>
                        <select id="nomor_meja" name="nomor_meja" required class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">-- Pilih Meja --</option>

                            <?php
                            for($i = 1; $i <= 20; $i++){   // bisa kamu ubah batas maksimalnya
                                    if(in_array($i, $terpakai)){
                                            echo "<option disabled>Meja $i (sudah ada)</option>";
                                    } else {
                                            echo "<option value='".htmlspecialchars($i, ENT_QUOTES, 'UTF-8')."'>Meja $i</option>";
                                    }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="flex items-center space-x-2">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
                        <a href="index.php" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </div>

</body>
</html>
