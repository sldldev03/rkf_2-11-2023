
<?php 
include 'connect.php';
//session start
include 'session.php';

//session end

if (isset($_POST['submit'])) {
    
    $amount=$_POST['amount'];
    $donaton_type=$_POST['donaton_type'];
    
        //
    

    $data =array(
        "amount" => $amount,
        "donaton_type" => $donaton_type
        
    );
    
     QB::table("donation_distribution")->insert($data);
     header("Location:add_donation_distribution.php");
}

 
//total count start
 $Value=QB::query("SELECT SUM(amount) as allAmount FROM `donation_distribution`")->first();
//total count end



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
                 <h3 class="text-info text-center mt-2"style="font-weight: bold">Add Donation Distribution</h3>
                <div class="">
                    <div class="card p-3 shadow">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">


                                    <div class="mb-4">
                                        <label>Total Amount : <?php echo $Value->allAmount; ?></label>
                                    
                                    </div>
                                

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Amount</label>
                                        <input type="text" name="amount" class="form-control" placeholder="Enter" required>
                                    
                                    </div>
                                

                                </div>


                                


                            

                 <div class="col-md-6">
                                    <div class="mb-4">
                                        <label class="form-label">Donation Type</label>
                                       <select class="form-control" name="donaton_type"> 

                                        <option>--Select--</option>

                                        <option value="Water">Water</option>
                                        
                                        <option value="Health Care">Health Care</option>
                                        <option value="Sanitization">Sanitization</option>

                                       </select>
                                    
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