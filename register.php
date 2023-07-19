<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="vendor/img/fstle/fs.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>CakeFactory</title>

   
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

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Register</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      
      function ValidateEmail(){
        var inputText = document.getElementById("email");
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.value.match(mailformat))
        {
          alert("Valid email address!");
          //document.form1.text1.focus();
          return true;
        }
        else
        {   
          alert("You have entered an invalid email address!");
          //document.form1.text1.focus();
          return false;
        }
      }

      
      function ValidatePassword(){
        var inputText = document.getElementById("password");
        var passwordRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if(inputText.value.match(passwordRegExp))
        {
          alert("Valid password!");
          //document.form1.text1.focus();
          return true;
        }
        else
        {   
          alert("You have entered an invalid password!");
          //document.form1.text1.focus();
          return false;
        }
      }
       
      var countryObject = {
        "România":{
        "Cluj-Napoca": 
          ["Andrei Mureşanu", 
          "Bulgaria",
          "Bună Ziua",
          "Centru",
          "Dâmbul Rotund",  
          "Gara",
          "Gheorgheni",
          "Grădinile Mănăştur", 
          "Grigorescu",
          "Gruia",
          "Iris",
          "Între Lacuri",
          "Mănăştur",
          "Mărăşti",
          "Someşeni",
          "Zorilor"],
        "Florești": 
          ["Florești"],
        "Baciu": 
          ["Baciu"],
        "Apahida": 
          ["Apahida"],
        }
      }

  window.onload = function() {
  var countrySel = document.getElementById("country");
  var citySel = document.getElementById("city");
  var neighborhoodSel = document.getElementById("neighborhood");
  for (var x in countryObject) {
    countrySel.options[countrySel.options.length] = new Option(x,x);
  }
  countrySel.onchange = function() {
    neighborhoodSel.length = 1;
    citySel.length = 1;
    for (var y in countryObject[this.value]) {
      citySel.options[citySel.options.length] = new Option(y, y);
    }
  }
  citySel.onchange = function() {
    neighborhoodSel.length = 1;
    var z = countryObject[countrySel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      neighborhoodSel.options[neighborhoodSel.options.length] = new Option(z[i], z[i]);
    }
  }
}


</script>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
        $firstname = mysqli_real_escape_string($con, $firstname);
        // removes backslashes
        $lastname = stripslashes($_REQUEST['lastname']);
        //escapes special characters in a string
        $lastname = mysqli_real_escape_string($con, $lastname);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $role    = stripslashes($_REQUEST['role']);
        $role    = mysqli_real_escape_string($con, $role);
        $country    = stripslashes($_REQUEST['country']);
        $country    = mysqli_real_escape_string($con, $country);
        $city    = stripslashes($_REQUEST['city']);
        $city    = mysqli_real_escape_string($con, $city);
        $neighborhood    = stripslashes($_REQUEST['neighborhood']);
        $neighborhood    = mysqli_real_escape_string($con, $neighborhood);
        $query    = "INSERT into `user` (firstname, lastname, email, password, role, country, city, neighborhood)
                     VALUES ('$firstname', '$lastname', '$email', '" . md5($password) . "', '$role', '$country', '$city', '$neighborhood')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="send-message">
      
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="register.php" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="email" onchange="ValidateEmail()" class="form-control" id="email" placeholder="E-Mail Address" required=""  >
                      <!-- admin@yahoo.com  admin email-->
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input name="password" type="password" onchange="ValidatePassword()" class="form-control" id="password" placeholder="Password" required=""> 
                      <!-- 12345678Aa password for admin -->
                      <input type="checkbox" onclick="myFunction()">Show Password
                    </fieldset>
                  </div> 
                  <br>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label for="role">Role:</label>
	                    <div>
                        <label for="user" class="radio-inline"><input type="radio" name="role" value="u" id="user">User</label>
                        <!--<label for="admin" class="radio-inline"><input type="radio" name="role" value="a" id="admin">Admin</label>-->
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                    <!--<input name="country" type="text" class="form-control" id="country" placeholder="Country" required="">-->

                     <select name="country"  id="country">
                        <option value="" selected="selected">Select country</option>
                        </select>
    
                      <select name="city"  id="city">
                      <option value="" selected="selected">Select city</option>
                      </select>
                      <br><br>
                     <select name="neighborhood" id="neighborhood">
                    <option value="" selected="selected">Select neighborhood</option>
                    </select>
                    <br><br>
                    </fieldset>
                  <!--  </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="city" type="text" class="form-control" id="city" placeholder="City" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="neighborhood" type="text" class="form-control" id="neighborhood" placeholder="Neighborhood" required="">
                    </fieldset>
                  </div>-->
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Register</button>
                    </fieldset>
                  </div>
                  <div class="container signin">
                    <p>Already have an account? <a href="login.php">Login</a>.</p>
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
