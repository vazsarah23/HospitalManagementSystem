<?php
session_start();
include('config.php');
include('ess/checklogin.php');
check_login();

if(isset($_GET['appointmentid']) && !empty($_GET['appointmentid'])) {
    $appointmentId = $_GET['appointmentid'];
    
    // SQL to delete appointment
    $query = "DELETE FROM appointments WHERE appointmentid = ?";
    
    // Prepare statement
    $stmt = $mysqli->prepare($query);
    
    if($stmt) {
        // Bind parameters
        $stmt->bind_param("s", $appointmentId);
        
        // Execute statement
        if($stmt->execute()) {
            echo "Appointment canceled successfully.";
        } else {
            echo "Error canceling appointment: " . $mysqli->error;
        }
        
        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $mysqli->error;
    }
} else {
    echo "Invalid appointment ID.";
}

// Close connection
$mysqli->close();
?>