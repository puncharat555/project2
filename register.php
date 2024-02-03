<?php  
    include('server.php');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="kl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   
</head>
<body>
   
    <div class="header">   
        <form action="register_db.php" method="post">
            <?php include('errors.php')?>
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
    
            <h2>Register</h2>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username">
                <i class='bx bx-user'></i>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email">
                <i class='bx bx-envelope' ></i>
            </div>
            <div class="input-group">
                <input type="password" name="password_1" placeholder="Password">
                <i class='bx bx-shield' ></i>
            </div>
            <div class="input-group">
                <input type="password" name="password_2" placeholder="Confirm Password">
                <i class='bx bx-check-shield' ></i>
            </div>
                <button type="submit" name="reg_user" class="btn">Register</button>
            <div class="register-link">
                <p>Already a member <a href="login.php">Sign in</a></p>
            </div>
        </form>
    </div>
</body>
</html>