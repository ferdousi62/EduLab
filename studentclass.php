<?php
    include('dbconnection.php');
    session_start();
    if (isset($_SESSION['is_slogin']) && $_SESSION['is_slogin'] == true) {
       
        $semail = $_SESSION['login_semail'];
    } else {
        echo '<script>alert("Please Login as a student first!"); </script>';
        echo "<script> location.href='homepage.php'</script>";
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


    $sql2= "SELECT * FROM s_course WHERE s_user_name='".$_SESSION['login_susername']."'";
    $susername= $_SESSION['login_susername'];
    $sfullname= $_SESSION['fullname'];
    
    $result2= $conn->query($sql2);
    
    
    if($result2->num_rows>0){
        
       
    
       } else {
        echo "<script> location.href='studentHomepage.php'; </script>";
       }

       if(isset($_REQUEST['upload_btn'])){
            
       
        $spost= $_REQUEST['spost'];
        if(preg_match('/^[ ]*$/i', $spost)){
            echo'<script>alert("Post can not contain only blank spaces!");</script>';
            echo "<script> location.href='studentclass.php'; </script>";
        }else{
       
        $sql = "INSERT INTO post (c_code,user_name,full_name,post) VALUES ('$sc_code', '$susername','$sfullname', '$spost')";
        
        if($conn->query($sql)){
            echo'<script>alert("Post uploaded successfully!");</script>';
            echo "<script> location.href='studentclass.php'; </script>";


        }
         
    

       
    
    else
    {
        echo'<script>alert( "Post can not be uploaded");</script>';
        
    }
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
            <li><a href="studentHomepage.php">Home</a></li>
            <li><a href="student_profile.php">Profile</a></li>
           
            <li><a href="#joinCourse" role="button" class="" data-toggle="modal">Join Class</a></li>
            <li><a href="logout.php" > Log Out </a></li>
        </ul>
    </div>



<!--strat greed system-->
<div class="container " style="margin-top: 40px;" data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
        <div class="col-md-2 sidebar_background" id="myScrollspy">
        
<!--side menu-->

<div class="list-group" style="  font-family: 'Oswald', sans-serif;text-align: center;" > 
    <a href="studentclass.php"  class="list-group-item list-group-item-action active" style="background: #2196f3;">Post</a>
    <a href="studentclassMaterial.php" class="list-group-item list-group-item-action active">Class Materials</a>
    <a href="student_take_quiz.php" class="list-group-item list-group-item-action active"> Quiz </a>
    <a href="studentassignment.php" class="list-group-item list-group-item-action active"> Assignment </a>
    <a href="student_questionBank.php" class="list-group-item list-group-item-action active"> Question Bank </a>
</div>


</div>
           
           
            <div class="col-md-10">
              <div class="demo-content bg-alt">
                  <div class="col-md-12">
                    <div class="course_title text2"  style="  font-family: 'Oswald', sans-serif;text-align: center; height: 112px;margin-bottom: 27px;">
                        <?php 
                        
                        echo $scourse_name; ?>
                    </div>
                    </div>
               
                   
                <div class="col-md-10">
              <div class="post bg-alt">
            
 <!--upload post option-->  
        <div class="custom-file">
        <form action="studentclass.php" method="POST" >
            <textarea rows="3" class="form-control"  name="spost" placeholder="Type your note here." required></textarea>
            
            
            <input type="hidden" name = "sc_code" value = "<?php echo $sc_code?>">
            <input type="hidden" name = "scourse_name" value = "<?php echo $scourse_name;?>">
            <button type="submit" class="btn  mr-auto" name="upload_btn" style="    font-family: 'Oswald';margin-left: 45%;color: white;" >Upload</button>
            </form>
            
           
            

<!--show all posts under tc_code -->
<?php

  $sql= "SELECT * FROM post WHERE c_code='$sc_code' ORDER BY post_date DESC";
 


  if($result = $conn->query($sql)){
     

     if($result->num_rows > 0){
         
             while($row = $result->fetch_array()){
                
                            

                

     ?>

<div class="col-md-16">
              <div class="post bg-alt">
              <div class="upload_partition container">
<div class="inline" style="display: -webkit-box;">
<div class='t_name text1' style="width: 97%;"><?php echo $row['full_name']; ?></div>

<?php
if($row['user_name']== $susername){
           ?>                 
<div  id="test">
  <div class="dropdown" style="text-align: end;">
    <a data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg></a>
    <div class="dropdown-menu">
    <div class="dropdown-item">
      <a>
      <button type="button" style="margin: auto;" class="edit_btn btn btn-primary" data-toggle="modal" data-target="#edit_post" data-title=" <?php echo $row['post_id']; ?>">
    Edit</button></a></div>
<div class="dropdown-item" >
  
  <a href="student-delete-process.php?post_id=<?php echo $row["post_id"]; ?>">Delete</a>
   
</div>
       
    </div>
  </div>
</div>

     <?php
}
?>
 
 </div>
 <div class='post_date'><?php echo $row["post_date"]; ?></div>
 <div class='t_post' ><?php echo $row["post"]; ?></div>







 </div>
</div>
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
    </div>

    <script>
$('a[data-toggle="dropdown"]').click(function() {
  dropDownFixPosition($(this), $('.dropdown-menu'));
});

function dropDownFixPosition(a, dropdown) {
  var dropDownTop = a.offset().top + a.outerHeight();
  dropdown.css('top', dropDownTop + "px");
  //Delete - dropdown.width() if you want menu to be bottom right of link
  dropdown.css('left', a.offset().left - dropdown.width() + "px");
}
//Avoids confirm form resubmission
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>


<!--Popup for Edit Post-->  
<div id="edit_post" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content color1">
                
                    <div class="modal-header">
                        <h5 class="modal-title"style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body"> 
     
                    
    <form action="studentclass.php" method="post" >
    <input type="hidden" class="custom-post-input" name="pid" id="p_id">

<div class="custom-file">
<label class="custom-post-label" ></label>
 
  <textarea rows="3" class="form-control"  name="tpost"  id="post" required></textarea>
  </div>


</div>
<div id="editpost_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display: contents;">
    <strong><div class="editpost_alert_show"></div></strong> 
   
</div>
<div class="modal-footer" style="margin-top: 16px; font-family: 'Oswald';margin-left: 55%;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary mr-auto update_post" name="update_post">Update</button>
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
              $("#edit_post").on("show.bs.modal", function(event){
        // Get the button that triggered the modal
        var button = $(event.relatedTarget);

        // Extract value from the custom data-* attribute
        var str = button.data("title");
        //e.preventDefault();
        $.ajax({
              type: "POST",
              url: "editpost.php",
              data: {
                  'checking_btn' : true,
                  'post_id': str,
              },
              
              success: function (response) {
                  console.log(response);
                    $.each(response, function (key, value) { 
                      
                      $('#p_id').val(value['post_id']);
                        $('#post').val(value['post']);
                       
                       
                       

                       
                      
                    });

                 // $('.modal_body_class').html(response);
                  //$('#modal_id').modal('show');
              }
          });
    });
    
  });
});



$(document).ready(function () {
  //  getdata();
 
         $('.update_post').click(function (e) { 
         
             
       
 
          var pid= $('#p_id').val();
       var post= $('#post').val();
      

       
$.ajax({
    type: "POST",
    url: "editpost.php",
    data: {
        'checking_update' : true,
                  'post': post,
                  'pid': pid,
                  
                  
    },
   
    success: function (response) {
        document.getElementById("editpost_alert_show").style.visibility = "visible";
           document.getElementById("editpost_alert_show").style.display = "flex";
                  $('.editpost_alert_show').html(response);
        
    }
});
      
    
   });

});
</script>




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
      //  $( "#joinclass_alert_show" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 600 );
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
</body>
</html>