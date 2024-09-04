<?php 
include('dbconnection.php');
session_start();
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) {
   
    $temail = $_SESSION['login_temail'];
} else {
    echo '<script>alert("Please Login as a teacher first!"); </script>';
    echo "<script> location.href='homepage.php'</script>";
}

 
if(isset($_REQUEST['a_id'])){
    $_SESSION['a_id']= $_POST['a_id'];
    $a= $_SESSION['a_id'];
}
    
    else
    {
        $a= $_SESSION['a_id'];
    }
$course_name=$_SESSION['course_name'];
$t_fullname= $_SESSION['full_name'];


$sql= "SELECT * FROM assignment WHERE a_id='$a'";
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
    font-family: 'Oswald';
    text-align: center;
    font-weight: 100;
    font-size: 24px;
    letter-spacing: 1px;
}






textarea.form-control {
    height: auto;
    font-family: 'Oswald';
}
a {
    text-decoration: none;
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
input, textarea {
    border-radius: 7px;
    font-family: 'Oswald';
    box-shadow: 1px 1px 8px 2px #888888;
    color: #000000b8;
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
    text-align: center;
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
<div class="container customclass "style="margin-top: 40px;" data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
            

<!--course title-->
            <div class="col-md-8">
              <div class="demo-content ">
<div class="show_assignment">


<div class="ass_detail">
<div class="t_name" style="font-size: 25px;"><?php echo $a_name;?></div>
<div style="font-size: large;"><?php echo date("Y-m-d h:iA",strtotime($a_date));?></div>

<div style="display: inline-flex; width: -webkit-fill-available; justify-content: center;">
<div style="padding-right: 9px; font-weight: 600;color: #000000d4;"> Information: </div><?php echo $a_info;?>
</div>


<div style="display: inline-flex; width: -webkit-fill-available; justify-content: center;">
<div style="padding-right: 9px; font-weight: 600;color: #000000d4;"> DueTime: </div><?php echo date("Y-m-d h:iA",strtotime($a_duedate));?>
</div>

<a href="assignment_files/<?php echo $a_file?>" target="_blank"><div class="a_file"> <?php echo $a_file; ?> </div></a>
</div>


<div class="submit_option">
<?php
date_default_timezone_set('Asia/Dhaka');
$currentdate= date("Y-m-d H:i:s");
//echo $currentdate;
//$currentdate=date("Y-m-d H:i:s",strtotime($current));
$sql= "SELECT * FROM assignment_submissions WHERE a_id='$a'";
$sql2= "SELECT * FROM assignment WHERE a_id='$a'";
$result2= $conn->query($sql2);
    if($result2->num_rows>0){
        while($row2 = $result2->fetch_array()){
            $due= $row2['a_duedate'];
            $duedate=date("Y-m-d H:i:s",strtotime($due));
            //echo $duedate;
        }
    }
if($conn->query($sql)== TRUE)
{
    $result= $conn->query($sql);
    if($result->num_rows>0){?>

<div class="title">Submitted People</div>


<?php
        while($row = $result->fetch_array()){?>
           



            <div class="inline"style="display: -webkit-box;">

<div class="t_name"  style="width: 85%;"> <?php echo $row['s_full_name']; ?> (<?php echo $row['s_user_name']; ?>) <br></div>
<?php
if($row['a_marks']!=NULL){?>
<div class="t_name" style="margin-right: 4px;color: #073b46c4;" > Marks: <?php echo $row['a_marks']; ?>  <br></div>
<?php
} else{ ?>
<div class="t_name" style="margin-right: 4px;color: #073b46c4;" > Not marked <br></div>
    

    <?php
}
?>
<!--Dropdown menu-->
<?php
if($currentdate>=$duedate){
?>
<div  id="test">
<div class="dropdown" style="text-align: end;">
<a data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
<div class="dropdown-menu">


<div class="dropdown-item"><a>
    <button type="button" style="margin: auto;" class="marking_btn btn btn-primary" data-title="<?php echo $row['s_user_name']; ?>"data-toggle="modal" data-target="#myModall" data-id=" <?php echo $row['a_id']; ?>">
    marking</button></a></div>



</div>
</div>
</div>
<?php } ?>
<div>

</div>

<?php 

    
    ?>

</div>

            <div style="font-size: large;"> <?php echo $row['a_submission_date']; ?> </div>
           <div class="a_file"><a href="<?php echo $row['a_submission_file']?>"target="_blank" ><?php echo $row['a_submission_file'];?></a></div> 
           
           
            <?php
                    
        }
    } else{
        echo"<div  class='text1' > Students haven't submitted!</div>";

    }



}

?>

</div>


</div>

             

                  
                
</div>
</div>
<!--Show all Assignment-->
      <div class="col-md-4">
         <div class="col-md-16">
         <div class="demo-content">
              <div class="schedule " style="background: white;">
              <div class="t_name text2" style="font-size: 27px; font-family: 'Oswald', sans-serif; border-bottom: 1px solid #e1e1e7;"><?php echo $course_name;?></div>
              <div class="t_name" style="font-weight: 500;"><?php echo $t_fullname;?></div>
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
         <div class="col-md-16" style="margin-top: -12px;">

         <div class="demo-content " >
         <?php
      
if($currentdate>=$duedate){
?>
  <p style="font-family: 'Playfair Display';color: #1db730;border: 1px dashed #e1e1e7;
    border-radius: 3px;
    padding: 8px;
    background: aliceblue;"> You can mark now.</p>
        <?php
        }
        else{
            ?>
          
            <p style="font-family: 'Playfair Display';color: #d13227;border: 1px dashed #e1e1e7;
    border-radius: 3px;
    padding: 8px;
    background: aliceblue;"> You can mark after deadline period.</p>
            <?php 
        }
        ?>
         </div>
        </div>
       </div>
        
           
 

        </div>
        
        </div>   
    </div>
  


 


<!--Popup for marking-->  
<div id="myModall" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered  modal-md">
            <div class="modal-content color1">
                
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Edit Assignment</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"> 
                    
                    
    <form onsubmit="return false;" action="viewsubmission.php" method="post" style="font-family: 'Roboto Condensed';letter-spacing: 1px;" >
    <input type="hidden" class="custom-post-input" name="aid" id="m_ass_id">
    <input type="hidden" class="custom-post-input" name="susername" id="m_s_username">
    <div class="form-group">
            <label for="courseCode">Mark </label>
            <input type="number" class="form-control" id="update_mark" placeholder="marking this assignment" >
        </div>
<div  style="  font-family: 'Oswald'; ">
                <!-- Error Alert -->
                <div id="mark_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display: contents;">
                <strong><div class="mark_alert_show"></div></strong> 
                </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-auto assignment_mark" name="update_assignment">Update</button>
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
    $('.marking_btn').click(function (e) { 
              $("#myModall").on("show.bs.modal", function(event){
        // Get the button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract value from the custom data-* attribute
        var username = button.data("title");
       
        var str = button.data("id");
        $(this).find(".modal-title").text(username);
        //e.preventDefault();
        $.ajax({
              type: "POST",
              url: "marking.php",
              data: {
                  'checking_btn' : true,
                  'a_id': str,
                  'username': username,
              },
              
              success: function (response) {
                  //console.log(response);
                    $.each(response, function (key, value) { 
                        console.log(value);
                       // $('#ass_date').val(new Date().value['a_date']);
                   
          //  $("#ass_date").val(inpValue);
                        $('#m_ass_id').val(value['a_id']);
                        $('#m_s_username').val(value['s_user_name']);
                        
                       
                       

                       
                      
                    });

                
              }
          });
    });
    
  });
});




$(document).ready(function () {
  //  getdata();
 
         $('.assignment_mark').click(function (e) { 
         
      
       var mark= $('#update_mark').val();
       var username= $('#m_s_username').val();
       var a_id= $('#m_ass_id').val();
      
       if(mark=='') {
        document.getElementById("mark_alert_show").style.visibility = "visible";
        document.getElementById("mark_alert_show").style.display = "flex";
        $('.mark_alert_show').html("empty field!");
        $( "#mark_alert_show" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 600 );
       // $("#treg_alert_show").show();

       }
       else if(mark<0) {
        document.getElementById("mark_alert_show").style.visibility = "visible";
        document.getElementById("mark_alert_show").style.display = "flex";
        $('.mark_alert_show').html("Invalid mark!!");
        $( "#mark_alert_show" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 600 );
       // $("#treg_alert_show").show();

       }
       else{
       
$.ajax({
    type: "POST",
    url: "marking.php",
    data: {
        'checking_update' : true,
                  'mark': mark,
                  'username': username,
                  'a_id': a_id,
                  
                  
    },
   
    success: function (response) {
        // $('.modal_body_class').html(response);
                  //$('#modal_id').modal('show');
        document.getElementById("mark_alert_show").style.visibility = "visible";
        document.getElementById("mark_alert_show").style.display = "flex";
         $('.mark_alert_show').html(response);
    }
});
      
       }
   });

});
  
</script> 





</body>
</html>
