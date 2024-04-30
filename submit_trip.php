<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/


// Include database connection file
require_once "config.php";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$bookingID = $_POST['bookingID'];
$pickupTime = $_POST['pickupTime'];
$dropoffTime = $_POST['dropoffTime'];
$distanceTraveled = $_POST['distanceTraveled'];
$fare = $_POST['fare'];
$paymentStatus = $_POST['paymentStatus'];

$sql = "INSERT INTO trip (BookingID, PickupTime, DropoffTime, DistanceTraveled, Fare, PaymentStatus)
VALUES ('$bookingID', '$pickupTime', '$dropoffTime', '$distanceTraveled', '$fare', '$paymentStatus')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
