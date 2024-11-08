<?php
    session_start();
    include('config.php');
    include('ess/checklogin.php');
    check_login();
    $id=$_SESSION['id'];

   

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
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file -->
</head>
<body>
    <?php include 'navbar.php'; ?> <!-- Include your sidebar -->

    <div class="content">
        <h4 class="page-title">Discharge Patient</h4>
        <form method="post">
            <!-- Display patient details here -->
            <div class="form-row">
                <input name="pid">

                <!-- Add a hidden input for discharge status -->
                <input name="dischargestatus" value="<?php echo $dischargestatus; ?>">
            </div>

            <!-- Add a button to discharge the patient -->
            <button type="submit" name="discharge_patient" class="ladda-button btn btn-success" data-style="expand-right">Discharge</button>
        </form>

    <?php
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $ret = "SELECT * FROM patients WHERE pid=?";
        $stmt = $mysqli->prepare($ret);
        $stmt->bind_param('s', $pid);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($row = $res->fetch_object()) {
    ?>

   
            <!-- Display patient details using PHP variables -->
            <tbody>
                <tr>
                    
                    <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $row->pfname;?> <?php echo $row->plname;?></td>
                                                    <td><?php echo $row->address;?></td>
                                                    <td><?php echo $row->ailment;?></td>
                                                    <td><?php echo $row->age;?> Years</td>
                                                    <td><?php echo $row->type;?></td>
                                                    <td><?php echo $row->phone;?></td>
                                                    
                        </tr>
            </tbody>

            <!-- Add a hidden input for the patient ID -->
            <input  name="pid" value="<?php echo $pid; ?>">


    <?php
        }
    }
    ?>
</body>
</html>