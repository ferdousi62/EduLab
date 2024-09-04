<?php
    include('dbconnection.php');
    session_start();
    
   
    // Assignment Edit Part-1
    if(isset($_POST['checking_btn'])) {
        $a_id= $_POST['a_id'];
        $result_array = [];

        $sql= " SELECT * FROM assignment WHERE a_id='$a_id'";
        $result= $conn->query($sql);
    
        if($result->num_rows>0){
            foreach($result as $row){
                array_push($result_array, $row);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        
    }
  
// Assignment Edit Part-2
    if(isset($_POST['checking_update'])) {
        $a_id= $_POST['aid'];
        $a_name=$_POST['aname'];
        $p_name=$_POST['pname'];
        $a_info=$_POST['ainfo'];
        $a_file=$_POST['afile'];
        $a_date=$_POST['adate'];
        if($a_date==""){
            $a_date=$_POST['pastdate'];
          }
        $adate=date("Y-m-d H:i:s",strtotime($a_date));
        date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
        $current= date("Y-m-d H:i:s");
        $currentdate=date("Y-m-d H:i:s",strtotime($current));
       


        $sql2= " SELECT * FROM assignment WHERE a_name='$a_name'";
    $result2= $conn->query($sql2);
    $past_date=$_POST['pastdate'];
    $pastdue_date=date("Y-m-d H:i:s",strtotime($past_date));
    if($current>=$pastdue_date){
        echo $return = " Duetime Already exist!"; 
     }
    else if (!preg_match("/[0-9]{0,2}[a-zA-Z]{2,100}[a-zA-Z0-9 ]*$/",$a_name)) {  
        echo $return = "Error! Invalid Assignment Name!"; 
               
    }  
    else if($current>=$adate){
              echo $return ="Duetime is smaller then current time!";
            } 
     else if($result2->num_rows>0 && $a_name != $p_name){
            
          echo $return ="Similer Assignment Name Exist!";
          
        }else{
    
        
            
            
             $sql2 = "UPDATE assignment SET a_name='$a_name', a_info='$a_info', a_duedate='$a_date' WHERE a_id='$a_id'";
        

        if($conn->query($sql2)==TRUE){
            echo $return ="Congrats!! Updated Successfully";
            echo '<script>document.getElementById("editass_alert").classList.remove("alert-danger");</script>';
            echo '<script>document.getElementById("editass_alert").classList.add("alert-success");</script>';
          // echo '<script> document.getElementById("editass_alert").class = "success"; </script>';
          // echo '<script> document.getElementById("editass_alert").style.background = "green"; </script>';
          //  echo "<script> window.close(); </script>";
            //echo "<script> location.href='assignment.php'; </script>";       
            //echo'<script> alert("Assignment Updated Successfully"); </script>';
           // echo '<script> setTimeout(function(){window.location.reload(assignment.php); },1000); </script>';
           echo '<script>$( "#myModall" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
          //  echo '<script> setTimeout(() => window.location.reload("assignment.php"), 2000); </script>';
            echo "<script> setTimeout(function(){location.href='assignment.php';},2000); </script>";
        }
        else{
            echo $return ="Sorry!! Failed to Update";
           
            echo '<script>$( "#myModall" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
            echo "<script> setTimeout(function(){location.href='assignment.php';},2000); </script>";
        }
    
    }
}






    // Quiz Edit Part-1
    if(isset($_POST['checking_q_btn'])) {
        $q_id= $_POST['q_id'];
        $result_array = [];

        $sql3= " SELECT * FROM quiz WHERE q_id='$q_id'";
       
    
        $result3= $conn->query($sql3);
    
    
      
        if($result3->num_rows>0){
            foreach($result3 as $row){
                array_push($result_array, $row);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        }
        
    }


// Quiz Edit Part-2
    if(isset($_POST['checking_q_update'])) {
        $q_id= $_POST['qid'];
        $q_name=$_POST['qname'];
        $q_p_name=$_POST['q_p_name'];
        $q_info=$_POST['qinfo'];
        $q_date=$_POST['qdate'];
    $edit_startdate=$_POST['edit_startdate'];
    $past_startdate=$_POST['past_startdate'];
    if($q_date==""){
        $q_date=$_POST['pastdate'];
    }
    if($edit_startdate==""){
        $edit_startdate=$_POST['past_startdate'];
    }
    
    $qdate=date("Y-m-d H:i:s",strtotime($q_date));
    $paststrtdate=date("Y-m-d H:i:s",strtotime($past_startdate));
    $editstartdate=date("Y-m-d H:i:s",strtotime($edit_startdate));
    date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
    $current= date("Y-m-d H:i:s");
    $currentdate=date("Y-m-d H:i:s",strtotime($current));



    $sql3= " SELECT * FROM quiz WHERE q_name='$q_name'";
    $result3= $conn->query($sql3);
     if($currentdate>=$paststrtdate){
        echo $return = " Quiz Already Started!"; 
     }
     else if($currentdate>$editstartdate){
        echo $return ="Start time is smaller than current time!";
       
      } 
    else if($currentdate>$qdate){
        echo $return ="Duetime is smaller than current time!";
       
      } 
    else if($editstartdate>=$qdate )
    {
        echo $return ="Due time is smaller than scheduled time!";
       // echo '<script>$( "#alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
       
        

    }
    else if (!preg_match("/[0-9]{0,2}[a-zA-Z]{2,100}[a-zA-Z0-9 ]*$/",$q_name)) {  
        echo $return = " Invalid Quiz Name!"; 
               
    }  
     else if($result3->num_rows>0 && $q_name != $q_p_name){
            
          echo $return ="Similer Quiz Name Exist!";
          
        }else{         


        $sql4 = "UPDATE quiz SET q_name='$q_name', q_info='$q_info',q_duedate='$q_date',q_startdate='$edit_startdate' WHERE q_id='$q_id'";
        

        if($conn->query($sql4)==TRUE){
          

          echo $return ="Congrats!! Updated Successfully";
          echo '<script>document.getElementById("editquiz_alert").classList.remove("alert-danger");</script>';
          echo '<script>document.getElementById("editquiz_alert").classList.add("alert-success");</script>';
       
         // echo '<script> setTimeout(function(){window.location.reload("takeQuiz.php"); },2000); </script>';
         echo '<script>$( "#edit_quiz" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
         echo "<script> setTimeout(function(){location.href='takeQuiz.php';},2000); </script>";
        }
        else{
            echo $return ="Failed to update quiz";
        //  echo "<script> window.close(); </script>";
        //  echo "<script> location.href='takeQuiz.php'; </script>";
         //   echo'<script> alert( "Failed to update quiz"); </script>';
           
        
        }
    }

    }















//Quiz Upload start.......
    if(isset($_POST['checking_q_upload'])) {
        $tc_code= $_POST['c_code'];
        $q_name=$_POST['qname'];
        $q_info=$_POST['qinfo'];
        $q_duedate=$_POST['qdate'];
        $q_startdate=$_POST['qstartdate'];

        date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
        $current= date("Y-m-d H:i:s");
       // $currentdate=date("Y-m-d H:i:s",strtotime($current));
       $qstartdate=date("Y-m-d H:i:s",strtotime($q_startdate));
       $qduedate=date("Y-m-d H:i:s",strtotime($q_duedate));

        $count=0;
        $min_q=0;

        if($q_startdate!='' || $q_duedate!='' )
    {
        $sql3= " SELECT * FROM quiz WHERE q_name='$q_name' &&  c_code='$tc_code' ";
        $result3= $conn->query($sql3);
        if (!preg_match("/[0-9]{0,2}[a-zA-Z]{2,100}[a-zA-Z0-9 ]*$/",$q_name)) {  
            echo $return = " Invalid Quiz Name!"; 
                   
        }  
        else if($result3->num_rows>0){
            echo $return ="Similer Quiz Name Exist!";
          //  echo '<script>$( "#alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
            $count=1;
         
 
        }
        else if($current>$qstartdate){
            echo $return ="Start time is smaller than current time!";
            $count=1;
          } 
        else if($current>$qduedate){
            echo $return ="Duetime is smaller than current time!";
            $count=1;
          } 
        else if($qstartdate>=$qduedate )
        {
            echo $return ="Due time is smaller than scheduled time!";
           // echo '<script>$( "#alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
            $count=1;
            
 
        }
        else{
        
        $a[1]= $_POST["ans1"];
        $a[2]= $_POST["ans2"];
        $a[3]= $_POST["ans3"];
        $a[4]= $_POST["ans4"];
        $a[5]= $_POST["ans5"];
        $a[6]= $_POST["ans6"];
        $a[7]= $_POST["ans7"];
        $a[8]= $_POST["ans8"];
        $a[9]= $_POST["ans9"];
        $a[10]= $_POST["ans10"];
        
        $b[1]= $_POST["ques1"];
        $b[2]= $_POST["ques2"];
        $b[3]= $_POST["ques3"];
        $b[4]= $_POST["ques4"];
        $b[5]= $_POST["ques5"];
        $b[6]= $_POST["ques6"];
        $b[7]= $_POST["ques7"];
        $b[8]= $_POST["ques8"];
        $b[9]= $_POST["ques9"];
        $b[10]= $_POST["ques10"];
        
           
         for($j=1;$j<11;$j++){
           
         //    $a[$j]= $_POST["ans$j"];
         //    $b[$j]= $_POST["ques$j"];
             if($b[$j]!=''){
                 $min_q++;
             }
            
            
             }
                     
         if($min_q<5){
             //echo '<script>alert("Please set a minimum of 5 questions!")</script>';
             echo $return ="Please set a minimum of 5 questions!";
       // echo '<script>$( "#alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
         }
         
         else
         {
             for($j=1;$j<=$min_q;$j++){
                
                 if($b[$j]=='' && $a[$j]=='NULL'){
                   //  echo '<script>alert("Set the questions serially!")</script>';
                     echo $return ="Set the questions serially!";
              //       echo '<script>$( "#alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
                     $count=1;
                     break;
 
                 }
 
             }
             
             for($j=1;$j<11;$j++){
                 if($b[$j]!='' && $a[$j]=='NULL'){
                 //    echo '<script>alert("Please set answer for all the questions!")</script>';
                     echo $return ="Please set answer for all the questions!";
                //     echo '<script>$( "#alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
                     $count=1;
     
                     break;
 
             } else if($b[$j]=='' && $a[$j]!='NULL'){
                echo $return ="Please first set the questions and then answers!";
                $count=1;
                break;
            }
         }
        
     }
         
 
 
 
 if($min_q>=5 && $count==0){
       
 $sql = "INSERT INTO quiz(c_code, q_name, q_info,q_startdate, q_duedate, ques1, ques2, ques3, ques4, ques5, ques6, ques7, ques8, ques9, ques10, q_ans1, q_ans2, q_ans3, q_ans4, q_ans5, q_ans6, q_ans7, q_ans8, q_ans9, q_ans10) 
         VALUES ('$tc_code','$q_name', '$q_info','$q_startdate', '$q_duedate', '$b[1]','$b[2]','$b[3]','$b[4]','$b[5]','$b[6]','$b[7]','$b[8]','$b[9]','$b[10]', '$a[1]','$a[2]','$a[3]','$a[4]','$a[5]','$a[6]','$a[7]','$a[8]','$a[9]','$a[10]')";
         
         if($conn->query($sql)==TRUE){
        

             echo $return ="Congrats!! Quiz Uploaded Successfully";
             echo '<script>document.getElementById("quizalert_show").classList.remove("alert-danger");</script>';
             echo '<script>document.getElementById("quizalert_show").classList.add("alert-success");</script>';
         
           
            echo '<script>$( "#schedule_quiz" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 300 );</script>';
            //echo '<script> setTimeout(function(){window.location.reload("takeQuiz.php"); },2000); </script>';
            echo "<script> setTimeout(function(){location.href='takeQuiz.php';},2000); </script>";
             //echo '<script> setTimeout(() => window.location.reload("takeQuiz.php"), 2000); </script>';
         }
         else{
            // echo'<script>alert( "Unable to post Quiz");</script>';
             echo $return ="Unable to post Quiz!";
            // echo '<script>$( "#alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );</script>';
           //  echo "<script> location.href='takeQuiz.php'; </script>";
         }
     }
    }
} 
        }
   
?>