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

// Retrieve form data
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$dateofbirth = $_POST['dateofbirth'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$insurance = $_POST['insurance'];

// Insert data into database
$sql = "INSERT INTO user (Name, PhoneNumber, Email, DateOfBirth, Address, Gender, Password, Insurance)
        VALUES ('$name', '$phonenumber', '$email', '$dateofbirth', '$address', '$gender', '$password', '$insurance')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Hello $name, your registration was successfully submitted');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
?>
