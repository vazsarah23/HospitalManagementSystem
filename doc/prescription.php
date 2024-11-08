<?php
session_start();
include("config.php");
include('ess/checklogin.php');
check_login();
$Licenseno=$_SESSION['Licenseno'];

if (isset($_POST['add_prescription'])){
    $prescriptionid=$_POST['prescriptionid'];
    $appointmentid=$_POST['appointmentid'];
    $pid=$_POST['pid'];
    $prescription_details=$_POST['prescription_details'];

    //query to insert into db
    $query = "INSERT INTO prescription (prescriptionid, appointmentid, pid, prescription_details) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssss', $prescriptionid, $appointmentid, $pid, $prescription_details);
    $stmt->execute();
    if($stmt)
    {
        echo "Prescription details added successfully.";
    }
    else {
        $err = "Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Prescription</title>
</head>
<body>
    <h2>Add Prescription</h2>
    <form method="post">
        <div>
            <input type="text" name="prescriptionid" placeholder="Prescription ID">
        </div>
        <div>
            <input type="text" name="appointmentid" placeholder="Appointment ID">
        </div>
        <div>
            <input type="text" name="pid" placeholder="Patient ID">
        </div>
        <div>
            <textarea name="prescription_details" placeholder="Prescription Details"></textarea>
        </div>
        <div>
            <button type="submit" name="add_prescription">Add Prescription</button>
        </div>
    </form>
</body>
</html>