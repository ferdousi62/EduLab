<?php
  include('dbconnection.php');
  session_start();
  $a_name = $_POST['aname'];
$a_info = $_POST['ainfo'];
$a_duedate = $_POST['aduedate'];
$tc_code=$_POST['c_code'];
$afile=$_FILES["afile"]["name"];
          
// get the file extension
$extension = substr($afile,strlen($afile)-4,strlen($afile));
// allowed extensions
$allowed_extensions = array(".pdf",".doc","docx",".ppt");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
  echo $return ="Invalid format. Only pdf / doc / docx / ppt format allowed!";
 // echo '<script>$( "#up_ass_alert" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
   
//echo "<script>alert('Invalid format. Only pdf / doc / docx / ppt format allowed');</script>";
//echo "<script> location.href='assignment.php'; </script>";
}
else if (($_FILES["afile"]["size"] > 5000000)) {
  echo $return ="File size exceeds 5MB!";
 // echo '<script>$( "#up_ass_alert" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
   
    //echo "<script>alert('File size exceeds 5MB');</script>";
   // echo "<script> location.href='assignment.php'; </script>";

}
else
{

// Code for move image into directory
move_uploaded_file($_FILES["afile"]["tmp_name"],"assignment_files/".$afile);
// Query for insertion data into database
$sql = "INSERT INTO t_assignment(c_code, a_name, a_info, a_file, a_duedate ) 
        VALUES ('$tc_code','$a_name', '$a_info', '$afile', '$a_duedate')";
        if($conn->query($sql)== TRUE){
          echo $return ="Assignment Posted Successfully!";
          echo '<script>document.getElementById("up_ass_alert").classList.remove("alert-danger");</script>';
          echo '<script>document.getElementById("up_ass_alert").classList.add("alert-success");</script>';
          echo '<script> setTimeout(function(){window.location.reload("test.php"); },2000); </script>';
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


?>