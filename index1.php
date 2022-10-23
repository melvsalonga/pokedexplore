<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="POST">
        <h2 href="index.php">LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name= "uname" placeholder= "User Name"><br>

        <label>Password</label>
        <input type="password"name="password" placeholder="Password"><br>

        <button class="Loginbutton" type="submit">Login</button>
    </form>
</body>
</html>