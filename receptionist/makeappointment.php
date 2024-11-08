<?php
    session_start();
    include('config.php');
    include('ess/checklogin.php');
    check_login();
    $id=$_SESSION['rid'];

    if(isset($_POST['make_appointment']))
    {
        $appointmentid = $_POST['appointmentid'];
        $pid = $_POST['pid'];
        $Licenseno = $_POST['Licenseno'];
        $pfname = $_POST['pfname'];
        $plname = $_POST['plname'];
        $phone = $_POST['phone'];
        $appointmentdate = $_POST['appointmentdate'];
        $appointmenttime = $_POST['appointmenttime'];

        $query = "INSERT INTO appointments (appointmentid, pid, Licenseno, pfname, plname,phone, appointmentdate, appointmenttime) VALUES (?, ?, ?,?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sssssiss', $appointmentid, $pid, $Licenseno, $pfname, $plname,$phone, $appointmentdate, $appointmenttime);
        $stmt->execute();

        if($stmt)
        {
            $success = "Appointment Created";
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
    <title>Make Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <div class="container"><!-- appointmentID, patientID, doctorLicenseNo, pfname, plname, appointmentDate, appointmentTime -->
    <form method="post" class="appointment-form">
        <div class="form-group">
            <label for="appointmentid">Appointment ID</label>
            <input type="text" id="appointmentid" name="appointmentid" placeholder="Enter Appointment ID" required>
        </div>
        <div class="form-group">
            <label for="pid">Patient ID</label>
            <input type="text" id="pid" name="pid" placeholder="Enter Patient ID" required>
        </div>
        <div class="form-group">
            <label for="Licenseno">Doctor License Number</label>
            <input type="text" id="Licenseno" name="Licenseno" placeholder="Enter Doctor License Number" required>
        </div>
        <div class="form-group">
            <label for="pfname">Patient First Name</label>
            <input type="text" id="pfname" name="pfname" placeholder="Enter Patient First Name" required>
        </div>
        <div class="form-group">
            <label for="plname">Patient Last Name</label>
            <input type="text" id="plname" name="plname" placeholder="Enter Patient Last Name" required>
        </div>
        <div class="form-group">
            <label for="phone">Patient Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Phone" required>
        </div>
        <div class="form-group">
            <label for="appointmentdate">Appointment Date</label>
            <input type="date" id="appointmentdate" name="appointmentdate" required>
        </div>
        <div class="form-group">
            <label for="appointmenttime">Appointment Time</label>
            <input type="time" id="appointmenttime" name="appointmenttime" required>
        </div>
        <p>**make sure the appointment hours are between 10:00 am - 6:00 pm</p>

        <button type="submit" name="make_appointment">Make Appointment</button>
    </form>
</div>
</body>
</html>