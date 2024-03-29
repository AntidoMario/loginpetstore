<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-box">
    <h2>PetShop</h2>
    <div class="boxing">
        <img src="logo.png" alt="Login Image"> <!-- Replace 'your-image.jpg' with the path to your image -->
        <form action="process_login.php" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
    </div>
</body>
</html>
