<?php
include('dbconnection.php');
session_start();
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) {
   
    $temail = $_SESSION['login_temail'];
} else {
    echo '<script>alert("Please Login as a teacher first!"); </script>';
    echo "<script> location.href='homepage.php'</script>";
}


if(isset($_GET['tc_code'])){

    $oldtc_code=$_GET["tc_code"];
 
        do{
            $newtc_code= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);  
            $sql2= "SELECT * FROM course WHERE c_code='$newtc_code'";
            $result2=$conn->query($sql2);
            }  while($result2->num_rows>0);
           $sql3= "UPDATE course  SET  c_code='$newtc_code' WHERE c_code='$oldtc_code' ";
          // echo $sql3;
            if($conn->query($sql3)==TRUE){
                 //echo'<script>alert( "Updated succufully");</script>';
                 echo "<script> location.href='teacherHomepage.php'</script>";
            }else{
                 echo'<script>alert( "Error!");</script>';

            }
    
}

    
     
?>