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
                      <a class="dropdown-item" id="admin-link" href="admin_page.php">Admin</a>

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
              <h2>Admin page</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  // get all products 
  require('db.php');
  // Fetch all products from the database
  $query = "SELECT * FROM products";
  $result = mysqli_query($con, $query);

  $sql = "SELECT id, product_name FROM products";
  $result2 = mysqli_query($con, $sql );
  $options = array();

  while ($row = $result2->fetch_assoc()) {
    $options[] = $row;
}   
?>

<?php
// check if the delete button has been clicked
require('db.php');
if (isset($_POST['delete'])) {
  // get the ID of the product to be deleted
  $id = $_POST['id'];


  // construct the SQL query to delete the product with the given ID
  $sql = "DELETE FROM products WHERE id = $id";

  // execute the query and check if it was successful
  if (mysqli_query($con, $sql)) {
    echo "Product deleted successfully";
  } else {
    echo "Error deleting product: " . mysqli_error($con);
  }



}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	
</head>

<script>
  function deleteRow(rowId) {
    // Remove the row from the table
    document.getElementById(rowId).remove();
  }
</script>


<body>
	<h1>Produse disponibile</h1> <br>
	<table>
		<thead>
			<tr>
				<th>Nume produs</th>
				<th>Preț</th>
                <th>Bucăți disponibile</th>
                <th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['product_name']; ?></td>
					<td><?php echo $row['pret']; ?></td>
					<td><?php echo $row['bucati']; ?></td>
                <?php echo "<td>
              <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this product?\");'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <input type='submit' name='delete' value='Delete' onclick=deleteRow('{$row['id']}')>
              </form>
            </td>";
            ?>
            <?php echo "<td>
              <form method='post' onsubmit='return confirm(\"Are you sure you want to update this product?\");'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <input type='submit' name='update' value='Update'>
              </form>
            </td>";
            ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</body>
</html>


<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['product_name'])) {
        $product_name = stripslashes($_REQUEST['product_name']);
        $product_name = mysqli_real_escape_string($con, $product_name);
        $pret    = stripslashes($_REQUEST['pret']);
        $pret    = mysqli_real_escape_string($con, $pret);
        $bucati    = stripslashes($_REQUEST['bucati']);
        $bucati    = mysqli_real_escape_string($con, $bucati);
        
        $query  = "INSERT into `products` (product_name, pret, bucati)
                    VALUES ('$product_name', '$pret', '$bucati')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Produsul a fost adaugat cu succes.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
        }
    } else {
?>
    <div class="send-message">
      
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                    <h1> Adaugă un produs </h1>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="product_name" type="text" class="form-control" id="product_name" placeholder="Nume produs" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="pret" type="text" class="form-control" id="pret" placeholder="Pret(RON)" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="bucati" type="text" class="form-control" id="bucati" placeholder="Numărul de bucăți" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="submit" id="form-submit" class="filled-button">Add</button>
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
