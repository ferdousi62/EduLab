<?php
    include('dbconnection.php');
    session_start();
    //Admin Login
    if(isset($_POST['checking_adlog_btn'])) {
        $adminemail= $_POST['ad_inputEmail'];
        $adminpassword=$_POST['ad_inputPassword'];

   
        $sql= "SELECT email, password FROM admin_tb WHERE
        email='".$adminemail."' AND password='".$adminpassword."' limit 1";
        $result= $conn->query($sql);
        if($result->num_rows==1){
            $_SESSION['is_adminlogin'] = true; 
           $_SESSION['admin_email']= $adminemail;
       
           echo $return ="Congrats!! Login Successful";
           echo '<script>document.getElementById("adlog_alert_show").classList.remove("alert-danger");</script>';
           echo '<script>document.getElementById("adlog_alert_show").classList.add("alert-success");</script>';
        
         
          echo '<script>$( "#admin_login" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
          echo '<script> setTimeout(function(){window.location.href="admin/adminDashboard.php"; },2000); </script>';

      
       
        }
        else
        {
            echo $return ="Error! Email or Password invalid";
           // echo '<script>$( "#adlog_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
          // echo '<script>alert("Administrator Login failed!!"); </script>';
          // echo "<script> location.href='admin/adminLogin.php'</script>";
        }
    

    }
      

    if(isset($_POST['checking_slog_btn'])) {
        $sl_email= $_POST['sl_inputEmail'];
        $sl_pass=$_POST['sl_inputPassword'];

   
    $sql= "SELECT * FROM s_registration WHERE
     s_email='".$sl_email."' AND s_password='".$sl_pass."' limit 1";
     $result= $conn->query($sql);

     if($result->num_rows==1){
        echo $return ="Congrats!! Login Successful";
        echo '<script>document.getElementById("slog_alert_show").classList.remove("alert-danger");</script>';
        echo '<script>document.getElementById("slog_alert_show").classList.add("alert-success");</script>';
      
       echo '<script>$( "#studentLogin" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
       echo '<script> setTimeout(function(){window.location.href="studentHomepage.php"; },2000); </script>';
      

       
        $_SESSION['is_slogin'] = true;
        $_SESSION['login_semail'] = $sl_email;
        $row=$result->fetch_array();
        

        $_SESSION['login_susername'] = $row['s_user_name'];

         exit;
     }
     else{
        echo $return ="Error! Email or Password invalid";
       // echo '<script>$( "#slog_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
     }
    

    }
             









    if(isset($_POST['checking_tlog_btn'])) {


        $temail= $_POST['tl_inputEmail'];
        $tpassword=  $_POST['tl_inputPassword'];

        $sql= "SELECT * FROM t_registration WHERE
     email='".$temail."' AND password='".$tpassword."' limit 1";
     $result= $conn->query($sql);
     if($result->num_rows==1){
       
        
        $_SESSION['is_login'] = true;
       
        $_SESSION['login_temail'] = $temail;
    
    echo $return ="Congrats!! Login Successful";
    echo '<script>document.getElementById("tlog_alert_show").classList.remove("alert-danger");</script>';
    echo '<script>document.getElementById("tlog_alert_show").classList.add("alert-success");</script>';      
   echo '<script>$( "#teacherLogin" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
   echo '<script> setTimeout(function(){window.location.href="teacherHomepage.php"; },2000); </script>';
  
        $row=$result->fetch_array();

        $_SESSION['login_username'] = $row['user_name'];
        
         exit;
     }
     else{
        echo $return ="Error! Invalid Password or Email!";
      //  echo '<script>$( "#tlog_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
        }
    }













    if(isset($_POST['checking_std_reg'])) {
        
        $susername= $_POST['username'];
        $sfullname=  $_POST['fullname'];
        $semail= $_POST['email'];
        $spassword=$_POST['pass'];
        
        
        if (!preg_match("/^[a-zA-Z]{3,}[a-zA-Z ]*$/",$sfullname)) {  
            echo $return = "Error! Fullname should start with a minimum of 3 letters and contain no special characters!"; 
                   echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>'; 
        }  
        else if(!filter_var($semail, FILTER_VALIDATE_EMAIL )) {
            echo $return ="Error! Invalid Email!";
            echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
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
        echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';

    }
    else if($result2->num_rows>0 || $result5->num_rows>0){
       
        echo $return ="Username already exist!";
        echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
    }
    else if($result3->num_rows>0){
       
        echo $return ="Email address already exists!";
        echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';

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
       echo "<script> setTimeout(function(){location.href='homepage.php';},2000); </script>";
       
        }
        else
        {
        echo $return ="Error! Registration Failed!!";
        echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
        }
        }
    }
    else
    {
        echo $return ="Error! Password must contain atleast one alphabet,one number and one special character, length 8!";
        echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 2500 ).fadeOut( 600 );</script>';
       
    }
    }
    else
    {
        echo $return ="Error! username should start with a minimum of 3 letters and contain no special characters,blank spaces !";
        echo '<script>$( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
    }
    }
}
















    if(isset($_POST['checking_tchr_reg'])) {

        $tusername= $_POST['tr_username'];
        $tfullname=  $_POST['tr_fullname'];
        $temail= $_POST['tr_email'];
        $tpassword=$_POST['tr_pass'];


        
       
          if (!preg_match("/^[a-zA-Z]{3,}[a-zA-Z ]*$/",$tfullname)) {  
            echo $return = "Error! Fullname should start with a minimum of 3 letters and contain no special characters!"; 
            echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>'; 
        }  
        else if(!filter_var($temail, FILTER_VALIDATE_EMAIL )) {
            echo $return ="Error! Invalid Email!";
            echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
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
                    echo $return ="You have already registered";
                    echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
                }
                else if($result2->num_rows>0 || $result5->num_rows>0){
                     echo $return ="Username already exist!";
                     echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
                }
                else if($result3->num_rows>0){
                    echo $return ="This email is already registered!";
                    echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
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
              echo "<script> setTimeout(function(){location.href='homepage.php';},2000); </script>";
                  

               
           
                  
                 }else{
                     echo $return ="Error! Registration Failed!!";
                     echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
                 }
                        }
                }
                else
                {
                 echo $return ="Error! Password must contain atleast one alphabet,one number and one special character, length 8!";
                 echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 2500 ).fadeOut( 600 );</script>';
                
                }
                


        }
        else
        {
            echo $return ="Error! username should start with a minimum of 3 letters and contain no special characters,blank spaces !";
            echo '<script>$( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
        
        }
    }
       
}
    
 














if(isset($_POST['checking_joinclass_btn'])) {

    $susername=  $_POST['susername'];
    $sfullname=  $_POST['sfullname'];
    $sc_code=  $_POST['courseCode'];

    $sql2= "SELECT * FROM course WHERE c_code='$sc_code' limit 1";
    $sql4= "SELECT * FROM s_course WHERE c_code='$sc_code' AND s_user_name='$susername'";
    $result2= $conn->query($sql2);
    $result4= $conn->query($sql4);
    if($result4->num_rows==1)
    {
        echo $return ="You have already joined the course!";
      //  echo '<script>alert("You have already joined the course!!"); </script>';
      //  echo "<script> location.href='studentHomepage.php'; </script>";
    }
    else{
     if($result2->num_rows==1){
        
         $sql3= "INSERT INTO s_course(s_user_name,s_full_name, c_code) VALUES
         ('$susername','$sfullname', '$sc_code')";
         if($conn->query($sql3)){
            //echo '<script>alert("Joined the course!!"); </script>';
           // echo "<script> location.href='studentHomepage.php'; </script>";


            echo $return ="Congrats!! Joined the course!";
               echo '<script>document.getElementById("joinclass_alert_show").classList.remove("alert-danger");</script>';
               echo '<script>document.getElementById("joinclass_alert_show").classList.add("alert-success");</script>';
             
              echo '<script>$( "#joinCourse" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
            //  echo '<script> setTimeout(function(){window.location.reload("homepage.php"); },2000); </script>';
              echo "<script> setTimeout(function(){location.href='studentHomepage.php';},2000); </script>";
                  

         }
         

     }
     else
     {
        echo $return ="Invalid Course Code!";

        
     }
    }
}











if(isset($_POST['checking_createclass_btn'])) {

    $tusername=  $_POST['username'];
    $tfullname=  $_POST['fullname'];
    $tcourse_name=  $_POST['course_name'];
    $tcourse_details=  $_POST['course_details'];



    do{
        $tc_code= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);  
        $sql6= "SELECT * FROM course WHERE c_code='$tc_code'";
        $result6=$conn->query($sql6);
        }  while($result6->num_rows>0);
      
        $sql7= "SELECT * FROM course WHERE course_name='$tcourse_name'";
        $result7=$conn->query($sql7);
        
        
       
        if (!preg_match("/^[a-zA-Z]{3,}[a-zA-Z0-9 ]*$/",$tcourse_name)) {  
            echo $return = "Error! Coursename should contain minimum 3 alphabets, white space and numbers only!"; 
         //   echo '<script>$( "#createclass_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>'; 
        } 
        else if($result7->num_rows>0){
            echo $return = "Error! You have an anouther course with same name already!";
        }
         else{
        $sql8 = "INSERT INTO course(user_name,full_name,c_code,course_name,course_details) 
        VALUES ('$tusername', '$tfullname', '$tc_code', '$tcourse_name', '$tcourse_details')";
        if($conn->query($sql8)== TRUE){
           // echo'<script>alert( "Class Created Successfully");</script>';
           echo $return ="Congrats!! Class Created Successfully!";
               echo '<script>document.getElementById("createclass_alert_show").classList.remove("alert-danger");</script>';
               echo '<script>document.getElementById("createclass_alert_show").classList.add("alert-success");</script>';
             
              echo '<script>$( "#createCourse" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
            //  echo '<script> setTimeout(function(){window.location.reload("homepage.php"); },2000); </script>';
              echo "<script> setTimeout(function(){location.href='teacherHomepage.php';},2000); </script>";
              
           // echo"<script>swal('Congrats!','Class Created Successfully!','success');</script>";
          //  echo "<script> setTimeout(function(){location.href='teacherHomepage.php';},2000); </script>";
           // echo '<script> setTimeout(function(){window.location.reload("teacherHomepage.php"); },2000); </script>';
        $_SESSION['c_code'] = $tc_code;
        $_SESSION['course_name'] = $tcourse_name;
        $_SESSION['is_coursecreated'] = true;
        $_SESSION['user_name'] = $tusername;
       
        }
        else
        {
            echo $return = "Error! Failed to create class!"; 
           // echo '<script>$( "#createclass_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>'; 
       
           // echo'<script>alert( "Failed to create class");</script>';
            //echo "<script> location.href='teacherHomepage.php'; </script>";
        }
    }
}
?>
    