<?php
include 'connection.php'; // เชื่อมต่อฐานข้อมูล

$country = $_GET['country'];
$sql = "SELECT * FROM flight WHERE flight_name = '$country'";
$result = $conn->query($sql);

$flights = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $flights[] = $row;
    }
}

echo json_encode($flights);
?>
