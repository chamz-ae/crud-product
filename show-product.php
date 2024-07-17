<?php
include('conn.php');
require 'function.php';

// koneksi ke database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// print_r($conn); die;
// ambil data dari tabel product/query data product
$result = mysqli_query($conn, "SELECT * FROM product");
// var_dump($result);

// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["Nama"]);

?>  

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA</title>
    <link rel="stylesheet" href="show.css">
    <!-- <style>
        .buttom {
            margin-top: 20px;
        }

        .buttom a {
            text-decoration: none;
            padding: 9px 4px;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .buttom a:hover {
            border: 1px solid #000; 
            background-color: #f0f0f0;
            color: #50C878;
        }
    </style> -->
</head>
<body style="text-align: center; margin-top: 200px;">
<h1 class="judul">PRODUCT</h1>

<table style="text-align: center; margin: 0 auto;" class="tabel" border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>NO.</th>
        <th>nama</th>
        <th>product</th>
        <th>jenis</th>
        <th>Fitur</th>
    </tr>
<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $row["id"]  ?></td>
        <td><?= $row["nama"]  ?></td>
        <td><?= $row["product"]  ?></td>
        <td><?= $row["jenis"]  ?></td>
        <div class="fitur">
        <td class="fitur"><b>
            <a style="text-decoration: none; color: red;" href="delete.php?$id=<?= $row["id"]; ?> "onclick="return confirm('yakin?');">Hapus</a>
            <a style="text-decoration: none; color: green;" href="update.php?id=<?= $row["id"]; ?>">||  Update</a>
            </b>
        </td>
        </div>
    </tr>
<?php endwhile; ?>
</table>

    <div class="buttom" style="margin-top: 20px;">
    <a class="btn" style="text-decoration: none;" href="create.php">Create Product</a>
    <a class="btn" style="text-decoration: none; margin-left: 20px;" href="index.php">Logout</a>
    </div>

    <!-- <div style="margin-top: 25px;">
    <a class="btn" href="create.php">Create Product</>
    <a style="margin-left: 20px; " class="btn" href="index.php">LogOut</>
    </div> -->
</body>
</html>