<?php 
include 'connect.php';
//session start
include 'session.php';
?>

<?php 
if (isset($_GET['id'])) {
   $getID=$_GET['id'];
   // $value=QB::query("SELECT * FROM `foundation_member` WHERE id=$getID")->first();
  $value= QB::query("SELECT * FROM `blog` WHERE id='$getID'")->first();

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
               <h3 class="offset-md-5 text-info mt-3"style="font-weight: bold;">Blog</h3>
                <div class="card mt-4">
                  <table class="table border border-white">

                     <tr class="bg-dark  p-3">
                        <th>Tittle</th>
                        <th>Details</th>
                        <th>Image</th>
                         <th>User ID</th>
                        <th>Date</th>
                     </tr>

                  


                    <tr>
                        <td><?php echo $value->tittle; ?></td>
                        <td><?php echo $value->details;?></td>
                        <td><img src="../admin/images/<?php echo $value->image ;?>" width="100px" height="100px"></td>
                        <td><?php echo $value->user_id;?></td>
                        <td><?php echo $value->date;?></td>
                    </tr>


                  </table>
               </div>
            </div>
         </div>
      </div>