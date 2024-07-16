<?php
require 'function.php';
require 'conn.php';

$pdc = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pdcQuery = "SELECT * FROM product WHERE id = $id";
    $pdcResult = mysqli_query($conn, $pdcQuery);
    $pdc = mysqli_fetch_array($pdcResult);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (ubah($_POST)) {
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
    <title>Update Product</title>
</head>
<body style="text-align: center; margin-top: 200px;">
<h2>Update Product</h2>
<?php if ($pdc): ?>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $pdc['id']; ?>" >

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required value="<?= $pdc['nama']; ?>"><br><br>

        <label for="product">Product:</label>
        <input type="text" id="product" name="product" required value="<?= $pdc['product']; ?>"><br><br>

        <input type="radio" id="Makanan" name="jenis" value="Makanan" <?= $pdc['jenis'] == 'Makanan' ? 'checked' : ''; ?>> <label for="Makanan">Makanan</label><br>
        <input type="radio" id="Minuman" name="jenis" value="Minuman" <?= $pdc['jenis'] == 'Minuman' ? 'checked' : ''; ?>> <label for="Minuman">Minuman</label><br><br>

        <input type="submit" name="Update" value="Update">
    </form>
<?php else: ?>
    <p>No product found with the given ID.</p>
<?php endif; ?>

<div style="margin-top: 10px;">
    <a style="text-decoration: none; color: blue;" href="show-product.php">Show Product</a>
</div>
</body>
</html>