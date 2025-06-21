<?php
session_start();

include 'connection.php'; // ไฟล์ config.php สำหรับเชื่อมต่อกับฐานข้อมูล

if (isset($_POST['submit'])) {
    $username = $_POST['user_username'];
    $password = $_POST['user_password'];

    // ค้นหาข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "SELECT * FROM users WHERE user_username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['user_password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['user_username'];
            $_SESSION['role'] = $row['role'];
            header('Location: index2.php');
            exit();
        } else {
            $_SESSION['err_login'] = "Invalid username or password";
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['err_login'] = "Invalid username or password";
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}

$conn->close();
?>
