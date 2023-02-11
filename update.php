<?php 
include 'connect.php';

if (isset($_GET['id'])) {

   $getID=$_GET['id'];

 $all_data=QB::query("SELECT * FROM registration WHERE id ='$getID'")->first();


if (isset($_POST['update'])) {
	//$getID=$_GET['id'];
	$uname=$_POST['uname'];
    $email=$_POST['email'];
	$address=$_POST['address'];
    $employe_id=$_POST['employe_id'];
	$phone_number=$_POST['phone_number'];



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

 if(!empty($image_name_in_arry)){

    $attach=$image_name_in_arry;

    }elseif(!empty($image_name_in_arry)){

    $attach=$_POST["old_slide"];

    }else{

    $attach="";
    }

    if(!empty($image_name_in_arry) && !empty($_POST["old_slide"]) ){  

    
    $path ="images/";
    $old_image=$_POST['old_slide'];
    @unlink($path.$old_image);
    }

//




	

	$data= array(
	"uname" =>$uname ,
    "email" => $email,
	"address" => $address,
    "employe_id" => $employe_id,
	"phone_number" => $phone_number,
	"image" => $attach
	);


	QB::table('registration')->where('id',
     $getID)->update($data);
    header("insert.php");

}
	

}

 

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
    <h3 class="offset-md-2 i-name text-center text-primary mt-3 mb-3">Registration Form</h3>
     <div class="container py-5 h-100"style="margin-right: -33px;">
     	
     	<div class="row justify-content-center align-items-center h-100">
     		
     		<div class="col-12 col-lg-9 col-xl-7">
     			<div class="card shadow-2-strong card-registration p-3 m-3">
     				<div>
     					<form action="" method="POST" enctype="multipart/form-data">
     						<div class="row">
     							<div class="col-md-12">
     								<div class="mb-4">
     									<label>User Name</label>
                                        <input type="text" name="uname"  value="<?php echo $all_data->uname; ?>" class="form-control" >
     								
     								</div>
     							</div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Email</label>
                                        <input type="text" name="email"  value="<?php echo $all_data->email; ?>" class="form-control" >
                                    </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Address</label>
                                        <input type="text" name="address"  value="<?php echo $all_data->address; ?>" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Employe_Id</label>
                                        <input type="text" name="employe-id"  value="<?php echo $all_data->employe_id; ?>" class="form-control" >
                                    </div>
                                    </div>

                                
                                </div>
                                <div class="col-md-12"> 
                                    <div class="mb-4">
                                        <label>Phone Number</label>
                                    
                                    <input type="text" name="phone_number"  value="<?php echo $all_data->phone_number; ?>" class="form-control" >
                                    </div>
                                </div>


                            <div class="col-md-12">
             <div class="mb-4">
                      <label>Image</label>
                      <input type="file" name="image[]" class="form-control">
                      <img class="img-fluid" src="images/<?php if(!empty($all_data)){ echo $all_data->image; } ?>">
                    <input type="hidden" name="old_slide" value="<?php if(!empty($all_data)){ echo $all_data->image; } ?>" class="form-control"> <br>
          
                    </div>
                  </div>

                  <div class="col-md-12">
                   
                  <input type="submit" value= "update" name="update" class="btn btn-primary save_btn">
                
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