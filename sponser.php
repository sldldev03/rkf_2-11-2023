<?php 
include 'connect.php';
//session start
include 'session.php';
//session end
$values = QB::query("SELECT * FROM t_donation")->get();
 ?>


 <?php 
include "includes/header.php";
?>
<?php 
include "includes/header_nav.php";
?>
<?php 
include "includes/sidebar.php";
?>

<body>
	

	<div class="container">
      	<div class="row">
      		<div class="col-md-10 mt-4 pt-5 offset-md-2" >
      			<h3 class="offset-md-4 mt-3 ">Sponsers</h3>
      			<div class="card mt-4">

      				<table id="table_id" class="table" >
      					<thead>
                     <tr>
                        <th>amount</th>
                        <th>donation_type</th>
                        <th>date</th>
                      </tr>     
                </thead>

      					 <?php 
                 foreach ($values as  $value) {
                 ?>


                  <tbody>
                     <tr>
                         <td><?php echo $value->amount;?></td>
                         <td><?php echo $value->donation_type;?></td>
                         <td><?php echo $value->date;?></td>
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