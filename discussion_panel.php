<?php
include('dbconnection.php');
session_start();
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) {
   
    $temail = $_SESSION['login_temail'];
} else {
    echo '<script>alert("Please Login as a teacher first!"); </script>';
    echo "<script> location.href='homepage.php'</script>";
}


if(isset($_GET['file_id'])){

    $_SESSION['lecture_id']=$_GET["file_id"];
    $lecture_id= $_SESSION['lecture_id'];
}
else
{
    $lecture_id= $_SESSION['lecture_id'];
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
    $sql="SELECT * FROM lecture_upload WHERE lecture_id='$lecture_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        
        $tusername= $_SESSION['username'];
        $fullname=$_SESSION['full_name'];
        

        if(isset($_REQUEST['upload_btn'])){
    $comment= $_REQUEST['comment'];
    if(preg_match('/^[ ]*$/i', $comment)){
        echo'<script>alert("Post can not contain only blank spaces!");</script>';
        echo "<script> location.href='discussion_panel.php'; </script>";
    }else{
    $sql2 = "INSERT INTO discussion_panel (lecture_id,user_name,full_name,comment) VALUES ('$lecture_id','$tusername','$fullname','$comment')";
    
    $result2=$conn->query($sql2);
    if($result2== TRUE)
    {
        echo '<script>alert("Posted successfully"); </script>';
        echo "<script> location.href='discussion_panel.php'; </script>";
    }
    else
    {
        echo '<script>alert("Could not be posted"); </script>';
        echo "<script> location.href='discussion_panel.php'; </script>";
    }
        

    }
    }
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
<style>
.date {
    padding: 0px 9px;
    color: #8b8e9f;
    border: 1px dashed #e1e1e7;
    margin-top: 8px;
    border-radius: 4px;
    font-family: 'Roboto Condensed';
    font-size: 22px;
   
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
.show_assignment {
    background: white;
    padding: 0px;
    border-radius: 6px;
    font-family: 'FontAwesome';
    font-size: 20px;
    margin-bottom: 0px;
}
.a_file {
    border-block: initial;
    border: 1px dotted;
    cursor: pointer;
    background: beige;
}
.submission_show {
    text-align: center;
    padding: 5px;
}
.modal-content {
  
    padding-left: 14px;
    font-family: 'FontAwesome';
    font-size: large;
}



.t_name {
    font-weight: 100;
    font-family: 'Oswald';
    font-size: 21px;
}


.ass_detail{
    color:#636677;
    border: 1px dashed #e1e1e7;
    margin-top: 8px;
    padding: 10px 12px;
    border-radius: 4px;
    font-family: 'Oswald';
    font-size: 22px;
    text-align: center;
    background: #f7f0ff;
}
.submit_option{
   
    border: 1px dashed #e1e1e7;
    margin-top: 8px;
    padding: 10px 12px;
   
  
    border-radius: 4px;
    font-family: 'FontAwesome';
    font-size: 22px;

}
.title {
    font-family: 'FontAwesome';
    text-align: center;
    font-weight: 600;
    font-size: 24px;
}







textarea.form-control {
    height: auto;
    font-family: 'Oswald';
}
a {
    text-decoration: underline;
    text-shadow: 0 0 black;
    color: darkslateblue;
}
.shadow{
  border: 1px solid;
  color: white;
  box-shadow: 5px 10px 8px 5px #888888;
}
.text1 {
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
.nav_background {
  background-image: linear-gradient( 
15deg, #2220af 16%, #2196f3 79%);
}
.sidebar_background {
  background-image: linear-gradient( 
15deg, #2220af 16%, #2087d9  79%);
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
.dropdown-item a {
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
    text-decoration: none;
}
</style>
</head>
<body>

<body>
<!--Navbar-->
    <div class="nav fixed-top nav_background shadow">
        
            <div class="logo mr-auto">
            <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
            </div>
        <ul style="  font-family: 'Oswald', sans-serif;">
            <li><a href="teacherHomepage.php">Home</a></li>
            <li><a href="#">Profile</a></li>
        
       
            <li><a href="logout.php"> Log Out </a></li>
        </ul>
    </div>





<!--start greed system-->
<div class="container customclass "style="margin-top: 40px;"  data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
            

<!--course title-->
            <div class="col-md-8">
              <div class="demo-content ">
<div class="show_assignment">


<div class="ass_detail" >
<div class="t_name" style="font-size: 25px;">Discussion Panel</div>
<?php
                        while($row = $result->fetch_array()){?>
<div style="font-size: large;"><?php echo date("Y-m-d h:iA",strtotime($row['lecture_date'])); ?></div>
<div class="ass_name" style="display: inline-flex;">Topic:  
                            <a href="class_materials/<?php echo $row['file']?>"target="_blank" ><div class="file"style=" padding-left: 7px;"> <?php echo $row['file']?> </div></a>
                            <?php
                        }
                        ?></div>


</div>

<div class="submit_option" style="    background: aliceblue;">
<div class="title"> </div>
       
<form action="discussion_panel.php" method="POST" >
            <textarea rows="3" class="form-control"  name="comment" placeholder="Type your note here."></textarea>
            <input type="hidden"  name="file_id" value = "<?php echo $lecture_id;?>">
            <button type="submit" class="btn  mr-auto" name="upload_btn"  style="    font-family: 'Oswald';margin-left: 45%;color: white;">Upload</button>
            </form>

</div>



<div class="submit_option">



<?php

$sql3= "SELECT * FROM discussion_panel WHERE lecture_id='$lecture_id' ORDER BY comment_date DESC";


if($result3 = $conn->query($sql3)){
   

   if($result3->num_rows > 0){
      
           while($row = $result3->fetch_array()){
           
                ?>
                <div class="upload_partition " style=" border: 1px dashed #e1e1e7;background: aliceblue;   margin-bottom: 13px;">
        <div class="inline" style="display: -webkit-box;">   
        <div class='t_name text1' style="width: 97%;"><?php echo $row["full_name"]; ?></div>
<?php  if($row['user_name']== $tusername){ ?>
<!--Dropdown menu-->
<div  id="test">
  <div class="dropdown" style="text-align: end;">
    <a data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
    <div class="dropdown-menu">
     <div class="dropdown-item">   <a href="delete_comment.php?query_id=<?php echo $row["query_id"]; ?>"><button>Delete</button></a></div>
    </div>

  </div>
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



<?php
             }
             ?>
             </div>
             <div class='post_date'><?php echo $row["comment_date"]; ?></div>
 <div class='t_post' ><?php echo $row["comment"]; ?></div>
 </div>
 <?php
            }
         }
     }
         ?>
</div>


















</div>              
</div>
</div>
<!--Show all Assignment-->
      
         <div class="col-md-4">
         <div class="demo-content">
              <div class="schedule " style="background: white;">
              <div class="t_name text2" style="font-size: 27px; font-family: 'Oswald', sans-serif; border-bottom: 1px solid #e1e1e7;"><?php echo $course_name;?></div>
              <div class="t_name" style="font-weight: 500;"><?php echo $fullname;?></div>
              <div class="date">Current Time:
              <?php
              
              date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
              //echo "Todays ".date("Y-m-d h:i:s");
              echo date("Y-F j-l ");
              echo date("h:i:s");
                ?>
              </div> 
            </div>
     </div> 

         
         </div>

           
        
           
 

        </div>
        
        </div>   
    </div>
  

</body>

</html>
