<?php 
include 'connect.php';
//session start
include 'session.php';
//session end
$values = QB::query("SELECT * FROM t_donation")->get();
$values = QB::query("SELECT count(id) as usercount FROM t_donation ")->first(); // for user count in dashboard
$valuesW = QB::query("SELECT count(donation_type) as water FROM t_donation WHERE donation_type='water'")->first();

$valuesH = QB::query("SELECT count(donation_type) as health_care FROM t_donation WHERE donation_type='health_care'")->first();

$valuesS = QB::query("SELECT count(donation_type) as sanitization FROM t_donation WHERE donation_type='sanitization'")->first();
 ?>


 <?php 
include "includes/header.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

<?php 
include "includes/header_nav.php";
?>

<?php 
include "includes/sidebar.php";
?>






    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/Rasheda_Khanam_Foundation/asset/index.php">Home</a></li>
              <li class="breadcrumb-item active"></a>Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                      <div class="small-box bg-info">
                          <div class="inner">
                              <h3><?php echo $values->usercount; ?></h3>
                              <p>Total Donation</p>
                          </div>
                          <div class="icon">
                              <i class="ion ion-bag"></i>
                          </div>
                       <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                      <div class="small-box bg-success">
                            <div class="inner">
                                  <h3><?php echo $valuesW->water; ?></h3>
                                  <p>Water</p>
                            </div>
                            <div class="icon">
                                  <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $valuesH->health_care; ?></h3>
                                <p>Health Care</p>
                            </div>
                          <div class="icon">
                                <i class="ion ion-person-add"></i>
                          </div>
                          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                      <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $valuesS->sanitization; ?></h3>
                                <p>Sanitization</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                  </div>
              </div>
          </div>      
     </div>
     </section>
   </div>

<?php 
include "includes/footer.php";
?>
  

 