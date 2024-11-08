<?php
  session_start();
  include('config.php');
  include('ess/checklogin.php');
  check_login();
  $id=$_SESSION['id'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <h4>Patient Details</h4>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Ailment</th>
                <th>Category</th>
                <th>Phone</th>
            </tr>
        </thead>
        <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
        $ret="SELECT * FROM  patients WHERE dichargestatus IS NULL"; 
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
                    
                    <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->pfname;?> <?php echo $row->plname;?></td>
                                                    <td><?php echo $row->address;?></td>
                                                    <td><?php echo $row->ailment;?></td>
                                                    <td><?php echo $row->age;?> Years</td>
                                                    <td><?php echo $row->type;?></td>
                                                    <td><?php echo $row->phone;?></td>
                                                    
                    <td><a href="his_admin_view_single_patient.php?pat_id=<?php echo $row->pat_id;?>&&pat_number=<?php echo $row->pat_number;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a></td>
                </tr>
            </tbody>
                <?php  $cnt = $cnt +1 ; }?>

    </table>
    
</body>
</html>