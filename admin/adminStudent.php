<?php
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin']) && $_SESSION['is_adminlogin'] == true) {
   
  $temail = $_SESSION['admin_email'];
} else {
  echo '<script>alert("Please Login as a admin first!"); </script>';
  echo "<script> location.href='../homepage.php'</script>";
}


$sql="SELECT * FROM s_registration";
$result= $conn->query($sql);
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>homepage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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


<link rel="stylesheet" href="css/teacherHomepageStyle.css">
<link rel="stylesheet" href="css/class.css">
<style>
      .nav-link {
  display: block;
  padding: 0.5rem 1rem;
  margin: 0px;
  margin-bottom: -16px;
  margin-top: -9px;
}

.img-fluid {
  max-width: 100%;
  height: auto;
  z-index: -1;
}
.customclass ul li a {
  color: black;
  /* background-color: floralwhite; */
  text-decoration: underline;
  display: flow-root;
  font-size: 17px;
  font-style: initial;
  font-family: "FontAwesome";
  display: contents;
  background-color: cornsilk;
  background: border-box;
  border-color: rgb(175, 156, 160);
  border-radius: 3px;
}

.logo p {
  font: caption;
  margin-top: 6;
  margin-bottom: 0px;
  padding-top: 12px;
  padding-left: 9px;
  font-family: fangsong;
}
.logo h3 {
  font-size: 26px;
  color: aliceblue;
  font-family: serif;
  user-select: none;
}
.logo {
  font-size: larger;
  font-family: "FontAwesome";
  justify-items: flex-start;
  justify-content: flex-start;
  color: aliceblue;
  padding-right: 0px;
  padding-left: 66px;
  padding-top: 0px;
  margin-top: -5px;
  display: inline-flex;
  user-select: none;
}

.bs-example {
  margin-top: -1%;
  margin-left: 0%;
  margin-right: 0%;
  padding: 0%;
}

.list-group-item-action {
  width: 100%;
  text-align: inherit;
  color: #fff;
  background-color: #ef4c18;
  border-color: white !important;
}
a.list-group-item.list-group-item-action:hover {
  background: #9c27b0;
  color: white;
}

.post.bg-alt {
  padding: inherit;
  margin-bottom: 12px;
  border-radius: 6px;
}

.row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin-right: 0px;
  margin-left: 7px;
  margin-top: 13px;
}

.list-group-item + .list-group-item.active {
  background: #1d0942;
  border-left: none;
}

.class p {
  margin: 14px;
  font-family: "FontAwesome";
  font-weight: 600;
  font-size: 18px;
  color: black;
}

.list-group {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 1px;
  background-color: #1d0942;
  margin: 0px;
  margin-top: 3%;
}
.container {
  /* margin: -22px; */
  margin-top: 5px;
  padding-right: 15px;
  background: #e6bded30;
  max-width: initial;
  padding-left: 15px;
  height: fit-content;
}
.list-group-item {
  position: relative;
  display: block;
  padding: 0.75rem 0.25rem;
  background-color: #1d0942;
  border-bottom: 1px solid honeydew;
  color: white;
  border-left: hidden;
  border-right: hidden;
}
svg.bi.bi-three-dots-vertical:hover {
  background: darkgray;
  border-radius: 6px;
}

button.btn {
  block-size: auto;
  border-block: initial;
  background: #2196f3c7;
  border: outset;
  margin-bottom: 60px;
}
.t_name {
  font-weight: 700;
  font-family: emoji;
  font-size: 22px;
}
.post_date {
  font-size: 15px;
  font-style: revert;
}
.t_post {
  font-family: auto;
  font-size: 22px;
  font-weight: 500;
  border-style: groove;
}
.upload_partition {
  block-size: initial;
  background: white;
  border-radius: 6px;
  width: -webkit-fill-available;
  padding: 10px;
}
.course_title {
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
}

.dropdown-menu.show {
  display: block;
  background: white;
  margin-left: 0px;
  margin-block: -4px;
  padding-top: 0px;
  padding: 0px;
}

.success {
  margin: 20px;
  position: relative;
}

textarea#post {
  outline: none;
  user-select: text;
  white-space: pre-wrap;
  overflow-wrap: break-word;
  border: none;
}
.side_bar {
  background-color: #ef4c18;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-left: 1px;
  margin: 0px;
  border-radius: 3px;
}


.sidebar-content{
    min-height: 100px;
    margin-bottom: 30px;
    background: #b4bac0;
}
*{
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
}

.sidebar {
    position: fixed;
    left: -250px;
    width: 205px;
    top: 25px;
    background: bottom;
    background: rgb(78, 76, 161);
    transition: all .5s ease;
    flex-direction: column;
    padding-top: 0px;
    z-index: 1;
}
.sidebar header{
    font-size: 18px;
    color: white;
    text-align: center;
    line-height: 58px;
    background: #0e0e54;
    user-select: none;
}

.sidebar ul li a{
    display: list-item;
    text-decoration: none;
    height: 100%;
    width: 100%;
    line-height: 65px;
    font-size: 17px;
    color: white;
    padding-left: 27px;
    padding-top: 0px;
    padding-bottom: 0px;
    margin-top: 15px;
    margin-bottom: -17px;
    border-top: 1px solid rgba(255, 255,255, .1);
    border-bottom: 1px solid black;
    transition: .4s;
    line-height: 43px;
}

.sidebar ul li:hover{
    background-color:#2196f3;
    border-color:#120961;
    border-radius: 10px;
}

.sidebar ul a i{
    margin-right: 10px;
}

label #btn, label #cancel{
    position: absolute;
    cursor: pointer;
    background: #042331;
    border-radius: 3px;
}
label #btn {
    left: 23px;
    top: 8px;
    font-size: 24px;
    color: black;
    padding: 2px 6px;
    transition: all .5s;
    flex-direction: column-reverse;
    background-color: cornsilk;
}
label #cancel {
    z-index: 1111;
    left: -195px;
    top: 30px;
    font-size: 24px;
    color: #0a5275;
    padding: 0px 3px;
    transition: all .5s ease;
}
#check:checked ~ .sidebar{

    left: 0;

}


#check:checked ~ label #btn{
    left: 250px;
    opacity: 0;
    pointer-events: none;
}
#check:checked ~  label #cancel{
    left: 168px;
}
#check{
    display: none;
}

/*end navbar*/
    
.demo-content {
    padding: 15px;
    font-size: 18px;
    background: white;
    margin-bottom: 15px;
    margin-left: -19px;
    margin-right: -8px;
    z-index: -1;
    margin-top: 14px;
}
.demo-content.bg-alt {
    background: aliceblue;
    border-radius: 7px;
    margin-top: 11px;
} 
.container {
    /* margin: -22px; */
   
    margin-top: 42px;
    background: #e6bded30;
    max-width: initial;
    padding-left: 15px;
}

img.user_profile{

    vertical-align: middle;
    border-style: none;
    margin: 0px 11px;
    height: 162px;
    width: 166px;
}
.usertitle {
    font-family: 'FontAwesome';
    font-size: 23px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 7px;
    color: white;
}


































.blockContainer {
      display: block;
      margin-block: 5px;
     
  }
  .class button {
    display: inline-block;
    color: black;
    background-color: gainsboro;
    line-height: 24px;
    width: -webkit-fill-available;
    border-radius: 3px;
    font-family: -webkit-body;
    font-size: 20px;
    border-style: groove;
    border-color: aliceblue;
    text-align: left;
    border: outset;
}
  
  .blockContainer a {
    color: black;
}
.class  :hover {
    background: beige;
   
    color: black;
    box-sizing: border-box;
    text-decoration: none;
}
.class p {
    margin: 14px;
    font-family: 'FontAwesome';
    font-weight: 600;
    font-size: 18px;
    color: black;
}
  
  img {
      vertical-align: middle;
      border-style: none;
      margin: 5px 99px;
  }
  .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: 0px;
    margin-left: 20px;
    margin-top:13px;
}

.list-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 0;
    margin: 18px;
    font-family: 'FontAwesome';
}
.nav_background {
  background-image: linear-gradient( 
15deg, #1d0942 16%, #9c27b0 79%);
}
.sidebar_background {
  background-image: linear-gradient( 
15deg, #1d0942 16%, #9c27b0 79%);
}
.shadow{
  border: 1px solid;
  color: white;
  box-shadow: 5px 10px 8px 5px #888888;
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
}

a.edit_btn.btn.btn-primary:hover {
    color: black;
    background: border-box;
}
a:hover {
    text-decoration: none;
}
.nav {
    background-color: darkblue;
    justify-content: flex-end;
    padding-right: 65px;
    padding-top: 5px;
  
}
.nav ul {
    list-style: none;
    display: inline-flex;
    text-orientation: inherit;
    font-family: 'FontAwesome';
}
.nav ul li a {
    color: white;
    padding: 10px;
    text-align: center;
    justify-content: right;
    text-decoration: none;
}
.nav ul li a:hover{
    color: yellow;
    background-color: #9c27b0;;
    border-color: #120961;
    border-radius: 7px;
}
.dropdown-item a:hover {
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

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 6px;
  top: .8em;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
}
.dropdown-menu.show {
  display: block;
  background: white;
  margin-left: 0px;
  margin-block: -4px;
  padding-top: 0px;
  padding: 0px;
}
.dropdown-item {
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
#searcher {
  background-image: url('../image/serch.jpg');
  background-position: 13px 13px;
    background-size: 25px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
.card-text{
  margin-bottom: 0px;
}
   </style>
</head>
<body>



<!--Navbar-->
<div class="nav fixed-top nav_background shadow">
        
        <div class="logo mr-auto">
       <!-- <img src="../image/logo2.jpg" class="rounded-circle" style="height:26px;">-->
       <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
        </div>
        <ul style="font-family: 'Oswald', sans-serif;letter-spacing: 1px;font-size: 1rem; margin-bottom: 1px;margin-top: -4px;">
            <li> <a href="#studentSignUp" role="button" class="btn " data-toggle="modal" style="background:#9c27b0;">Add Student</a></li>
        </ul>
        <div class="status logo ml-auto">Admin</div>
    
</div>

<!--Sidebar-->
<div class="container">
        <div class="row">
            <div class="col-md-2 sidebar_background">

           
            <div class="profile">
                 <div class="user_img  text-center">
                 <?php
              //   if($pro_pic==''){
                    
                     ?>
                    
                    <img src="../image/manimage.jpg" class="rounded-circle user_profile">
              

                <?php //}
               //  else{

                    
?>
                  <!--  <img src="uploadeddata/<?php echo $pro_pic;?>" class="rounded-circle user_profile">   -->
                    <?php
                //}?>
                </div>
                <div class="usertitle">
                <?php
                
                  //  echo $tfullname;
                
                ?>
                </div>
                </div>
                
                
                   
    <div class="list-group" style="  font-family: 'Oswald', sans-serif;text-align: center;">
        <a href="adminDashboard.php"  class="list-group-item list-group-item-action " >Dashboard</a>
        <a href="adminTeacher.php" class="list-group-item list-group-item-action " >Teachers</a>
        <a href="adminStudent.php" class="list-group-item list-group-item-action " style="background: #9c27b0;">Students</a>
        <a href="adminCourses.php" class="list-group-item list-group-item-action ">Courses</a>
        
        <a href="admin_changepassword.php" class="list-group-item list-group-item-action "> Change Password </a>
        <a href="../logout.php" class="list-group-item list-group-item-action "> Log Out </a>
    </div>

            </div>
            
       
                


<!--Student list-->
<div class="col-md-10 secondDiv" style="    margin-top: 10px;">
<div class="row"><input type="text" id="searcher"  placeholder="Search students by username..." title="Type in a name"></div>
  <div class="row ">

<div class="col-md-16 " style="margin-top: 10px;">
<?php
  if($result->num_rows>0){
    while($row = $result->fetch_array()){
      $pro_pic= $row['s_pro_pic'];
      $username= $row['s_user_name'];
 
      //to show the course list
      $sql2=" SELECT * FROM `s_course` WHERE s_user_name='$username'";
$result2= $conn->query($sql2);
 
     
    
  ?>
   
   <div class="card entryDiv" style="  display: inline-flex;background-color: #d27ee130;">
   <?php
                 if($pro_pic==''){
                    
                     ?>
                    <img src="../image/manimage.jpg" class="card-img-top  rounded-circle user_profile" alt="...">
                    <?php }
                 else{

                    
?>
                    <img src="../uploadeddata/<?php echo $pro_pic;?>" class="card-img-top  rounded-circle user_profile" alt="...">
                    <?php
                }?>
                    <div class="card-img-overlay">
                         <div class="bs-example">
                         <div class="dropdown " style="text-align: end;">
                           <li class="nav-item dropdown btn-group dropend" style="text-align: end;">
        <a class="nav-link " href="#"  data-toggle="dropdown" >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                 <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                              </svg>
        </a>
        <ul class="dropdown-menu " >
          <li><a type="button" class="details_btn dropdown-item" style="margin: auto; " data-toggle="modal" data-target="#details" 
                                      data-title="<?php echo $row['s_user_name']; ?>">details</a></li>
          <li><a href="admin_delete_student.php?user_name=<?php echo $row['s_user_name'];?>" class="dropdown-item">Delete</a></li>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Course List</a>
            <ul class="dropdown-menu">
              <?php
               if($result2->num_rows>0){
                while($row2 = $result2->fetch_array()){
                  $c_code=$row2['c_code'];
                  $sql3="SELECT course_name FROM course WHERE c_code='$c_code'";
                  $result3= $conn->query($sql3);
                  while($row3 = $result3->fetch_array()){

              ?>
             <!-- <li><a class="dropdown-item" href="#"><?php// echo $row2['course_name'];?></a></li> -->
       <li>
          <form method="post" action="adCourse_post.php">
           <div class="students" >
            <input type="hidden" name="tc_code" value="<?php echo $row2['c_code']; ?>">
            <input type="hidden" name="course_name" value="<?php echo $row3['course_name']; ?>">
          
            <button type="submit" class="dropdown-item"> <div><?php echo $row3["course_name"];?></div></button>
         </form> 
       </li>
             
<?php
                }
              }
              }else{
                ?>
                 <li><a class="dropdown-item" href="#">No Courses!</a></li>
                <?php
              }
?>

              
              



            </ul>
          </li>
        </ul>
      </li>
      </div>
                         </div>
                    </div>
                    <div class="card-body" style="margin-bottom: .75rem;font-family: 'Oswald', sans-serif;font-weight: 600;">
                    <div class="card-title " id="card-title" ><h5 id="search"><?php echo $row['s_user_name'];?></h5></div>
                    <p class="card-text" >Fullname: <?php echo $row['s_full_name'];?></p>
                        <p class="card-text"><?php echo $row['s_email'];?></p>
                        
  
                     </div>
                   
                </div>

<?php } 
}?>
        
      </div>
      </div>
        </div>
      
             
             
<script>
  //dropdown + subdropdown menu
  $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
</script>           
<script>
$("#searcher").on("keyup click input", function () {
    var val = $(this).val();
   // var s=document.getElementById("search");
    if (val.length) {
        $(".secondDiv .entryDiv").hide().filter(function () {
            return $('#search',this).text().toLowerCase().indexOf(val.toLowerCase()) != -1;
        }).show();
      
    }
    else {
        $(".secondDiv .entryDiv").show();
    }
});
</script>

</div>   
</div>




 <!-- Student Registration Popup -->
 <div class="bs-example">
    <div id="studentSignUp" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">SignUp As Student</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form onsubmit="return false;" action="adminStudent.php" method="post" >
                <div class="form-group">
                    <label for="userName">Username</label>
                    <input type="name" class="form-control" id="sr_userName" placeholder="User Name" name="s_username">
                </div>
                <div class="form-group">
                    <label for="fullName">Fullname</label>
                    <input type="fullName" class="form-control" id="sr_fullName" placeholder="Full Name" name="s_fullname">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="sr_inputEmail" placeholder="Email" name="s_email" >
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="sr_inputPassword" placeholder="Password" name="s_password">
                </div>
                <div id="sreg_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display: contents;">
    <strong><div class="sreg_alert_show"style=" font-family: 'FontAwesome';"></div></strong>
   
</div>
               
                </div>
                <div class="modal-footer"style="font-family: 'Oswald';">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit"  name="s_reg" class="btn btn-primary std_reg">SignUp</button>
                </div>
            </form>
               

   
            </div>
                         
   
<script>
$(document).ready(function () {
  //  getdata();
  
         $('.std_reg').click(function (e) { 

       var sr_username= $('#sr_userName').val();
       var sr_fullname= $('#sr_fullName').val();
       var sr_email= $('#sr_inputEmail').val();
       var sr_pass= $('#sr_inputPassword').val();
     
     
        
       if(sr_username==''||sr_fullname==''||sr_email==''||sr_pass=='') {
        document.getElementById("sreg_alert_show").style.visibility = "visible";
        document.getElementById("sreg_alert_show").style.display = "flex";
        $('.sreg_alert_show').html("empty field!");
        $( "#sreg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       }
       else{


       
$.ajax({
    type: "POST",
    url: "adduser.php",
    data: {
        'checking_std_reg' : true,
             'username':sr_username,
             'fullname':sr_fullname,
                'email': sr_email,
                'pass': sr_pass,
                  
    },
   
    success: function (response) {
       // preventDefault();
           // stopPropagation();
        
           document.getElementById("sreg_alert_show").style.visibility = "visible";
           document.getElementById("sreg_alert_show").style.display = "flex";
                  $('.sreg_alert_show').html(response);
                  $('#studentSignUp').modal('show');
        
    }
});
       }
         
   });

});
  
</script> 
    
        </div>
    </div>

    
</div>












          
        

<!--Popup for details-->  
<div id="details" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content color1">
                
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;"></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"style="font-family: 'Roboto Condensed';letter-spacing: 1px; "> 
                    
                    <table width="98%" >
																
                                <tbody><tr>
                                  <td colspan="3">
                                    <div ></div></td>
                                </tr>
                                
                                <tr height="30px">
                                  <td ><div align="right" class="formtitle"><strong>Name : </strong></div></td>
                                  <td colspan="2" ><div id="fullname" style="padding-left:10px;">
                                   </div>
                                  </td>
                                </tr>  
                                <tr height="30px">
                                  <td ><div align="right" class="formtitle"><strong>Email : </strong></div></td>
                                  <td colspan="2"><div id="email"style="padding-left:10px;">
                                 </div>
                                  </td>
                                </tr> 
                                <tr height="30px">
                                  <td ><div align="right" class="formtitle"><strong>Phone :</strong> </div></td>
                                  <td colspan="2" ><div id="phone"style="padding-left:10px;">
                                  </div>
                                  </td>
                                </tr> 
                                <tr height="30px">
                                  <td ><div align="right" class="formtitle"><strong>Date Of Birth :</strong> </div></td>
                                  <td colspan="2" ><div id="bdate" style="padding-left:10px;">
                                  </div>
                                  </td>
                                </tr> 
                                                <tr height="30px">
                                  <td ><div align="right" class="formtitle"><strong>Birth Place :</strong> </div></td>
                                  <td colspan="2" ><div id="bplace"style="padding-left:10px;">
                                  </div>
                                  </td>
                                </tr> 
                                <tr height="30px">
                                  <td ><div align="right" class="formtitle"><strong>Educational Qualification :</strong> </div></td>
                                  <td colspan="2" ><div id="education" style="margin-left:10px;">
                                  </div>
                                  </td>
                                </tr> 
                                <tr height="30px">
                                  <td ><div align="right" class="formtitle"><strong>Areas of Interest :</strong> </div></td>
                                  <td colspan="2" ><div id="interest"style="padding-left:10px">
                                  </div>
                                  </td>
                                </tr> 
                                
                                
                              </tbody></table>


                              <div class="modal-footer"style="font-family: 'Oswald';">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                   
            </div>
        </div>
    </div>






    <script>
$(document).ready(function(){
  $('.details_btn').click(function (e) { 
    $("#details").on("show.bs.modal", function(event){
        // Get the button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract value from the custom data-* attribute
        var titleData = button.data("title");
        $(this).find(".modal-title").text(titleData);
        $.ajax({
              type: "POST",
              dataType: "json",
              url: "passingData.php",
              data: {
                  'checking_std_details_btn' : true,
                  'username': titleData,
              },
              
              success: function (response) {
                  console.log(response);
                    $.each(response, function (key, value) { 
                        console.log(value);
                       // $('#ass_date').val(new Date().value['a_date']);
                   
          //  $("#ass_date").val(inpValue);
                        $('#fullname').text(value['s_full_name']);
                       
                        $('#email').text(value['s_email']);
                      
                        $('#phone').text(value['s_phone']);
                        $('#bdate').text(value['s_date_of_birth']);
                        $('#bplace').text(value['s_birth_place']);
                        $('#education').text(value['s_education']);
                        $('#interest').text(value['s_interest']);
                        //$('#ass_date').val(value['a_duedate']);
                        //$('#past_date').val(value['a_duedate']);
                       
                       

                       
                      
                    });

                
              }
          });
    });
    });
  });
</script>


     

</body>
</html>