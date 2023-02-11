<?php 
include 'connect.php';
// include 'session.php';

if(isset($_POST['submit'])){
  $rname=$_POST['rname'];
  $phone_number=$_POST['phone_number'];
  $subject=$_POST['subject'];
  $address=$_POST['address'];
  $details=$_POST['details'];

  $image_stack=array();   
    
    $alowed_ext = array("jpg", "png", "gif", "bmp", "pdf");
    $max_file_size = 1024*4200; //4000 kb / 4MB
    $path ="images/";
    $image_name_in_arry="";
    // Loop $_FILES to execute all files
    if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] != 0){
  
    foreach ($_FILES['image']['name'] as $f => $name) 
    {  
        $file_tmp =$_FILES['image']['tmp_name'][$f];
        $imagename = $_FILES['image']['name'][$f];
        $file_type = $_FILES['image']['type'][$f];
        $file_size = $_FILES['image']['size'][$f];
    
        $ext = pathinfo($imagename, PATHINFO_EXTENSION); // get the file extension name like png jpg
        if ($_FILES['image']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }          
        if ($_FILES['image']['error'][$f] == 0) {              
     
                if(move_uploaded_file($file_tmp,$path.$imagename))
                   $new_dir= uniqid().rand(1000, 9999).".".$ext;                
                    $new_name = rename($path.$imagename,$path.$new_dir);// rename file name
                    array_push($image_stack,$new_dir); // file name store in array          
        }               
    }
        $image_name_in_arry = implode(",", $image_stack);
    }



  $data=array(
    "rname" => $rname,
    "phone_number" => $phone_number,
    "subject" => $subject,
    "address" => $address,
    "details" => $details,
    "image"=>$image_name_in_arry

  );


  $test=QB::table('request_form')->insert($data);
   
  echo "Saved";
 
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
                              <a class="nav-link mx-2 dropdown-toggle" href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="font-weight: bold;">
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
    
      </div>
      <!-- navbar End -->
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-10"> -->
            <h3 style="font-size:28px; text-align: center;margin-top: 60px;padding-bottom: 45px; color: #39c277;">Kindly add your details</h3><br><br>
         <!--  </div> -->

         <div class="col-md-6">

        <form action="" method="post" enctype="multipart/form-data">

           <label class="" style="color: black;font-weight: bold;" required>Name*</label>
          <input type="name" name="rname" class="form-control"
          style="background-color: #39c277 !important; color: black;" placeholder="Enter" required><br> 


             
           <label class=""style="color: black;font-weight: bold;">Phone Number*</label>
          <input type="phone_number" name="phone_number" class="form-control"
          style="background-color: #39c277 !important; color: black;" placeholder="+088"required><br>


           <label class=""style="color: black;font-weight: bold;">Subject*</label>
          <input type="text" name="subject" class="form-control"
          style="background-color: #39c277 !important; color: black;" placeholder=""required><br>


          <label class=""style="color: black;font-weight: bold;">Address*</label>
          <input type="text" name="address" class="form-control"
          style="background-color: #39c277 !important; color: black;" placeholder="Enter"required><br>


           <div class="">
            <label style="color: black;font-weight: bold;">Details*</label>

                    <textarea cols="" name="details" class="form-control" style="background-color: #39c277 !important; color: black;">  </textarea>
            </div><br>
                                
             
              <div class="">
                                 <label style="color: black;font-weight: bold;" for="image">Attachment*</label>
                                <input type="file" name="image[]" class="form-control"style="background-color: #39c277 !important; color: black;">
                    </div>

        

        


      <div class="" style="border-bottom: 1px solid #d3ced2;">
      </div><br>


    <label class="">
        <input type="checkbox" class=""required>
          <span class=""style=" color: black;font-weight: bold;"required >আমি ওয়েবসাইটের <a href="javascript:void(0)"style=" color: black;text-decoration: none;font-weight: bold;" >শর্তাবলী</a> পড়েছি এবং তাতে সম্মত হয়েছি / I have read and agree to the website <a href="javascript:void(0)"style=" color: black;text-decoration: none;font-weight: bold;" >terms and condition</a>.</span>&nbsp;<abbr class="required" title="required" required></abbr>
        </label><br><br>



                                    

                              

          
       
       <button type="submit" name="submit" class="primary-button btn btn-primary" style="background-color: #198754 !important; color: white;margin-left: 214px; border-radius: 50px;padding-right: 40px; padding-left: 40px;">Submit</button> 
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



 
	 