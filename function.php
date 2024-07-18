<?php
include 'conn.php';

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id) {
    global $conn;
    $sql = "DELETE FROM product WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $conn->error; // Untuk debugging
        return false;
    }
}

function ubah($data) {
    global $conn;
    
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $product = htmlspecialchars($data['product']);
    $jenis = htmlspecialchars($data['jenis']);

    $query = "UPDATE product SET 
                nama = '$nama',
                product = '$product',
                jenis = '$jenis'
            WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    global $conn;
    $query = "SELECT * FROM product
                WHERE
                nama LIKE '%$keyword%' OR
                product LIKE '%$keyword%' OR
                jenis LIKE '%$keyword%'

            ";
    $data = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($data);
    return $data;
} 