<?php
require ('db.php');

$sql="delete from user where id=$id ";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else{
echo "Record Deleted";
header("Location: register.php");
}

?>
