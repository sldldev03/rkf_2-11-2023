<?php 
include 'connect.php';
//session start
include 'session.php';
//session end
$values = QB::query("SELECT * FROM registration ORDER BY id DESC")->get();
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
      		<div class="col col-sm-10 col-md-10 text-center text-info offset-md-2" >
      			<h3 class=" mt-2 text-center card p-2 shadow"style="font-weight: bold">Registered Users</h3>
      			<div class="card p-3 mt-4">

      				<table id="table_id" class="table" >
      					<thead>
                     <tr>
                        <th>Name</th>
                         <th>Email</th>
                        <th>Address</th>
                        <th>Phone_Number</th>
                        <th>Employe_Id</th>
                         <th>Image</th>
                         <th>Action</th>
                      </tr>     
                </thead>

      					 <?php 
                 foreach ($values as  $value) {
                 ?>


                  <tbody>
                     <tr>
                         <td><?php echo $value->uname;?></td>
                         <td><?php echo $value->email;?></td>
                         <td><?php echo $value->address;?></td>
                         <td><?php echo $value->employe_id;?></td>
                         <td><?php echo $value->phone_number;?></td>
                         <td><img src="images/<?php echo $value->image ;?>" width="100px" height="100px"></td>
                         

                         <td><a href="update.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary text-white">Edit</a>
                          <a href="delete.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary bg-danger">Delete</span></a>
                          <a href="details.php?id=<?php echo $value->id;?>" >
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