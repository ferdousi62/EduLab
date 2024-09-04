<?php
include('../dbconnection.php');
session_start();
if (isset($_SESSION['is_adminlogin']) && $_SESSION['is_adminlogin'] == true) {
   
  $temail = $_SESSION['admin_email'];
} else {
  echo '<script>alert("Please Login as a admin first!"); </script>';
  echo "<script> location.href='../homepage.php'</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>homepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
<link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">




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

.nav ul {
    list-style: none;
    display: inline-flex;
    text-orientation: inherit;
    font-family: 'FontAwesome';
}
.nav ul li a {
    color: white;
    padding: 10px;
    text-align: right;
    justify-content: right;
    text-decoration: none;
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
.nav ul li a:hover{
    color: white;
    background-color: #2196f3;;
    border-color: #120961;
    border-radius: 11px;
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

#card {
  border: 1px solid;
  
  box-shadow: 5px 10px 8px 5px #888888;
}

.bg-custom-2 {
  background-image: linear-gradient( 
15deg, #03a9f49c 0%, #2196f3 100%);
}
.nav {
    background-color: darkblue;
    justify-content: flex-end;
    padding-right: 65px;
    padding-top: 5px;
    padding-bottom: 6px;
}
.bg-custom-3 {
    background-image: linear-gradient( 
15deg, #9c27b0 14%, #9b0f3f 100%);
}
.bg-custom-4 {
    background-image: linear-gradient( 
15deg, #2e1260 0%, #9c27b0 100%);

}
.bg-custom-5 {
background-image: linear-gradient( 
15deg, #17051a 0%, #961353d4 100%);
}

    </style>
</head>
<body>



<!--Navbar-->
<div class="nav fixed-top nav_background shadow">
        
        <div class="logo mr-auto">
        <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
        </div>
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
                
                
                
    <div class="list-group"style="  font-family: 'Oswald', sans-serif;text-align: center;">
        <a href="adminDashboard.php"  class="list-group-item list-group-item-action active" style="background:#9c27b0;">Dashboard</a>
        <a href="adminTeacher.php" class="list-group-item list-group-item-action active">Teachers</a>
        <a href="adminStudent.php" class="list-group-item list-group-item-action active">Students</a>
        <a href="adminCourses.php" class="list-group-item list-group-item-action active">Courses</a>
    
        <a href="admin_changepassword.php" class="list-group-item list-group-item-action active"> Change Password </a>
        <a href="../logout.php" class="list-group-item list-group-item-action active"> Log Out </a>
    </div>

            </div>
            
     
                


<!--Class list-->
<div class="col-md-10" style="    margin-top: 10px;">
<div class="row">
<div id="card"class="card text-center bg-custom-3" style=" margin-right: 27px; font-family: 'Oswald', sans-serif; font-weight: 600; width: 30%; height: 25%; color: white;">
        <div class="card-header" style="justify-content: center;font-size: larger;color: wheat">Total ongoing courses</div>
           <div class="card-body">
             <?php
             $countcourse=0;
             $sql="SELECT * FROM course";
             $result=$conn->query($sql);
             while($row = $result->fetch_array()){
               $countcourse++;

             }
             ?>
         
              <p class="card-text" style="font-size: 26px;"><?php echo $countcourse;?></p>
           
             </div>
      
     </div>


     <div id="card"class="card text-center bg-custom-5" style="margin-right: 27px; font-family: 'Oswald', sans-serif; font-weight: 600; width: 30%; height: 25%; color: white;">
        <div class="card-header" style="justify-content: center;font-size: larger;color: wheat">Total Teachers</div>
           <div class="card-body">
           <?php
             $countteacher=0;
             $sql="SELECT * FROM t_registration";
             $result=$conn->query($sql);
             while($row = $result->fetch_array()){
               $countteacher++;

             }
             ?>
         
              <p class="card-text" style="font-size: 26px;"><?php echo $countteacher;?></p>
           
             </div>
      
     </div>
     <div id="card"class="card text-center bg-custom-4" style=" font-family: 'Oswald', sans-serif; font-weight: 600; width: 30%; height: 25%; color: white;">
        <div class="card-header" style="justify-content: center;font-size: larger;color: wheat">Total Students</div>
           <div class="card-body">
           <?php
             $countstudent=0;
             $sql="SELECT * FROM s_registration";
             $result=$conn->query($sql);
             while($row = $result->fetch_array()){
               $countstudent++;

             }
             ?>
         
              <p class="card-text" style="font-size: 26px;"><?php echo $countstudent;?></p>
           
             </div>
      
     </div>
</div>
   
     <!--
     <div class="col-md-6 col-xl-4">
     <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Orders</div>
                                                <div class="widget-subheading">Last year expenses</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">1896</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
</div>
-->

<!--
<script>
    $(function(){
  $("#numberOfLocations").change(function(){
       var value = $(this).val();
      $(".blockContainer").empty();
       for(var i = 0; i<value; i++){
            var block = $("<div>",{class:"class"});
            $(block).append($("div.class-list").html());
            $(".blockContainer").append(block);
         }
    }); 
  
 });
</script> 
-->
           
        </div>
        
        
    </div>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script></body>

</body>
</html>