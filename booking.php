<?php
session_start();

include 'connection.php';
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM users WHERE user_username = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // ดึงข้อมูลและแสดงผล
    $row = $result->fetch_assoc();
    // เปลี่ยนเป็นการใช้ชื่อผู้ใช้เพื่อแสดงผล
    $user_username = $row['user_username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_phone = $row['user_phone'];
  } else {
    echo "0 results";
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

    <title>Booking Form</title>

    <!-- Bootstrap CSS -->

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('https://wallpapercave.com/wp/wp4424508.jpg');
            background-size: cover;
            padding: auto;
        }

        h1 {
            color: #c5c6c8;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            margin-top: 10px;
        }

        input,
        select {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input[type="number"] {
          max-width: 50%; ;
        }

        /* Hide the "Number of People in Group" field by default */
        #group-size {
            display: none;
        }

        /* Hide the additional user information fields by default */
        #user-info {
            display: none;
        }

        /* Display user information */
        #user-info-display {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }
        .form-group.row {
            margin-bottom: 15px;
        }

        label.col-sm-2, label.col-sm-1 {
            font-weight: bold;
            margin-top: 8px;
        }

        .col-sm-3 input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        /* Styling for Booking Date and Time */
        .booking-section {
            display: flex;
            align-items: center;
        }

        .booking-section label {
            margin-bottom: 0;
            margin-right: 10px;
        }
    </style>
</head>
<body>

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
    &nbsp;<?php echo $user_username; ?> <!-- แสดงชื่อผู้ใช้ที่ล็อคอิน -->
    
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
  <br><br>
<h1 class="text-center">International Tour Booking</h1>
<br>
<form class="mx-auto" action="booking.php" method="post" onsubmit="return showUserInfoDisplay()">
    <!-- Select Country -->
    <div class="form-group">
        <label for="country"><b>Select Country:</b></label>
        <select id="country-select" onchange="populateFlights()">
            <option value="">กรุณาเลือกประเทศ</option>
            <option value="France">France</option>
            <option value="India">India</option>
            <option value="JAPAN">Japan</option>
            <option value="Korea">Korea</option>
            <option value="USA">USA</option>
            
            <!-- Add more countries as needed -->
        </select>
    </div>

    <div id="flight-cards"></div>
    <br>
    <div class="form-group row booking-section">
    <label class="col-sm-2">Booking date:</label>
    <div class="col-sm-3">
        <input type="datetime-local" name="booking_date" id="booking_date" class="form-control" required readonly>
    </div>
</div>

<script>
    // Get current date and time
    var now = new Date();

    // Format date and time in the format yyyy-MM-ddThh:mm
    var formattedDate = now.getFullYear() + "-" + ('0' + (now.getMonth() + 1)).slice(-2) + "-" + ('0' + now.getDate()).slice(-2);
    var formattedTime = ('0' + now.getHours()).slice(-2) + ":" + ('0' + now.getMinutes()).slice(-2);

    // Set value of input field
    document.getElementById("booking_date").value = formattedDate + "T" + formattedTime;
</script>



    <!-- Number of Passengers -->
    <div class="form-group">
        <label for="passenger-count">Number of Passengers:</label>
        <input type="number" class="form-control" id="passenger-count" name="passenger_count" min="1" max="20" onchange="calculatePrice()">
    </div>

    <!-- Total Price -->
    <div class="form-group">
        <label for="total-price">Total Price:</label>
        <input type="text" class="form-control" id="total-price" name="total_price" readonly>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>

    <!-- User Information Display -->
    <div id="user-info-display" style="display: none;">
        <h3>User Information</h3>
        <p id="display-first-name">First Name: <?php echo $user_firstname; ?></p>
        <p id="display-last-name">Last Name: <?php echo $user_lastname; ?></p>
        <p id="display-phone">Phone Number: <?php echo $user_phone; ?></p>
        <p id="display-email">Email: <?php echo $user_email; ?></p>
    </div>

    <script>
function populateFlights() {
    var country = document.getElementById("country-select").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var flights = JSON.parse(this.responseText);
            var flightCards = document.getElementById("flight-cards");
            flightCards.innerHTML = "";
            flights.forEach(function(flight) {
                var card = document.createElement("div");
                card.className = "card";
                var cardBody = document.createElement("div");
                cardBody.className = "card-body";
                cardBody.innerHTML = "<h5 class='card-title'>" + flight.flight_name + "</h5>" +
                                      "<p class='card-text'>Departure: " + flight.departure_date + "</p>" +
                                      "<p class='card-text'>Arrival: " + flight.arrival_date + "</p>" +
                                      "<p class='card-text'>Location: " + flight.location + "</p>";
                card.appendChild(cardBody);
                flightCards.appendChild(card);
            });
        }
    };
    xhttp.open("GET", "get_flights.php?country=" + country, true);
    xhttp.send();
}


function calculatePrice() {
    var configurationId = parseInt(document.getElementById("passenger-count").value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var pricePerCustomer = parseFloat(this.responseText);
            var totalPrice = configurationId * pricePerCustomer;
            document.getElementById("total-price").value = totalPrice.toFixed(2);
        }
    };
    xhttp.open("GET", "get_price_per_customer.php?configuration_id=" + configurationId, true);
    xhttp.send();
}

</script>
</form>

<!-- Bootstrap JS and Popper.js (optional) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function showGroupSize() {
        document.getElementById('group-size').style.display = 'block';
    }

    function hideGroupSize() {
        document.getElementById('group-size').style.display = 'none';
    }

    function showUserInfo() {
        document.getElementById('user-info').style.display = 'block';
    }

    function hideUserInfo() {
        document.getElementById('user-info').style.display = 'none';
    }

    function showUserInfoDisplay() {
        // Display user information
        document.getElementById('user-info-display').style.display = 'block';

        // Get values from input fields
        var firstName = document.getElementById('first-name').value;
        var lastName = document.getElementById('last-name').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;

        // Display values in user information display
        document.getElementById('display-first-name').innerText = 'First Name: ' + firstName;
        document.getElementById('display-last-name').innerText = 'Last Name: ' + lastName;
        document.getElementById('display-phone').innerText = 'Phone Number: ' + phone;
        document.getElementById('display-email').innerText = 'Email: ' + email;

        // Prevent form submission (for demonstration purposes)
        return false;
    }
    

</script>



</body>
</html>
