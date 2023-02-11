<!---request delete part start--->
 <?php 
include 'connect.php';
$getId=$_GET['id'];
QB::query("DELETE FROM `request_form` WHERE id='$getId'")->get();
header("location:total_request.php");
 ?>
  <!---request delete part end--->