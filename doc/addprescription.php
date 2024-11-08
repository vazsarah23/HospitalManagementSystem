<?php
session_start();
include('config.php');
include('ess/checklogin.php');
check_login();

if(isset($_GET['appointmentid']) && !empty($_GET['appointmentid'])) {
    $appointmentId = $_GET['appointmentid'];
    
    // Retrieve patient ID associated with the appointment
    $query = "SELECT pid FROM appointments WHERE appointmentid = ?";
    $stmt = $mysqli->prepare($query);
    
    if ($stmt) {
        $stmt->bind_param("s", $appointmentId);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $patientId = $row['pid'];
            } else {
                echo "No patient found for this appointment.";
                exit;
            }
        } else {
            echo "Error retrieving patient ID: " . $mysqli->error;
            exit;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
        exit;
    }
    
    //there's no edit for prescription yet
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect prescription details from the form
        $prescriptionDetails = $_POST['prescription_details'];
        
        // Insert prescription details into prescription table
        $insertQuery = "INSERT INTO prescription ( appointmentid,pid, prescription_details) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($insertQuery);
        
        if ($stmt) {
            $stmt->bind_param("sss",  $appointmentId,$patientId, $prescriptionDetails);
            if ($stmt->execute()) {
                echo "Prescription added successfully.";
            } else {
                echo "Error adding prescription: " . $mysqli->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $mysqli->error;
        }
    }
} else {
    echo "Invalid appointment ID .";
}

// Close connection
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Prescription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <h2>Add Prescription</h2>
    <div class="container">
    <form method="post" ">
        <textarea name="prescription_details" rows="4" cols="50" placeholder="Enter prescription details"></textarea><br>
        <button type="submit" value="Submit">SUBMIT </button>
    </form>
</body>
</html>