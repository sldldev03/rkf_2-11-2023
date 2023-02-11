<?php 
include 'connect.php';
// include 'session.php';

if(isset($_POST['submit'])){
  $amount=$_POST['amount'];
  $email=$_POST['email'];
  $phone_number=$_POST['phone_number'];
  $donation_type=$_POST['donation_type'];
  $payment_gatway=$_POST['payment_gatway'];
  // $date=$_POST['date'];

  $data=array(
    "amount" => $amount,
    "email" => $email,
    "phone_number" => $phone_number,
    "donation_type" => $donation_type,
    "payment_gatway" => $payment_gatway
    // "date" => $date
  );
   


  $test=QB::table('t_donation')->insert($data);
   echo "Success";
 
}

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
            
              <a class="navbar-brand logoo" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php"><img src="images/Logo 1.png" width="115px" style="margin-right: 100px"></a>
       

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

                            <li class="nav-item">
                              <a class="nav-link mx-2" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php"style="font-weight: bold;">Donate</a>
                            </li> 

                            <li class="nav-item">
                              <a class="nav-link mx-2" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php"style="font-weight: bold;">Fund_Distribution</a>
                            </li>


                            <li class="nav-item">
                              <a class="nav-link mx-2" href="blog.php"style="font-weight: bold;">Blog</a>
                            </li>    

                            <li class="nav-item">
                              <a class="nav-link mx-2" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php"style="font-weight: bold;">Partners</a>
                            </li> 
                            <li class="nav-item dropdown">
                              <a class="nav-link mx-2 dropdown-toggle" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="font-weight: bold;">
                                Our Project
                              </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="water.php"style="font-weight: bold;">Water</a></li>
                                <li><a class="dropdown-item" href="health_care.php"style="font-weight: bold;">Health Care</a></li>
                                <li><a class="dropdown-item" href="sanitization.php"style="font-weight: bold;">Sanitization</a></li>
                     </ul>

                     </li>  

                    </ul>
             

      </div>

</nav>
    
      </div>
      <!-- navbar End -->


      <div class="container">
        <div class="row">
          <!-- <div class="col-md-10"> -->
            <h3 style="font-size:28px; text-align: center;margin-top: 80px;padding-bottom: 45px; color: #39c277;">অনুগ্রহ করে আপনার তথ্য প্রদান করুন / Kindly add your details</h3><br><br>
         <!--  </div> -->

         <div class="col-md-6">

        <form action="" method="post" enctype="multipart/form-data">
              <label class="" style="color: black;font-weight: bold;" required>ইমেইল/Email*</label>
          <input type="email" name="email" class="form-control"
          style="background-color: #39c277 !important; color: black;" placeholder="@gmail.com" required><br>

           <label class=""style="color: black;font-weight: bold;">মোবাইল নাম্বার / Phone Number*</label>
          <input type="text" name="phone_number" class="form-control"
          style="background-color: #39c277 !important; color: black;" placeholder="+088"required><br>
           
            <label class=""style="color: black;font-weight: bold;">ডোনেশন টাইপ/Donation Type*</label>
            <select class="form-select"style="background-color: #39c277 !important; color: black;" name="donation_type"  id="inputGroupSelect01" required>

            <option value="0">Donation Type</option>
            <option value="water">Water</option>
            <option value="health_care">Health Care</option>
            <option value="sanitization">Sanitization</option>

          </select><br>

          <label class=""style="color: black;font-weight: bold;">পেমেন্ট গেটওয়ে/Payment GateWay*</label>
           <select class="form-select"style="background-color: #39c277 !important; color: black;" name="payment_gatway" id="inputGroupSelect01" required>

          <option value="0"style="background-color: #39c277 !important; color: black;">Payment Getway</option>
          <option value="bkash"style="background-color: #39c277 !important; color: black;">bkash</option>
          <option value="DBBL"style="background-color: #39c277 !important; color: black;">DBBL</option>
          <option value="Nagad"style="background-color: #39c277 !important; color: black;">Nagad</option>
        </select><br>

        <div class="form-group center"style="text-align: center;border: none; font-weight: bold;border-radius: 5px;">
      <label for="pwd" >BDT</label><br> 
      <input class="p-3" type="amount" name="amount" class="form-control" id="pwd" placeholder="৳ 1000"style="border-radius: 10px;"required>
    </div><br><br>


      <div class="" style="border-bottom: 1px solid #d3ced2;">
      </div><br>


    <label class="">
        <input type="checkbox" class="">
          <span class=""style=" color: black;font-weight: bold;"required >আমি ওয়েবসাইটের <a href="javascript:void(0)"style=" color: black;text-decoration: none;font-weight: bold;" >শর্তাবলী</a> পড়েছি এবং তাতে সম্মত হয়েছি / I have read and agree to the website <a href="javascript:void(0)"style=" color: black;text-decoration: none;font-weight: bold;" >terms and condition</a>.</span>&nbsp;<abbr class="required" title="required"required>*</abbr>
        </label><br><br>

          
       
       <button type="submit" name="submit" class="primary-button btn btn-primary" style="background-color: #198754 !important; color: white;margin-left: 102px; border-radius: 50px;padding-right: 25px; padding-left: 25px;">ডোনেশন সম্পন্ন করুন / Proceed to donation</button> 
        </form>

         </div>


        </div>
      </div>

      <div class="align_center" style="text-align: center;"><a href="javascript:void(0)/শর্তাবলী" style=" color: #767676;">শর্তাবলী</a> | 
<a href="javascript:void(0)/গোপনীয়তা নীতি/"style=" color: #767676;">গোপনীয়তা নীতি</a> | 

<a href="javascript:void(0)"style=" color: #767676;" >Terms &amp; conditions</a> | 
<a href="javascript:void(0)"style=" color: #767676;">Privacy Policy</a></div><br><br>


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
<div class="container mtop">
<footer>
  <div class="row">
<div class="col-md-6 col-sm-6 col">
    

  <div class="mapouter">
  <div class="gmap_canvas">
    <iframe class="col-md-10 col-10 col-sm-10 gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=300&amp;height=200&amp;hl=en&amp;q=mohammadpur housing socity,road no.10 ,housing no 6,softlakes ltd&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
      
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

 
</div>


</div>
</div>




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



	 