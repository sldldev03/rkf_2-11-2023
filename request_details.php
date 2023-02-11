<?php 
include 'connect.php';
//session start
include 'session.php';
?>

<?php 
if (isset($_GET['id'])) {
   $getID=$_GET['id'];
   // $value=QB::query("SELECT * FROM `foundation_member` WHERE id=$getID")->first();
  $value= QB::query("SELECT * FROM `request_form` WHERE id='$getID'")->first();

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
               <h3 class="offset-md-5 text-info mt-3"style="font-weight: bold;">Request Details</h3>
                <div class="card mt-4">
                  <table class="table border border-white">

                     <tr class="bg-dark  p-3">
                        <td>Name</td>
                        <td>phone numbe</td>
                        <td>Subject</td>
                        <td>Address</td>
                        <td>Details</td>
                        <td>Date</td>
                        <td>Image</td>
                     </tr>

                  


                    <tr>
                        <td><?php echo $value->rname; ?></td>
                        <td><?php echo $value->phone_number;?></td>
                        <td><?php echo $value->subject;?></td>
                        <td><?php echo $value->address;?></td>
                        <td><?php echo $value->details;?></td>
                        <td><?php echo $value->date;?></td>
                        <td><img src="../asset/images/<?php echo $value->image ;?>" width="100px" height="100px"></td>

                    </tr>


                  </table>
               </div>
            </div>
         </div>
      </div>