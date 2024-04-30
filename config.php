<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'habiyaremye');
define('DB_PASSWORD', 'laurier');
define('DB_NAME', 'ambulance_booking_syst');
define('DB_PORT', '5306'); 


$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
