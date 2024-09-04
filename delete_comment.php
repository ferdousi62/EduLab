<?php
include_once 'dbconnection.php';
session_start();

$queryid=  $_GET["query_id"];



$sql = "DELETE FROM discussion_panel WHERE query_id='" . $queryid . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: discussion_panel.php");
?>