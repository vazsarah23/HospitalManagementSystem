<?php
session_start();
include('config.php');
include('ess/checklogin.php');
check_login();
$id=$_SESSION['id'];

// Assuming you have a table named 'appointments' and a table named 'doctors'
$query = "SELECT appointments.*, doctors.docfname, doctors.doclname FROM appointments 
          JOIN doctors ON appointments.Licenseno = doctors.Licenseno ";
$result = $mysqli->query($query);

if ($result) {
    // Fetch associative array and store appointments in an array
    $appointments = array();
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }

    // Free result set
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointment Details</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have a CSS file named 'styles.css' -->
    <script>
        function filterAppointments() {
            var selectedDate = document.getElementById("selectedDate").value;
            var appointments = document.getElementsByClassName("appointment");
            
            for (var i = 0; i < appointments.length; i++) {
                var appointmentDate = appointments[i].getAttribute("data-appointmentdate");
                if (appointmentDate !== selectedDate) {
                    appointments[i].style.display = "none";
                } else {
                    appointments[i].style.display = "block";
                }
            }
        }
    </script>
    <style>
        .containers {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center-align the items horizontally */
            margin-left: 250px; /* Adjusted left margin */
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?> <!-- Assuming you have a PHP file named 'sidebar.php' for your sidebar -->
    

    <div class="containers">
    <label for="selectedDate">Select Date:</label>
    <input type="date" id="selectedDate">
    <button onclick="filterAppointments()">Filter</button>
        <?php
            // Iterate over stored appointments array to display appointments
            foreach ($appointments as $row) {
                echo '<div class="appointment" data-appointmentdate="' . $row['appointmentdate'] . '">';
                echo "Patient ID: " . $row['pid'] . "<br>";
                echo "Patient Name: " . $row['pfname'] . " " . $row['plname'] . "<br>";
                echo '<a href="cancelappointment.php?appointmentid=' . $row['appointmentid'] . '">Cancel Appointment</a>' . "<br>";
                echo '<a href="add_diagnosis.php?appointmentid=' . $row['appointmentid'] . '">Add Diagnosis</a>';
                echo '<a href="addprescription.php?appointmentid=' . $row['appointmentid'] . '">add prescription</a>' . "<br>";
                echo '<a href="prescription.php">add prescription</a>' . "<br>";
                echo "<hr>";
                echo '</div>';
            }
        ?>
    </div>
</body>
</html>