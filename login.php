<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>CakeFactory</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/img/fstle/fs.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->



    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Cake <em>Factory</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="about-us.html">About us</a></li>
                
                <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="login.php">Login</a>
                      <a class="dropdown-item" href="register.php">Register</a>
                      <a class="dropdown-item" id="admin-link"  href="admin_page.php">Admin</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <script>
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Login</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
require ('db.php');
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql="delete from user where id=$id";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else{
echo "Record Deleted";
header("Location: register.php");
}
}
?>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `user` WHERE email='$email'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);

          if($row['role'] == 'a'){

            $_SESSION['admin_name'] = $row['firstname'];
            header('Location: admin_page.php');
          }elseif($row['role'] == 'u'){
            $_SESSION['user_name'] = $row['firstname'];
            // Redirect to user dashboard page
            //header("Location: dashboard.php");
            echo "<div class='form'>
            <p>Hey, <span> {$_SESSION['user_name']},</span> you are connected now!</p>
            <a href='logout.php'class='filled-button'>Logout</a></p> <br/>
            <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this account?\");'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <input type='submit' name='delete' value='Delete account'>
          </form>            
            </div>";
        }} else {
            echo "<div class='form'>
                  <h3>Incorrect email/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="send-message">
      
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="login.php" method="post">
                <div class="row">
                

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                     <!-- <input type="password" value="" id="myInput"><br><br>-->
                      <input name="password" type="password" class="form-control" id="password" placeholder="Password" required=""> 
                      <input type="checkbox" onclick="myFunction()">Show Password
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Login</button>
                    </fieldset>
                    
                  </div>
                </div>
              </form>
            </div>
          </div>

       </div>

<?php
    }
?>
      

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p> © 2020  CakeFactory</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    




    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/img/js/js.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
