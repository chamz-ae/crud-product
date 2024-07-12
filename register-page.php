<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create-product</title>
</head>
<body style="text-align: center; margin-top: 200px;">
<h2>Register</h2>
    <form action="be-regis.php" method="POST">
        <label for="username">username: </label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">password: </label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="email">email: </label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input style="margin-bottom: 10px;" type="submit" name="register" value="Register">
    </form>

    <div>
      <a style="text-decoration: none;" href="index.php">Back</a>
    </div>

    <!-- <form action="show-product.php" method="GET">
      <input type="button" nama="show" href="show-product.php" value="SHOW" href="show-product.php">
    </form> -->
</body>
</html>