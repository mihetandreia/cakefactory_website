<!--<script> 
function updateProduct(id) {  -->   
    <?php
require('db.php');
// When form submitted, insert values into the database.
if (isset($_POST['new_product_name'])) {
    $product_name = stripslashes($_REQUEST['product_name']);
    $product_name = mysqli_real_escape_string($con, $product_name);
    $pret    = stripslashes($_REQUEST['pret']);
    $pret    = mysqli_real_escape_string($con, $pret);
    $bucati    = stripslashes($_REQUEST['bucati']);
    $bucati    = mysqli_real_escape_string($con, $bucati);
    
    $query = "UPDATE products
                SET product_name = '$new_product_namee', pret = '$new_pret, bucati = '$new_bucati'
                 WHERE id = $id;";
    $result3  = mysqli_query($con, $query);
    if ($result3) {
        echo "<div class='form'>
              <h3>Produsul a fost modificat cu succes.</h3><br/>
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
                <h1> Modifică un produs </h1>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <fieldset>
                  <input name="new_product_name" type="text" class="form-control" id="new_product_name" placeholder="Nume produs" required="">
                </fieldset>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <fieldset>
                  <input name="new_pret" type="text" class="form-control" id="new_pret" placeholder="Pret(RON)" required="">
                </fieldset>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <fieldset>
                  <input name="new_bucati" type="text" class="form-control" id="new_bucati" placeholder="Numărul de bucăți" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" name="submit" id="form-submit" class="filled-button">Update</button>
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
<!--} 
</script>-->
