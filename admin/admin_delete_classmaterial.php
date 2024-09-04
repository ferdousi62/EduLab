<?php
include_once '../dbconnection.php';
session_start();
$tc_code= $_SESSION['tc_code'];
$course_name= $_SESSION['course_name'];



if(isset($_GET["from_queBank_file_id"])){
    $id=  $_GET["from_queBank_file_id"];
    $sql = "DELETE FROM question_bank WHERE question_id='" . $id . "'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("Location: adCourse_questionBank.php");
}

else if(isset($_GET["file_id"])){
    $a=  $_GET["file_id"];
    $sql = "DELETE FROM lecture_upload WHERE lecture_id='" . $a . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: adCourse_classmaterial.php");
}

?>