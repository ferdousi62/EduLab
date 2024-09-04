<?php
include_once 'dbconnection.php';
session_start();
if (isset($_SESSION['is_slogin']) && $_SESSION['is_slogin'] == true) {
   
    $semail = $_SESSION['login_semail'];
} else {
    echo '<script>alert("Please Login as a student first!"); </script>';
    echo "<script> location.href='homepage.php'</script>";
}

$q_id= $_REQUEST['q_id'];
$sql= "SELECT * FROM quiz WHERE q_id='$q_id'";
    $conn->query($sql);
    $result = $conn->query($sql);
    if($result->num_rows > 0){
  
        while($row = $result->fetch_array()){
            $q_name= $row['q_name'];
            $q_info= $row['q_info'];
            $q_date= $row['q_date'];
            $q_duedate= $row['q_duedate'];
            $q_startdate= $row['q_startdate'];
            
        }

    }
    date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
    //echo "Todays ".date("Y-m-d h:i:s");
    $currentdate= date("Y-m-d H:i:s");
    $duedate= date("Y-m-d H:i:s",strtotime($q_duedate));
    if($currentdate>=$duedate)
    {
        echo'<script>alert( "Exam time expired!");</script>';
        echo "<script> location.href='student_take_quiz.php'; </script>"; 

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
    

    
 
    $sql2= "SELECT * FROM course WHERE c_code='$sc_code'";
    $conn->query($sql2);
    $result2 = $conn->query($sql2);
    if($result2->num_rows > 0){
  
        while($row2 = $result2->fetch_array()){
            $t_fullname= $row2['full_name'];

        }
    }
 
    
   
 
$sql4="SELECT * FROM quiz WHERE q_id='$q_id'";
$result4 = $conn->query($sql4);
if($result4->num_rows > 0){

  while($row = $result4->fetch_array()){
            $c[1]=$row['ques1'];
            $c[2]=$row['ques2'];
            $c[3]=$row['ques3'];
            $c[4]=$row['ques4'];
            $c[5]=$row['ques5'];
            $c[6]=$row['ques6'];
            $c[7]=$row['ques7'];
            $c[8]=$row['ques8'];
            $c[9]=$row['ques9'];
            $c[10]=$row['ques10'];

}}
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
 -webkit-text-stroke: 1px #2c3e9d;
  text-shadow: 0px 1px 4px #23430C;
  color: #23430c;
    margin-top: 37px;
    
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
label {
    font-weight: 100;
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

.text6 {
 color: white;
 text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
}
input {
   font-family: 'Oswald';
}
.date {
    padding: 0px 9px;
    color: #8b8e9f;
    border: 1px dashed #e1e1e7;
    margin-top: 8px;
    border-radius: 4px;
    font-family: 'FontAwesome';
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
}
.submit_option{
   
    border: 1px dashed #e1e1e7;
    margin-top: 8px;
    padding: 10px 12px;
   
    background: aliceblue;
    border-radius: 4px;
    font-family: 'Roboto Condensed';
    font-size: 22px;
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
input, textarea {
    border-radius: 7px;
    font-family: 'Oswald';
    box-shadow: 1px 1px 8px 2px #888888;
    color: #000000b8;
}


.duration{
    display: grid;
    margin: 8px;
    padding: 4px;
    box-shadow: 1px 4px 9px 2px #888888;
    border-radius: 5px;
    background: #3e8150a1;
    font-family: 'Oswald';
}


.submit_button{
    padding: 0px 7px;
    margin-left: 45%;
    background: #2240c2;
    color: white;
    border-radius: 7px;
    font-family: 'Oswald';
    box-shadow: 1px 1px 8px 2px #888888;
    border: inset;
    display: initial;
    cursor: pointer;
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
            
            
          
            <li><a href="logout.php" > Log Out </a></li>
        </ul>
    </div>


   




   



<!--start greed system-->
<div class="container customclass" style="margin-top: 25px;" data-spy="scroll" data-offset="15" data-target="#myScrollspy">
        <div class="row">
            

<!--course title-->
            <div class="col-md-8">
              <div class="demo-content ">
<div class="show_assignment">


<div class="ass_detail">
<div class="t_name text2"  style="font-size: 25px; color: #1d4748e0;"><?php echo $q_name;?></div>
<div style="display: inline-flex; color: #17682cd4;font-weight: 600;">
            <div style="   padding-right: 9px; "> Starting time: </div><?php echo date("Y-m-d h:iA",strtotime($q_startdate)); ?>
            </div>
<div class="ass_name">Information: <?php echo $q_info;?></div>

<div class="sub_time" style="display: inline-flex;font-weight: 600;color: #891212d4;">
            <div style="  padding-right: 9px;  "> Submission Deadline: </div><?php echo date("Y-m-d h:iA",strtotime($q_duedate)); ?>
            </div>
</div>
<div class="submit_option">

<h4 style="margin-left: 45%;    color: #161591;font-family: 'Oswald';font-weight: 700;">QUESTION</h4>


<div class="containe mt-5">
  <?php
   $count=0;
      for($i=1;$i<11;$i++){ 
         
          if($c[$i]!=''){
              $count++;

      ?>
    <form action="student_quiz_submit.php" method="post" class="mb-3"id="Quiz_submit">
      <div class="select-block">
      <input type="hidden"  name="q_id" value = "<?php echo $q_id;?>">
      <div class="t_name" style="font-size: 20px; font-weight: 500;color: #02061c;"><?php echo $i;?>.<?php echo $c[$i];?></div>
      
        <select style="background: #2fb02738;border-radius: 5px;font-family: sans-serif;font-size: 18px;" name="<?php echo $i;?>" required>
          <option value="" disabled selected hidden><?php echo $i;?></option>
          <option value="NULL" selected="selected">
          Select an Option
      </option>
          <option value="a">a</option>
          <option value="b">b</option>
          <option value="c">c</option>
          <option value="d">d</option>
          
        </select>
        
        
      </div>
<?php } }
$_SESSION['count']=$count;

?>
<div id="up_material_alert"class="alert alert-danger alert-dismissible fade show" style=" margin-top: 11px;visibility: hidden;display: contents;">
                   <strong><div class="up_material_alert"style=" font-family: 'FontAwesome';"></div></strong>
                </div>
<button type="submit" name="submit" class="submit_button" style="display: initial;cursor: pointer;"
                 onclick="if (!confirm('Do you want to submit Quiz?')) { return false }"><span>Submit</span></button>

<script>
   
  
</script>

                
    </form>



    
  </div>
                  
                 
                    
               


</div>


</div>

             

                  
                
</div>
</div>
<!--Show all Assignment-->
      
         <div class="col-md-4">
         <div class="demo-content">
         <input type="hidden" id="duedate" value="<?php echo $q_duedate;?>">
         
  
              <div class="schedule " style="background: white;">
              <div class="t_name text2" style="font-size: 27px;font-family: 'Oswald', sans-serif;  border-bottom: 1px solid #e1e1e7;"><?php echo $scourse_name;?></div>
              <div class="t_name" style="font-weight: 500;"><?php echo $t_fullname;?></div>
              <div class="date">Current Time:
              <?php
              
              date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
              //echo "Todays ".date("Y-m-d h:i:s");
              echo date("Y-F j-l ");
              echo date("h:i:s");
                ?>
              </div> 
              <h4 id="headline" class="text5">Countdown Exam Duration</h4>
  <div id="countdown">
    <ul style="display: inline-flex;">
      <li class="duration"><span id="days" style="text-align: center;"></span>days</li>
      <li class="duration"><span id="hours" style="text-align: center;"></span>Hours</li>
      <li class="duration"><span id="minutes" style="text-align: center;"></span>Minutes</li>
      <li class="duration"><span id="seconds" style="text-align: center;"></span>Seconds</li>
    </ul>
  </div>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script>
(function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;


        var coun= $('#duedate').val();
  const countDown = new Date(coun).getTime(),
      x = setInterval(function() {    

        const now = new Date().getTime(),
              distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
            alert( "IN FUNCTION!");
            var form=document.getElementById('Quiz_submit');
        var fdata=new FormData(form); 
        $.ajax({
            type: "POST",
            url: 'auto_quiz_submit.php',
            data: fdata,
            contentType: false,
            cache: false,
            processData:false,
            success: function(result)
            { 
               
            }
        });
          document.getElementById("headline").style.color = "red";
          document.getElementById("headline").innerText = "Expired!";
         // document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
        
         // break;
           
       
               
        }
        //seconds
      }, 0)
  }());
</script>
            </div>
     </div> 

         
         </div>

           
        
           
 

        </div>
        
        </div>   
    </div>
  

    

  <?php
  
  if(isset($_REQUEST['submit'])){
    date_default_timezone_set('Asia/Dhaka'); //Comparing date and time
    //echo "Todays ".date("Y-m-d h:i:s");
    $currentdate= date("Y-m-d H:i:s");

    
    if($currentdate>=$duedate)
    {
        echo'<script>alert( "Submission time expired!");</script>';
        echo "<script> location.href='student_take_quiz.php'; </script>"; 

    }
    else{

    $count1=$_SESSION['count'];


    for($j=1;$j<=$count1;$j++){
         
        $a[$j]= $_POST[$j];
          
      
      
      }
      
      $sql4="SELECT * FROM quiz WHERE q_id='$q_id'";
      $result4 = $conn->query($sql4);
    if($result4->num_rows > 0){
  
        while($row = $result4->fetch_array()){
            $b[1]=$row['q_ans1'];
            $b[2]=$row['q_ans2'];
            $b[3]=$row['q_ans3'];
            $b[4]=$row['q_ans4'];
            $b[5]=$row['q_ans5'];
            $b[6]=$row['q_ans6'];
            $b[7]=$row['q_ans7'];
            $b[8]=$row['q_ans8'];
            $b[9]=$row['q_ans9'];
            $b[10]=$row['q_ans10'];
          

        }

    } $marks=0;
    for($i=1;$i<=$count1;$i++){
        if($a[$i]==$b[$i]){
            $marks++;
        }
    }
    //echo $c[1];
    

    $sql5="INSERT INTO quiz_marks(s_user_name,s_full_name,q_id, q_marks)
    VALUES ('$susername', '$sfullname', '$q_id', '$marks')";
    if($conn->query($sql5)== TRUE){
       
        echo "<script> location.href='student_take_quiz.php'; </script>";
     
        echo'<script>alert( "Answers submitted successfully!");</script>';
    }
    else{
        echo'<script>alert( "Error: Answers not Submitted");</script>';
       echo "<script> location.href='student_take_quiz.php'; </script>";
       
    }







}
  }
  ?>

</body>
</html>
