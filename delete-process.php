<?php
include_once 'dbconnection.php';
session_start();
$tc_code= $_SESSION['tc_code'];
$course_name= $_SESSION['course_name'];
$a=  $_GET["post_id"];
echo $tc_code;
echo $course_name;


$sql = "DELETE FROM post WHERE post_id='" . $a . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: class.php");
?>


