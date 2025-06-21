<?php
    session_start(); // เขียนทุกครั้งที่มีการใช้ตัวแปร session

    // ถ้าไม่มี $_SESSION['is_logged_in'] (เก็บสถานะ login โดยจะเก็บตอนที่สมัครสมาชิกหรือ login แล้วเท่านั้น) ให้กลับไปยังหน้า login.php เพื่อทำการ login ก่อน
    if (!isset($_SESSION['is_logged_in'])) {
        header('location: loginadmin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    
</head>
    <body background="11.jpg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="neubar">
      <div class="container">
        <a class="navbar-brand" href="indexadmin.php"><img src="13.png" height="35" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
            <a class="nav-link active" href="indexadmin.php"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br>
    <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                <h1>รายการการจองคอนเสิร์ต &nbsp;&nbsp;<a href="seatadmin.php" class="btn btn-outline-primary">+<i class="fa fa-shopping-cart me-1"></i></a> </h1><br>
                <div class="col-md-4">
                <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="ค้นหาข้อมูลการจอง">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-outline-secondary" type="submit">ค้นหา</button>
                </div>
                </form>
                </div>
                <table class="table table-striped  table-hover table-responsive table-bordered">
                <?php
                    $con = mysqli_connect("localhost", "root", "", "concertdb") or die("Error: " . mysqli_error($con));
                    mysqli_query($con, "SET NAMES 'utf8' ");

                    // ตรวจสอบว่ามีการส่งคำค้นหามาหรือไม่
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = mysqli_real_escape_string($con, $_GET['search']);
                        $query = "SELECT b.booking_id, b.seat_name, b.booking_name, u.user_email, u.user_phone, b.dateCreate, 
                        s.seat_price, s.seat_showdate, s.seat_showtime FROM booking as b 
                        INNER JOIN users as u ON u.user_username = b.booking_name 
                        INNER JOIN seats as s ON b.seat_name = s.seat_name 
                        WHERE 
                            b.seat_name LIKE '%$search%' OR 
                            b.booking_name LIKE '%$search%' OR 
                            u.user_email LIKE '%$search%' OR 
                            u.user_phone LIKE '%$search%' OR 
                            b.dateCreate LIKE '%$search%' OR 
                            s.seat_price LIKE '%$search%'";
                    } else {
                        // ถ้าไม่มีการส่งคำค้นหามา โชว์ทั้งหมด
                        $query = "SELECT b.booking_id, b.seat_name, u.user_email, u.user_phone, b.booking_name, b.dateCreate, s.seat_price, s.seat_showdate, s.seat_showtime  
                        FROM booking as b 
                        INNER JOIN users as u ON u.user_username = b.booking_name 
                        INNER JOIN seats as s ON b.seat_name = s.seat_name
                        ORDER BY b.dateCreate";
                    }                    

                    $result = mysqli_query($con, $query); 

                    echo "<table border='1' align='center' width='1200'>";
                    echo "<tr align='center' bgcolor='#CCCCCC'>
                        <td >#</td>
                        <td >seat</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>time</td>
                        <td>D/M/Y</td>
                        <td>dateCreate</td>
                        <td>price</td>
                        <td>ลบ</td></tr>";
                    $row_num = 1;
                    while($row = mysqli_fetch_array($result)) { 
                    echo "<tr>";
                    echo "<td>" .$row_num . "</td> ";
                    echo "<td>" .$row["seat_name"] . "</td> ";  
                    echo "<td>" .$row["booking_name"] . "</td> "; 
                    echo "<td>" .$row["user_email"] . "</td> ";
                    echo "<td>" .$row["user_phone"] . "</td> ";
                    echo "<td>" .$row["seat_showtime"] . "</td> ";
                    echo "<td>" .$row["seat_showdate"] . "</td> ";
                    echo "<td>" .$row["dateCreate"] . "</td> ";
                    echo "<td>" .$row["seat_price"] . "</td> ";
                    echo "<td><a href='admin_delete.php?booking_id=$row[0]' class='btn btn-outline-danger fa-regular fa-trash-can' onclick=\"return confirm('คุณต้องการลบข้อมูลการจองใช่หรือไม่ !!!')\"></a></td> ";
                    echo "</tr>";
                    $row_num++;
                    }
                    echo "</table>";
                    mysqli_close($con);
                    ?>
                    </table>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
  /* ตั้งค่าสีตาราง */
  .box1{
    background-color: rgba(176, 176, 176, 0.75);
    backdrop-filter: blur(5px);
    border-radius: 20px;
    overflow: auto;
    }
  table {
    background-color: lightblue;
    border-collapse: collapse;
    width: 100%; /* ขยายตารางให้เต็มขอบ */
}

/* ตั้งค่าสีส่วนหัวของตาราง */
th {
    background-color: darkblue;
    color: white;
    padding: 10px; /* เพิ่มระยะห่างขอบของเซลล์ */
}

/* ตั้งค่าสีสำหรับแถวคู่ */
tr:nth-child(even) {
    background-color: white;
}

/* ตั้งค่าสีสำหรับแถวคี่ */
tr:nth-child(odd) {
    background-color: pink;
}

/* ตั้งค่าสีของข้อความในเซลล์ */
td {
    color: black;
    padding: 10px; /* เพิ่มระยะห่างของเซลล์ */
}

/* ลดขอบของเซลล์ */
table td,
table th {
    border: 1px solid #ccc;
}

</style>
</body>

</html>