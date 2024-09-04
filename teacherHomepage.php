<?php
include('dbconnection.php');
session_start();

 if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) {
   
    $temail = $_SESSION['login_temail'];
} else {
    echo '<script>alert("Please Login as a teacher first!"); </script>';
    echo "<script> location.href='homepage.php'</script>";
}

$sql = "SELECT * FROM t_registration WHERE email='$temail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$tusername = $row["user_name"]; 
$tfullname = $row["full_name"];
$_SESSION['full_name']= $tfullname;

}



$sql2= "SELECT * FROM course WHERE user_name='".$tusername."'ORDER BY course_name ASC";
$result2= $conn->query($sql2);
   
    

    
        
        $sql= "SELECT * FROM t_registration WHERE
         user_name='".$tusername."' limit 1";
         $result= $conn->query($sql);
         if($result->num_rows==1){
            $row = $result->fetch_array();
            $tfullname = $row["full_name"]; 
            $pro_pic= $row["pro_pic"];

            $_SESSION['username'] = $tusername;
            $_SESSION['is_coursecreated'] = true;
        
         }



$temail = $_SESSION['login_temail'];
$tusername= $_SESSION['login_username'];
 

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home | EduLab</title>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="css/teacherHomepageStyle.css">
<link rel="stylesheet" href="css/class.css">
<style>



.blockContainer {
      display: block;
      margin-block: 5px;
     
  }
  .class li {
   
    color: black;
    background-color: #8abed7b5;
    line-height: 24px;
    
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
li  :hover {
    background: beige;
   
    color: black;
    box-sizing: border-box;
    text-decoration: none;
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
  


.class p {
    margin: 14px;
    font-family: 'FontAwesome';
    font-weight: 600;
    font-size: 18px;
    color: black;
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
15deg, #2220af 16%, #2196f3 79%);
}
.shadow{
  border: 1px solid;
  color: white;
  box-shadow: 5px 10px 8px 5px #888888;
}
.text6 {
    text-shadow: 0 13.36px 8.896px #607d8b, 0 -2px 1px #67766854;
    letter-spacing: 1px;
    color: #0b0e0b;
}
}
.class p:hover{

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
.text5 {
 -webkit-text-stroke: 1px #F8F8F8;
  text-shadow: 0px 1px 4px #23430C;
  color: #4a7e4e;
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
.usertitle {
    font-family: 'Roboto Condensed';
    font-size: 23px;
    text-align: center;
    font-weight: 600;
    margin-bottom: 7px; 
   color: white;
}
.dropdown-item :hover{
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
<div class="nav  fixed-top nav_background shadow">
        
        <div class="logo mr-auto">
        <div class="text1" style="    color: white; font-size: 26px;font-weight: 700;">EduLab</div>
        </div>
    
</div>

<!--Sidebar-->
<div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-2 sidebar_background">

            
            <div class="profile">
                 <div class="user_img  text-center">
                 <?php
                 if($pro_pic==""){
                    
                     ?>
                    
                    <img src="image/manimage.jpg" class="rounded-circle user_profile">
              

                 <?php }
                 else{

                    
?>
                    <img src="uploadeddata/<?php echo $pro_pic;?>" class="rounded-circle user_profile">
                    <?php
                }?>
                </div>
                <div class="usertitle text6">
                <?php
                
                    echo $tfullname;
                
                ?>
                </div>
                </div>
                
                
                <div class="bs-example">    
    <div class="list-group" style="  font-family: 'Oswald', sans-serif;text-align: center;">
        <a href="teacherHomepage.php"  class="list-group-item list-group-item-action active" style="background:#2196f3;">Home</a>
        <a href="profile.php" class="list-group-item list-group-item-action active">Profile</a>
        <a href="#createCourse" role="button" data-toggle="modal" class="list-group-item list-group-item-action active">Create Class </a>
        <a href="changepassword.php" class="list-group-item list-group-item-action active"> Change Password </a>
        <a href="logout.php" class="list-group-item list-group-item-action active"> Log Out </a>
    </div>
</div>
          
            
            </div>
                


<!--Class list-->
<div class="col-md-8">


<?php
if($result2->num_rows>0){
    ?>
  
  
  
   
   <p class="text2" style=" font-size: 22px; font-family: 'Oswald', sans-serif;text-align: center;">Your Courses</p>
   <div class="class">
    <?php
while($row = mysqli_fetch_array($result2)) {
   
        ?>
       
        <li class="inline">
       

  <div style="display: inline-flex; font-family: 'Oswald', sans-serif;display: -webkit-box;">
  <form method="post" action="class.php" style="display: inline-flex; display: -webkit-box;width: 100%">
            <input type="hidden" name="tc_code" value="<?php echo $row['c_code']; ?>">
            <input type="hidden" name="course_name" value="<?php echo $row['course_name']; ?>">
            <input type="hidden" name="t_name" value="<?php echo $tfullname; ?>">
            <button type="submit"style="display: inline-flex; background: border-box;width: 100%;border: none;" >
            <div class="c_name" style="padding-left: 7%;text-align: initial; width: 65%"><?php echo $row["course_name"]; ?></div>
            <div class="join_code">Join Code: <?php echo $row["c_code"]; ?></div>   
            
     

            </button>
            
            </form>
            
            <div class="dropdown" style="margin-left: -20px;">
  <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   
</a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href='tcourse_delete.php?tc_code=<?php echo $row["c_code"]; ?>'>Delete</a>
    <a class="dropdown-item" href='update-process.php?tc_code=<?php echo $row["c_code"]; ?>'>Update Join Code</a>
    
  </div>
</div>
</div>
        </li>



        <?php
        
        }
    }
    else
    {
        ?>
      <p class="text6 inline" style="  font-family: 'Oswald', sans-serif;text-align: center; padding-top: 20px; font-size: 17px;">
      You Haven't Created Any Course Yet! Please <a href="#createCourse" role="button" data-toggle="modal" class="list-group-item list-group-item-action active"
      style="color:red;display: contents;">Create A Course</a> </p>
        <?php
    }
?>

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