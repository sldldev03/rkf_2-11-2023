
<!---registered user delete part start--->
<?php 
include 'connect.php';
$getId=$_GET['id'];
QB::query("DELETE FROM `registration` WHERE id='$getId'")->get();
header("location:view.php");
 ?>
<!---registered user delete part end--->







