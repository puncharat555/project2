<?php
    session_start();
    include('server.php');

    $errors = array();

        /*เช็คการกด submit จะสร้างตัวแปรมาเก็บข้อมูล*/ 
    if (isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    
        /*เช็คค่าว่าง*/
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        /*เช็ค password ว่าเท่ากันหรือไม่*/
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
        
        /*เช็คว่ามี ชื่อ หรือ อีเมลนี้ในระบบหรือยังถ้ามีจะ error*/
        $user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        //ถ้ามีผู้ใช้อยู่แล้วจะแสดงข้อความมีผู้ใช้แล้ว
        if ($result) {
            if ($result['username'] == $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] == $email) {
                array_push($errors, "Email already exists");
           }
        }
        // เช็ค errors 
        if (count($errors) == 0) {
            $password = md5($password_1);

            //INSERT ข้อมูลลงระบบ
            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
            mysqli_query($conn, $sql);

            // Session variables
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php'); 
        } else {
            array_push($errors, "Username already exists");
            $_SESSION['error'] = "Username already exists";
            header("location: register.php");
        }
    }
?>
