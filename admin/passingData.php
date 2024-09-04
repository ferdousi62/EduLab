
 
<?php

include('../dbconnection.php');
session_start();

if (isset($_SESSION['is_adminlogin']) && $_SESSION['is_adminlogin'] == true) {
   
  $temail = $_SESSION['admin_email'];
} else {
  echo '<script>alert("Please Login as a admin first!"); </script>';
  echo "<script> location.href='../homepage.php'</script>";
}

if(isset($_POST['checking_details_btn'])) {
    $tuser_name= $_POST['username'];
    $result_array = [];

    $sql= " SELECT * FROM t_registration WHERE user_name='$tuser_name'";
   

    $result= $conn->query($sql);
   

  
    if($result->num_rows>0){
        foreach($result as $row){
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    }
    
}
if(isset($_POST['checking_std_details_btn'])) {
    $suser_name= $_POST['username'];
    $result_array = [];

    $sql= " SELECT * FROM s_registration WHERE s_user_name='$suser_name'";
   

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