<?php
include('conn.php');
session_start();


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
              $_SESSION["username"] = $username; // Set session untuk pengguna yang login
              header("Location: show-product.php");
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
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

html, body {
    height: 70%;
    margin: 0;
    font-family: 'Montserrat', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #44A08D;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #093637, #44A08D);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #093637, #44A08D);
}

.login-box {
    position: relative;
    width: 400px;
    padding: 30px;
    background: linear-gradient(to right, #093637, #44A08D);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
    border-radius: 10px;
    text-align: center;
}

.login-box h1 {
    margin: 0 0 10px;
    color: #fff;
}

.login-box .user-box {
    position: relative;
}

.login-box .user-box input {
    width: 100%;
    padding: 25px 0;
    font-size: 14px;
    color: #fff;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
}

.login-box .user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: 0.5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
}

.login-box form button {
    display: inline-block;
    padding: 10px 5px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: 0.5s;
    margin-top: 10px;
    letter-spacing: 5px;
    background: none;
    border: none;
    cursor: pointer;
}

    </style>
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
          <input type="text" name="username" autocomplete="off" autofocus placeholder="Username" id="username" />
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