<?php
session_start();

include 'connection.php'; // ไฟล์ config.php สำหรับเชื่อมต่อกับฐานข้อมูล

if (isset($_POST['submit'])) {
    $username = $_POST['user_username'];
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_phone'];
    $password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];
    $role = 'user'; // กำหนดบทบาทให้เป็น 'user'

    // ตรวจสอบว่า password และ confirm password ตรงกันหรือไม่
    if ($password != $confirm_password) {
        $_SESSION['err_pw'] = "Password and Confirm Password do not match";
        header('Location: register.php');
        exit();
    }

    // เข้ารหัส password ก่อนบันทึกลงฐานข้อมูล
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูลผู้ใช้ใหม่
    $sql = "INSERT INTO users (user_username, user_firstname, user_lastname, user_email, user_phone, user_password, role)
            VALUES ('$username', '$firstname', '$lastname', '$email', '$phone', '$hashed_password', '$role')";

    // ทำการ query และตรวจสอบว่าสำเร็จหรือไม่
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "User registered successfully";
        header('Location: login.php');
        exit();
    } else {
        $_SESSION['err_insert'] = "Error: " . $sql . "<br>" . $conn->error;
        header('Location: register.php');
        exit();
    }
} else {
    header('Location: register.php');
    exit();
}

$conn->close();
?>
