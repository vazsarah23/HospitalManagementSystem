
<?php
  session_start();
  include('config.php');
  include('ess/checklogin.php');
  check_login();
  $rid=$_SESSION['rid'];
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
    <H1>RECEPTIONIST DASHBOARD</H1>
    <h1>receptionist details</h1>
    <?php
    $result = "SELECT fname, lname FROM receptionist WHERE rid=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s', $rid);
    $stmt->execute();
    $stmt->bind_result($fname, $lname);
    
    // Fetch the result into variables
    $stmt->fetch();
    
    // Close the statement
    $stmt->close();
?>
    
<?php include 'navbar.php'; ?>
<!-- ... (rest of your code) ... -->

<div class="container">
<span class="pro-user-name ml-1">
<h2>WELCOME <?php echo $fname; ?> <?php echo $lname; ?> </h2>
</span>
    <!-- <a href="receplogout.php" class="dropdown-item notify-item"> -->
                    <!-- logout -->
                    <!-- </a> -->
<!-- <li><a href="registerpatient.php">register patient</a></li> -->


<li><a href="viewpatients.php">view patients</a></li>
<li><a href="makeappointment.php">make appointment</a></li>
<li><a href="displayappointments.php">display appointments</a></li>
<!-- <li><a href="dischargepatient.php">dischargepatient</a></li> -->
<!-- <li><a href="managepatient.php">managepatient</a></li> -->
<li><a href="viewdocdetails.php">viewdocdetails</a></li>
</div>


</body>
</html>