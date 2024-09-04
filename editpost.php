<?php
    include('dbconnection.php');
    session_start();
    
    if(isset($_POST['checking_btn'])) {
        $post_id= $_POST['post_id'];
        $result_array = [];

        $sql= " SELECT * FROM post WHERE post_id='$post_id'";
       
    
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
        $post=$_POST['post'];
        $p_id= $_POST['pid'];
        
        if(preg_match('/^[ ]*$/i', $post)){
            echo $return = "Post can not contain only blank spaces!";
          
        }else{
 
        $sql2 = "UPDATE post SET post='$post'  WHERE post_id='$p_id'";
        

        if($conn->query($sql2)){
          echo $return ="Post Updated Successfully";
          echo '<script>document.getElementById("editpost_alert_show").classList.remove("alert-danger");</script>';
               echo '<script>document.getElementById("editpost_alert_show").classList.add("alert-success");</script>';
             
              echo '<script>$( "#edit_post" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
            //  echo '<script> setTimeout(function(){window.location.reload("homepage.php"); },2000); </script>';
              echo "<script> setTimeout(function(){location.href='class.php';},2000); </script>";
              
        }
        else{
            echo $return ="Failed to Update Post";
        }
    }
    }

   




    ?>