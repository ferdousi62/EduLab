<?php
  include('dbconnection.php');
  session_start();

  $tc_code=$_POST['c_code'];
$lecturefile=$_FILES["upload_lecture"]["name"];

if($lecturefile==''){
    echo $return ="Select a File!";
}
else{


// get the file extension
$extension = substr($lecturefile,strlen($lecturefile)-4,strlen($lecturefile));
// allowed extensions
$allowed_extensions = array(".pdf",".doc",".docx",".ppt",".PDF",".pptx",".png",".jpg",".jpeg",".txt");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
    echo $return ="Invalid format! Only pdf / doc / docx / ppt / pptx / png / jpg / jpeg / txt format allowed.";
//echo "<script>alert('Invalid format. Only pdf / doc / docx / ppt format allowed');</script>";
//echo "<script> location.href='classMaterial.php'; </script>";
}
else if (($_FILES["upload_lecture"]["size"] > 20000000)) {
    echo $return ="File size exceeds 20MB!";
    //echo "<script>alert('File size exceeds 5MB');</script>";
    //echo "<script> location.href='classMaterial.php'; </script>";

}
else
{
//rename the image file
//$lecturenewfile=md5($lecturefile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["upload_lecture"]["tmp_name"],"class_materials/".$lecturefile);
// Query for insertion data into database
$sql = "INSERT INTO lecture_upload(c_code,file ) 
        VALUES ('$tc_code', '$lecturefile')";
        if($conn->query($sql)== TRUE){
            echo $return ="File uploaded successfully";
            echo '<script>document.getElementById("up_material_alert").classList.remove("alert-danger");</script>';
            echo '<script>document.getElementById("up_material_alert").classList.add("alert-success");</script>';
            echo '<script> setTimeout(function(){window.location.reload("classMaterial.php"); },2000); </script>';
           echo '<script>$( "#schedule_assignment" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
          
           // echo'<script>alert( "File uploaded successfully");</script>';
            //echo "<script> location.href='classMaterial.php'; </script>";
        }
        else{
            echo $return ="Unable to upload file!";
            

           // echo'<script>alert( "Unable to upload file");</script>';
           // echo "<script> location.href='classMaterial.php'; </script>";
        }
        
    }

}

    ?>