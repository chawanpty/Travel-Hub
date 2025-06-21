<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $country = $_POST["country"];
    $booking_date = $_POST["booking_date"];
    $booking_time = $_POST["booking_time"];
    $travel_type = $_POST["travel-type"];
    $group_size = isset($_POST["group-size"]) ? $_POST["group-size"] : "";
    $passenger_count = isset($_POST["passenger-count"]) ? $_POST["passenger-count"] : "";

    // Display confirmation message
    echo "<h2>Booking Confirmation</h2>";
    echo "<p><strong>Country:</strong> $country</p>";
    echo "<p><strong>Booking Date:</strong> $booking_date</p>";
    echo "<p><strong>Booking Time:</strong> $booking_time</p>";
    echo "<p><strong>Travel Type:</strong> $travel_type</p>";

    if ($travel_type === "group") {
        echo "<p><strong>Group Size:</strong> $group_size</p>";
    } elseif ($travel_type === "individual") {
        echo "<p><strong>Passenger Count:</strong> $passenger_count</p>";
    }
} else {
    // If form is not submitted, redirect to booking page
    header("Location: booking.php");
    exit;
}
?>
