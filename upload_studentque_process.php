<?php
  include('dbconnection.php');
  session_start();
  $tc_code=$_POST['c_code'];
  $quesfile=$_FILES["upload_question"]["name"];
  if($quesfile==''){
    echo $return ="Select a File!";
}
else{
  // get the image extension
$extension = substr($quesfile,strlen($quesfile)-4,strlen($quesfile));
// allowed extensions
$allowed_extensions = array(".pdf",".doc","docx",".ppt");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
    echo $return ="Invalid format! Only pdf / doc / docx / ppt format allowed.";

//echo "<script>alert('Invalid format. Only pdf / doc / docx / ppt format allowed');</script>";
//echo "<script> location.href='question_bank.php'; </script>";
}
else if (($_FILES["upload_question"]["size"] > 20000000)) {

    echo $return ="File size exceeds 20MB!";
   
    //echo "<script>alert('File size exceeds 5MB');</script>";
    //echo "<script> location.href='question_bank.php'; </script>";

}
else
{
//rename the image file
//$lecturenewfile=md5($lecturefile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["upload_question"]["tmp_name"],"question_bank/".$quesfile);
// Query for insertion data into database
$sql = "INSERT INTO question_bank(c_code,question_file ) VALUES ('$tc_code', '$quesfile')";
        if($conn->query($sql)== TRUE){
          echo $return ="File uploaded successfully";
            echo '<script>document.getElementById("up_que_alert").classList.remove("alert-danger");</script>';
            echo '<script>document.getElementById("up_que_alert").classList.add("alert-success");</script>';
            echo '<script> setTimeout(function(){window.location.reload("student_questionBank.php"); },2000); </script>';
           echo '<script>$( "#upload_que" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
          
           // echo "<script> location.href='question_bank.php'; </script>";
        }
        else{
            echo $return ="Unable to upload file!";
          //  echo'<script>alert( "Unable to upload file");</script>';
          //  echo "<script> location.href='question_bank.php'; </script>";
        }
        
    }
}
  ?>