<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "crud-product";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
