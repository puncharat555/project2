<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="login_db.php" method="post">
            <?php if (isset($_SESSION['error'])): ?>
       
            <div class="error">
                <h3>
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password">
                <i class='bx bxs-lock-alt' ></i>
            </div>
                <button type="submit" name="login_user" class="btn">Login</button>
            <div class="register-link">
            <p>Not yet a member? <a href="register.php">Sign up</a></p>
            </div>
        </form>
    </div>
</body>
</html>
