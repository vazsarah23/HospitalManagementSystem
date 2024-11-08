<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            align:right;
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
            background-color: #ddd;
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
        <a href="receplogout.php">Logout</a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        
    <a href="dashboard.php">Dashboard</a>
        <a href="viewpatients.php">View Patients</a>
        <a href="makeappointment.php">Make Appointment</a>
        <a href="displayappointments.php">Display Appointments</a>
        <!-- <a href="dischargepatient.php">Discharge Patient</a> -->
        <a href="makepayment.php">makepayment</a>
        <a href="viewdocdetails.php">View Doctor Details</a>
        
    </div>
</body>
</html>