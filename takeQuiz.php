<?php
    include('dbconnection.php');
    session_start();
    if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) {
       
        $temail = $_SESSION['login_temail'];
    } else {
        echo '<script>alert("Please Login as a teacher first!"); </script>';
        echo "<script> location.href='homepage.php'</script>";
    }
    
    if(isset($_REQUEST['tc_code']) && isset($_REQUEST['course_name'])){
        $_SESSION['tc_code']= $_REQUEST['tc_code'];
        $tc_code= $_SESSION['tc_code'];
        $_SESSION['course_name']= $_REQUEST['course_name'];
        $course_name= $_SESSION['course_name'];
        }
        else
        {
            $tc_code= $_SESSION['tc_code'];
            $course_name= $_SESSION['course_name'];
        }
    
    
    $sql2= "SELECT * FROM course WHERE user_name='".$_SESSION['username']."'";
    $tusername= $_SESSION['username'];
    $result2= $conn->query($sql2);
    
    
      
    if($result2->num_rows>0){
        
       } else {
        echo "<script> location.href='teacherHomepage.php'; </script>";
       }

      
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $course_name?> | EduLab</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<link rel="stylesheet" href="datetime/jquery.timepicker.css">


<script src="datetime/jquery.timepicker.js"></script>



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

.containe.mt-5 {
    display: content;
}
form.mb-3 {
    display: grid;
}

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
.a_file {
    border-block: initial;
    border: 1px dotted #03a9f44a;
    cursor: pointer;
    background: #c0d1d93b;
    text-align: center;
    font-family: 'Oswald';
    letter-spacing: 1px;
} 


button.btn {
    block-size: auto;
    border-block: initial;
    background: #2087d9b5;
    border: outset;
    margin-bottom: 6px;
    font-family: 'Roboto Condensed';
    font-size: 16px;
    margin-top: 8px;
}
.dropdown-item button {
    display: block;
    width: 100%;
    padding: 0.25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    font-family: 'Oswald';
    letter-spacing: 1px;
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
.usertitle {
    font-family: 'Roboto Condensed';
    font-size: 23px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 7px; 
   color: white;
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
            <li><a href="teacherHomepage.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
           
            
            <li><a href="#createCourse" role="button" class="" data-toggle="modal">Create Class</a></li>
            <li><a href="logout.php"> Log Out </a></li>
        </ul>
    </div>



   

<!--strat greed system-->
<div class="container customclass " style="margin-top: 45px;" data-spy="scroll" data-offset="15" data-target="#myScrollspy" >
        <div class="row">
            <div class="col-md-2 sidebar_background"id="myScrollspy">
             
<!--side menu-->

<div class="list-group"  action = "<?php $_PHP_SELF ?>" method = "GET"  style="  font-family: 'Oswald', sans-serif;text-align: center;"> 
    <a href="class.php"  class="list-group-item list-group-item-action active" >Post</a>
    <a href="classMaterial.php" class="list-group-item list-group-item-action active">Class Materials</a>
    <a href="takeQuiz.php" class="list-group-item list-group-item-action active" style="background:#2196f3;">Take Quiz </a>
    <a href="assignment.php" class="list-group-item list-group-item-action active"> Take Assignment </a>
    <a href="question_bank.php" class="list-group-item list-group-item-action active"> Question Bank </a>
    <a href="student_list.php" class="list-group-item list-group-item-action active"> Students </a>

</div>

            </div>

<!--course title-->
            <div class="col-md-10">
            <div class="demo-content bg-alt">
            <div class="col-md-12 course_title"style="font-family: 'Oswald', sans-serif;text-align: center; height: 112px;margin-bottom: 27px;">
                    <div class=" text2" >
                        <?php 
                        
                        echo $course_name; ?> </div>
                        <div class="join"style="margin-top: 4px;font-size: 21px;">Join Code: <?php echo $tc_code; ?></div>
                   
                  </div>

<!--Show all Assignment-->
            <div class="row">
            <div class="col-md-8">
              












            <?php
             $sql= "SELECT * FROM quiz WHERE c_code='".$tc_code."' ORDER BY q_date DESC";
             $sql2= "SELECT * FROM course WHERE c_code='".$tc_code."'";
             if($result2 = $conn->query($sql2)){

    
             if($result = $conn->query($sql)){
                if($result2->num_rows > 0){

    
                if($result->num_rows > 0){
                    while($row2 = $result2->fetch_array()){

    
        
                    while($row = $result->fetch_array()){
                        date_default_timezone_set('Asia/Dhaka');
                        $currentdate= date("Y-m-d H:i:s");
                        //$currentdate=date("Y-m-d H:i:s",strtotime($current));
                        $startdate=date("Y-m-d H:i:s",strtotime($row['q_startdate']));
                       

                
           ?>
           <div class="col-md-12">
           <div class="show_assignment bg-alt">
           




           <div class="inline"style="display: -webkit-box;">

<div class="t_name" style="width: 97%;">  <?php echo $row['q_name']; ?> <br></div>
<?php

if($currentdate<$startdate){
?>
<!--Dropdown menu-->
           <div  id="test">
  <div class="dropdown" style="text-align: end;">
    <a data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
    <div class="dropdown-menu">
    
    
    <div class="dropdown-item"><a>
    <button type="button" class="edit_btn btn btn-primary" data-toggle="modal" data-target="#edit_quiz" data-title=" <?php echo $row['q_id']; ?>">
    Edit</button></a></div>

     <div class="dropdown-item">   <a href="delete-process-assignment.php?a_id=<?php echo $row["q_id"]; ?>">
     <button>Delete</button></a>
    </div>
     
    </div>
  </div>
</div>
<?php } ?>
    <script>
    //script for dropdown menu
$('a[data-toggle="dropdown"]').click(function() {
  dropDownFixPosition($(this), $('.dropdown-menu'));
});

function dropDownFixPosition(a, dropdown) {
  var dropDownTop = a.offset().top + a.outerHeight();
  dropdown.css('top', dropDownTop + "px");
  //Delete - dropdown.width() if you want menu to be bottom right of link
  dropdown.css('left', a.offset().left - dropdown.width() + "px");
}
</script>
</div>

<!--End Dropdown menu-->

          
            <div class="status" style="color: #819092eb;">
            <?php 
            $duedate= $row['q_duedate'];
           // echo $due;
          //  $duedate=date("Y-m-d h:iA",strtotime($due));
            //echo $duedate;
            date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
            //echo "Todays ".date("Y-m-d h:i:s");
           
            if($currentdate<$duedate) 
            {
             echo "Unlock<br>";
            }
            else if($currentdate>=$duedate)
            {
                echo "Locked<br>";
            }
            else
            {
                echo "Somethings wrong<br>";
            }?>
            </div>
            <?php
            echo   $row['q_info'] . "<br>";
            ?>

            <div style="display: inline-flex; width: -webkit-fill-available;font-weight: 600;color: #000000d4;">
            <div style="   padding-right: 9px; "> Upload time: </div><?php echo date("Y-m-d h:iA",strtotime($row['q_date'])); ?>
            </div>
            <div style="display: inline-flex; width: -webkit-fill-available;color: #17682cd4;font-weight: 600;">
            <div style="   padding-right: 9px; "> Starting time: </div><?php echo date("Y-m-d h:iA",strtotime($row['q_startdate'])); ?>
            </div>
            <div style="display: inline-flex; width: -webkit-fill-available;color: #891212d4;font-weight: 600;">
            <div style="  padding-right: 9px;  "> Submission Deadline: </div><?php echo date("Y-m-d h:iA",strtotime($duedate)); ?>
            </div>

              <form method="post" action="view_quiz.php">
              <input type="hidden" name="q_id" value="<?php echo $row['q_id']; ?>">
              <div class="submission_show"><button class="btn btn-primary mr-auto"> View Submission </button><br></div>
              </form>
              
            </div>
            
            </div>
         
              <?php


            
        }
    }
}
}

             }
            }
             
?>




















            
   </div>
            <div class="col-md-4">
              <div class="schedule " style="background: white; box-shadow: 0px 3px 8px 2px #888888; ">
              <div class="date">
              <?php
              
            //  date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
              //echo "Todays ".date("Y-m-d h:i:s");
              echo date("Y-F j-l ");
                ?>
              </div>
             
            <div class="schedule_button" >
            <a href="#schedule_quiz"  data-toggle="modal" >
            <svg width="24" height="24" viewBox="0 0 24 24" name="plus-icon">
            <path fill= "#000000b5" fill-rule="evenodd" stroke="none" stroke-width="1" id="Icon/small/plus" d="M13 11h4a1 1 0 010 2h-4v4a1 1 0 01-2 0v-4H7a1 1 0 010-2h4V7a1 1 0 012 0v4z">
            </path>
            </svg>
            Schedule Quiz</a>
            </div>
            
            
            </div>
     </div> 

        
           
 

        </div>
        
        </div>   
    </div>
  











    
<!--Popup CreateClass Form-->
<div class="bs-example ">
    
    
    <div id="createCourse" class="modal fade " tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Create Class</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <div class="bs-example" style="font-family: 'Roboto Condensed';letter-spacing: 1px;">
                <form onsubmit="return false;" action="teacherHomepage.php" method="post">
    <div class="form-group">
            <label for="courseName">Username</label>
            <input type="text" class="form-control"  id="tusername" value="<?php echo $tusername; ?>"  readonly>
        </div>
        <input type="hidden" class="custom-post-input" id="tfullname" value="<?php echo $tfullname; ?>">
        <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" class="form-control"  id="tcourse_name" placeholder="Enter Course Name" required>
        </div>
        <div class="form-group">
            <label for="courseDetail">Course details</label>
            <input type="text" class="form-control"  id="tcourse_details" placeholder="Enter Course Details" required>
            
        </div>
        <div id="createclass_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display: contents;">
                   <strong> <div class="createclass_alert_show"style="font-family: 'FontAwesome';"></div></strong>
                </div>
        <div class="modal-footer" style="font-family: 'Oswald';">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary creatclass_btn" name="createcourse_btn">Create</button>
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
 
         $('.creatclass_btn').click(function (e) { 
         
       var tusername= $('#tusername').val();
       var tfullname= $('#tfullname').val();
       var tcourse_name= $('#tcourse_name').val();
       var tcourse_details= $('#tcourse_details').val();
      
    
      
       if(tcourse_name=='' || tcourse_details==''  ) {
        document.getElementById("createclass_alert_show").style.visibility = "visible";
        document.getElementById("createclass_alert_show").style.display = "flex";
        $('.createclass_alert_show').html("empty field!");
     
       // $("#treg_alert_show").show();

       }
     
       else{
       
$.ajax({
    type: "POST",
    url: "studentLoginProcess.php",
    data: {
        'checking_createclass_btn' : true,
                  'username': tusername,
                  'fullname': tfullname,
                  'course_name': tcourse_name,
                  'course_details': tcourse_details,
                   
    },
   
    success: function (response) {
        // $('.modal_body_class').html(response);
                  //$('#modal_id').modal('show');
        document.getElementById("createclass_alert_show").style.visibility = "visible";
        document.getElementById("createclass_alert_show").style.display = "flex";
         $('.createclass_alert_show').html(response);
    }
});
      
       }
   });

});
  
</script> 

   

<!--Popup Schedule Exam Form-->
<div class="bs-example">
    
    
    <div id="schedule_quiz" class="modal fade" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Schedule Quiz</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <div class="bs-example" style="font-family: 'Roboto Condensed';letter-spacing: 1px;">
    <form onsubmit="return false;" action="takeQuiz.php" method="post" enctype="multipart/form-data">
    <input type="hidden" class="custom-post-input" name="c_code" id="c_code" value="<?php echo $tc_code;?>">
        <div class="form-group col-md-12">
            <label for="QuizName " class="col-md-2">Quiz Name</label>
            <input type="text" class="custom-post-input col-md-8" name="qname" id="qname"required>
        </div>
        <div class="form-group col-md-12">
            <label for="QuizInfo" class="col-md-2">Quiz Info</label>
            <textarea rows="2" class="custom-post-input col-md-8" name="qinfo" id="qinfo" required></textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="ScheduleDate" class="col-md-3">Schedule Time</label>
            <input type="datetime-local" class="custom-post-input" name="qstartdate" id="qstartdate" required>
        </div>
        <div class="form-group col-md-12">
            <label for="DueDate" class="col-md-3">Due Date</label>
            <input type="datetime-local" class="custom-post-input" name="qduedate" id="qdate" required>
        </div>
        <script>
function adjust(v){
if(v>9){
return v.toString();
}else{
return '0'+v.toString();
}
}
 $(document).ready(function(){
        var today = new Date();
var date = today.getFullYear()+'-'+adjust(today.getMonth()+1)+'-'+adjust(today.getDate());
var time = adjust(today.getHours()) + ":" + adjust(today.getMinutes());
var dateTime = `${date}T${time}`;
//its working
//alert(dateTime);
$("#qdate").attr('min', dateTime);
$("#qstartdate").attr('min', dateTime);
//$("#dateInput").attr('value', dateTime);
});


//$("#dateInput").attr('min',new Date().toJSON().slice(0,19));
</script>

        <div class="que"style="text-align: center;font-size: 20px;text-decoration: underline;">Set Question Paper</div>

<div style="display: inline-flex; width: -webkit-fill-available;">
            <div style="color: #17682cd4;font-weight: 600;width: 215px;"> Sample Question: </div> Which one of the following refers to the "data about data"?
a.Directory
b.Sub Data
c.Warehouse
d.Meta Data
            </div>
        <div class="containe mt-5">
  <?php
      for($i=1;$i<11;$i++){ 
      ?>
      <div class="form-group col-md-12" style="display: inline-flex;">
            <label for="quizQue" class="col-md-2">Ques <?php echo $i;?></label>
            <textarea rows="2" type="text" class="custom-post-input col-md-9" name="ques<?php echo $i;?>" id="ques<?php echo $i;?>"></textarea>
        </div>
   
      <div class="select-block form-group col-md-12"style="display: inline-flex; ">
        <div class="col-md-3"style="font-family: 'Roboto Condensed';font-weight: 600;color: #104425;">
        Choice Answer: 
        </div>
        
        <select name="<?php echo $i;?>" id="ans<?php echo $i;?>" >
          <option value="NULL" disabled hidden> Ques<?php echo $i;?></option>
          <option value="NULL" selected="selected">
          Select an Option
      </option>
          <option value="a">a</option>
          <option value="b">b</option>
          <option value="c">c</option>
          <option value="d">d</option>
          
        </select>
        
      
      </div>
<?php } ?>
     
    


    
  </div>
    
        
        </div>
                <div class="modal-footer" style="font-family: 'Oswald';">
                <div id="quizalert_show"class="alert alert-danger alert-dismissible fade show" style="visibility: hidden;display: contents;">
                   <strong><div class="quizalert_show"style=" font-family: 'FontAwesome';"></div></strong>
                </div>
                    <button type="submit" name="submit" class="btn btn-primary quiz_upload">Submit</button>
                 
                    
                </div>
    </form>
                
            </div>
        </div>
    </div>
</div>

<?php

?>
<script>
 

$(document).ready(function () {
  //  getdata();
 
         $('.quiz_upload').click(function (e) { 
          
       var c_code= $('#c_code').val();
       var qname= $('#qname').val();
       var qinfo= $('#qinfo').val();
       var qdate= $('#qdate').val();
       var qstartdate= $('#qstartdate').val();

    var ques1= $('#ques1').val();
    var ques2= $('#ques2').val();
    var ques3= $('#ques3').val();
    var ques4= $('#ques4').val();
    var ques5= $('#ques5').val();
    var ques6= $('#ques6').val();
    var ques7= $('#ques7').val();
    var ques8= $('#ques8').val();
    var ques9= $('#ques9').val();
    var ques10= $('#ques10').val();

    //var ans1=$("#ans1 option:selected").val();
    var ans1= $("#ans1 option:selected").val();
    var ans2= $("#ans2 option:selected").val();
    var ans3= $("#ans3 option:selected").val();
    var ans4= $("#ans4 option:selected").val();
    var ans5= $("#ans5 option:selected").val();
    var ans6= $("#ans6 option:selected").val();
    var ans7= $("#ans7 option:selected").val();
    var ans8= $("#ans8 option:selected").val();
    var ans9= $("#ans9 option:selected").val();
    var ans10= $("#ans10 option:selected").val();
  //$("select.ans1").change(function(){
  //      var ans1 = $(this).children("option:selected").val();
  //  });
    
       if(qname==''||qinfo==''||qdate==''||qstartdate=='') {
        document.getElementById("quizalert_show").style.visibility = "visible";
        document.getElementById("quizalert_show").style.display = "flex";
        $('.quizalert_show').html("Empty field!");
      //  $( "#quizalert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       }else{
    

       
$.ajax({
    type: "POST",
    url: "aid.php",
    data: {
        'checking_q_upload' : true,
                  
                  'c_code':c_code,
                  'qname': qname,
                  'qinfo': qinfo,
                  'qdate': qdate,
                  'qstartdate':qstartdate,
                  'ques1': ques1,
                  'ques2': ques2,
                  'ques3': ques3,
                  'ques4': ques4,
                  'ques5': ques5,
                  'ques6': ques6,
                  'ques7': ques7,
                  'ques8': ques8,
                  'ques9': ques9,
                  'ques10': ques10,
                  'ans1': ans1,
                  'ans2': ans2,
                  'ans3': ans3,
                  'ans4': ans4,
                  'ans5': ans5,
                  'ans6': ans6,
                  'ans7': ans7,
                  'ans8': ans8,
                  'ans9': ans9,
                  'ans10': ans10,



    },
   
    success: function (response) {
        // $('.modal_body_class').html(response);
                  //$('#modal_id').modal('show');
                  document.getElementById("quizalert_show").style.visibility = "visible";
           document.getElementById("quizalert_show").style.display = "flex";
                  $('.quizalert_show').html(response);
    }
});
       }
    
   });

});
</script>



<!--Popup for Edit quiz-->  
<div id="edit_quiz" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content color1">
                
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Edit Quiz</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"> 
                    
                    
    <form  onsubmit="return false;" action="takeQuiz.php" method="post" style="font-family: 'Roboto Condensed';letter-spacing: 1px;" >
    <input type="hidden" class="custom-post-input" name="aid" id="q_id">

    <div class="col-md-12">
<div class="custom-file row">
<label class="custom-post-label col-md-3" >Quiz Name</label>
  <input type="text" class="custom-post-input col-md-9" name="qname" id="q_name">
  <input type="hidden" class="custom-post-input" name="q_p_name" id="q_p_name">
  </div>

  <div class="custom-file row">
  <label class="custom-post-label col-md-3">Quiz Info</label>
  <textarea rows="2" class="custom-post-input col-md-9" name="qinfo" id="q_info"></textarea> 
</div>

<div class="custom-file row" style="margin-top: 28px;">
<label class="custom-post-label col-md-3">Due Date</label>
<div class="showdate col-md-9" style="display: flex;  padding-left: 0px;">
<input type="hidden" class="custom-post-input" name="qduedate" id="past_date">
<input type="datetime-local" class="custom-post-input col-md-6" name="qduedate" id="q_date" >
  <p class="col-md-3"id="date_show" style="display: contents;font-family: 'Oswald';"></p>
</div>
</div>


<div class="custom-file row" >
<label class="custom-post-label col-md-3">Schedule Time</label>
<div class="showdate col-md-9" style="display: flex;  padding-left: 0px;">
<input type="hidden" class="custom-post-input" name="past_startdate" id="past_startdate">
<input type="datetime-local" class="custom-post-input col-md-6" name="edit_startdate" id="edit_startdate" >
  <p class="col-md-3"id="startdate_show" style="display: contents;font-family: 'Oswald';"></p>
</div>
</div>

<script>
function adjust(v){
if(v>9){
return v.toString();
}else{
return '0'+v.toString();
}
}
 $(document).ready(function(){
        var today = new Date();
var date = today.getFullYear()+'-'+adjust(today.getMonth()+1)+'-'+adjust(today.getDate());
var time = adjust(today.getHours()) + ":" + adjust(today.getMinutes());
var dateTime = `${date}T${time}`;
//its working
//alert(dateTime);
$("#q_date").attr('min', dateTime);
$("#edit_startdate").attr('min', dateTime);
//$("#dateInput").attr('value', dateTime);
});


//$("#dateInput").attr('min',new Date().toJSON().slice(0,19));
</script>


</div>
</div>
            <div id="editquiz_alert"class="alert alert-danger alert-dismissible fade show" style="visibility: hidden;display: contents;">
                   <strong><div class="editquiz_alert"style=" font-family: 'FontAwesome';"></div></strong>
                </div>
                <div id="quizsucc_alert"class="alert alert-success alert-dismissible fade show" style="visibility: hidden;display: contents;">
                   <strong><div class="quizsucc_alert"style="color: red; font-family: 'FontAwesome';"></div></strong>
                </div>
<div class="modal-footer " style="margin-top: 27px;">
<div  style="  font-family: 'Oswald'; margin-left:70%">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-auto update_quiz" name="update_quiz">Update</button>
                </div>
</div>

</form>


                 
                


                
            </div>
        </div>
    </div>







    <script>
$(document).ready(function(){
    $('.edit_btn').click(function (e) { 
              $("#edit_quiz").on("show.bs.modal", function(event){
        // Get the button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract value from the custom data-* attribute
        var str = button.data("title");
        //e.preventDefault();
        $.ajax({
              type: "POST",
              url: "aid.php",
              data: {
                  'checking_q_btn' : true,
                  'q_id': str,
              },
              
              success: function (response) {
                  //console.log(response);
                    $.each(response, function (key, value) { 
                        console.log(value);
                       // $('#ass_date').val(new Date().value['a_date']);
                   
          //  $("#ass_date").val(inpValue);
                        $('#q_id').val(value['q_id']);
                        $('#q_name').val(value['q_name']);
                        $('#q_p_name').val(value['q_name']);
                        $('#q_info').val(value['q_info']);
                        $('#date_show').text(value['q_duedate']);
                        $('#q_date').val(value['q_duedate']);
                        $('#past_date').val(value['q_duedate']);
                        $('#past_startdate').val(value['q_startdate']);
                        $('#edit_startdate').val(value['q_startdate']);
                        $('#startdate_show').text(value['q_startdate']);              
                      
                    });

                
              }
          });
    });
    
  });
});




$(document).ready(function () {
  //  getdata();
 
         $('.update_quiz').click(function (e) { 
          
       var qid= $('#q_id').val();
       var qname= $('#q_name').val();
       var q_p_name= $('#q_p_name').val();
       var qinfo= $('#q_info').val();
       var qdate= $('#q_date').val();
       var pastdate= $('#past_date').val();
       var edit_startdate= $('#edit_startdate').val();
       var past_startdate= $('#past_startdate').val();


       if(qname==''||qinfo=='') {
        document.getElementById("editquiz_alert").style.visibility = "visible";
        document.getElementById("editquiz_alert").style.display = "flex";
        $('.editquiz_alert').html("empty field!");
      //  $( "#editquiz_alert" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       }
     else{ 
$.ajax({
    type: "POST",
    url: "aid.php",
    data: {
        'checking_q_update' : true,
                  'qid': qid,
                  'qname': qname,
                  'q_p_name': q_p_name,
                  'qinfo': qinfo,
                  'qdate': qdate,
               'pastdate':pastdate,
        'edit_startdate':edit_startdate,
         'past_startdate':past_startdate,
                  
    },
   
    success: function (response) {
        // $('.modal_body_class').html(response);
                  //$('#modal_id').modal('show');
                  document.getElementById("editquiz_alert").style.visibility = "visible";
           document.getElementById("editquiz_alert").style.display = "flex";
                  $('.editquiz_alert').html(response);
                  //alert( "Quiz Updated Successfully");
                 // location.href='takeQuiz.php';
                  //$('#studentSignUp').modal('show');
        
    }
});
      
     }
   });

});

</script> 





</body>
</html>
