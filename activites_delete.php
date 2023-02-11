<?php 
include 'connect.php';
$getId=$_GET['id'];

QB::query("DELETE FROM `our_activites` WHERE id='$getId'")->get();

header("location:our_activites.php");

 ?>