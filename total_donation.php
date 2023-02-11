<?php 
include 'connect.php';
include 'session.php';
 

 $values = QB::query("SELECT * FROM t_donation")->get();

 //total amount count query start
 $V=QB::query("SELECT SUM(amount) as allAmount FROM `t_donation`")->first();
  //total amount count query end
 
// $valuesW = QB::query("SELECT count(donation_type) as water FROM t_donation WHERE donation_type='water'")->first();

// $valuesH = QB::query("SELECT count(donation_type) as health_care FROM t_donation WHERE donation_type='health_care'")->first();

// $valuesS = QB::query("SELECT count(donation_type) as sanitization FROM t_donation WHERE donation_type='sanitization'")->first();
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
 		<div class="col-md-10 col-8 col-sm-10 text-info  offset-md-2 card">
 			
 			<table id="table_id" class="table" >
        <h3 class="mt-2 text-info text-center card p-2 shadow"style="font-weight: bold;">Donation</h3>


                 <!--total amount count start-->
               <div class="mb-4">
                <label>Total Amount : <?php echo $V->allAmount; ?></label>              
                </div>
                 <!--total amount count end-->

      					<thead>
                     <tr>
                        <th>Amount</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Donation Type</th>
                        <th>Payment Getway</th>
                        <th>Date</th>
                       <!--  <th>Action</th>
                    -->
                      </tr>     
                </thead>

      					 <?php 
                 foreach ($values as  $value) {
                 ?>


                  <tbody>
                     <tr>
                         <td><?php echo $value->amount;?></td>
                         <td><?php echo $value->email;?></td>
                         <td><?php echo $value->phone_number;?></td>
                         <td><?php echo $value->donation_type;?></td>
                         <td><?php echo $value->payment_gatway;?></td>
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