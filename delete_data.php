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

$tableName = $_POST['tableName'];
$primaryKeyColumn = $_POST['primaryKeyColumn'];
$primaryKeyValue = $_POST['primaryKeyValue'];

$query = "DELETE FROM $tableName WHERE $primaryKeyColumn = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $primaryKeyValue);
$stmt->execute();

$rowsDeleted = $stmt->affected_rows;

$stmt->close();
$conn->close();

if ($rowsDeleted > 0) {
    echo "Row deleted successfully.";
} else {
    echo "No row found with the specified primary key.";
}
?>
