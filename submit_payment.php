<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/

// Include database connection
require_once 'config.php'; 

// Retrieve form data
$tripID = $_POST['tripID'];
$userID = $_POST['userID'];
$paymentMethod = $_POST['paymentMethod'];
$amount = $_POST['amount'];
$paymentDateTime = $_POST['paymentDateTime'];

try {
    //  insert payment data
    $stmt = $conn->prepare("INSERT INTO payment (TripID, UserID, PaymentMethod, Amount, PaymentDateTime) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$tripID, $userID, $paymentMethod, $amount, $paymentDateTime]);

    header("Location: user_home.html");
    exit();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
