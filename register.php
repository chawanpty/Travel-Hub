<?php session_start(); ?>
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
<div class="flex-login-form">

        <?php if (isset($_SESSION['err_fill'])) : ?>
            <div class="alert alert-danger alert-custom" role="alert">
                <?php echo $_SESSION['err_fill']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['err_pw'])) : ?>
            <div class="alert alert-danger alert-custom" role="alert">
                <?php echo $_SESSION['err_pw']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['exist_uname'])) : ?>
            <div class="alert alert-danger alert-custom" role="alert">
                <?php echo $_SESSION['exist_uname']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['err_insert'])) : ?>
            <div class="alert alert-danger alert-custom" role="alert">
                <?php echo $_SESSION['err_insert']; ?>
            </div>
        <?php endif; ?>
        
<body background="11.jpg">
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">Travel HUB</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
       
      </div>
     
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="booking.php">Booking</a></li>
          
          
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
          
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Sign up</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <br>
  <form class="p-5 card login-card-custom box1" action="register_db.php" method="post">
    <h1><center>Register</center></h1><br>
    <div class="form-outline mb-3">
        <label class="form-label" for="form1Example1">Username</label>
        <input type="text" name="user_username" class="form-control" />
    </div>
    <div class="form-outline mb-3">
        <label class="form-label" for="form1Example1">First Name</label>
        <input type="text" name="user_firstname" class="form-control" />
    </div>
    <div class="form-outline mb-3">
        <label class="form-label" for="form1Example1">Last Name</label>
        <input type="text" name="user_lastname" class="form-control" />
    </div>
    <div class="form-outline mb-3">
        <label class="form-label" for="form1Example1">Email</label>
        <input type="email" name="user_email" class="form-control" />
    </div>
    <div class="form-outline mb-3">
        <label class="form-label" for="form1Example1">Phone</label>
        <input type="text" name="user_phone" class="form-control" />
    </div>
    <div class="form-outline mb-3">
        <label class="form-label" for="form1Example1">Password</label>
        <input type="password" name="user_password" class="form-control" />
    </div>
    <div class="form-outline mb-3">
        <label class="form-label" for="form1Example1">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" />
    </div>
    <div class="row">
        <p class="text-center">Already a member? <a href="login.php">Login</a></p>
    </div>
    <button type="submit" name="submit" class="btn login-btn-blue btn-block text-white">Sign Up</button>
</form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
                @import url('https://fonts.cdnfonts.com/css/harry-potter');
    .box1{
    background-color: rgba(176, 176, 176, 0.75);
    backdrop-filter: blur(5px);
    border-radius: 20px;
    overflow: auto;
    max-width: 50%;
    margin: auto;
    padding: auto;
    }
    </style>
</body>

</html>

<?php
    if (isset($_SESSION['err_fill']) || isset($_SESSION['err_pw']) || isset($_SESSION['exist_uname']) || isset($_SESSION['err_insert'])) {
        unset($_SESSION['err_fill']);
        unset($_SESSION['err_pw']);
        unset($_SESSION['exist_uname']);
        unset($_SESSION['err_insert']);
    }
?>