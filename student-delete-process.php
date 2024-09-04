<?php
include_once 'dbconnection.php';
session_start();
$sc_code= $_SESSION['sc_code'];
$course_name= $_SESSION['scourse_name'];
$a=  $_GET["post_id"];



$sql = "DELETE FROM post WHERE post_id='" . $a . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: studentclass.php");
?>
