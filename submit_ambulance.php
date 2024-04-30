<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
// Include database connection file
require_once "config.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$vehicleNumber = $_POST['vehicleNumber'];
$type = $_POST['type'];
$capacity = $_POST['capacity'];
$equipment = $_POST['equipment'];
$currentLocation = $_POST['currentLocation'];
$driverName = $_POST['driverName'];
$driverContact = $_POST['driverContact'];
$driverCertification = $_POST['driverCertification'];


$sql = "INSERT INTO ambulance (VehicleNumber, Type, Capacity, Equipment, CurrentLocation, DriverName, DriverContact, DriverCertification)
        VALUES ('$vehicleNumber', '$type', '$capacity', '$equipment', '$currentLocation', '$driverName', '$driverContact', '$driverCertification')";

if ($conn->query($sql) === TRUE) {
    echo "!  A NEW AMBULANCE WAS ADDED SUCCESFULLY.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
