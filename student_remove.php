<?php
include_once 'dbconnection.php';
session_start();
$tc_code= $_SESSION['tc_code'];
$course_name= $_SESSION['course_name'];
$susername=  $_GET["s_username"];



$sql = "DELETE FROM s_course WHERE s_user_name='" . $susername . "' AND c_code='$tc_code'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: student_list.php");
?>