<?php
include '../../config/db.php';
include '../auth/cek_login.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin - Pesanan</title>
<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto p-6">
  <header class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Pesanan</h1>
    <nav class="space-x-2">
      <a href="../meja/tambah.php" class="inline-block px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700">Tambah Meja</a>
      <a href="../laporan/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Laporan</a>
      <a href="../meja/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Manajemen Meja</a>
      <a href="../menu/index.php" class="inline-block px-3 py-1 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Manajemen Menu</a>
      <a href="../auth/logout.php" onclick="return confirm('Yakin logout?')" class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Logout</a>
    </nav>
  </header>

  <main>
    <section class="bg-white shadow rounded-lg overflow-hidden">
      <div class="p-4 border-b">
        <h2 class="text-lg font-medium text-gray-700">Daftar Pesanan (Realtime)</h2>
        <p class="text-sm text-gray-500">Halaman ini otomatis memperbarui setiap 3 detik.</p>
      </div>

      <div class="p-4 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Meja</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No HP</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
              <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
          </thead>
          <tbody id="isi_pesanan" class="bg-white divide-y divide-gray-100">
            <!-- data realtime masuk disini -->
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <!-- MODAL DETAIL (hidden by default) -->
  <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden items-center justify-center">
    <div class="bg-white w-full max-w-2xl mx-4 rounded-lg shadow-lg overflow-hidden">
      <div class="flex items-center justify-between p-4 border-b">
        <h3 class="text-lg font-semibold">Detail Pesanan</h3>
        <button onclick="closeModal()" class="text-red-600 hover:text-red-800 font-bold">&times;</button>
      </div>
      <div id="isi_detail" class="p-4"></div>
    </div>
  </div>

</div>

<script>
function loadPesanan(){
    fetch("get_pesanan.php")
    .then(res=>res.text())
    .then(data=>{
        document.getElementById("isi_pesanan").innerHTML = data;
    });
}

// realtime refresh tiap 3 detik
setInterval(loadPesanan, 3000);

// load pertama kali
loadPesanan();

function openDetail(id){
 fetch("detail.php?id="+id)
 .then(res=>res.text())
 .then(data=>{
   document.getElementById("isi_detail").innerHTML=data;
   const modal = document.getElementById("modal");
   modal.classList.remove('hidden');
   modal.classList.add('flex');
 });
}

function closeModal(){
 const modal = document.getElementById("modal");
 modal.classList.add('hidden');
 modal.classList.remove('flex');
}
</script>

</body>
</html>
