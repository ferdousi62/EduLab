<?php
include('../dbconnection.php');
session_start();
$username=  $_GET["user_name"];

$sql = "DELETE FROM s_registration WHERE s_user_name='" . $username . "'";
if (mysqli_query($conn, $sql)) {
    echo'<script>alert( "Student Removed Successfully");</script>';
    echo "<script> location.href='adminStudent.php'; </script>";
} else {
    echo'<script>alert( "Error!");</script>';
}

?>