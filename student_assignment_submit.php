<?php
include_once 'dbconnection.php';
session_start();
if (isset($_SESSION['is_slogin']) && $_SESSION['is_slogin'] == true) {
   
    $semail = $_SESSION['login_semail'];
} else {
    echo '<script>alert("Please Login as a student first!"); </script>';
    echo "<script> location.href='homepage.php'</script>";
}
$a_id= $_REQUEST['a_id'];
$_SESSION['a_id']=$a_id;
$sql= "SELECT * FROM assignment WHERE a_id='$a_id'";
    $conn->query($sql);
    $result = $conn->query($sql);
    if($result->num_rows > 0){
  
        while($row = $result->fetch_array()){
            $a_name= $row['a_name'];
            $a_info= $row['a_info'];
            $a_file= $row['a_file'];
            $a_date= $row['a_date'];
            $a_duedate= $row['a_duedate'];
            
        }

    }
    date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
    //echo "Todays ".date("Y-m-d h:i:s");
    $currentdate= date("Y-m-d H:i:s");
    $duedate= date("Y-m-d H:i:s",strtotime($a_duedate));
   
    if($currentdate>=$duedate)
    {
        echo'<script>alert( "Assignment time expired!");</script>';
        echo "<script> location.href='studentassignment.php'; </script>"; 

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


    $susername= $_SESSION['login_susername'];
    $sfullname= $_SESSION['fullname'];
    $sql= "SELECT * FROM assignment WHERE a_id='$a_id'";
    $conn->query($sql);
    $result = $conn->query($sql);
    if($result->num_rows > 0){
  
        while($row = $result->fetch_array()){
            $a_name= $row['a_name'];
            $a_info= $row['a_info'];
            $a_file= $row['a_file'];
            $a_date= $row['a_date'];
            $a_duedate= $row['a_duedate'];
            
        }

    }

    
 
    $sql2= "SELECT * FROM course WHERE c_code='$sc_code'";
    $conn->query($sql2);
    $result2 = $conn->query($sql2);
    if($result2->num_rows > 0){
  
        while($row2 = $result2->fetch_array()){
            $t_fullname= $row2['full_name'];

        }
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    border: 1px dotted #03a9f44a;
    cursor: pointer;
    background: #c0d1d93b;
    text-align: center;
    font-family: 'Oswald';
    letter-spacing: 1px;
    box-shadow: 1px 1px 6px 2px #888888a3
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
label {
    font-weight: 100;
    font-family: 'Oswald';
    letter-spacing: 1px;
}
.text6 {
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
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
        <li><a href="#">Profile</a></li>
        <li><a href="#">Notification</a></li>
        
      
        <li><a href="logout.php"> Log Out </a></li>
    </ul>
</div>








<!--start greed system-->
<div class="container customclass " style="margin-top: 40px;" data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
            

<!--course title-->
            <div class="col-md-8">
              <div class="demo-content ">
<div class="show_assignment">


<div class="ass_detail">
<div class="t_name" style="font-size: 25px;"><?php echo $a_name;?></div>
<div style="font-size: large;"><?php echo $a_date;?></div>
<div style="display: inline-flex; width: -webkit-fill-available; justify-content: center;">
<div style="padding-right: 9px; font-weight: 600;color: #000000d4;"> Information: </div><?php echo $a_info;?>
</div>

<div style="display: inline-flex; width: -webkit-fill-available; justify-content: center;">
<div style="padding-right: 9px; font-weight: 600;color: #000000d4;"> DueTime: </div><?php echo $a_duedate;?>
</div>


<div class="a_file"><a href="assignment_files/<?php echo $a_file?>"target="_blank" > <?php echo $a_file; ?> </div></a>
</div>
<div class="submit_option">
<form  action="student_assignment_submit.php" method="post" enctype="multipart/form-data" >

<div class="custom-file" style="    font-weight: 100;
    font-family: 'Oswald';
    letter-spacing: 1px;">
    <input type="hidden" name="a_id" value="<?php echo $a_id?>">
<label class="custom-post-label">Select a file to submit</label>

  <input type="file" class="custom-post-input" name="a_submission_file" id="file">
  
  
</div>
<script>
    var file=document.getElementById('#file');
    console.log(file);
    $('#file').val(file);
</script>

                <!-- Error Alert -->
                <div id="submit_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display:contents;">
    <strong><div class="submit_alert_show"></div></strong> 
   
</div>
                  
                    
                  
                    <button type="submit" class="btn btn-primary mr-auto" name="submit_assignment_btn" style="    font-family: 'Oswald';margin-left: 45%;color: white;">Submit</button>
                    
               
</form>

</div>


</div>

             

                  
                
</div>
</div>
<!--Show all Assignment-->
      
         <div class="col-md-4">
         <div class="demo-content">
              <div class="schedule " style="background: white;">
              <div class="t_name text2" style="font-size: 27px;  border-bottom: 1px solid #e1e1e7;"><?php echo $scourse_name;?></div>
              <div class="t_name test6 " style="font-weight: 500;"><?php echo $t_fullname;?></div>
              <div class="date">Current Time:
              <?php
              
            //  date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
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
  
<?php
    if(isset($_REQUEST['submit_assignment_btn'])){
    date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
    //echo "Todays ".date("Y-m-d h:i:s");
    $currentdate= date("Y-m-d H:i:s");
    $a_id= $_REQUEST['a_id'];
    $afile=$_FILES["a_submission_file"]["name"];
  
    $sql4= " SELECT * FROM assignment_submissions WHERE a_id='$a_id' AND s_user_name='$susername'";
    $result4= $conn->query($sql4);
    

    if($afile==''){
        echo'<script>document.getElementById("submit_alert_show").style.visibility="visible";</script>'; 
        echo'<script>document.getElementById("submit_alert_show").style.display="flex";</script>'; 
        echo'<script>$(".submit_alert_show").html("Please Upload a File!");</script>';
       
        //echo $return ="Please Upload a File!";
    }
    
    
    else if($currentdate>=$duedate)
    {
        echo'<script>document.getElementById("submit_alert_show").style.visibility="visible";</script>'; 
        echo'<script>document.getElementById("submit_alert_show").style.display="flex";</script>'; 
        echo'<script>$(".submit_alert_show").html("Submission time expired!");</script>'; 
        //echo'<script>alert( "Submission time expired!");</script>';
        echo "<script> location.href='studentassignment.php'; </script>"; 

    }
    else{


// get the file extension
$extension = substr($afile,strlen($afile)-4,strlen($afile));
// allowed extensions
$allowed_extensions = array(".pdf",".doc","docx");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
    echo'<script>document.getElementById("submit_alert_show").style.visibility="visible";</script>'; 
    echo'<script>document.getElementById("submit_alert_show").style.display="flex";</script>'; 
    echo'<script>$(".submit_alert_show").html("Invalid format. Only pdf / doc / docx  format allowed!");</script>';

//echo "<script>alert('Invalid format. Only pdf / doc / docx  format allowed');</script>";
//echo "<script> location.href='student_assignment_submit.php'; </script>";
}
else if (($_FILES["a_submission_file"]["size"] > 5000000)) {
   // echo '<script>$("#file").attr("value", afile);</script>'; 
    echo '<script>document.getElementById("submit_alert_show").style.visibility="visible";</script>'; 
    echo '<script>document.getElementById("submit_alert_show").style.display="flex";</script>'; 
    echo '<script>$(".submit_alert_show").html("File size exceeds 5MB!");</script>';
    //echo "<script>alert('File size exceeds 5MB');</script>";
   // echo "<script> location.href='student_assignment_submit.php'; </script>";

}
else if($result4->num_rows>0){
    // Code for move image into directory
move_uploaded_file($_FILES["a_submission_file"]["tmp_name"],"assignment_submissions/".$afile);
    $sql5 = "UPDATE assignment_submissions SET  s_user_name='$susername',s_full_name='$sfullname',a_submission_file='$afile' WHERE a_id='$a_id'";
        

    if($conn->query($sql5)==TRUE){
        echo '<script>document.getElementById("submit_alert_show").classList.remove("alert-danger");</script>';
        echo '<script>document.getElementById("submit_alert_show").classList.add("alert-success");</script>';
        echo'<script>document.getElementById("submit_alert_show").style.visibility="visible";</script>'; 
        echo'<script>document.getElementById("submit_alert_show").style.display="flex";</script>'; 
        //echo'<script>$(".submit_alert_show").html("Assignment Posted Successfully");</script>';
        echo'<script>alert( "Assignment Posted Successfully");</script>';
       // echo '<script> setTimeout(() => window.location.reload("student_assignment_submit.php")); </script>';
        echo "<script> location.href='studentassignment.php'; </script>";
     
     //echo "<script> location.href='studentassignment.php'; </script>";
    }
}
else
{

// Code for move image into directory
move_uploaded_file($_FILES["a_submission_file"]["tmp_name"],"assignment_submissions/".$afile);
// Query for insertion data into database
$sql3= "INSERT INTO assignment_submissions (a_id,s_user_name,s_full_name,a_submission_file ) 
VALUES ('$a_id', '$susername','$sfullname', '$afile')";
if($conn->query($sql3)== TRUE){
    echo '<script>document.getElementById("submit_alert_show").classList.remove("alert-danger");</script>';
    echo '<script>document.getElementById("submit_alert_show").classList.add("alert-success");</script>';
    echo'<script>document.getElementById("submit_alert_show").style.visibility="visible";</script>'; 
    echo'<script>document.getElementById("submit_alert_show").style.display="flex";</script>'; 
    //echo'<script>$(".submit_alert_show").html("Assignment Posted Successfully");</script>';
    echo'<script>alert( "Assignment Posted Successfully");</script>';
   // echo '<script> setTimeout(() => window.location.reload("student_assignment_submit.php")); </script>';
    echo "<script> location.href='studentassignment.php'; </script>";
 
 //echo "<script> location.href='studentassignment.php'; </script>";
}
else{
    echo'<script>document.getElementById("submit_alert_show").style.visibility="visible";</script>'; 
    echo'<script>document.getElementById("submit_alert_show").style.display="flex";</script>'; 
    echo'<script>$(".submit_alert_show").html("Unable to post assignment!");</script>';
 //echo'<script>alert( "Unable to post assignment");</script>';
 //echo "<script> location.href='studentassignment.php'; </script>";
}

        
    }


} 
}
?>
</body>
</body>
</html>
