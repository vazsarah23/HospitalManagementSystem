<?php
  session_start();
  include('config.php');
  include('ess/checklogin.php');
  check_login();
  $Licenseno=$_SESSION['Licenseno'];
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
                <th>type</th>
                
            </tr>
        </thead>
        <?php
                                            /*
                                                *use of view in database
                                                *
                                            */
        $ret="SELECT * FROM  viewpatients ORDER BY RAND() "; 
                                                
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
                                                    
                    <td><?php echo $row->type;?></td>
                                                    
                                                    
                                    </tr>
            </tbody>
                <?php  $cnt = $cnt +1 ; }?>

    </table>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Patient Details</h4>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Patient Id</th>
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
                                                    <td><?php echo $row->pid;?></td>
                                                    <td><?php echo $row->pfname;?> <?php echo $row->plname;?></td>
                                                    <td><?php echo $row->address;?></td>
                                                    <td><?php echo $row->ailment;?></td>
                                                    <td><?php echo $row->age;?> Years</td>
                                                    <td><?php echo $row->type;?></td>
                                                    <td><?php echo $row->phone;?></td>
                                                    
                    
                </tr>
            </tbody>
                <?php  $cnt = $cnt +1 ; }?>

    </table>
    
</body>
</html>