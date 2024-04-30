<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
require_once 'config.php';

// Retrieve form data
$userID = $_POST['userID'];
$contactName = $_POST['contactName'];
$relationship = $_POST['relationship'];
$contactPhoneNumber = $_POST['contactPhoneNumber'];

try {
    // insert emergency contact data
    $stmt = $conn->prepare("INSERT INTO emergencycontacts (UserID, ContactName, Relationship, ContactPhoneNumber) VALUES (?, ?, ?, ?)");
    $stmt->execute([$userID, $contactName, $relationship, $contactPhoneNumber]);

    echo "<div style='position: fixed; top: 10px; right: 10px; background-color: cyan; color: black; padding: 60px; border-radius: 5px;'>Emergency contact added successfully!</div>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
