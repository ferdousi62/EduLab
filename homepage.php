
<?php

include('dbconnection.php');
session_start();
  




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>EduLab</title>
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
<link rel="stylesheet" href="css/test.css">


 
<style>
.nav ul li a:hover{
    color: yellow;
}

.dropdown-menu.show {
    display: block;
    background: darkblue;
    margin-left: 0px;
    margin-block: -4px;
    padding-top: 0px;
    padding: 0px;
    text-align: center;
    transition: 0.3s all;
    opacity: 0.85;
}
.title {
    font-family: 'FontAwesome';
    font-weight: 600;
   
    margin-left: 44%;
    margin-top: inherit;
}
.detail {
  text-align: center;
    font-family: 'FontAwesome';
    font-size: 20px;
    padding: 12px;
}
#container {
     width: 600px;
     background: #fff;
     color: #555;
     border: 3px solid #ccc;
     -webkit-border-radius: 10px;
     -moz-border-radius: 10px;
     -ms-border-radius: 10px;
     border-radius: 10px;
     border-top: 3px solid #ddd;
     padding: 1em 2em;
     margin: 0 auto;
     -webkit-box-shadow: 3px 7px 5px #000;
     -moz-box-shadow: 3px 7px 5px #000;
     -ms-box-shadow: 3px 7px 5px #000;
     box-shadow: 3px 7px 5px #000;
    }
 
   







    .cards-wrapper {
  display: flex;
  justify-content: center;
}
.card img {
  margin: 19px;
  max-width: 100%;
  max-height: 100%;
}
.card {
  margin: 0 0.5em;
  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
  border: none;
  border-radius: 0;
  text-align: center;
  background-color: #dbe3e4;
  width: 40%;
  
}

.carousel-control-prev,
.carousel-control-next {
 
 

  background-color: transparent;
    border: 1px solid #adb1d9;
    border-width: 0;
    border-radius: 50%;
    color: #adb1d9;
    display: inline-block;
    height: 40px;
    line-height: 40px;
    margin-top: -25px;
    position: absolute;
    text-align: center;
    top: 50%;
    width: 40px;
    z-index: 5;
}

.carousel-control-next:hover{
  background-color: #bebec7;;

}
.carousel-control-prev:hover{
  background-color: #bebec7;;

}
@media (min-width: 768px) {
  .card img {
    height: 11em;
  }
}
img.card-img-top {
  width: 100px;
    height: 100px;
    margin-top: 56px;
}
.card-title {
    margin-bottom: .75rem;
    font-family: 'Oswald', sans-serif;
   font-weight:600;
   margin-bottom: 35px;
}












.form-group {
    font-family: 'FontAwesome';
    display: flex;
}

.bg-custom-2 {
    background-image: linear-gradient( 
15deg, #417dad 10%, #09075a 90%);
}
.bg-custom-1 {
  background-image: linear-gradient( 
15deg, #03285759 0%, #016e7e08 100%);
}
.img-hundo{width:100%;}

.effect{background:black}
.effect:hover img{opacity:0.6}

..carousel-caption { visibility: hidden; }
..effect:hover .carousel-caption { visibility: visible; }

.heroContent {
    position: absolute;
    top: 54%;
    left: 34%;
    transform: translate(-50%, -50%);
    text-align: start;
}

.h4 {
  color: white;
  text-shadow: 1px 1px 2px black, 0 0 25px #4a4a80, 0 0 5px #000035;
  font-family: sans-serif;
}
h1 {
  color: white;
  text-shadow: 4px 3px 3px #000000;
  font-family: 'Playfair Display', serif;
}
label {
    display: inline-block;
    margin-bottom: .5rem;
    width: 20%;
}
.form-control{
  width: 63%;
}
/* Footer */
.footer {
  padding-top: 24px;
  padding-bottom: 24px;
  background: #212121;
  
  
  }
  
  a {
    font-size: 18px;
    color: rgba(255, 255, 255, .5);
    transition: color .235s ease-in-out;
  }
    
    a:hover {
      color: rgba(255, 255, 255, .25);
    }
  













  
.about h1 {
	padding: 10px 0;
	margin-bottom: 20px;
}
.about h2 {
	opacity: .8;
}
.about span {
	display: block;
	width: 100px;
	height: 100px;
	line-height: 100px;
	margin:auto;
	border-radius:50%;  
	font-size: 40px;
	color: #FFFFFF;
	opacity: 0.7;
	background-color: #04154d;
	border: 2px solid #04021f;
	webkit-transition:all .5s ease;
 	moz-transition:all .5s ease;
 	os-transition:all .5s ease;
 	transition:all .5s ease;

}
.about-item:hover span{
	opacity: 1;	
	border: 2px solid #04021f;
	font-size: 42px;
	-webkit-transform: scale(1.1,1.1) rotate(360deg) ;
	-moz-transform: scale(1.1,1.1) rotate(360deg) ;
	-o-transform: scale(1.1,1.1) rotate(360deg) ;
	transform: scale(1.1,1.1) rotate(360deg) ;
}
.about-item:hover h2{
	opacity: 1;
	-webkit-transform: scale(1.1,1.1)  ;
	-moz-transform: scale(1.1,1.1)  ;
	-o-transform: scale(1.1,1.1)  ;
	transform: scale(1.1,1.1) ;
}
.about .lead {
    color: rgb(0 0 0);
    font-size: 16px;
    font-weight: bold;
    font-family: 'Roboto Condensed', sans-serif;
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
.text1 {
    text-shadow: 0px 4px 3px rgb(0 0 0 / 40%), 0px 8px 13px rgb(0 0 0 / 10%), 0px 18px 23px rgb(0 0 0 / 10%);
}
</style>
<script>
$(document).ready(function(){
    $("body").scrollspy({
        target: "#myNavbar",
        offset: 60
    }) 
});
</script>
<script>
$(document).ready(function(){
    // Activate carousel
    $("#myCarousel").carousel();
    
    // Enable carousel control
    $(".carousel-control-prev").click(function(){
        $("#myCarousel").carousel('prev');
    });
    $(".carousel-control-next").click(function(){
        $("#myCarousel").carousel('next');
    });
    
    // Enable carousel indicators
    $(".slide-one").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".slide-two").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".slide-three").click(function(){
        $("#myCarousel").carousel(2);
    });
});
</script>
</head>
<body>

<!--Navbar-->

<div class="nav fixed-top shadow p-2 border-bottom  rounded  bg-custom-2" >
            <div class="logo mr-auto "style="height: 38px;">
            <div class="text1" style="    color: #2F1285;font-size: 31px;font-weight: 700;">EduLab</div>
        <!--   <img src="image/edulab14.png"  style="height: 38px;" >-->
           <img src="image/sidetext.png" style="height: 20px;margin-top: 24px;margin-left: 0px;" >
            </div>
        <ul style="  font-family: 'Open Sans', sans-serif;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 1rem">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact_us">Contact Us</a></li>
            <li><a href="#pertners">Our Partners</a></li>
            
                 <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">LogIn</a>
                    <div class="dropdown-menu">
                    
                    <a href="#teacherLogin" role="button" class="btn " data-toggle="modal">Login as Teacher</a>
                    <a href="#studentLogin" role="button" class="btn " data-toggle="modal">Login as Student</a>
                        
                    </div>
                </li>

            
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SignUp</a>
                    <div class="dropdown-menu">
                    
                  
                        
                        <a href="#teacherSignUp" role="button" class="btn " data-toggle="modal">SignUp as Teacher</a>
                        <a href="#studentSignUp" role="button" class="btn " data-toggle="modal">SignUp as Student</a>
                    </div>
                </li>
                
             

    </div>

 
 <!-- Background image 
<div class="image">
    <img src="image/tlemage.jpg" class="img-fluid" alt="E-Learning homepage">
</div>
-->
<div id="home">

<div
  id="carouselDarkVariant"
  class="carousel slide carousel-fade carousel-dark"
  data-mdb-ride="carousel"
>
    <div id="myCarousel" class="carousel slide" data-interval="4000" data-ride="carousel">
        <!-- Carousel indicators -->
       <!-- Indicators -->
  <div class="carousel-indicators">
    <button
      data-mdb-target="#carouselDarkVariant"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      data-mdb-target="#carouselDarkVariant"
      data-mdb-slide-to="1"
      aria-label="Slide 1"
    ></button>
    <button
      data-mdb-target="#carouselDarkVariant"
      data-mdb-slide-to="2"
      aria-label="Slide 1"
    ></button>
  </div>
        <!-- Wrapper for carousel items -->
      
  <!-- Inner -->
  <div class=" effect">
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active" style="height:100%">
      <img
        src="image/project13.jpg"
        style="height: 500px;"
        class="d-block w-100"
        alt="..."
      />
      <div class="heroContent carousel-caption d-none d-md-block" style="top: 73%;left: 32%;">
        <h1>Learn Anywhere Anytime</h1>
        <p style="font-family: 'Open Sans', sans-serif;font-weight: 300;font-size: 21px;text-shadow: 2px -2px 3px #000000;">
        Develop Your skills at your own pace and own time without any financial boundaries or time restrictions.</p>
      
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img
        src="image/project12.jpg"
        class="d-block w-100"
        style="height: 500px;"
        alt="..."
      />
      <div class="heroContent carousel-caption d-none d-md-block" style="top: 73%;left: 32%;">
      <h1>Ensure Quality Education</h1>
        <p style="font-family: 'Open Sans', sans-serif;font-weight: 300;font-size: 21px;text-shadow: 2px -2px 3px #000000;">
        Continuous assessments judges the students merit, skill set and dedication to the course.</p>
      
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img
        src="image/caption3a.jpg"
        class="d-block w-100"
        style="height: 500px;"
        alt="..."
      />
      <div class="heroContent carousel-caption d-none d-md-block">
      <h1>Reduction of the Carbon Footprint</h1>
        <p style="font-family: 'Open Sans', sans-serif;font-weight: 300;font-size: 21px;text-shadow: 2px -2px 3px #000000;">
        The need for printing out paper based assessments is practically eliminated. </p>
      
      </div>
    </div>
  </div>
</div>
  <!-- Inner -->
        <!-- Carousel controls -->
        <button
    class="carousel-control-prev"
    type="button"
    data-mdb-target="#carouselDarkVariant"
    data-mdb-slide="prev"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-mdb-target="#carouselDarkVariant"
    data-mdb-slide="next"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
    </div>
</div>
</div>
  <!-- End Carousel controls -->











  
  <!-- About us -->
  <div id="about">
<div class="row bg-custom-1" style="margin: 16px 6px;border-radius: 6px;">
<section class="text-center about">
      <h1>About US</h1>
      <div class="">
        <div class="row">
          <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200" >
            <span class="fa fa-podcast" aria-hidden="true"></span>
            <h2>Our Mission</h2>
            <p class="lead">Our goal is to connect all learners around the globe and support them with necessary
              resources to reach their full potential. We hope to make the classroom more than a physical space. We
            envision a world where anyone, anywhere has the power to transform their life through learning. </p>
          </div>
          <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200">
            <span class="fa fa-handshake-o"></span>
            <h2>Our Values </h2>
            <p class="lead">We believe learning has the ability to transform our lives and our world. EduLab has the power 
              to improve education and enrich the lives of everyone in the education community. We put the needs of teachers 
              and learners first in everything we build and do.
            </p>
          </div>
          <div class="clearfix visible-md-block visible-sm-block"></div>
          <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200">
            <span class="fa fa-group"></span>
            <h2>Our Impact</h2>
            <p class="lead"> We hope to spread the usage and give free access to a minimum of 100+ schools,
               colleges and universities around the globe. Students and teachers will be able to find anything they need to
                help inspire the next generation of doers, makers and leaders.
            </p>
          </div>
          
        </div>
        
      </div>
    </section>
</div>
</div>








  <!-- our clients -->
  <div id="pertners">
  <div class="row bg-custom-1" style="margin: 16px 6px;border-radius: 6px;">
  <h1 class=" title" style="padding-bottom: 26px;">
Our Partners
</h1>
<div class="detail">






<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style=" padding: 1em;">
    <div class="carousel-item active">
      <div class="cards-wrapper">
      <div class="card d-none d-md-block" >
        <img src="image/stamford.png" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Stamford University Bangladesh</h5>
          
        </div>
      </div>
      <div class="card d-none d-md-block">
        <img src="image/notredame.png" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Notre Dame College</h5>
          </div>
      </div>
      <div class="card d-none d-md-block">
        <img src="image/bodrunnesa.jpg" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Begum Badrunnessa Government Girls College</h5>
          
        </div>
      </div>
      <div class="card d-none d-md-block">
        <img src="image/eusc.jpg" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Engineering University School and College</h5>
          
        </div>
      </div>
    </div>
    </div>
    <div class="carousel-item">
      <div class="cards-wrapper">
        <div class="card d-none d-md-block">
        <img src="image/northsouth.png" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">North South University</h5>
          </div>
        </div>
        <div class="card d-none d-md-block">
        <img src="image/Dhanmondi_boys.jpg" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Dhanmondi Government Boys' High School</h5>
          </div>
        </div>
        <div class="card d-none d-md-block">
        <img src="image/southeast.png" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Southeast University</h5>
          </div>
        </div>
        <div class="card d-none d-md-block">
        <img src="image/pstu.png" class="rounded-circle card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Patuakhali Science and Technology University</h5>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script>
(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());



</script>










</div>
</div>
</div>
<!-- END code for multi item carousel straight from mdbootstrap website -->
<script>
setTimeout(function(){ 
  var $introText = document.getElementById('carousel-example-multi');
  $('.carousel.multi-carousel-item.v-2 .carousel-item').each(function(){
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<4;i++) {
      next=next.next();
      if (!next.length) {
        next=$(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
    }
    $introText.classList.remove('hideMeForNow');
    $introText.classList.add('animated');
    $introText.classList.add('zoomInDown');
  });
 }, 3000);
</script>






  <!-- contact us -->
  <div id="contact_us">
<div class="row bg-custom-1" style="display: flow-root;margin: 16px 6px;border-radius: 6px;">
<div class="title">

</div>
<div class="detail">

<?php
if(isset($_REQUEST['contactusbutton'])){
$cntname= $_REQUEST['contactname'];
$cntmail= $_REQUEST['contactmail'];
$cntsubject= $_REQUEST['contactsubject'];
$cntmessage= $_REQUEST['contactmessage'];

$to_email = "mukherjeepeal@gmail.com";
$subject = $cntsubject;
$body = "{$cntmessage} {$cntname} {$cntmail}";
$headers = "From:pealm62@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
  echo '<script>alert("Email Sent Successfully!!"); </script>';
  echo "<script> location.href='homepage.php'</script>";
} else {
  echo '<script>alert("Email Not Sent!!"); </script>';
  echo "<script> location.href='homepage.php'</script>";
}
}


?>
 
    
<h1 class="h4" style="padding-bottom: 26px;">Have a question? Get in touch with us!</h1>
          
          <form action="" method="">
            <fieldset class="form-group">
              <label for="formName">Your Name:</label>
              <input id="formName" class="form-control" type="text" placeholder="Your name" name="contactname" required>
            </fieldset>
              
            <fieldset class="form-group">
              <label for="formEmail1">Email address:</label>
              <input id="formEmail1" class="form-control" type="email" placeholder="Enter email" name="contactmail" required>
            </fieldset>

            <fieldset class="form-group">
              <label for="formSub">Subject:</label>
              <input id="formEmail1" class="form-control" type="text" placeholder="Enter subject" name="contactsubject" required>
            </fieldset>
            
            <fieldset class="form-group">
              <label for="formMessage">Your Message:</label>
              <textarea id="formMessage" class="form-control" rows="3" placeholder="Your message" name="contactmessage" required></textarea>
            </fieldset>
            
            <fieldset class="form-group text-center" style="justify-content: center;">
              <button class="btn btn-primary" type="submit" name="contactusbutton">Send Message</button>
            </fieldset>
          </form>
  </div>
</div>
</div>



<footer class="footer ">
    
  <div class=" row" >

    <div class="col-md-5">
    <span style="color: #bdb7b7; padding-right: 15px;" >Copyright © 2021</span>
    </div>
     
          
        
    <div class="col-md-5">
       <div class="">
      
       <span style="color: #bdb7b7;padding-right: 15px;"> Follow Us</span>
    
       <a href=""><span class="fa fa-twitter" style="padding-right: 10px;"></span></a>
    
       <a href=""><span class="fa fa-google-plus" style="padding-right: 10px;"></span></a>
   
       <a href=""><span class="fa fa-instagram" style="padding-right: 10px;"></span></a>
    
       <a href=""><span class="fa fa-envelope-o"></span></a>
    
        </div>
     </div>
       <div class="col-md-2">
       
       <!-- Button trigger modal -->
<button type="button" style="    color: #bdb7b7;background: #212121;display: contents;font-size: 15px;" data-toggle="modal" data-target="#admin_login">
Admin Login
</button>

<!-- admin login -->
<div class="modal fade" id="admin_login" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content color1">
      <div class="modal-header">
        <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;" id="exampleModalLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form onsubmit="return false;" action="homepage.php" method="post">
      <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control"  name="admin_email" id="ad_inputEmail"placeholder="Email" >
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control"  placeholder="Password" id="ad_inputPassword"name="admin_password" >
                </div>
                <!-- show admin login error -->
                <div id="adlog_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility: hidden;display: contents;">
                   <strong><div class="adlog_alert_show"style=" font-family: 'FontAwesome';"></div></strong>
                </div>
      </div>
      
      <div class="modal-footer" style="font-family: 'Oswald';">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="login_admin"class="login_admin btn btn-primary">Login</button>

      </div>
</form>
    </div>
  </div>
</div>
       </div>
         </div>
   
  </footer>
  <script>
$(document).ready(function () {
  //  getdata();
 
         $('.login_admin').click(function (e) { 

       var ad_inputEmail= $('#ad_inputEmail').val();
       var ad_inputPassword= $('#ad_inputPassword').val();
      
     
        
       if(ad_inputEmail==''||ad_inputPassword=='') {
        document.getElementById("adlog_alert_show").style.visibility = "visible";
        document.getElementById("adlog_alert_show").style.display = "flex";
        $('.adlog_alert_show').html("empty field!");
        $( "#adlog_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       }
       else{


       
$.ajax({
    type: "POST",
    url: "studentLoginProcess.php",
    data: {
        'checking_adlog_btn' : true,
             'ad_inputEmail':ad_inputEmail,
             'ad_inputPassword':ad_inputPassword,
               
                  
    },
   
    success: function (response) {
       // preventDefault();
           // stopPropagation();
        
           document.getElementById("adlog_alert_show").style.visibility = "visible";
           document.getElementById("adlog_alert_show").style.display = "flex";
                  $('.adlog_alert_show').html(response);
                //  $('#admin_login').modal('show');
        
    }
});
       }
         
   });

});
  
</script> 

</div>
</div>










 <!-- Student Login Popup -->
 <div class="bs-example">
    <div id="studentLogin" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title"style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Login As Student</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form onsubmit="return false;" action="homepage.php" method="post">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="sl_inputEmail" placeholder="Email" name="login_semail" >
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="sl_inputPassword" placeholder="Password" name="login_spassword">
                </div>
                <div id="slog_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility: hidden;
    display: contents;">
                   <strong><div class="slog_alert_show"style=" font-family: 'FontAwesome';"></div></strong>
                </div>
                
                <div class="modal-footer"style="font-family: 'Oswald';">
                    <button type="button" class="  btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="s_log"class="slog_btn btn btn-primary">Login</button>
                
                </div>
                 </form>
                </div>
               
                <script>
$(document).ready(function () {
  //  getdata();
 
         $('.slog_btn').click(function (e) { 

       var sl_inputEmail= $('#sl_inputEmail').val();
       var sl_inputPassword= $('#sl_inputPassword').val();
      
     
        
       if(sl_inputEmail==''||sl_inputPassword=='') {
        document.getElementById("slog_alert_show").style.visibility = "visible";
        document.getElementById("slog_alert_show").style.display = "flex";
        $('.slog_alert_show').html("empty field!");
        $( "#slog_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       }
       else{


       
$.ajax({
    type: "POST",
    url: "studentLoginProcess.php",
    data: {
        'checking_slog_btn' : true,
             'sl_inputEmail':sl_inputEmail,
             'sl_inputPassword':sl_inputPassword,
               
                  
    },
   
    success: function (response) {
       // preventDefault();
           // stopPropagation();
        
           document.getElementById("slog_alert_show").style.visibility = "visible";
           document.getElementById("slog_alert_show").style.display = "flex";
                  $('.slog_alert_show').html(response);
                 // $('#studentLogin').modal('show');
        
    }
});
       }
         
   });

});
  
</script>       
    
            </div>
        </div>
    </div>
</div>


  

  



 <!-- Teacher Login Popup -->
<div class="bs-example">
    <div id="teacherLogin" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">Login As Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form onsubmit="return false;" action="homepage.php" method="post">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="tl_inputEmail" placeholder="Email" name="login_temail" >
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="tl_inputPassword" placeholder="Password" name="login_tpassword" >
                </div>
                <div id="tlog_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display: contents;">
                   <strong> <div class="tlog_alert_show"style="font-family: 'FontAwesome';"></div></strong>
                </div>
                <div class="modal-footer"style="font-family: 'Oswald';">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="t_log"class="tlog_btn btn btn-primary">Login</button>
                </div>
               
                
            </form>
                </div>




                    
   
                
  
    <script>
$(document).ready(function () {
  //  getdata();
 
         $('.tlog_btn').click(function (e) { 

       var tl_inputEmail= $('#tl_inputEmail').val();
       var tl_inputPassword= $('#tl_inputPassword').val();
      
     
        
       if(tl_inputEmail==''||tl_inputPassword=='') {
        document.getElementById("tlog_alert_show").style.visibility = "visible";
        document.getElementById("tlog_alert_show").style.display = "flex";
        $('.tlog_alert_show').html("empty field!");
        $( "#tlog_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       }
       else{


       
$.ajax({
    type: "POST",
    url: "studentLoginProcess.php",
    data: {
        'checking_tlog_btn' : true,
             'tl_inputEmail':tl_inputEmail,
             'tl_inputPassword':tl_inputPassword,
               
                  
    },
   
    success: function (response) {
       // preventDefault();
           // stopPropagation();
        
           document.getElementById("tlog_alert_show").style.visibility = "visible";
           document.getElementById("tlog_alert_show").style.display = "flex";
                  $('.tlog_alert_show').html(response);
                 // $('#teacherLogin').modal('show');
        
    }
});
       }
         
   });

});
  
</script> 
            </div>
        </div>
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
                <form onsubmit="return false;" action="homepage.php" method="post" >
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
    url: "studentLoginProcess.php",
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





 <!-- Teacher Registration Popup -->
<div class="bs-example">
    <div id="teacherSignUp" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content color1">
                <div class="modal-header">
                    <h5 class="modal-title"style="font-family: 'Oswald';letter-spacing: 1px;margin-left: 38%;">SignUp As Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class="form-design">
            <form  onsubmit="return false;" action="homepage.php" method="post">
                <div class="form-group">
                    <label for="userName">Username</label>
                    <input type="name" class="form-control" id="tr_userName" placeholder="User Name" name="t_username">
                </div>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="fullName" class="form-control" id="tr_fullName" placeholder="Full Name" name="t_fullname">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="tr_inputEmail" placeholder="Email" name="t_email" >
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="tr_inputPassword" placeholder="Password" name="t_password">
                </div>
                 
                <!-- Error Alert -->
<div id="treg_alert_show"class="alert alert-danger alert-dismissible fade show" style="visibility:hidden; display: contents;">
    <strong><div class="treg_alert_show"></div></strong> 
   
</div>
                <div class="modal-footer"style="font-family: 'Oswald';">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit"  name="t_reg" class="btn btn-primary tchr_reg">SignUp</button>
                </div>
            </form>
        </div> 

    
<script>
$(document).ready(function () {
  //  getdata();
 
         $('.tchr_reg').click(function (e) { 

       var tr_username= $('#tr_userName').val();
       var tr_fullname= $('#tr_fullName').val();
       var tr_email= $('#tr_inputEmail').val();
       var tr_pass= $('#tr_inputPassword').val();
     
     
        
       if(tr_username==''||tr_fullname==''||tr_email==''||tr_pass=='') {
        document.getElementById("treg_alert_show").style.visibility = "visible";
        document.getElementById("treg_alert_show").style.display = "flex";
        $('.treg_alert_show').html("empty field!");
        $( "#treg_alert_show" ).fadeIn( 100 ).delay( 1500 ).fadeOut( 600 );
       // $("#treg_alert_show").show();

       }
       else{


       
$.ajax({
    type: "POST",
    url: "studentLoginProcess.php",
    data: {
        'checking_tchr_reg' : true,
             'tr_username':tr_username,
             'tr_fullname':tr_fullname,
                'tr_email': tr_email,
                'tr_pass': tr_pass,
                  
    },
   
 
           success: function (response) {
       // preventDefault();
           // stopPropagation();
        
           document.getElementById("treg_alert_show").style.visibility = "visible";
           document.getElementById("treg_alert_show").style.display = "flex";
                  $('.treg_alert_show').html(response);
                  //$('#teacherSignUp').modal('show');
        
    }
        
    
});
       }
         
   });

});
  
</script>
        
    <?php
   
    ?>

                </div>
               
            </div>
        </div>
    </div>
</div>

</body>
</html>