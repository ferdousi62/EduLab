<?php
    include('dbconnection.php');
    session_start();
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
    text-align: center;
   
    
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
    box-shadow: 1px 1px 6px 2px #888888a3
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
            <li><a href="#">Notification</a></li>
            
            <li><a href="#createCourse" role="button" class="" data-toggle="modal">Create Class</a></li>
            <li><a href="logout.php"> Log Out </a></li>
        </ul>
    </div>



<!--strat greed system-->
<div class="container customclass " style="margin-top: 45px;" data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
            <div class="col-md-2 sidebar_background"id="myScrollspy">
                
<!--side menu-->
  
<div class="list-group"  action = "<?php $_PHP_SELF ?>" method = "GET" style="  font-family: 'Oswald', sans-serif;text-align: center;"> 
    <a href="class.php"  class="list-group-item list-group-item-action active" >Post</a>
    <a href="classMaterial.php" class="list-group-item list-group-item-action active">Class Materials</a>
    <a href="takeQuiz.php" class="list-group-item list-group-item-action active">Take Quiz </a>
    <a href="assignment.php" class="list-group-item list-group-item-action active" style="background:#2196f3;"> Take Assignment </a>
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
             $sql= "SELECT * FROM assignment WHERE c_code='".$tc_code."' ORDER BY a_date DESC";
             $sql2= "SELECT * FROM course WHERE c_code='".$tc_code."'";
             if($result2 = $conn->query($sql2)){

    
             if($result = $conn->query($sql)){
                if($result2->num_rows > 0){

    
                if($result->num_rows > 0){
                    while($row2 = $result2->fetch_array()){

    
        
                    while($row = $result->fetch_array()){
          
                        $due= $row['a_duedate'];
                        $duedate=date("Y-m-d H:i:s",strtotime($due));
                        date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
                        //echo "Todays ".date("Y-m-d h:i:s");
                        $current= date("Y-m-d H:i:s");
                        $currentdate=date("Y-m-d H:i:s",strtotime($current));
           ?>
           <div class="col-md-12">
           <div class="show_assignment bg-alt">
           
           <div class="inline"style="display: -webkit-box;">

           <div class="t_name"  style="width: 97%;">  <?php echo $row['a_name']; ?> <br></div>
<?php if($current<$duedate){ ?>
<!--Dropdown menu-->
           <div  id="test">
  <div class="dropdown" style="text-align: end;">
    <a data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
    <div class="dropdown-menu">
    
    
    <div class="dropdown-item"><a>
    <button type="button" style="margin: auto;" class="edit_btn btn btn-primary" data-toggle="modal" data-target="#myModall" data-title=" <?php echo $row['a_id']; ?>">
    Edit</button></a></div>

     <div class="dropdown-item">   <a href="delete-process-assignment.php?a_id=<?php echo $row["a_id"]; ?>">
     <button>Delete</button></a>
    </div>
     
    </div>
  </div>
</div>
<?php } ?>
</div> 
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


<!--End Dropdown menu-->










          
            <div class="status" style="color: #819092eb;">
            <?php 
            
            if($current<$duedate) 
            {
             echo "Unlocked<br>";
            }
            else if($current>=$duedate)
            {
                echo "Locked<br>";
            }
            else
            {
                echo "Somethings wrong<br>";
            }?>
            </div>
          
             <div> <?php echo $row['a_info']; ?></div>
             <div style="display: inline-flex; width: -webkit-fill-available;font-weight: 600;color: #000000d4;">
            <div style="   padding-right: 9px; "> Upload time: </div><?php echo date("Y-m-d h:iA",strtotime($row['a_date'])); ?>
            </div>
            <div style="display: inline-flex; width: -webkit-fill-available;color: #891212d4;font-weight: 600;">
            <div style="  padding-right: 9px;  "> Submission Deadline: </div><?php echo date("Y-m-d h:iA",strtotime($row['a_duedate'])); ?>
            </div>
              <div class="a_file"><a href="assignment_files/<?php echo $row['a_file']?>" target="_blank"> <?php echo $row['a_file']; ?> </a><br></div>
              <form method="post" action="viewsubmission.php">
              <input type="hidden" name="a_id" value="<?php echo $row['a_id']; ?>">
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
              <div class="schedule " style="background: white; box-shadow: 0px 3px 8px 2px #888888;">
              <div class="date">
              <?php
              
            //  date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
              //echo "Todays ".date("Y-m-d h:i:s");
              echo date("Y-F j-l ");
                ?>
              </div>
             
            <div class="schedule_button" >
            <a href="#schedule_assignment"   data-toggle="modal">
            <svg width="24" height="24" viewBox="0 0 24 24" name="plus-icon">
            <path fill= "#000000b5" fill-rule="evenodd" stroke="none" stroke-width="1" id="Icon/small/plus" d="M13 11h4a1 1 0 010 2h-4v4a1 1 0 01-2 0v-4H7a1 1 0 010-2h4V7a1 1 0 012 0v4z">
            </path>
            </svg>
            Schedule Assignment</a>
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

   
<!--Popup Schedule Assignment Form-->
<div class="bs-example">
    
    
    <div id="schedule_assignment" class="modal fade" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Add Assignment</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <div class="bs-example" style="font-family: 'Roboto Condensed';letter-spacing: 1px;">
           
    <form id="form"action="assignment.php" method="post" enctype="multipart/form-data" >
    <div class="col-md-16">
    <input type="hidden" class="custom-post-input" name="c_code" id="c_code" value="<?php echo $tc_code;?>">
<div class="custom-file row">  
<label class="custom-post-label col-md-4">Assignment Name</label>
  <input type="text" class="custom-post-input col-md-8 form-control" id="aname" name="aname">
  </div>

  <div class="custom-file row">
  <label class="custom-post-label  col-md-4" style="    margin-top: 21px;">Assignment Info</label>
 
  <textarea rows="2" class="custom-post-input col-md-8 form-control" name="ainfo" id="ainfo"></textarea>
  
</div>

<div class="custom-file row" style="margin-top: 30px;">
<label class="custom-post-label col-md-4">Select File</label>
  <input type="file" class="custom-post-input form-control col-md-8" style="    background: white;
    padding-top: 5px;"name="afile" id="afile">
  
</div>

<div class="custom-file row">
<label class="custom-post-label  col-md-4">Due Date</label>
  <input type="datetime-local" class="custom-post-input  form-control col-md-8" style="    background: white;
    padding-top: 5px;" id="dateInput" name="aduedate">
  
</div>
</div>
</div>
<script >

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
$("#dateInput").attr('min', dateTime);

});


//$("#dateInput").attr('min',new Date().toJSON().slice(0,19));
    </script>
    <div id="up_ass_alert"class="alert alert-danger alert-dismissible fade show" style="visibility: hidden;display: contents;">
                   <strong><div class="up_ass_alert"style=" font-family: 'FontAwesome';"></div></strong>
                </div>
<div class="modal-footer" style="margin-top: 16px; font-family: 'Oswald'; margin-left:50%">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-auto upload_assignment" name="upload_assignment">Schedule</button>
                </div>
</form>




                
            </div>
        </div>
    </div>
</div>

<script>
     $('.upload_assignment').click(function (e) { 
        e.preventDefault();
        var form=document.getElementById('form');
        var fdata=new FormData(form); 
        $.ajax({
            type: "POST",
            url: 'upload_assignment_process.php',
            data: fdata,
            contentType: false,
            cache: false,
            processData:false,
            success: function(result)
            { 
                document.getElementById("up_ass_alert").style.visibility = "visible";
        document.getElementById("up_ass_alert").style.display = "flex";
        $('.up_ass_alert').html(result);
            }
        });
    });
</script>



<!--Popup for Edit Assignment-->  
    <div id="myModall" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content color1">
                
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Edit Assignment</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"> 
                    
                    
    <form  onsubmit="return false;" action="assignment.php" method="post" style="font-family: 'Roboto Condensed';letter-spacing: 1px;" >
    <input type="hidden" class="custom-post-input" name="aid" id="ass_id">
    <div class="col-md-12">
<div class="custom-file row">
<label class="custom-post-label col-md-3" >Assignment Name</label>
  <input type="text" class="custom-post-input col-md-9" name="aname" id="ass_name">
  <input type="hidden" class="custom-post-input" name="past_name" id="past_name">
  </div>

  <div class="custom-file row">
  <label class="custom-post-label col-md-3">Assignment Info</label>
 
  <textarea rows="2" class="custom-post-input col-md-9" name="ainfo" id="ass_info"></textarea>
  
</div>

<div class="custom-file row" style="margin-top: 30px;">
<label class="custom-post-label col-md-3">Select File</label>
<div class="showfile col-md-9" style="display: flex;    padding-left: 0px;">
    <input type="file" class="custom-post-input col-md-6 " style="    background: white;
    padding-top: 5px;" name="afile" id="ass_file">
    <p class="col-md-3"id="file_show" style="display: contents;font-family: 'Oswald';"></p>
</div>

</div>

<div class="custom-file row">
<label class="custom-post-label col-md-3">Due Date</label>
<div class="showdate col-md-9" style="display: flex;  padding-left: 0px;">
<input type="hidden" class="custom-post-input" name="aduedate" id="past_date">
<input type="datetime-local" class="custom-post-input col-md-6" name="aduedate" id="ass_date" value="<?php echo $currentdate;?>" require>
  <p class="col-md-3"id="date_show" style="display: contents;font-family: 'Oswald';"></p>
</div>
  
</div>
</div>
</div>
<script >

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
$("#ass_date").attr('min', dateTime);
//$("#dateInput").attr('value', dateTime);
});


//$("#dateInput").attr('min',new Date().toJSON().slice(0,19));
    </script>

<div id="editass_alert"class="alert alert-danger alert-dismissible fade show" style="visibility: hidden;display: contents;">
                   <strong><div class="editass_alert"style=" font-family: 'FontAwesome';"></div></strong>
                </div>
<div class="modal-footer " style="margin-top: 27px;">
<div  style="  font-family: 'Oswald'; margin-left:70%">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-auto update_assignment" name="update_assignment">Update</button>
                </div>
</div>

</form>


                    <div class="alert_show">
                    
                    </div> 
                


                
            </div>
        </div>
    </div>







    <script>
$(document).ready(function(){
    $('.edit_btn').click(function (e) { 
              $("#myModall").on("show.bs.modal", function(event){
        // Get the button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract value from the custom data-* attribute
        var str = button.data("title");
        //e.preventDefault();
        $.ajax({
              type: "POST",
              url: "aid.php",
              data: {
                  'checking_btn' : true,
                  'a_id': str,
              },
              
              success: function (response) {
                  //console.log(response);
                    $.each(response, function (key, value) { 
                        console.log(value);
                       // $('#ass_date').val(new Date().value['a_date']);
                   
          //  $("#ass_date").val(inpValue);
                        $('#ass_id').val(value['a_id']);
                        $('#ass_name').val(value['a_name']);
                        $('#past_name').val(value['a_name']);
                        $('#ass_info').val(value['a_info']);
                   //   var date=value['a_file'];
                        $('#date_show').text(value['a_duedate']);
                        $('#file_show').text(value['a_file']);
                        $('#ass_date').val(value['a_duedate']);
                      //  $("#ass_date").attr('value', date);
                        $('#past_date').val(value['a_duedate']);
                       
                       

                       
                      
                    });

                
              }
          });
    });
    
  });
});




$(document).ready(function () {
  //  getdata();
 
         $('.update_assignment').click(function (e) { 
         
             
       
 
      
       var aid= $('#ass_id').val();
       var aname= $('#ass_name').val();
       var pname= $('#past_name').val();
       var ainfo= $('#ass_info').val();
       var afile= $('#ass_file').val();
       var adate= $('#ass_date').val();
       var pastdate= $('#past_date').val();

       if(aname==''||ainfo=='') {
        document.getElementById("editass_alert").style.visibility = "visible";
        document.getElementById("editass_alert").style.display = "flex";
        $('.editass_alert').html("empty field!");
      //  $( "#editass_alert" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       }
     else{     
$.ajax({
    type: "POST",
    url: "aid.php",
    data: {
        'checking_update' : true,
                  'aid': aid,
                  'aname': aname,
                  'pname': pname,
                  'ainfo': ainfo,
                  'afile':afile,
                  'adate':adate,
                  'pastdate':pastdate,
                  
    },
   
    success: function (response) {
        // $('.modal_body_class').html(response);
                  //$('#modal_id').modal('show');
                  document.getElementById("editass_alert").style.visibility = "visible";
        document.getElementById("editass_alert").style.display = "flex";
        $('.editass_alert').html(response); 
    }
});
      
     }
   });

});
  
</script> 



   
   
<script src="datetime/jquery.timepicker.js"></script>


</body>
</html>
