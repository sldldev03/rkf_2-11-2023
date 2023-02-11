
<!-------blog delete part start--->
<?php 
include 'connect.php';
$getId=$_GET['id'];
QB::query("DELETE FROM `blog` WHERE id='$getId'")->get();
header("location:all_blog.php");
 ?>
<!-------blog delete part end--->

 