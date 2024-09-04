<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--bootstarp css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--font Awesome css-->
    <link rel="stylesheet" href="css/all.min.css">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <!--custom css-->
    <link rel="stylesheet" href="css/homepagestyle.css">
    <title>E-Learning Website</title>
</head>
<body>
    
    <!--Navigation bar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand" href="homepage.html">E-Learning</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 custom-nav pl5">
              <li class="nav-item">
                <a class="nav-link active custom-nav-item" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active custom-nav-item" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active custom-nav-item" href="#">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active custom-nav-item" href="#">Feedback</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active custom-nav-item" href="#">Teacher</a>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle custom-nav-item" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Registration
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item custom-nav-item" href="#">As teacher</a></li>
                  <li><a class="dropdown-item custom-nav-item" href="#">As Student</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle custom-nav-item" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item custom-nav-item" href="#">As teacher</a></li>
                  <li><a class="dropdown-item custom-nav-item" href="#">As Student</a></li>
                </ul>
              </li>
    
            </ul>
        
          </div>
        </div>
      </nav>
<!--background-->
<div class="box">
    <img src="image/tlemage.jpg" class="img-fluid custom-image" alt="Cloudy Sky">
</div>

    <!--jquery and bootstrap java script js-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--font awesome js-->
    <script src="js/all.min.js"></script>
</body>
</html>