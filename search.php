<?php
require 'conn.php';

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM product WHERE nama LIKE '%$keyword%' OR product LIKE '%$keyword%' OR jenis LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);

    $products = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }

    echo json_encode($products);
}
?>
