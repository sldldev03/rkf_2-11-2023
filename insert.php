
<?php 
include 'connect.php';


if (isset($_POST['submit'])) {

	$uname=$_POST['uname'];
    $email=$_POST['email'];
	$address=$_POST['address'];
	$employe_id=$_POST['employe_id'];
	$phone_number=$_POST['phone_number'];
    $password = md5($_POST['password']);
    	//
     
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
                    $new_name = rename($path.$imagename,$path.$new_dir) ; // rename file name
                    array_push($image_stack,$new_dir); // file name store in array          
        }               
    }
        $image_name_in_arry = implode(",", $image_stack);
    } 


	$data =array(
		"uname" => $uname,
        "email" => $email,
		"address" => $address,
        "employe_id" => $employe_id,
		"phone_number" => $phone_number,
        "password" => $password,
		"image"=>$image_name_in_arry	
    );
    
     QB::table("registration")->insert($data);
     header("Location:insert.php");
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
       <div class="container h-100">
       
     	
     	<div class="row justify-content-center">
     		
     		<div class="col-md-6 offset-md-2">
                <h3 class="text-info text-center mt-2"style="font-weight: bold">Add Users</h3>
     			<div class="card p-3 shadow">

     				<div>
     					<form action="" method="POST" enctype="multipart/form-data">
     						<div class="row">
     							<div class="col-md-6">
     								<div class="mb-4">
     									<label>Name</label>
                                        <input type="text" name="uname" class="form-control" placeholder="Enter" required>
     								
     								</div>

                             

     							</div>

                                   <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter"required>
                                    </div>
                                    </div>


                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter Address"required>
                                    </div>
                               

                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Employe Id</label>
                                        <input type="text" name="employe_id" class="form-control"  class="form-control" placeholder="Enter E_id"required>
                                    </div>
                                    </div>
                                     </div>
                                
                                <div class="col-md-6"> 
                                    <div class="mb-4">
                                        <label>Phone Number</label>
                                    
                                    <input type="text" name="phone_number" class="form-control" placeholder="Enter"required value="">
                                    </div>
                               
                                   


                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="type"required>
                                    </div>
                                    </div>

                                    </div>

                        

                            <div class="col-md-6">
                            <div class="mb-4">
                                 <label for="image">Photo</label>
                                <input type="file" name="image[]" class="form-control">
                    </div>
                 
                 
                  <div class="col-md-6">
                   
                  <input type="submit" value= "submit" name="submit" class="btn btn-primary save_btn">
                
                  </div>
                   </div>

                        </div>


     						

     					</form>
     				</div>
     				
     			</div>

     		</div>
     	</div>
     </div>	


 </body>
 </html>