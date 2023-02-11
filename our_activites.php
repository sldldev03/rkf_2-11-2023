<?php 
include 'connect.php';
include 'session.php';
 

 $activites = QB::query("SELECT * FROM our_activites ORDER BY id DESC")->get();
 ?>

<?php 
include "includes/header.php";
?>
<?php 
include "includes/header_nav.php";
?>




<body>

  <?php 
include "includes/sidebar.php";
?>

 <div class="container">
  <div class="row">
    <div class="col-md-10 col-10 col-sm-10 text-info offset-md-2">
      <h3 class="offset-md-4 text-info mt-2 p-2"style="font-weight: bold">Our Activites</h3>
      <table id="table_id" class="table" >
                <thead>
                     <tr>
    
                        <th>Image</th>
                        <th>Donation Type</th>
                         <th>Date</th>
                       <th>Action</th>
                   
                      </tr>     
                </thead>

                 <?php  foreach ($activites as  $value) { ?>


                  <tbody>
                     <tr>
                         <td><img src="images/<?php echo $value->image ;?>" width="100px" height="100px"></td>
                         <td><?php echo $value->donation_type;?></td>
                         <td><?php echo $value->date;?></td>
                          <td><a href="activites_update.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary text-white">Edit</a>
                          <a href="activites_delete.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary bg-danger">Delete</span></a>
                          <a href="activites_details.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-info text-white ">Details</span></a>
                        </td> 
                     </tr>
                 </tbody>
                 <?php } ?>
               </table>
            </div>
          </div>
        </div>
      </div>

<script>
$(document).ready(function () {
  $('#table_id').DataTable({
      search: {
          return: true
      },
  });
});
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>



</body>
</html>