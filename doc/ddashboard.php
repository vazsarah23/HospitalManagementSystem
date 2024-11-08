
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
    <title>Doctor's Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php
    $result = "SELECT docfname, doclname,dept FROM doctors WHERE Licenseno=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s', $Licenseno);
    $stmt->execute();
    $stmt->bind_result($docfname, $doclname,$dept);
    
    // Fetch the result into variables
    $stmt->fetch();
    
    // Close the statement
    $stmt->close();
?>

<?php include 'navbar.php'; ?>

<H1>Doctor's Dashboard</H1>

    

<div class= "container">
<H5></H5>
<span >
doctor details: <i> <?php echo $docfname; ?> <?php echo $doclname; ?> 
<?php echo $dept; ?></i>
</span>
</div>

<div class= "container">
<li><a href="registerpatient.php">register patient</a></li>
<li><a href="viewpatients.php">view patients</a></li>
<li><a href="dischargepatient.php">discharge patients</a></li>
<li><a href="displayappointments.php">display appointments</a></li>
<!-- <li><a href="add_diagnosis.php">Add Diagnosis</a></li>
<li><a href="addprescription.php">Add prescrption</a></li> -->
<!-- <li><a href="cancelappointment.php">Cancel  Appointment</a></li> -->
<li><a href="managepatient.php">Manage Patient</a></li>
</div>

</body>
</html>