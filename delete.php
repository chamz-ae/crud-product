<?php
include ('conn.php');
require 'function.php';

// print_r($id); die;
if (isset($_GET['$id'])) {
    $id = $_GET['$id'];


    if (hapus($id)) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'show-product.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'show-product.php';
            </script>
        ";
    }
}
?>
