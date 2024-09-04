<?php
  include('dbconnection.php');
  session_start();
  echo'<script>alert( "2ND PAGE!");</script>';

  date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
    //echo "Todays ".date("Y-m-d h:i:s");
    $currentdate= date("Y-m-d H:i:s");

    
  
    $count1=$_SESSION['count'];


    for($j=1;$j<=$count1;$j++){
         
        $a[$j]= $_POST[$j];
          
      
      
      }
      
      $sql4="SELECT * FROM quiz WHERE q_id='$q_id'";
      $result4 = $conn->query($sql4);
    if($result4->num_rows > 0){
  
        while($row = $result4->fetch_array()){
            $b[1]=$row['q_ans1'];
            $b[2]=$row['q_ans2'];
            $b[3]=$row['q_ans3'];
            $b[4]=$row['q_ans4'];
            $b[5]=$row['q_ans5'];
            $b[6]=$row['q_ans6'];
            $b[7]=$row['q_ans7'];
            $b[8]=$row['q_ans8'];
            $b[9]=$row['q_ans9'];
            $b[10]=$row['q_ans10'];
          

        }

    } $marks=0;
    for($i=1;$i<=$count1;$i++){
        if($a[$i]==$b[$i]){
            $marks++;
        }
    }
    //echo $c[1];
    

    $sql5="INSERT INTO quiz_marks(s_user_name,s_full_name,q_id, q_marks)
    VALUES ('$susername', '$sfullname', '$q_id', '$marks')";
    if($conn->query($sql5)== TRUE){
       
        echo "<script> location.href='student_take_quiz.php'; </script>";
     
        echo'<script>alert( "Answers submitted successfully!");</script>';
    }
    else{
        echo'<script>alert( "Error: Answers not Submitted");</script>';
       echo "<script> location.href='student_take_quiz.php'; </script>";
       
    }








  ?>