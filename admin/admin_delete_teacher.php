<?php
include('../dbconnection.php');
session_start();
$username=  $_GET["user_name"];

$sql = "DELETE FROM t_registration WHERE user_name='" . $username . "'";
if (mysqli_query($conn, $sql)) {
    echo'<script>alert( "Teacher Removed Successfully");</script>';
    echo "<script> location.href='adminTeacher.php'; </script>";
} else {
    echo'<script>alert( "Error!");</script>';
}

?>