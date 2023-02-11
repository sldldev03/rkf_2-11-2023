<?php 
include 'connect.php';
include 'session.php';
 

 $values = QB::query("SELECT * FROM t_donation")->get();
$valuesH = QB::query("SELECT count(donation_type) as health_care FROM t_donation WHERE donation_type='health_care'")->first();


 
 ?>

 <!doctype html>
<html lang="bn-BD">
      <head>
        <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            

            <link rel="stylesheet" type="text/css" href="style.css">

            
            <link rel="stylesheet" type="text/css" href="css/all.min.css">

            <link rel="stylesheet" type="text/css" href="responsive.css">

        
      
                                    <!-- Bootstrap CSS -->
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
              <title>RKF</title>
      </head>


  <body>


    <div class="container">

      <!-- navbar start -->

   <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            
              <a class="navbar-brand logoo" href="#"><img src="images/Logo 1.png" width="115px" style="margin-right: 100px"></a>
       

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse ftuti" id="navbarSupportedContent">

                    <ul class="navbar-nav me-0 custom-ms">
                            <li class="nav-item">
                              <a class="nav-link active mx-2" aria-current="page" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php"style="font-weight: bold;">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link mx-2" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php"style="font-weight: bold;">Our_Mission</a>
                            </li>     

                            <li class="nav-item active dropdown">
                              <a class="nav-link mx-2 dropdown-toggle" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="font-weight: bold;">
                                Donate
                              </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="activites.php"style="font-weight: bold;">Our Activities</a></li>

                         </ul>

                     </li>  

                            <li class="nav-item">
                              <a class="nav-link mx-2" href="request.php"style="font-weight: bold;">Make A Request</a>
                            </li>


                            <li class="nav-item">
                              <a class="nav-link mx-2" href="blog.php"style="font-weight: bold;">Blog</a>
                            </li>    

                            <li class="nav-item">
                              <a class="nav-link mx-2" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php"style="font-weight: bold;">Partners</a>
                            </li> 
                            <li class="nav-item dropdown">
                              <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="font-weight: bold;">
                                Our Project
                              </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="water.php"style="font-weight: bold;">Water Purification</a></li>
                                <li><a class="dropdown-item" href="health_care.php"style="font-weight: bold;">Health Care</a></li>
                                <li><a class="dropdown-item" href="sanitization.php"style="font-weight: bold;">Sanitization</a></li>
                     </ul>

                     </li>  

                    </ul>
             

      </div>

</nav>
    

      <!-- navbar End -->





 <div class="container">
 	<div class="row">
 		<div class="col-md-12 col-12 col-sm-12 text-info bg-primary shadow-1-strong"style="margin-top: 31px; margin-bottom:-40px;">
 			<h3 class="offset-md-4 mt-2 text-info text-white"style="
    margin-left: 44.333333%;">Donation</h3>
 			<table id="table_id" class="table text-white" >
      					<thead>
                     <tr>
                        <th>Amount</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Health Care</th>
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
                         <td><?php echo $value->donation_type; ?></td>
                         <td><?php echo $value->payment_gatway;?></td>
                         <td><?php echo $value->date;?></td>
                         <!-- <td><a href="update.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary text-white">Edit</a>
                          <a href="delete.php?id=<?php echo $value->id;?>">
                          <span class="badge bg-primary bg-danger">Delete</span></a>
                          <a href="details.php?id=<?php echo $value->id;?>" >
                          <span class="badge bg-info text-white ">Details</span></a>
                        </td>  -->
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

<footer>
<div class="container">
<footer>
  <div class="row foo">
<div class="col-md-6 col-sm-6 col">
    

  <div class="mapouter">
  <div class="gmap_canvas">
    <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=300&amp;height=200&amp;hl=en&amp;q=mohammadpur housing socity,road no.10 ,housing no 6,softlakes ltd&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
      
    </iframe>



</div>
<style>.mapouter{position:relative;text-align:right;width:545px;height:100%;}.gmap_iframe {width:555px!important;height:189px!important;}</style>
</div>

     </div>


     <div class="col-md-3 col-sm-3 col">

                               <div class="card pt-2 m-0" style="width: 100%">
                                 <div class="card-body">
                              <h5>Contact Us:</h5>
                              <h6>House No: 6, Road No: 10, Mohammadia Housing Society, Dhaka, Bangladesh</h6>
                              <h6>Cell: 01311-704669</h6><br>
                             </div>
                               </div>
                              
                           
                           
                             </div>
     
            <div class="col-md-3 col-sm-3 col">

                              <div class="card pt-2" style="width: 100%;margin-left:-24px;">
                                 
                              <div class="card-body">
                              <h5>Email Us:</h5>
                              <h6>rashidakhanumfoundation@gmail.com</h6><br><br><br>
                            
                              
                             </div>
                               </div>
                    
                             </div>


<div class="col-md-5 col col-sm-5 me-md-3 me-sm-3">
<div class="footer">
<div class="footer-logo">
<a class="logo sizee" href="#"><img src="images/Logo 1.png" alt=""></a>
<!-- <a class="logo" href="#"><img src="images/e.png" alt=""></a> -->
<!-- <h4>About Us</h4>
<a class="logo" href="#"><img src="images/f.png" alt=""></a> -->
 <!--  -->
 
</div>
<!-- <p class="text-align">Rashida Khanum Foundation is one of the pioneer non-profit organizations in Bangladesh, working on child health care, hygienic water, sanitization, and women’s education to achieve its goals in the urban and village stages.</p>
 -->

</div>
</div>
<!-- <div class="col-md-3 ">
  
    <a class="logo" href="#"><img src="images/h.png" alt=""></a>


  </div> -->




<div class="col-md-4 col col-sm-4 me-md-4 me-sm-4">
<div class="footer">

<h3 class="footer-title">Newsletter</h3>
<form class="footer-newsletter">
<input class="input col-md-8" type="email" placeholder="email"><br><br>

</form>
<a href="#" class="btn btn-primary">send</a>
<ul class="footer-social">
<li><a href="javascript:void(0)"><i class="bi bi-facebook "></i></a></li>
<li><a href="javascript:void(0)"><i class="bi bi-instagram"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>


