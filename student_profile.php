<?php
include('dbconnection.php');
session_start();
if (isset($_SESSION['is_slogin']) && $_SESSION['is_slogin'] == true) {
  
    $semail = $_SESSION['login_semail'];
} else {
    echo '<script>alert("Please Login as a student first!"); </script>';
    echo "<script> location.href='homepage.php'</script>";
}

$sql = "SELECT * FROM s_registration WHERE s_email='$semail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$susername = $row["s_user_name"]; 
$sfullname = $row["s_full_name"];
$_SESSION['s_full_name']= $sfullname;
//echo $susername;
//echo $sfullname;

}
//join course button





//susername theika semail change korsi
//Getting student registration data
$sql5="SELECT * FROM s_registration WHERE s_email='".$semail."'";
$result= $conn->query($sql5);
if($result->num_rows>0){
    $row = $result->fetch_array();
    $susername=$row["s_user_name"];//ami add korsi
    $sfullname= $row["s_full_name"];
        $pro_pic= $row["s_pro_pic"];
        $phone_no= $row["s_phone"];
        $date_of_birth= $row["s_date_of_birth"];
        $birth_place= $row["s_birth_place"];
        $education= $row["s_education"];
        $interest= $row["s_interest"];

    }
 

if(isset($_REQUEST['update_profile'])){
    $sphone= $_REQUEST['s_phone'];
    $sdate_of_birth= $_REQUEST['s_date_of_birth'];
    $sbirth_place= $_REQUEST['s_birth_place'];
    $seducation= $_REQUEST['s_education'];
    $sinterest= $_REQUEST['s_interest'];
           
if($sdate_of_birth==""){
    $sdate_of_birth=$_REQUEST['s_date_of_birth_hidden'];
}
    $sql5 = "UPDATE s_registration SET s_phone= '$sphone',s_date_of_birth= '$sdate_of_birth',s_birth_place= '$sbirth_place',
    s_education='$seducation',s_interest= '$sinterest' WHERE s_user_name='$susername'";
$result=$conn->query($sql5);
if($result==TRUE)
{
    echo '<script>alert("Profile Information Updated!"); </script>';
    echo "<script> location.href='student_profile.php'; </script>";
}
else
{echo '<script>alert("Error!!"); </script>';}
}


//Uploading image


if(isset($_POST['update_pic']))
{
// Posted Values

$imgfile=$_FILES["image"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else if (($_FILES["image"]["size"] > 2000000)) {

    echo "<script>alert('Image size exceeds 2MB');</script>";

}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"uploadeddata/".$imgnewfile);
// Query for insertion data into database
$sql3="UPDATE s_registration SET s_pro_pic='$imgnewfile' WHERE s_user_name='$susername'";
$result=$conn->query($sql3);
if($result==TRUE)
{
echo "<script>alert('Profile Picture Updated!!);</script>";
echo "<script> location.href='student_profile.php'; </script>";
}
else
{
echo "<script>alert('Error!');</script>";
}}
}
//$semail = $_SESSION['login_semail'];
//$susername= $_SESSION['login_username'];

 

?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Profile | EduLab</title>
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
.usertitle {
    font-family: 'Oswald';
    font-size: 31px;
    text-align: center;
    font-weight: 600;
    margin-top: 11px;
    color: black;
    margin-left: 15px;
}
.role {
    font-size: 27px;
    text-align: center;
    font-weight: 600;
    margin-top: 0px;
    color: #776969;
    margin-left: 15px;
    font-family: 'Roboto Condensed', sans-serif;
}
.about_background {
    background-image: linear-gradient( 
15deg, #2220af4a 24%, #2196f30d 79%);
}
.side_bar {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 1px;
    margin: 0px;
}
img.user_profile {
    vertical-align: middle;
    border-style: none;
    margin: 0px 11px;
    height: 162px;
    width: 166px;
    padding: 6px;
    box-shadow: 0px 3px 8px 0px #888888;
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
<div class="nav  fixed-top nav_background shadow">
        
        <div class="logo mr-auto">
        <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
        </div>
    
</div>



<!--Sidebar-->
<div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-2 sidebar_background">

        
            <div class="list-group" style="  font-family: 'Oswald', sans-serif;text-align: center;">
        <a href="studentHomepage.php"  class="list-group-item list-group-item-action active">Home</a>
        <a href="student_profile.php" class="list-group-item list-group-item-action active" style="background: #2196f3;">Profile</a>
        <a href="#joinCourse" role="button" data-toggle="modal" class="list-group-item list-group-item-action active">Join Class </a>
        <a href="student_change_password.php" class="list-group-item list-group-item-action active"> Change Password </a>
        <a href="logout.php" class="list-group-item list-group-item-action active"> Log Out </a>
    </div>

</div>
                 
          


<!--Class list-->
<div class="col-md-8">

<!--<p class="text2" style=" font-family: 'Oswald', sans-serif;text-align: initial;padding: 22px;font-size: 23px;">Edit Profile</p> -->
<div class="profile">
                 <div class="user_img  text-center">
                 <?php
                 if($pro_pic==''){
                    
                     ?>
                    
                    <img src="image/manimage.jpg" class="rounded-circle user_profile">
              

                 <?php }
                 else{

                    
?>
                    <img src="uploadeddata/<?php echo $pro_pic;?>" class="rounded-circle user_profile">
                    <?php
                }?>
                </div>
                <div class="usertitle text2" style="color: black;">
                <?php
                
                    echo $sfullname;
                
                ?>
                </div>
                </div>

                <div class="role">
                <?php
                
                    echo "Student";
                
                ?>
                </div>
                <div class="pro-pic" style="text-align: center;">
                <a href="#pro-pic" role="button" data-toggle="modal" style="font-family: 'Oswald';color: #31056a;letter-spacing: 1px;text-align: center;">
                Change profile pic </a>
      
                </div>

                <div class="about about_background" style="    box-shadow: 0px 3px 8px 0px #888888;font-family: 'Oswald';letter-spacing: 1px;">
                <table width="98%" >
																
                <tbody><tr>
									<td colspan="3">
										<div ></div></td>
								</tr>
								
								<tr height="30px">
									<td ><div align="right" class="formtitle"><strong>Name : </strong></div></td>
									<td colspan="2" ><div style="padding-left:16px;">
									<?php echo $sfullname;?> </div>
									</td>
								</tr>  
								<tr height="30px">
									<td ><div align="right" class="formtitle"><strong>Email : </strong></div></td>
									<td colspan="2"><div style="padding-left:9px;">
									<?php echo $semail;?></div>
									</td>
								</tr> 
								<tr height="30px">
									<td ><div align="right" class="formtitle"><strong>Phone :</strong> </div></td>
									<td colspan="2" ><div style="padding-left:9px;">
									<?php echo $phone_no;?></div>
									</td>
								</tr> 
								<tr height="30px">
									<td ><div align="right" class="formtitle"><strong>Date Of Birth :</strong> </div></td>
									<td colspan="2" ><div style="padding-left:9px;">
									<?php echo $date_of_birth;?></div>
									</td>
								</tr> 
                                <tr height="30px">
									<td ><div align="right" class="formtitle"><strong>Birth Place :</strong> </div></td>
									<td colspan="2" ><div style="padding-left:9px;">
									<?php echo $birth_place;?></div>
									</td>
								</tr> 
								<tr height="30px">
									<td ><div align="right" class="formtitle"><strong>Educational Qualification :</strong> </div></td>
									<td colspan="2" ><div style="margin-left:9px;">
									<?php echo $education;?></div>
									</td>
								</tr> 
								<tr height="30px">
									<td ><div align="right" class="formtitle"><strong>Areas of Interest :</strong> </div></td>
									<td colspan="2" ><div style="padding-left:9px">
									<?php echo $interest;?></div>
									</td>
								</tr> 
								
							  <tr height="30px">
								  <td> <div align="right" class="formtitle"style="margin-top:15px; ">
    <button type="button" class="edit_btn btn btn-primary" data-toggle="modal" data-target="#myModall" >
    Edit</button></td> </div></tr>
							</tbody></table>
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

<!--Popup Profile Pic Form-->
<div class="bs-example">
    
    
    <div id="pro-pic" class="modal fade" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Change Profile Pic</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <div class="bs-example" style="font-family: 'Oswald';letter-spacing: 1px;">
                
<form name="uploadimage"  enctype="multipart/form-data" method="post">
<table width="100%"  border="0">

<tr>
<th height="60" scope="row">Upload Image :</th>
<td><input type="file" name="image"  required /></td>
</tr>
<tr>
<th height="60" scope="row">&nbsp;</th>
<td><input type="submit" value="Submit" name="update_pic" class="btn btn-primary" style="margin-left: 25%;" /></td>
</tr>
</table>
</form>

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
        //$( "#joinclass_alert_show" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 600 );
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
<!--Popup for Edit profile-->  
<div id="myModall" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content color1">
                
                    <div class="modal-header">
                        <h5 class="modal-title"style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"> 
                    
                    
    <form action="student_profile.php" method="post" >
    <input type="hidden" class="custom-post-input" name="aid" id="ass_id">

    <div class="form-group">
        <label for="inputName">Phone no</label>
        <input type="number" class="form-control" id="inputEmail" name="s_phone" value="<?php echo $phone_no;?>" placeholder="017********">
    </div>
    <div class="form-group">
        <label for="inputEmail">Date of Birth</label>
        <input type="date" class="form-control" name="s_date_of_birth" id="inputEmail" max="2017-01-01">
        <input type="hidden" class="form-control" name="s_date_of_birth_hidden" id="inputEmail" value="<?php echo $date_of_birth;?>">
    </div>
    <div class="form-group">
        <label for="inputPassword">Birth Place</label>
        <input type="text" class="form-control" name="s_birth_place" value="<?php echo $birth_place;?>" id="inputPassword">
    </div>
    <div class="form-group">
        <label for="inputPassword">Educational Qualification</label>
        <input type="text" class="form-control" name="s_education" value="<?php echo $education;?>" id="inputPassword">
    </div>
    <div class="form-group">
        <label for="inputPassword">Areas of Interest</label>
        <input type="text" class="form-control" name="s_interest" value="<?php echo $interest;?>" id="inputPassword">
    </div>
    

</div>
<div class="modal-footer" style="margin-top: 16px; font-family: 'Oswald'; margin-left: 55%;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-auto update_assignment" name="update_profile">Update</button>
                </div>
</form>


                    <div class="alert_show">
                    
                    </div> 
                


                
            </div>
        </div>
    </div>



</body>
</html>