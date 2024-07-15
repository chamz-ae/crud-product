<?php
include 'conn.php';

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $row[] = $row;
    }
    return $row;
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

function ubah($id) {
    global $conn;
    $sql = "UPDATE FROM product WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $conn->error; // Untuk debugging
        return false;
    }

}
?>