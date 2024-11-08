<?php
    session_start();
    include('config.php');
    include('ess/checklogin.php');
    check_login();
    $id=$_SESSION['id'];

  if(isset($_GET['delete']))
  {
        $id=intval($_GET['delete']);
        $adn="delete from patients where pid=?";
        $stmt= $mysqli->prepare($adn);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $stmt->close();	 
  
          if($stmt)
          {
            $success = "Patients Records Deleted";
          }
            else
            {
                $err = "Try Again Later";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    </head>
    


    <body>
    <?php include 'navbar.php'; ?>

        <!-- Begin page -->
        <div id="wrapper">

           
            <div class="container">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">Manage Patients</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Manage Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                       
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Patient</th>
                                                <th data-hide="phone">Number</th>
                                                <th data-hide="phone">Address</th>
                                                <th data-hide="phone">Category</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  patients ORDER BY RAND() "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>

                                                <tbody>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->pfname;?> <?php echo $row->plname;?></td>
                                                    <td><?php echo $row->age;?></td>
                                                    <td><?php echo $row->address;?></td>
                                                    <td><?php echo $row->type;?></td>
                                                    
                                                    <td>
                                                        <a href="managepatient.php?delete=<?php echo $row->pid;?>" class="badge badge-danger"><i class=" mdi mdi-trash-can-outline "></i> Delete</a>
                                                        <a href="viewsinglepatient.php?pid=<?php echo $row->pid;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                        <a href="his_admin_update_single_patient.php?pid=<?php echo $row->pid;?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

              
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>