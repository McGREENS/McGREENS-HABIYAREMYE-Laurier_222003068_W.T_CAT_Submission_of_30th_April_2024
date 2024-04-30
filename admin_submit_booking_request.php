<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
require_once 'config.php';

// Retrieve form data
$userId = $_POST['userId'];
$pickupLocation = $_POST['pickupLocation'];
$destination = $_POST['destination'];
$hospitalName = $_POST['hospitalName'];
$priorityLevel = $_POST['priorityLevel'];
$reason = $_POST['reason'];
$additionalNotes = $_POST['additionalNotes'];

// Fetch current date and time
$requestedTime = date('Y-m-d H:i:s');

try {
    // insert booking request data
    $stmt = $conn->prepare("INSERT INTO bookingRequest (UserId, PickupLocation, Destination, HospitalName, RequestedTime, PriorityLevel, Reason, AdditionalNotes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$userId, $pickupLocation, $destination, $hospitalName, $requestedTime, $priorityLevel, $reason, $additionalNotes]);

    header("Location: admin_home.html");
    exit();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
