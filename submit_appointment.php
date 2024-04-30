<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $connection = new mysqli("localhost:5306", "habiyaremye", "laurier", "ambulance_booking_syst");

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $service = $_POST['service'];
    $message = $_POST['message'];

//insert data into the appointment table
    $sql = "INSERT INTO appointment (Name, Email, Mobile, Service, Message) VALUES ('$name', '$email', '$mobile', '$service', '$message')";
    if ($connection->query($sql) === TRUE) {
        echo "Appointment submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
echo "Appointment submitted successfully";
?>
