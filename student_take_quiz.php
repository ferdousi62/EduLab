<?php
    include('dbconnection.php');
    session_start();
    if (isset($_SESSION['is_slogin']) && $_SESSION['is_slogin'] == true) {
      
        $semail = $_SESSION['login_semail'];
    } else {
        echo '<script>alert("Please Login as a student first!"); </script>';
        echo "<script> location.href='homepage.php'</script>";
    }
    if(isset($_REQUEST['sc_code']) && isset($_REQUEST['scourse_name'])){
        $_SESSION['sc_code']= $_REQUEST['sc_code'];
        $sc_code= $_SESSION['sc_code'];
        $_SESSION['scourse_name']= $_REQUEST['scourse_name'];
        $scourse_name= $_SESSION['scourse_name'];
        }
        else
        {
            $sc_code= $_SESSION['sc_code'];
            $scourse_name= $_SESSION['scourse_name'];
        }
    

    $sql2= "SELECT * FROM s_course WHERE s_user_name='".$_SESSION['login_susername']."'";
    $susername= $_SESSION['login_susername'];
    
    $result2= $conn->query($sql2);
    
    
      
    if($result2->num_rows>0){
        
       } else {
        echo "<script> location.href='studentHomepage.php'; </script>";
       }
    
       
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $scourse_name?> | EduLab</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,500&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet" />



<link rel="stylesheet" href="css/teacherHomepageStyle.css">
<link rel="stylesheet" href="css/class.css">
<link rel="stylesheet" href="css/classMetarial.css">
<link rel="stylesheet" href="css/assignment.css">

<style>
    
button.edit_btn.btn.btn-primary:hover {
    color: black;
    background: border-box;
}




.list-group-item+.list-group-item.active {
    margin-top: 1px;
    border-top-width: 0px;
    background-color: #2220af;
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
   
    border-color: #007bff;
    background: #2220af;
  border-left: none;
}
  


.list-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 0;
    margin: 18px;
    
}

.nav_background {
  background-image: linear-gradient( 
15deg, #2220af 16%, #2196f3 79%);
}
.sidebar_background {
  background-image: linear-gradient( 
15deg, #2220af 16%, #2087d9  79%);
}
.shadow{
  border: 1px solid;
  color: white;
  box-shadow: 5px 10px 8px 5px #888888;
}.text1 {
  text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);
}

.text2 {
text-shadow: 0 1px 0 #ccc, 
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);
               0 30px 20px rgba(0,0,0,.1);              
}

.text3 {
  text-shadow: 0px 3px 2px #ccc, 
               0px 8px 10px rgba(0,0,0,0.15), 
               0px 12px 2px rgba(0,0,0,0.7);
        
}

.text4 {
  text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);
}

.text5 {
 -webkit-text-stroke: 1px #F8F8F8;
  text-shadow: 0px 1px 4px #23430C;
  color: #4a7e4e;
}

.text6 {
     text-shadow: 0 13.36px 8.896px #2c482e, 0 -2px 1px #aeffb4;
    letter-spacing: -4px;
    color: #6fb374;
}

.demo-content.bg-alt {
    background: aliceblue;
    border-radius: 7px;
    margin-top: 11px;
    margin-left: 8px;
}
.side_bar {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 1px;
    margin: 0px;
}
.course_title {
    font-weight: 100;
    font-size: 28px;
    font-family: auto;
    border-block: initial;
    border-block-width: initial;
    background: white;
    border-radius: 6px;
    height: 132px;
    margin-bottom: 81px;
    border-style: groove;
    text-align: center;
}
textarea.form-control {
    height: auto;
    font-family: 'Oswald';
}
.post_date {
    font-size: 15px;
    font-style: revert;
    font-family: 'Oswald';
}
.t_post {
    font-family: auto;
    font-size: 19px;
    font-weight: inherit;
    border-style: groove;
    letter-spacing: 1px;
    font-family: 'Oswald';
    color: #00000099;
}

.date {
    font-weight: 100;
    font-size: 24px;
    font-family: 'Oswald';

   
    
}
.usertitle {
    font-family: 'Roboto Condensed';
    font-size: 23px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 7px; 
   color: white;
}
.show_assignment.bg-alt {
    background: white;
    padding: 6px;
    border-radius: 6px;
    font-family: 'Roboto Condensed';
    font-size: 18px;
    margin-bottom: 12px;
}
.t_name {
    font-weight: 100;
    font-family: 'Oswald';
    font-size: 21px;
}

.modal.show .modal-dialog {
    -webkit-transform: none;
    transform: none;
   
    transition-duration: .5s;
    transform-style: preserve-3d;
}

.color1{
    background: linear-gradient(to right, #e3e8eb, #bdcad5)
}

.color2{
    background: linear-gradient(to right, #e1e0ff, #d7fadd);
}
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
    background: linear-gradient(to right, #100f3e3b, #0f0f2252)
}
label {
    font-weight: 100;
    font-family: 'Oswald';
    letter-spacing: 1px;
}
.text6 {
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}
input, textarea {
    border-radius: 7px;
    font-family: 'Oswald';
    box-shadow: 1px 1px 8px 2px #888888;
    color: #000000b8;
}

</style>
</head>
<body>
<!--Navbar-->
    <div class="nav fixed-top nav_background shadow">
        
            <div class="logo mr-auto">
            <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
            </div>
        <ul style="  font-family: 'Oswald', sans-serif;">
            <li><a href="studentHomepage.php">Home</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            
            
            <li><a href="#joinCourse" role="button" data-toggle="modal">Join Class </a></li>
            <li><a href="logout.php" > Log Out </a></li>
        </ul>
    </div>



<!--strat greed system-->
<div class="container customclass " style="margin-top: 45px;"  data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
            <div class="col-md-2 sidebar_background"id="myScrollspy">
           
<!--side menu-->
    
<div class="list-group"  action = "<?php $_PHP_SELF ?>" method = "GET"style="  font-family: 'Oswald', sans-serif;text-align: center;"> 
<a href="studentclass.php"  class="list-group-item list-group-item-action active" >Post</a>
    <a href="studentclassMaterial.php" class="list-group-item list-group-item-action active">Class Materials</a>
    <a href="student_take_quiz.php" class="list-group-item list-group-item-action active"style="background:#2196f3;">Quiz </a>
    <a href="studentassignment.php" class="list-group-item list-group-item-action active" >Assignment </a>
    <a href="student_questionBank.php" class="list-group-item list-group-item-action active"> Question Bank </a>
</div>

            </div>

<!--course title-->
            <div class="col-md-10">
              <div class="demo-content bg-alt">
                  <div class="col-md-12">
                    <div class="course_title text2" style="font-family: 'Oswald', sans-serif;text-align: center;height: 112px;margin-bottom: 27px;">
                        <?php 
                        
                        echo $scourse_name; ?>
                    </div>
                  </div>
                

<!--Show all Assignment-->
            <div class="row">
            <div class="col-md-8">
              
              <?php
             $sql= "SELECT * FROM quiz WHERE c_code='".$sc_code."' ORDER BY q_date DESC";
             

    
             if($result = $conn->query($sql)){
    
                if($result->num_rows > 0){

    
        
                    while($row = $result->fetch_array()){
          
                
           ?>


           <div class="col-md-12">
           <div class="show_assignment bg-alt">
          
            <div class="inline"style="display: -webkit-box;">
            <div class="t_name" style="width: 78%;">  <?php echo $row['q_name']; ?> <br></div>
            
<?php
$qid= $row['q_id'];
$sql2= "SELECT * FROM quiz_marks WHERE q_id='$qid' AND s_user_name='$susername' limit 1";

$result2 = $conn->query($sql2);
if($result2->num_rows > 0){

    while($row2 = $result2->fetch_array()){
        if($row2['q_marks'] != NULL){
        ?>
        <div class="marks" style=" font-family: 'Oswald', sans-serif; color: #075e2e;">Marks Obtained: <?php echo $row2['q_marks']; ?></div>
        <?php
        }
    }
}

?>
</div>
            <div class="status" style="color: #819092eb;">
            <?php 
            $due= $row['q_duedate'];
          //  $duedate=date_format($due, 'Y-m-d h:i:s');
           $duedate= date("Y-m-d H:i:s",strtotime($due));
            
            $start= $row['q_startdate'];
           // $startdate= date_format($start, 'Y-m-d h:i:s');
            $startdate= date("Y-m-d H:i:s",strtotime($start));
            
            date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
            //echo "Todays ".date("Y-m-d h:i:s");
            $currentdate= date("Y-m-d H:i:s");
           // echo $current;
           // $currentdate= date('Y-m-d H:i:s',strtotime($current));
            //echo $currentdate;
            if($currentdate>=$startdate && $currentdate<$duedate) 
            {?>
            <div style=" width: -webkit-fill-available;color: #17682cd4;font-weight: 600;">
            Quiz Started
            </div>
           
           <?php }
            else if($currentdate>=$duedate)
            { ?>
            <div style=" width: -webkit-fill-available;color: #17682cd4;font-weight: 600;">
            Quiz Ended
            </div>
                
           <?php }
            else if($currentdate<$startdate)
            { ?>
            <div style="display: inline-flex; width: -webkit-fill-available;color: #17682cd4;font-weight: 600;">
            <div style="   padding-right: 9px; "> Quiz will start at: </div><?php echo date("Y-m-d h:iA",strtotime($startdate)); ?>
            </div>
              
          <?php  }?>
            </div>
            <?php
            echo   $row['q_info'] . "<br>";
           ?>
          
            
          
          <div style="display: inline-flex; width: -webkit-fill-available;font-weight: 600;color: #000000d4;">
            <div style="   padding-right: 9px; "> Upload time: </div><?php echo date("Y-m-d h:iA",strtotime($row['q_date'])); ?>
            </div>
            <div style="display: inline-flex; width: -webkit-fill-available;color: #891212d4;font-weight: 600;">
            <div style="  padding-right: 9px;  "> Submission Deadline: </div><?php echo date("Y-m-d h:iA",strtotime($row['q_duedate'])); ?>
            </div>  
              <?php
              $sql4= "SELECT * FROM quiz_marks WHERE s_user_name= '$susername' AND q_id='".$row['q_id']."'";
              $result4=$conn->query($sql4);
              
              if($result4->num_rows > 0)
              {
                  ?>
                  <div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> Quiz Submitted
    
</div> <?php

              }
            

              

              else if($currentdate>=$startdate && $currentdate<$duedate)
              {?>

<div class="submission_show"><button class="btn btn-primary mr-auto">
                  <a href="student_quiz_submit.php?q_id=<?php echo $row['q_id']; ?>" style="color: white;">Start Quiz</a></button><br></div>
                <?php
                }
              else if($currentdate >= $duedate){
                  ?>
                <div class="alert alert-danger alert-dismissible fade show">
                <strong>OH!</strong> You haven't submitted
                
            </div>

              
             
              
              <?php }?>
            </div>
            </div>
    
              <?php

              }
            
        }
    

             }
            
             
?>
   </div>
            <div class="col-md-4">
              <div class="schedule " style="background: white;">
              <div class="date">
              <?php
              
              date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
              //echo "Todays ".date("Y-m-d h:i:s");
              echo date("Y-F j-l ");
                ?>
              </div>
             
          
            
            </div>
     </div> 

        
           
 

        </div>
        
        </div>   
    </div>
  


   
<!--Popup JoinClass Form-->
<div class="bs-example">
    
    
    <div id="joinCourse" class="modal fade" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title"style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Join Class</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <div class="bs-example" style="font-family: 'Roboto Condensed';letter-spacing: 1px;">
                <form onsubmit="return false;" action="studentHomepage.php" method="post">
                <input type="hidden" class="custom-post-input" id="susername" value="<?php echo $susername; ?>">
                <input type="hidden" class="custom-post-input" id="sfullname" value="<?php echo $sfullname; ?>">

                <div class="form-group">
            <label for="courseCode">Join Code</label>
            <input type="text" class="form-control" id="courseCode" name="c_code" placeholder="Enter Joining Code" required>
        </div>
        <div id="joinclass_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display: contents;">
                   <strong> <div class="joinclass_alert_show"style="font-family: 'FontAwesome';"></div></strong>
                </div>
        <div class="modal-footer" style="font-family: 'Oswald';">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary joinclass_btn" name="joinclass_btn">Join</button>
                </div>
        
    </form>
    
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
   
$(document).ready(function () {
  //  getdata();
 
         $('.joinclass_btn').click(function (e) { 
         
       var susername= $('#susername').val();
       var sfullname= $('#sfullname').val();
       var courseCode= $('#courseCode').val();
    
      
       if(courseCode=='') {
        document.getElementById("joinclass_alert_show").style.visibility = "visible";
        document.getElementById("joinclass_alert_show").style.display = "flex";
        $('.joinclass_alert_show').html("empty field!");
       // $( "#joinclass_alert_show" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 600 );
       // $("#treg_alert_show").show();

       }
     
       else{
       
$.ajax({
    type: "POST",
    url: "studentLoginProcess.php",
    data: {
        'checking_joinclass_btn' : true,
                  'susername': susername,
                  'sfullname': sfullname,
                  'courseCode': courseCode,
                
                  
                  
    },
   
    success: function (response) {
        // $('.modal_body_class').html(response);
                  //$('#modal_id').modal('show');
        document.getElementById("joinclass_alert_show").style.visibility = "visible";
        document.getElementById("joinclass_alert_show").style.display = "flex";
         $('.joinclass_alert_show').html(response);
    }
});
      
       }
   });

});
  
</script> 


</body>
</html>