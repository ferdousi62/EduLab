<?php
include('dbconnection.php');
session_start();
$ccode=  $_GET["tc_code"];

$sql = "DELETE FROM course WHERE c_code='" . $ccode . "'";
if (mysqli_query($conn, $sql)) {
    echo'<script>alert( "Course Deleted Successfully");</script>';
    echo "<script> location.href='teacherHomepage.php'; </script>";
} else {
    echo'<script>alert( "Error!");</script>';
}

?>