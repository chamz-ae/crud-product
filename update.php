<?php
require 'function.php';
include('conn.php');

if (isset($_GET['$id'])) {
    $id = $_GET['$id'];

// query nya cuk
$pdc = query("SELECT * FROM product WHERE id = $id");
var_dump($pdc);

if (ubah($id)) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'show-product.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'show-product.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create-product</title>
</head>
<body style="text-align: center; margin-top: 200px;">
<h2>Create New Product</h2>
    <form action="" method="POST">
    <label for="nama">nama:</label>
    <input type="text" id="nama" name="nama" required value=""><br><br>
  
    <label for="product">product:</label>
    <input type="text" id="product" name="product" required value="type"><br><br>
  
    <input type="radio" id="Makanan" name="jenis" value="Makanan"> <label for="Makanan">Makanan</label><br>

    <input type="radio" id="Minuman" name="jenis" value="Minuman"> <label for="Minuman">Minuman</label><br>

    <input type="submit" name="Create" value="Create">
    </form>

    <!-- <form action="show-product.php" method="GET">
      <input type="button" nama="show" href="show-product.php" value="SHOW" href="show-product.php">
    </form> -->
    <div style="margin-top: 10px;">
    <a style="text-decoration: none; color: blue;" href="show-product.php">Show Product</a>
    </div>