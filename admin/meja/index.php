<?php
include '../../config/db.php';

$meja = mysqli_query($conn,"SELECT * FROM meja");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Meja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-4xl mx-auto p-6">
        <header class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Manajemen Meja</h1>
            <nav class="space-x-2">
                <a href="tambah.php" class="inline-block px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Tambah Meja</a>
                <a href="../pesanan/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Kembali ke Dashboard</a>
                <a href="../laporan/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Laporan</a>
            </nav>
        </header>

        <section class="bg-white shadow rounded-lg overflow-hidden">
            <div class="p-4 border-b">
                <h2 class="text-lg font-medium text-gray-700">Daftar Meja</h2>
            </div>

            <div class="p-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nomor Meja</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">QR Code</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <?php while($m = mysqli_fetch_assoc($meja)){ ?>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= htmlspecialchars($m['id']) ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= htmlspecialchars($m['nomor_meja']) ?></td>
                            <td class="px-4 py-3">
                                <img src="../../qr/<?= htmlspecialchars($m['qr_file']) ?>" class="w-32 h-auto rounded shadow-sm" alt="QR <?= htmlspecialchars($m['nomor_meja']) ?>">
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</body>
</html>
