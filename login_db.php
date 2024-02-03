<?php 
    session_start();
    include('server.php');

    $errors = array();

    //รับค่าชื่อ และ รหัส เพื่อเข้าสู่ระบบ
    if(isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }
    //เช็คค่าว่าง
    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    //เข็คข้อมูลที่มีในระบบเพื่อ login
    if(count($errors) == 0 ) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password =  '$password' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Your are logged in";
            header("location: index.php");

        } else { //แจ้งเตือน ชื่อ หรือ รหัสผิด
            array_push($errors, "Wrong username/password combination");
            $_SESSION['error'] = "Wrong username or password try again!!!";
            header("location: login.php");
        }
    } 
?>