<?php 
include 'connect.php';
include 'session.php';
 

 $all_foundation_members = QB::query("SELECT * FROM foundation_member")->get();
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
      <h3 class="offset-md-4 text-info mt-2 p-2"style="font-weight: bold">Foundation Members</h3>
      <table id="table_id" class="table" >
                <thead>
                     <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Designation</th>
                         <th>Best Quotes</th>
                         <th>Action</th>
                   
                      </tr>     
                </thead>

                 <?php 
                 foreach ($all_foundation_members as  $value) {
                 ?>


                  <tbody>
                     <tr>
                         <td><?php echo $value->fname;?></td>
                         
                         
                         <td><img src="images/<?php echo $value->image ;?>" width="100px" height="100px"></td>
                         <td><?php echo $value->designation;?></td>
                         <td><?php echo $value->description;?></td>
                         <td><a href="f_update.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary text-white">Edit</a>
                          <a href="f_delete.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary bg-danger">Delete</span></a>
                          <a href="f_details.php?id=<?php echo $value->id;?>">
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