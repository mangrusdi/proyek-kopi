<?php
include '../../config/db.php';


$filter = $_GET['filter'] ?? 'hari';

if($filter == 'hari'){
        $query = "SELECT * FROM laporan WHERE DATE(tanggal_transaksi)=CURDATE()";
}
elseif($filter == 'minggu'){
        $query = "SELECT * FROM laporan WHERE YEARWEEK(tanggal_transaksi)=YEARWEEK(NOW())";
}
else{
        $query = "SELECT * FROM laporan WHERE MONTH(tanggal_transaksi)=MONTH(NOW()) AND YEAR(tanggal_transaksi)=YEAR(NOW())";
}

$data = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto p-6">
        <header class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Laporan Transaksi</h1>
            <nav class="space-x-2">
                <a href="../meja/tambah.php" class="inline-block px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Tambah Meja</a>
                <a href="../pesanan/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Kembali ke Dashboard</a>
                <a href="../meja/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Manajemen Meja</a>
            </nav>
        </header>

        <section class="bg-white shadow rounded-lg overflow-hidden mb-6">
            <div class="p-4 border-b flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-medium text-gray-700">Transaksi</h2>
                    <p class="text-sm text-gray-500">Filter transaksi berdasarkan periode</p>
                </div>
                <div class="space-x-2">
                    <a href="?filter=hari" class="px-3 py-1 rounded %s">Hari Ini</a>
                    <a href="?filter=minggu" class="px-3 py-1 rounded %s">Minggu Ini</a>
                    <a href="?filter=bulan" class="px-3 py-1 rounded %s">Bulan Ini</a>
                </div>
            </div>

            <div class="p-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Meja</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No HP</th>
                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Total</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <?php
                        $no = 1;
                        $grandTotal = 0;
                        while($r = mysqli_fetch_assoc($data)){
                                $grandTotal += $r['total'];
                        ?>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= $no++ ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= htmlspecialchars($r['nomor_meja']) ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= htmlspecialchars($r['nama_pelanggan']) ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= htmlspecialchars($r['no_hp']) ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700 text-right">Rp <?= number_format($r['total']) ?></td>
                            <td class="px-4 py-3 text-sm text-gray-700"><?= htmlspecialchars($r['tanggal_transaksi']) ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50">
                            <th colspan="4" class="px-4 py-3 text-left text-sm font-semibold text-gray-700">TOTAL</th>
                            <th colspan="2" class="px-4 py-3 text-right text-sm font-semibold text-gray-700">Rp <?= number_format($grandTotal) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </div>

</body>
</html>
