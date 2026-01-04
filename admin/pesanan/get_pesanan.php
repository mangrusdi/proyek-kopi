<?php
include '../../config/db.php';


$data = mysqli_query($conn,"SELECT * FROM pesanan ORDER BY created_at DESC");

$no=1;
while($p=mysqli_fetch_assoc($data)){
  echo "<tr>
  <td>".$no++."</td>
  <td>".$p['nomor_meja']."</td>
  <td>".$p['nama_pelanggan']."</td>
  <td>".$p['no_hp']."</td>
  <td>".$p['status']."</td>
  <td>
    <button onclick='openDetail($p[id])'>Detail</button>
  ";

  if($p['status']=='dipesan')
    echo " <a href='../meja/ubah_status.php?id=$p[id]&status=disajikan'>Disajikan</a>";

  if($p['status']=='disajikan')
    echo " <a href='../meja/ubah_status.php?id=$p[id]&status=lunas'>Lunas</a>";

  echo "</td></tr>";
}
