<?php 


include 'connect.php';
     session_start();


if (isset($_POST['login'])) {
	
	
	
	$email=$_POST['email'];
	
	$password=md5($_POST['password']);   



  // if (!empty($email) && !empty($password)) {

  //  header("location:dashboard.php");
  //   # code...
  // }else{
  //   echo "Fill up the fields";
  // }

      $values = QB::query("SELECT * FROM registration 
  WHERE email = '$email' and password = '$password' LIMIT 1")->first();
      
      
      
      if($values == true) {
        header("location:dashboard.php");

         $_SESSION['email'] = $email; // mail ta sob page e dhorbo
         
         // header("location:index.php");

      }else {

         $error = "Your Login Name or Password is invalid";

      }
   }


 
 ?>
  <!DOCTYPE html>
 <html>
 <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title></title>

 </head>
  <body>
    <h3 class="i-name text-center text-primary mt-3 pt-3">LogIn Form</h3>
     <div class="container py-2 h-100">
        
        <div class="row justify-content-center align-items-center h-100">
            
            <div class="col-6 col-lg-4 col-xl-4">
                <div class="card shadow card-registration p-3 m-3">
                    <div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="@gmail.com"required>
                                    
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder=""required>
                                    </div>
                                </div>

                   
                              <input type="submit" value= "submit" name="login" class="btn btn-primary save_btn">
                            </div>

                        </form>
                    </div>
                    
                </div>

            </div>
        </div>
     </div> 


 </body>
 </html>

 <script type="text/javascript">
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>