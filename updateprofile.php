<?php
session_start();

include 'connection.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE user_username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form data and update the database
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $update_sql = "UPDATE users SET user_firstname='$firstname', user_lastname='$lastname', user_email='$email', user_phone='$phone' WHERE user_username='$username'";
            if ($conn->query($update_sql) === TRUE) {
                echo "Record updated successfully";
                // Redirect to profile.php after successful update
                header("Location: profile.php");
                exit;
            } else {
                 $conn->error;
            }
        }
    } else {
    
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Travel HUB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/417219156_730094992462202_1293447105009204458_n.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Eterna
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">Travel HUB</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->

      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index2.php">Home</a></li>
          <li><a href="booking.php">Booking</a></li>
          <li><a href="contact.html">Contact</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle"></i> <!-- ไอคอนโปรไฟล์ -->
              &nbsp;
              <?php echo $_SESSION['username']; ?> <!-- แสดงชื่อผู้ใช้ที่ล็อคอิน -->

            </a>
            <ul class="dropdown-menu">
              <!-- เมนูใน dropdown -->
              <li><a href="profile.php">Profile</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>





        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-5"><b>Edit Profile</b></h1>
                <div class="mt-5">
                    <div class="card-body box1 font" style="line-height: 2.5;">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <label for="firstname">First Name:</label>&nbsp;
                            <input type="text" id="firstname" name="firstname" value="<?php echo $row['user_firstname']; ?>"><br>

                            <label for="lastname">Last Name:</label>&nbsp;
                            <input type="text" id="lastname" name="lastname" value="<?php echo $row['user_lastname']; ?>"><br>

                            <label for="email">Email:</label>&nbsp;
                            <input type="email" id="email" name="email" value="<?php echo $row['user_email']; ?>"><br>

                            <label for="phone">Phone:</label>&nbsp;
                            <input type="text" id="phone" name="phone" value="<?php echo $row['user_phone']; ?>"><br><br>

                            <input type="submit" value="Save Changes">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.cdnfonts.com/css/harry-potter');

    .box1 {
      background-color: rgba(176, 176, 176, 0.75);
      backdrop-filter: blur(5px);
      border-radius: 20px;
      overflow: auto;
      margin: auto;
      padding: 30px;
      max-width: 50%;
    }

    .font {
      font-size: 18px;
      color: black;
    }
    #h1ok {
      overflow: auto;
      margin: auto;
   
      max-width: 50%;
    }
  </style>
</body>
</html>
