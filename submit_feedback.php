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

$tripID = $_POST['tripID'];
$userID = $_POST['userID'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];
$feedbackDateTime = date("Y-m-d H:i:s");

$sql = "INSERT INTO feedbackandratings (TripID, UserID, Rating_Stars, Comments, FeedbackDateTime)
        VALUES ('$tripID', '$userID', '$rating', '$comments', '$feedbackDateTime')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you,  Your feedback was placed successfully. The team will contact you soon.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
