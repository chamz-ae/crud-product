<?php
include ('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST); die;
    $nama = $_POST['nama'];
    $product = $_POST['product'];
    $jenis = $_POST['jenis'];


    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS product (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(50) NOT NULL,
        product VARCHAR(255) NOT NULL,
        jenis VARCHAR(50) NOT NULL
    )";
    
    if ($conn->query($sql) === false) {
        echo "Error creating table: " . $conn->error;
        exit;
    }

    $sql = "INSERT INTO product (nama, product, jenis) VALUES ('$nama', '$product', '$jenis')";

    if ($conn->query($sql) === true) {
        // Registrasi berhasil, atur session
        $_SESSION['registration_successful'] = true;
        echo "Penambahan Product berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create-product</title>
    <style>
        body {
    background: #44A08D;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #093637, #44A08D);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #093637, #44A08D);
    }
    .btn {
    cursor: pointer;
    position: relative;
    padding: 10px 20px;
    background: rgb(3, 247, 226);
    font-size: 14px;
    color: black;
    border-top-right-radius: 7px;
    border-bottom-left-radius: 7px;
    transition: all 0.5s;
    margin-bottom: 90px;
}
.btn:after, .btn:before {
    content: " ";
    width: 7px;
    height: 7px;
    position: absolute;
    border: 0px solid #fff;
    transition: all 1s;
}
.btn:after {
    top: -1px;
    left: -1px;
    border-top: 3px solid black;
    border-left: 3px solid black;
}
.btn:before {
    bottom: -1px;
    right: -1px;
    border-bottom: 3px solid black;
    border-right: 3px solid black;
}
.btn:hover {
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
}
.btn:hover:before, .btn:hover:after {
    width: 100%;
    height: 100%;
}
.data-container {
    background: #ffebee;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
    </style>
</head>
<body style="text-align: center; margin-top: 200px;">
<h2>Create New Product</h2>
    <form action="" method="POST">
    <label for="nama">nama:</label>
    <input type="text" id="nama" name="nama" required><br><br>
  
    <label for="product">product:</label>
    <input type="text" id="product" name="product" required><br><br>
  
    <input type="radio" id="Makanan" name="jenis" value="Makanan"> <label for="Makanan">Makanan</label><br>

    <input type="radio" id="Minuman" name="jenis" value="Minuman"> <label for="Minuman">Minuman</label><br>

    <input class="btn" style="margin-bottom: 30px; margin-top: 20px;" type="submit" name="Create" value="Create">
    </form>

    <!-- <form action="show-product.php" method="GET">
      <input type="button" nama="show" href="show-product.php" value="SHOW" href="show-product.php">
    </form> -->
    <div style="margin-top: 10px;">
    <a class="btn" style="text-decoration: none; color: black;" href="show-product.php">Show Product</a>
    </div>
</body>
</html>