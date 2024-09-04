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
     $tusername= $_SESSION['username'];


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



<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/teacherHomepageStyle.css">
<link rel="stylesheet" href="css/class.css">
<link rel="stylesheet" href="css/classMetarial.css">
<style>
.date {
    font-weight: 600;
    font-size: 27px;
    font-family: 'FontAwesome';
    border-bottom: 1px solid #e1e1e7;
}
.schedule {
    padding: 6px;
    border-radius: 5px;
}
.schedule_button {
    color: #8b8e9f;
    border: 1px dashed #e1e1e7;
    margin-top: 8px;
    padding: 10px 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    border-radius: 4px;
    font-family: 'FontAwesome';
    font-size: 22px;
}
.modal-content {
  
  padding-left: 14px;
  font-family: 'FontAwesome';
  font-size: large;
}
.heading {
    font-weight: 900;
    font-size: 31px;
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
.title {
    font-family: 'Oswald';
    text-align: center;
    font-weight: 600;
    font-size: 24px;
    letter-spacing: 1px;
    background: #788be947;
}

.s_name {
    font-weight: 500;
    font-family: 'Oswald';
    font-size: 22px;
    user-select: none;
    cursor: auto;
    border-radius: 6px;
    margin: 5px;
    
}
i.fas.fa-user {
    margin: 6px;
    width: 23px;
    font-size: 26px;
}

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
}
.text1 {
    font-family: 'Playfair Display';
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
input {
    font-family: 'Oswald';
}
.joining_code {
    color: black;
    border: 1px solid #8c8cf380;
    margin-top: 8px;
    padding: 10px 12px;
    display: flex;
    align-items: center;
    border-radius: 4px;
    font-family: 'Roboto Condensed';
    font-size: 26px;
    font-weight: 600;
    justify-content: center;
    background: #94b5d15c;
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
    <div class="nav  fixed-top nav_background shadow">
        
            <div class="logo mr-auto">
            <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
            </div>
        <ul style="  font-family: 'Oswald', sans-serif;">
            <li><a href="teacherHomepage.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
           
            
            <li><a href="#createCourse" role="button" class="" data-toggle="modal">Create Class</a></li>
            <li><a href="logout.php" > Log Out </a></li>

        </ul>
    </div>





<!--strat greed system-->
<div class="container customclass " style="margin-top: 45px;" data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
            <div class="col-md-2 sidebar_background"id="myScrollspy">
            
<!--side menu-->

<div class="list-group"  action = "<?php $_PHP_SELF ?>" method = "GET"  style="  font-family: 'Oswald', sans-serif;text-align: center;"> 
    <a href="class.php"  class="list-group-item list-group-item-action active" >Post</a>
    <a href="classMaterial.php" class="list-group-item list-group-item-action active">Class Materials</a>
    <a href="takeQuiz.php" class="list-group-item list-group-item-action active">Take Quiz </a>
    <a href="assignment.php" class="list-group-item list-group-item-action active"> Take Assignment </a>
    <a href="question_bank.php" class="list-group-item list-group-item-action active"> Question Bank </a>
    <a href="student_list.php" class="list-group-item list-group-item-action active" style="background:#2196f3;"> Students </a>
</div>

            </div>
   
<!--course title-->
<div class="col-md-10">
<div class="demo-content bg-alt">
                  <div class="col-md-12">
                    <div class="course_title text2" style=" font-family: 'Oswald', sans-serif;text-align: center;  height: 60px;margin-bottom: 27px;">
                        <?php 
                        
                        echo $course_name; ?>
                    </div>
                  </div>
                  <?php
                  $sql="SELECT * FROM s_course WHERE c_code='$tc_code'";
                  $result= $conn->query($sql);
                  ?>
                

<!--Show all Assignment-->
            <div class="row">
            
            <div class="col-md-8"style="">
            <?php
           
           if($result->num_rows>0){
               ?>
<div class="title" style="border-bottom: 1px solid #d3d3d3;">Students List</div>
             
               <?php
               while($row = $result->fetch_array()){
                $username=$row['s_user_name'];
 
                $sql2="SELECT * FROM s_registration WHERE s_user_name='$username'";
                $result2= $conn->query($sql2);
                
                while($row2= $result2->fetch_array()){
                    $pro_pic=$row2['s_pro_pic'];
                   ?>
              
            
              <div class="student_list" >
                      <div class="inline"style="display: -webkit-box;border-bottom: 1px solid #d3d3d3;background: white;">
                      <div class="t_name" > 
                      <?php
                 if($pro_pic==''){
                    
                     ?>
                    
                    <img src="image/manimage.jpg" class="rounded-circle user_profile" style="height: 94px;width: 100px;"><br>
              

                 <?php }
                 else{

                    
?>
                    <img src="uploadeddata/<?php echo $pro_pic;?>" class="rounded-circle user_profile" style="height: 94px;width: 100px;"><br>
                    <?php
                }?>
                            </div> 
                    <div>
                    <div class='s_name inline'style="display: -webkit-box; width: -webkit-fill-available;">
                    <div style="display: -webkit-box; width: 440px;">
                    <?php  echo $row2['s_full_name'];?></div>
                    <div class="dropdown" style="text-align: end;">
    <a data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
    <div class="dropdown-menu">
    
    
  

     <div class="dropdown-item">   <a href="student_remove.php?s_username=<?php echo $row["s_user_name"]; ?>">
    Remove from this course</a>
    </div>
     
    </div>
  </div>
  </div>
                    <div style="color: #0000007a;font-family: 'Open Sans';"><?php echo $row2['s_email'];?></div>
                    </div>
                    </div>  
                    </div> 
                 <?php
                    "<br>";
                    
                }
                }
            
            
            
            }
            else{
                echo"<div  class='text1' > There are no students currently enrolled in this class!</div>";

            }
            ?>
            







              
    
          
           
 

            </div>
        
        <div class="col-md-4">
              <div class="schedule " style="background: white; box-shadow: 0px 3px 8px 2px #888888;">
              <div class="date">
                  Add Students With Joining Code
              <?php
              
              
            //  date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
              //echo "Todays ".date("Y-m-d h:i:s");
              //echo date("Y-F j-l ");
                ?>
              </div>
             
            <div class="joining_code " >
            <?php echo "$tc_code";?>
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

</body>
</html>