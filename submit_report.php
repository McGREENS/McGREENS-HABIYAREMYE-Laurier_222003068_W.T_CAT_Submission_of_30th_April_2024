<?php
/*
    
 <!-- Laurier HABIYAREMYE        REG_NO:  222003068   -->
 <!-- AMBULANCE BOOKING SYSTEM  to fit the better appearence was summarized to be ABS Lines -->


*/
// Include database connection file
require_once "config.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$reportType = $_POST['reportType'];
$dateRange = $_POST['dateRange'];
$generatedBy = $_POST['generatedBy'];
$reportContent = $_POST['reportContent'];


$sql = "INSERT INTO reportsandanalytics (ReportType, DateRange, GeneratedBy, ReportContent)
        VALUES ('$reportType', '$dateRange', '$generatedBy', '$reportContent')";

if (mysqli_query($conn, $sql)) {
    echo "!!  Report submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
