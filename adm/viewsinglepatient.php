<?php
session_start();
include('config.php');
include('ess/checklogin.php');
check_login();
$id = $_SESSION['id'];

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    
    $ret = "SELECT * FROM patients WHERE pid=?";
    $stmt = $mysqli->prepare($ret);
    $stmt->bind_param('s', $pid);
    $stmt->execute();
    $res = $stmt->get_result();
    
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_object()) {
            $mysqlDateTime = $row->datejoined;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <?php include("navbar.php"); ?>

<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <!--Get Details Of A Single User And Display Them Here-->
    <div class="container">
        <div class="content">
            <!-- Start Content-->
            
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card-box text-center">
                            <img src="assets/images/users/patient.png" class="rounded-circle avatar-lg img-thumbnail"
                                 alt="profile-image">
                            <div class="text-left mt-3">
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2"><?php echo $row->pfname;?> <?php echo $row->plname;?></span></p>
                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2"><?php echo $row->phone;?></span></p>
                                <p class="text-muted mb-2 font-13"><strong>Address :</strong> <span class="ml-2"><?php echo $row->address;?></span></p>
                                <p class="text-muted mb-2 font-13"><strong>Date Of Birth :</strong> <span class="ml-2"><?php echo $row->dob;?></span></p>
                                <p class="text-muted mb-2 font-13"><strong>Age :</strong> <span class="ml-2"><?php echo $row->age;?> Years</span></p>
                                <p class="text-muted mb-2 font-13"><strong>Ailment :</strong> <span class="ml-2"><?php echo $row->ailment;?></span></p>
                                <p class="text-muted mb-2 font-13"><strong>Doc id :</strong> <span class="ml-2"><?php echo $row->docid;?></span></p>
                                <hr>
                                <hr>
                                <p class="text-muted mb-2 font-13"><strong>Date Recorded :</strong> <span class="ml-2"><?php echo date("d/m/Y - h:m", strtotime($mysqlDateTime));?></span></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container-fluid -->
        </div> <!-- end content -->
    </div> <!-- end content-page -->
</div> <!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</body>
</html>

<?php
        }
    } else {
        echo "No patient found with the provided ID.";
    }
} else {
    echo "Patient ID not provided.";
}
?>