<?php
session_start();
include("config.php");
include('ess/checklogin.php');
check_login();
$Licenseno=$_SESSION['Licenseno'];

if (isset($_POST['add_patient'])){
    $pid=$_POST['pid'];
    $pfname=$_POST['pfname'];
    $plname=$_POST['plname'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $age=$_POST['age'];
    $type = $_POST['type'];
    $ailment = $_POST['ailment'];
    $docid = $_POST['docid'];
    $diagnosis = $_POST['diagnosis'];
    $dob = $_POST['dob'];

    //query to insert into db
    $query = "insert into patients (pid,pfname,plname,phone,address,age,type,ailment,docid,diagnosis,dob) values(?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssssss',$pid,$pfname,$plname,$phone,$address,$age,$type,$ailment,$docid,$diagnosis,$dob);
    $stmt->execute();
    if($stmt)
			{
				// $success = "Patient Details Added";
                echo"Patient Details Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient Details</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Add Patient Details</h2>
    <form method="post">
        <div class="form-group">
            <label for="pid">Patient ID</label>
            <input type="text" id="pid" name="pid" placeholder="Enter patient id">
        </div>
        <div class="form-group">
            <label for="pfname">First Name</label>
            <input type="text" id="pfname" name="pfname" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="plname">Last Name</label>
            <input type="text" id="plname" name="plname" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter address">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" id="age" name="age" placeholder="Enter age">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option>Inpatient</option>
                <option>Outpatient</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ailment">Ailment</label>
            <input type="text" id="ailment" name="ailment" placeholder="Enter ailment">
        </div>
        <div class="form-group">
            <label for="docid">Doctor ID</label>
            <input type="text" id="docid" name="docid" placeholder="Enter doctor ID">
        </div>
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <input type="text" id="diagnosis" name="diagnosis" placeholder="Enter ailment">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" placeholder="Enter date of birth">
        </div>
        <div class="form-group">
            <button type="submit" name="add_patient">Add Patient</button>
        </div>
    </form>
</div>


</body>
</html>