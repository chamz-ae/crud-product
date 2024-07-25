<?php
session_start();
if( !isset($_SESSION['username']) ) {
    header("Location: index.php");
    exit;
}
$username = $_SESSION['username'];

require 'conn.php';
require 'function.php';

// ambil data dari tabel product/query data product
// print_r($conn);
$result = mysqli_query($conn, "SELECT * FROM product");
// $product = query("SELECT * FROM product");
// $data = mysqli_fetch_assoc($result);

// print_r($data); die;

// KLO MISAL TOMBOL DITEKAN
if (isset($_POST["cari"])) {
    $product = cari($_POST["keyword"]);
}

// pagination
// konfigurasi
// $jumlahDataPerHalaman = 2;
// $jumlahData = count(query("SELECT * FROM product"));
// $jumlahHalaman = $jumlahData / $jumlahDataPerHalaman;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA</title>
    <link rel="stylesheet" href="show.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="text-align: center; margin-top: 72px;">
<h1 class="judul">PRODUCT</h1>
<h1 class="text-5xl font-bold mb-8">
    Selamat Datang, <?php echo $username; ?>!
</h1>

<form action="" method="post" id="searchForm">
    <input type="text" name="keyword" id="keyword" placeholder="Serah Kamu Lahh" size="40" autofocus autocomplete="off">
    <button type="submit" name="cari">Search!</button>
</form>
<br>
<br>

<table style="text-align: center; margin: 0 auto;" class="tabel" border="1" cellpadding="10" cellspacing="0" id="productTable">
    <tr>
        <th>NO.</th>
        <th>nama</th>
        <th>product</th>
        <th>jenis</th>
        <th>Fitur</th>
    </tr>
    <?php if (empty($product)) { ?>
    <?php if ($row = mysqli_fetch_assoc($result)) : do { ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["product"] ?></td>
        <td><?= $row["jenis"] ?></td>
        <td class="fitur">
            <b>
                <a style="text-decoration: none; color: red;" href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
                <a style="text-decoration: none; color: green;" href="update.php?id=<?= $row["id"]; ?>">||  Update</a>
            </b>
        </td>
    </tr>
    <?php } while ($row = mysqli_fetch_assoc($result)); endif; ?>
<?php } else { ?>
    <?php $data = "SELECT * FROM product";
    
    $data = mysqli_query($conn, $data);
    $data = mysqli_fetch_assoc($data);
    // print_r($data); die;
    ?>
    <tr>
        <td><?= $product['id']; ?></td>
        <td><?= $product['nama']; ?></td>
        <td><?= $product['product']; ?></td>
        <td><?= $product['jenis']; ?></td>
        <td class="fitur">
            <b>
                <a style="text-decoration: none; color: red;" href="delete.php?$id=<?= $product['id']; ?>" onclick="return confirm('yakin?');">Hapus</a>
                <a style="text-decoration: none; color: green;" href="update.php?id=<?= $product['id']; ?>">||  Update</a>
            </b>
        </td>
    </tr>
<?php } ?>
</table>

<div class="buttom" style="margin-top: 20px;">
    <a class="btn" style="text-decoration: none;" href="create.php">Create Product</a>
    <a class="btn" style="text-decoration: none; margin-left: 20px;" href="logout.php">Logout</a>
</div>

<script>
$(document).ready(function(){
    $('#keyword').on('input', function() {
        var keyword = $(this).val();
        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: { keyword: keyword },
            success: function(data) {
                var products = JSON.parse(data);
                var tableContent = '<tr><th>NO.</th><th>nama</th><th>product</th><th>jenis</th><th>Fitur</th></tr>';
                $.each(products, function(index, product) {
                    tableContent += '<tr>';
                    tableContent += '<td>' + product.id + '</td>';
                    tableContent += '<td>' + product.nama + '</td>';
                    tableContent += '<td>' + product.product + '</td>';
                    tableContent += '<td>' + product.jenis + '</td>';
                    tableContent += '<td class="fitur"><b>';
                    tableContent += '<a style="text-decoration: none; color: red;" href="delete.php?id=' + product.id + '" onclick="return confirm(\'yakin?\');">Hapus</a>';
                    tableContent += '<a style="text-decoration: none; color: green;" href="update.php?id=' + product.id + '">||  Update</a>';
                    tableContent += '</b></td>';
                    tableContent += '</tr>';
                });
                $('#productTable').html(tableContent);
            }
        });
    });
});
</script>

</body>
</html>
