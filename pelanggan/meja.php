<?php
include '../config/db.php';

$meja = $_GET['meja'];
?>

<h2>Meja <?= $meja ?></h2>

<form action="proses_pesan.php" method="POST">

<input type="hidden" name="meja" value="<?= $meja ?>">

Nama:<br>
<input type="text" name="nama" required><br><br>

No HP:<br>
<input type="text" name="no_hp" required><br><br>

<table border="1" cellpadding="8">
<tr>
    <th>Menu</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
</tr>
<tbody id="isiMenu"></tbody>
</table>

<h3>Total: Rp <span id="total">0</span></h3>
<button type="submit">Pesan</button>
</form>

<script>
let dataLama = "";

function ambilMenu(){
    fetch("ambil_menu.php")
    .then(res => res.json())
    .then(data => {
        let sekarang = JSON.stringify(data);
        if(sekarang !== dataLama){
            dataLama = sekarang;
            renderMenu(data);
        }
    });
}

function renderMenu(menu){
    let html = "";
    menu.forEach(m => {
        html += `
        <tr>
            <td align="center">
                <img src="../uploads/menu/${m.foto}" width="80"><br>
                <b>${m.nama_menu}</b>
            </td>

            <td>
                Rp ${m.harga}
                <input type="hidden" name="menu[]" value="${m.nama_menu}">
                <input type="hidden" name="harga[]" value="${m.harga}">
            </td>

            <td>
                ${m.status == 'habis' ? `
                    <button type="button" disabled>-</button>
                    <input type="number" name="qty[]" value="0" readonly style="width:40px;background:#eee">
                    <button type="button" disabled>+</button>
                    <div style="color:red;font-size:12px">Habis</div>
                ` : `
                    <button type="button" onclick="ubah(this,-1)">-</button>
                    <input type="number" name="qty[]" value="0" readonly style="width:40px">
                    <button type="button" onclick="ubah(this,1)">+</button>
                `}
            </td>

            <td class="sub">Rp 0</td>
        </tr>`;
    });
    document.getElementById('isiMenu').innerHTML = html;
    hitungTotal();
}


function ubah(btn,n){
    let row = btn.parentElement.parentElement;
    let qty = row.querySelector('input[name="qty[]"]');
    let harga = row.querySelector('input[name="harga[]"]').value;

    qty.value = Math.max(0, parseInt(qty.value) + n);
    row.querySelector('.sub').innerText = 'Rp ' + (qty.value * harga);
    hitungTotal();
}

function hitungTotal(){
    let t = 0;
    document.querySelectorAll('.sub').forEach(x=>{
        t += parseInt(x.innerText.replace('Rp ',''));
    });
    document.getElementById('total').innerText = t;
}

setInterval(ambilMenu, 2000);
ambilMenu();
</script>
