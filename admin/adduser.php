<?php
  include('../dbconnection.php');
  session_start();

 if(isset($_POST['checking_tchr_reg'])) {

    $tusername= $_POST['tr_username'];
    $tfullname=  $_POST['tr_fullname'];
    $temail= $_POST['tr_email'];
    $tpassword=$_POST['tr_pass'];


    
   
      if (!preg_match("/^[a-zA-Z]{3,}[a-zA-Z ]*$/",$tfullname)) {  
        echo $return = "Error! Fullname should start with a minimum of 3 letters and contain no special characters!"; 
      //  echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>'; 
    }  
    else if(!filter_var($temail, FILTER_VALIDATE_EMAIL )) {
        echo $return ="Error! Invalid Email!";
       // echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
     }
    else{

         
 if(preg_match('/^[a-zA-Z]{3,}[0-9]*$/', $tusername)){
     if(preg_match("#.*^(?=.{8,20})(?=.*[A-Za-z])(?=.*[0-9])(?=.*\W).*$#", $tpassword)){
        

    
            
        
            $sql2= "SELECT * FROM t_registration WHERE user_name='$tusername' AND email= '$temail'";
            $sql3= "SELECT * FROM t_registration WHERE user_name='$tusername' ";
            $sql4= "SELECT * FROM t_registration WHERE email='$temail' ";
            $sql5= "SELECT * FROM s_registration WHERE s_user_name='$tusername' ";
            $result5=$conn->query($sql5);
            $result3=$conn->query($sql4);

            $result=$conn->query($sql2);
            $result2=$conn->query($sql3);
            if($result->num_rows>0){
                echo $return ="User already registered";
               // echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
            }
            else if($result2->num_rows>0 || $result5->num_rows>0){
                 echo $return ="Username already exist!";
              //   echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
            }
            else if($result3->num_rows>0){
                echo $return ="This email is already registered!";
              //  echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
            }
            else
            {
        
        
            $sql = "INSERT INTO t_registration(user_name,full_name,email,password ) 
            VALUES ('$tusername', '$tfullname', '$temail', '$tpassword')";
            if($conn->query($sql)==true){
              
           echo $return ="Congrats!! Registration Successful!";
           echo '<script>document.getElementById("treg_alert_show").classList.remove("alert-danger");</script>';
           echo '<script>document.getElementById("treg_alert_show").classList.add("alert-success");</script>';
         
          echo '<script>$( "#teacherSignUp" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
        //  echo '<script> setTimeout(function(){window.location.reload("homepage.php"); },2000); </script>';
          echo "<script> setTimeout(function(){location.href='adminTeacher.php';},2000); </script>";
              

           
       
              
             }else{
                 echo $return ="Error! Registration Failed!!";
                // echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
             }
                    }
            }
            else
            {
             echo $return ="Error! Password must contain atleast one alphabet,one number and one special character, length 8!";
           //  echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 2500 ).fadeOut( 600 );</script>';
            
            }
            


    }
    else
    {
        echo $return ="Error! username should start with a minimum of 3 letters and contain no special characters,blank spaces !";
       // echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
    
    }
}
   
}











if(isset($_POST['checking_std_reg'])) {
        
    $susername= $_POST['username'];
    $sfullname=  $_POST['fullname'];
    $semail= $_POST['email'];
    $spassword=$_POST['pass'];
    
    
    if (!preg_match("/^[a-zA-Z]{3,}[a-zA-Z ]*$/",$sfullname)) {  
        echo $return = "Error! Fullname should start with a minimum of 3 letters and contain no special characters!"; 
               //echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>'; 
    }  
    else if(!filter_var($semail, FILTER_VALIDATE_EMAIL )) {
        echo $return ="Error! Invalid Email!";
       // echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
     }
    else{
    if(preg_match('/^[a-zA-Z]{3,}[0-9]*$/', $susername)){
        if(preg_match("#.*^(?=.{8,20})(?=.*[A-Za-z])(?=.*[0-9])(?=.*\W).*$#", $spassword)){
    
    

$sql2= "SELECT * FROM s_registration WHERE s_user_name='$susername' AND s_email= '$semail'";
$sql3= "SELECT * FROM s_registration WHERE s_user_name='$susername' ";
$sql4= "SELECT * FROM s_registration WHERE s_email='$semail' ";
$sql5= "SELECT * FROM t_registration WHERE user_name='$susername' ";
$result5=$conn->query($sql5);
$result=$conn->query($sql2);
$result2=$conn->query($sql3);
$result3=$conn->query($sql4);

if($result->num_rows>0){
    
    echo $return ="Error! You have already registered";
    //echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';

}
else if($result2->num_rows>0 || $result5->num_rows>0){
   
    echo $return ="Username already exist!";
    //echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
}
else if($result3->num_rows>0){
   
    echo $return ="Email address already exists!";
   //echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';

}
else{

$sql = "INSERT INTO s_registration(s_user_name,s_full_name,s_email,s_password ) 
VALUES ('$susername', '$sfullname', '$semail', '$spassword')";
if($conn->query($sql) ==true){
    echo $return ="Congrats!! Registration Successful!";
    echo '<script>document.getElementById("sreg_alert_show").classList.remove("alert-danger");</script>';
    echo '<script>document.getElementById("sreg_alert_show").classList.add("alert-success");</script>';
  
   echo '<script>$( "#studentSignUp" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
   //echo '<script> setTimeout(function(){window.location.reload("homepage.php"); },2000); </script>';
   echo "<script> setTimeout(function(){location.href='adminStudent.php';},2000); </script>";
   
    }
    else
    {
    echo $return ="Error! Registration Failed!!";
   // echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
    }
    }
}
else
{
    echo $return ="Error! Password must contain atleast one alphabet,one number and one special character, length 8!";
   // echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 2500 ).fadeOut( 600 );</script>';
   
}
}
else
{
    echo $return ="Error! username should start with a minimum of 3 letters and contain no special characters,blank spaces !";
  //  echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
}
}
}
?>