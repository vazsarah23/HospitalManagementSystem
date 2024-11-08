<?php
    session_start();
    include('config.php');
    include('ess/checklogin.php');
    check_login();
    $Licenseno=$_SESSION['Licenseno'];

    if (isset($_POST['discharge_patient'])) {
        $pid = $_POST['pid'];
        $dischargestatus = 'discharged';

        $query = "UPDATE patients SET dichargestatus = ? WHERE pid = ?";
        $stmt = $mysqli->prepare($query);

        if ($stmt) {
            $stmt->bind_param('ss', $dischargestatus, $pid );
            $stmt->execute();
            $success = "Patient Discharged";
        } else {
            $err = "Please Try Again Or Try Later";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Discharge Patient</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <h4 class="page-title">Discharge Patient</h4>
    <div class="container">
    <form method="post">
        <!-- Display patient details here -->
        <div class="form-row">
    <input  name="pid" >
    
            <!-- Add a hidden input for discharge status -->
            <input  name="dischargestatus" value="<?php echo $dischargestatus; ?>">
        </div>

        <!-- Add a button to discharge the patient -->
        <button type="submit" name="discharge_patient" class="ladda-button btn btn-success" data-style="expand-right">Discharge</button>
    </form>
</div>

    
</body>
</html>