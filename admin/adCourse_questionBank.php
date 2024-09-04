
<?php
    include('../dbconnection.php');
    session_start();
    if (isset($_SESSION['is_adminlogin']) && $_SESSION['is_adminlogin'] == true) {
   
      $temail = $_SESSION['admin_email'];
  } else {
      echo '<script>alert("Please Login as a admin first!"); </script>';
      echo "<script> location.href='../homepage.php'</script>";
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




<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<link rel="stylesheet" href="../css/teacherHomepageStyle.css">
<link rel="stylesheet" href="../css/class.css">
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

.title {
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
  margin-top: 0.5%;
}






.upload.bg-alt {
    background: white;
    border-radius: 7px;
    margin-top: 0px;
    margin-left: -31px;
}

.upload.bg-alt ul li {
    padding-right: 68px;
    display: inline;
    padding-left: 26px;

}
.upload.bg-alt ul {
    background: white;
    border-radius: 7px;
    margin-top: 11px;
    border: ridge;
}
table {
    border-collapse: collapse;
    width: -webkit-fill-available;
}


tr {
    border-block: initial;
    block-size: 55px;
    border: 1px solid #e1e1e7;
}
th, td {
    padding: 10px;
    display: table-cell;
    text-align: center;
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 21px;
    font-weight: 700;
}
tr:hover {
    background: whitesmoke;
}


.nav{
    background-color:darkblue;
    justify-content: flex-end;
    padding-right: 65px;
    padding-top: 9px;
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
.text1 {
  text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);
}
.dropdown-item  {
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
.dropdown-item :hover {
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
    </style>
</head>
<body>



<!--Navbar-->
<div class="nav fixed-top nav_background shadow">
        
        <div class="logo mr-auto">
        <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
        </div>
        <ul style="font-family: 'Oswald', sans-serif;letter-spacing: 1px;font-size: 1rem">
            <li><a href="adCourse_post.php" >Post</a></li>
            <li><a href="adCourse_classmaterial.php">Class Materials</a></li>
            <li><a href="adCourse_assignment.php">Assignments</a></li>
            <li><a href="adCourse_quiz.php"> Quiz </a></li>
            <li><a href="adCourse_questionBank.php" style="background:#9c27b0;"> Question Bank </a></li>
            <li><a href="adCourse_student.php"> Students </a></li>
        </ul>
        <div class="status logo ml-auto">Admin</div>
</div>

<!--Sidebar-->
<div class="container"style="margin-top: 50px;">
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
        <a href="adminDashboard.php"  class="list-group-item list-group-item-action" >Dashboard</a>
        <a href="adminTeacher.php" class="list-group-item list-group-item-action">Teachers</a>
        <a href="adminStudent.php" class="list-group-item list-group-item-action">Students</a>
        <a href="adminCourses.php" class="list-group-item list-group-item-action"style="background:#9c27b0;">Courses</a>
        
        <a href="admin_changepassword.php" class="list-group-item list-group-item-action"> Change Password </a>
        <a href="../logout.php" class="list-group-item list-group-item-action"> Log Out </a>
    </div>
</div>
          
            
        
                

<!--Start grid system-->
<div class="col-md-10">
           
           <div class="col-md-12">
             <div class="title" style="font-family: 'Oswald', sans-serif;text-align: center; height: 112px;margin-bottom: 27px;">
                  <div class="text2" >
                      <?php echo $course_name;?>
                  </div>
                  <div class="status" style="display: inline-flex;font-size: 26px; font-weight: 500;">
                  <div class="created_by">Created By : </div>
                  <div class="tchr_name" style="padding-left:7px;"> <?php echo $_SESSION['course_teacher'];?></div>
                  </div>
                </div>
            </div>

<!--Show all Assignment-->
            <div class="row">
            <div class="col-md-12">
              <?php
            $sql= "SELECT * FROM question_bank WHERE c_code='$tc_code' ORDER BY question_date DESC";
    if($result = $conn->query($sql)){
    if($result->num_rows > 0){
      ?>
       


              <div class="col-md-16">
              <div class="upload bg-alt">
                <table style="box-shadow: 0px 4px 4px 1px #888888;">
                  <tr style="user-select:none;background: #2157c638;">
                    <th>Uploaded File Name</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  <?php
           
        while($row = $result->fetch_array()){
           ?>
      
            <div class="col-md-16"id="myScrollspy">
                  <tr>
   
                    <td><?php echo $row['question_file'];?></td>
      
                    <td><?php echo $row['question_date'];?></td>
       
                    <td><div class="dropdown " style="text-align: end;">
                              <a href="#"data-toggle="dropdown">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                 <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                              </svg>
                              </a>
                                   <div class="dropdown-menu">
                                      <a href="../question_bank/<?php echo $row['question_file']?>" target="_blank" class="dropdown-item">Download</a>
                                      
                                      <a href="admin_delete_classmaterial.php?from_queBank_file_id=<?php echo $row["question_id"]; ?>" class="dropdown-item">Delete</a>
                                    </div>
                           </div>
                    </td>
                    <?php
                    }
                  }
                }
                    ?>


              </div>
              </div>



            </div>
            </div>

            </div>
            


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

</body>
</html>