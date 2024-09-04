<?php
  include('dbconnection.php');
  session_start();
  $a_name = $_POST['aname'];
$a_info = $_POST['ainfo'];
$a_duedate = $_POST['aduedate'];
$tc_code=$_POST['c_code'];
$afile=$_FILES["afile"]["name"];


$duedate=date("Y-m-d H:i:s",strtotime($a_duedate));
date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
$current= date("Y-m-d H:i:s");
$currentdate=date("Y-m-d H:i:s",strtotime($current));


   if($a_name!='' && $a_info!='' && $a_duedate!='' && $afile!=''){
    $sql2= " SELECT * FROM assignment WHERE a_name='$a_name'";
    $result2= $conn->query($sql2);
     if($currentdate>=$duedate)
            {
              echo $return ="Duetime is smaller then current time!";
            } 
     else if (!preg_match("/[0-9]{0,2}[a-zA-Z]{2,100}[a-zA-Z0-9 ]*$/",$a_name)) {  
      echo $return = "Error! Invalid Assignment Name!"; 
             
  }  
       else if($result2->num_rows>0){
          echo $return ="Assignment with similar name already exists!";
          }
          else{
    // get the file extension
    $extension = substr($afile,strlen($afile)-4,strlen($afile));
    // allowed extensions
    $allowed_extensions = array(".pdf",".doc","docx",".PDF");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if(!in_array($extension,$allowed_extensions))
    {
      echo $return ="Invalid format! Only pdf / doc / docx format allowed.";
     // echo '<script>$( "#up_ass_alert" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
       
    //echo "<script>alert('Invalid format. Only pdf / doc / docx / ppt format allowed');</script>";
    //echo "<script> location.href='assignment.php'; </script>";
    }
    else if (($_FILES["afile"]["size"] > 20000000)) {
      echo $return ="File size exceeds 20MB!";
     // echo '<script>$( "#up_ass_alert" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
       
        //echo "<script>alert('File size exceeds 5MB');</script>";
       // echo "<script> location.href='assignment.php'; </script>";
    
    }
    else
    {
    
    // Code for move image into directory
    move_uploaded_file($_FILES["afile"]["tmp_name"],"assignment_files/".$afile);
    // Query for insertion data into database
    $sql = "INSERT INTO assignment(c_code, a_name, a_info, a_file, a_duedate ) 
            VALUES ('$tc_code','$a_name', '$a_info', '$afile', '$a_duedate')";
            if($conn->query($sql)== TRUE){
              echo $return ="Assignment Posted Successfully!";
              echo '<script>document.getElementById("up_ass_alert").classList.remove("alert-danger");</script>';
              echo '<script>document.getElementById("up_ass_alert").classList.add("alert-success");</script>';
              echo '<script> setTimeout(function(){window.location.reload("assignment.php"); },2000); </script>';
             echo '<script>$( "#schedule_assignment" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
            
               // echo'<script>alert( "Assignment Posted Successfully");</script>';
               // echo "<script> location.href='assignment.php'; </script>";
            }
            else{
              echo $return ="Unable to post assignment!";
          //    echo '<script>$( "#up_ass_alert" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
               
               // echo'<script>alert( "Unable to post assignment");</script>';
               // echo "<script> location.href='assignment.php'; </script>";
            }
            }
 
        
    }
    
   }  else{     
    echo $return ="Please Fill All Fields";

   }
?>