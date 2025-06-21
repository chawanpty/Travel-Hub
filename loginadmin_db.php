<?php
session_start();  // เขียนทุกครั้งที่มีการใช้ตัวแปร session
include('connection.php');  // นำเข้าไฟล์ database

// ทำการเช็คว่ามีการ submit form หรือไม่ isset() จะเช็คว่ามี data หรือไม่
if (isset($_POST['submitadmin'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // ถ้าไม่มีการกรอกข้อมูลเข้ามาให้ทำการส่งข้อความกลับไปยังหน้า login.php
    if (empty($user_username) || empty($user_password)) {
        $_SESSION['err_fill'] = "กรุณากรอกข้อมูลให้ครบถ้วน";
        header('location: loginadmin.php');
    } 

    // กรณีที่กรอกข้อมูลครบถ้วนจะทำการ query ข้อมูล เพื่อเช็คว่ามี username นี้อยู่ในระบบหรือไม่
    else {
        // query ข้อมูล เพื่อเช็คว่ามี username นี้อยู่ในระบบหรือไม่
        $select_stmt = $db->prepare("SELECT COUNT(user_username) AS count_uname, user_password FROM users WHERE user_username = :user_username AND role = 'admin'");
        $select_stmt->bindParam(':user_username', $user_username);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        // ถ้ามี username ในระบบให้ทำการส่งข้อความกลับไปยังหน้า login.php
        if ($row['count_uname'] == 0) {
            $_SESSION['err_uname'] = "ไม่มี username นี้ในระบบ";
            header('location: loginadmin.php');
        }

        // ถ้าไม่พบ username จะทำการตรวจสอบ password โดยเทียบ password ที่กรอกเข้ามาตรงกับ password ใน database หรือไม่ ผ่านฟังก์ชัน password_verify() ถ้าตรงกันเงื่อนไขจะเป็นจริง
        else {
            // ถ้า password ที่กรอกเข้ามาตรงกับ password ใน database
            if (password_verify($user_password, $row['user_password'])) {
                // เก็บ username และ สถานะ login และไปยังหน้า indexadmin.php
                $_SESSION['user_username'] = $user_username;
                $_SESSION['is_logged_in'] = true;
                header('location: indexadmin.php');
            }

            // ถ้า password ที่กรอกเข้ามาไม่ตรงกับ password ใน database
            else {
                $_SESSION['err_pw'] = "รหัสผ่านไม่ถูกต้อง";
                header('location: loginadmin.php');
            }
        }
    }
}
