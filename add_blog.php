<?php
include 'connect.php';
 ?>


<?php 
session_start();
 $user_id= $_SESSION['email'];

 $user_data= QB::query("SELECT * FROM `registration` WHERE email='$user_id' LIMIT 1")->first();
 
 // $user_data= QB::query("SELECT * FROM blog LEFT JOIN registration ON blog.user_id = registration.id;'")->first();
 
   




if (isset($_POST['submit'])) {

    $tittle=$_POST['tittle'];
    $details=$_POST['details'];
    $user_id=$_POST['user_id'];
   
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
        "tittle" => $tittle,
        "details" => $details,
        "image"=>$image_name_in_arry,    
        "user_id"=>$user_id
       
    );
    
     QB::table("blog")->insert($data);
     header("Location:add_blog.php");
    
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
                <h3 class="text-info text-center mt-2"style="font-weight: bold">Add Blog</h3>
                <div class="card p-3 shadow">

                    <div>
                     <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Tittle</label>
                                        <input type="text" name="tittle" class="form-control" placeholder="" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Details</label>
                                        <input type="text" name="details" class="form-control" placeholder="" required>
                                    </div>
                                </div>

                               <div class="col-md-6">
                               <label> User Data</label>
                                    
                                        <input type="text" name="user_id" value="<?php echo $user_data->id;?>">
                                </div>
                            <div class="col-md-6">
                               <div class="mb-4">
                                  <label for="image">Image</label>
                                  <input type="file" name="image[]" class="form-control">
                              </div>    
                           </div>



                   <div class="col-md-6">
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