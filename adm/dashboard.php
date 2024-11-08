<?php
session_start();
include('config.php');
include('ess/checklogin.php');
check_login();
$id = $_SESSION['id'];

// Get admin details
$result = "SELECT fname, lname FROM admin WHERE id=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($fname, $lname);
$stmt->fetch();
$stmt->close();

// Get counts
$countInpatients = $mysqli->query("SELECT COUNT(*) FROM patients WHERE type = 'inpatient' AND dichargestatus IS NULL")->fetch_row()[0];
$countOutpatients = $mysqli->query("SELECT COUNT(*) FROM patients WHERE type = 'outpatient'")->fetch_row()[0];
$countDoctors = $mysqli->query("SELECT COUNT(*) FROM doctors")->fetch_row()[0];
$countTotalPatients = $mysqli->query("SELECT COUNT(*) FROM patients WHERE dichargestatus = ''")->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        /* Navbar styles */
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f4f4f4;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            display: block;
            color: #333;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="adminlogout.php">Logout</a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="registerpatient.php">Register Patient</a>
        <a href="registeremployee.php">Register Doctor</a>
        <a href="viewpatients.php">View Patients</a>
        <a href="makeappointment.php">Make Appointment</a>
        <a href="displayappointments.php">Display Appointments</a>
        <a href="dischargepatient.php">Discharge Patient</a>
        <a href="managepatient.php">Manage Patient</a>
        <a href="viewdocdetails.php">View Doctor Details</a>
        <a href="registerrecep.php">Receptionist Registration</a>
    </div>
<!-- Page content -->
<div style="margin-left: 200px; padding: 20px;">
        <h1>ADMIN DASHBOARD</h1>
        <h2>Welcome, <?php echo $fname . ' ' . $lname; ?></h2>

        <h2>Dashboard Stats:</h2>
        <ul>
            <li>Total Inpatients: <?php echo $countInpatients; ?></li>
            <li>Total Outpatients: <?php echo $countOutpatients; ?></li>
            <li>Total Doctors: <?php echo $countDoctors; ?></li>
            <li>Total Patients: <?php echo $countTotalPatients; ?></li>
        </ul>
    </div>
</body>
</html>