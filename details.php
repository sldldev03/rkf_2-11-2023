<?php 
include 'connect.php';
//session start
include 'session.php';
?>


<?php 
if (isset($_GET['id'])) {
   $getID=$_GET['id'];
   $value=QB::query("SELECT * FROM `registration` WHERE id=$getID;")->first();
 }
?>










<?php 
include "includes/header.php";
include "includes/header_nav.php";
?>



 <body>

   <?php 
include "includes/sidebar.php";
?>



      <div class="container">
      	<div class="row">
      		<div class="col-md-10 mt-4 pt-5 offset-md-2" >
      			<h3 class="offset-md-5 mt-3 text-info"style="font-weight: bold;">User Details</h3>
      			 <div class="card mt-4">
      				<table class="table border border-white">

      					<tr class="bg-dark  p-3">
      						<td>Name</td>
                        <td>Email</td>
      						<td>Address</td>
      						<td>Employe_Id</td>
      						<td>Phone_Number</td>
                        <td>Image</td>
      					</tr>

      				


                    <tr>
                        <td><?php echo $value->uname;?></td>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->address;?></td>
                        <td><?php echo $value->employe_id;?></td>
                        <td><?php echo $value->phone_number;?></td>
                        <td><img src="images/<?php echo $value->image ;?>" width="100px" height="100px"></td>
                    </tr>

      				</table>
      			</div>
      		</div>
      	</div>
      </div>


       



