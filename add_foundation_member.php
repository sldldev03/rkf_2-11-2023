
<?php 
include 'connect.php';
//session start
include 'session.php';

//session end

if (isset($_POST['submit'])) {
	
	$fname=$_POST['fname'];
    $image=$_POST['image'];
    $designation=$_POST['designation'];
    $description=$_POST['description'];
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
		"fname" => $fname,
        "image" => $image,
        "designation" => $designation,
        "description" => $description,
        "image"=>$image_name_in_arry
    );
    
     QB::table("foundation_member")->insert($data);
     header("Location:add_foundation_member.php");
}

 

include "includes/header.php";

 

include "includes/header_nav.php";


?>
 <body>
    <?php

    include "includes/sidebar.php";
    ?>
   
     <div class="container offset-md-2">
     	
     	<div class="row justify-content-center align-items-center h-100">
     		
     		<div class="col-12 col-lg-9 col-xl-7">
                 <h3 class="text-info text-center mt-2"style="font-weight: bold">Add Foundation Members</h3>
     			<div class="">
     				<div class="card p-3 shadow">
     					<form action="" method="POST" enctype="multipart/form-data">
     						<div class="row">
     							<div class="col-md-6">
     								<div class="mb-4">
     									<label>Name</label>
                                        <input type="text" name="fname" class="form-control" placeholder="Enter" required>
     								
     								</div>
                                

     							</div>


                                


                            

                 <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label">Designation</label>
                                       <select class="form-control" name="designation"> 

                                        <option>--Select--</option>
                                        <option value="1">Chairperson </option>
                                        <option value="2">Co-Chairperson</option>
                                        <option value="4">Vice President</option>
                                        <option value="5">Secretary</option>
                                         <option value="6">Joint General Secretary</option>
                                        <option value="7">Treasurer</option>
                                         <option value="8">Research & Publication Editor</option>
                                         <option value="9">Planning & Development Secretary</option>
                                         <option value="10">Office Secretary</option>
                                         <option value="11">Executive Member</option>




                                       </select>
                                    
                                    </div>
                                

                                </div>

                                <div class="col-md-6">
                            <div class="mb-4">
                                 <label for="image">Photo</label>
                                <input type="file" name="image[]" class="form-control"required>
                    </div>
                 </div>
                 
                  
                  <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Best Quotes</label>

                                        <textarea cols="" name="description" class="form-control">  </textarea>


                                       
                                    
                                    </div>
                                

                                </div>

                                <div class="col-md-12">
                   
                  <input type="submit" value= "submit" name="submit" class="btn btn-primary save_btn">
                
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