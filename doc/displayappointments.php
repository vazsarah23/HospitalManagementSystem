<?php
session_start();
include('config.php');
include('ess/checklogin.php');
check_login();
$id=$_SESSION['Licenseno'];

// Assuming you have a table named 'appointments' and a table named 'doctors'
$query = "SELECT appointments.*, doctors.docfname, doctors.doclname FROM appointments 
          JOIN doctors ON appointments.Licenseno = doctors.Licenseno WHERE appointments.Licenseno='$id' ";
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
    <link rel="stylesheet" href="style.css">

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
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <label for="selectedDate">Select Date:</label>
    <input type="date" id="selectedDate">
    <button onclick="filterAppointments()">Get Appointment</button>

    <div  id="appointmentDetails">
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
    </div>
</body>
</html>