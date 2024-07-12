<?php
include 'conn.php';

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
?>
