<?php
include 'connection.php'; // เชื่อมต่อฐานข้อมูล

$configurationId = $_GET['configuration_id'];
$sql = "SELECT price_per_customer FROM price_configuration WHERE configuration_id = $configurationId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pricePerCustomer = $row['price_per_customer'];
    echo $pricePerCustomer;
} else {
    echo "0"; // หากไม่พบราคาต่อคนให้คืนค่าเป็น 0
}
?>
