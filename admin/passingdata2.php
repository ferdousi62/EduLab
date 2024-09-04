<?php


include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin']) && $_SESSION['is_adminlogin'] == true) {
   
  $temail = $_SESSION['admin_email'];
} else {
  echo '<script>alert("Please Login as a admin first!"); </script>';
  echo "<script> location.href='../homepage.php'</script>";
}


if(isset($_POST['checking_course_btn'])) {
    $user_name= $_POST['tusername'];
    $result_array = [];

   // $sql= " SELECT course_name FROM course WHERE user_name='$user_name'";
   $sql= " SELECT * FROM course WHERE user_name='$user_name'";
   

    $result= $conn->query($sql);
   








  
    if($result->num_rows>0){
        foreach($result as $row){
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    }
    
}

?>