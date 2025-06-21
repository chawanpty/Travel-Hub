<?php
session_start(); // เริ่ม session
session_destroy(); // ทำลาย session
header('Location: index.php'); // ลิงก์กลับไปยังหน้าหลักหลังจากออกจากระบบ
exit;
?>
