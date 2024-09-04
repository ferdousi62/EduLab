<?php
    include('dbconnection.php');
    session_start();
 
    if(isset($_POST['checking_btn'])) {
        $a_id= $_POST['a_id'];
        $s_user_name= $_POST['username'];
        $result_array = [];

        $sql= " SELECT * FROM s_assignment_submission WHERE a_id='$a_id' AND s_user_name='$s_user_name'";
       
    
        $result= $conn->query($sql);
    
    
      
        if($result->num_rows>0){
            foreach($result as $row){
                array_push($result_array, $row);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        
    }
  

    if(isset($_POST['checking_update'])) {
        $mark= $_POST['mark'];
        $s_user_name= $_POST['username'];
        $a= $_POST['a_id'];
       
       
        
        

        $sql2 = "UPDATE s_assignment_submission SET a_marks='$mark' WHERE a_id='$a' AND s_user_name='$s_user_name'";
       

        if($conn->query($sql2)){
          
          echo $return =" Marked Successfully";
           echo '<script>document.getElementById("mark_alert_show").classList.remove("alert-danger");</script>';
           echo '<script>document.getElementById("mark_alert_show").classList.add("alert-success");</script>';
         
         
          echo '<script>$( "#myModall" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 300 );</script>';
          echo '<script> setTimeout(function(){window.location.href="viewsubmission.php"; },2000); </script>';
        }
        else{
            echo $return ="Failed to mark!";
            echo '<script>$( "#mark_alert_show" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 600 );</script>';
        }
    }

   




   
?>