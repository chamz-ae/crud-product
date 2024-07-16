<?php
include('conn.php');


if (isset($_POST["submit"])) {
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
        if ($conn->connect_error) 
        die("Koneksi gagal: " . $conn->connect_error);
    

      // cek tombol submitnya bree
    if ($conn) {
          // ambil data dari form
          $username = mysqli_real_escape_string($conn, $_POST["username"]);
          $password = mysqli_real_escape_string($conn, $_POST["password"]);
      
          // query ke database
          $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? OR email = ?");
          mysqli_stmt_bind_param($stmt, "ss", $username, $email);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
      
          // cek username dan password
          if (mysqli_num_rows($result) > 0) {
            // ambil password dari database
            $row = mysqli_fetch_assoc($result);
            $passwordDB = $row["password"];
      
            // cek password
            if (password_verify($password, $passwordDB)) {
              // nek bener, lanjut halaman
              $_SESSION['username'] = $username; // Set session untuk pengguna yang login
              header("location: show-product.php");
              exit;
            } else {
              // nek salah, tampilkan salah
              $error = "Username atau password salah";
            }
          } else {
            // nek salah, tampilkan salah
            $error = "Username atau password salah";
          }
        } else {
          echo "Koneksi ke database gagal";
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="text-align: center; margin-top: 200px;">
<main>
  <div class="login-box">
      <h1>Login admin</h1>
    <?php if (isset($error)) : ?>
      <p>
        username / password lu salah pea!
      </p>
    <?php endif; ?>
    <ul>
      <form action="" method="POST">
        <div class="user-box">
        <li style="list-style-type: none;">
          <label for="username"></label>
          <input type="text" name="username" placeholder="Username" id="username" />
        </li>
        </div>
        <div class="user-box">
        <li style="list-style-type: none; margin-top: 10px;">
          <label for="password"></label>
          <input type="password" name="password" placeholder="Password" id="password" />
        </li>
        </div>
        <li style="list-style-type: none; margin-top: 30px;">
          <button type="submit" name="submit">
            Login
          </button>
        </li>
      </form>
      <form style="margin-top: 10px;" action="register-page.php" method="POST">
        <link>
          <button type="submit" name="register">
            Register
          </button>
        </link>
      </form>
    </ul>
  </div>
  </main>
</body>
</html>