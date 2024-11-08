<?php
session_start();
include('config.php');
include('ess/checklogin.php');
check_login();
$id = $_SESSION['rid'];

// Check if the form is submitted
if(isset($_POST['dept'])) {
    $dept = $_POST['dept'];
    $stmt = $mysqli->prepare("CALL GetDocDetails(?)");
    $stmt->bind_param("s", $dept);
    $stmt->execute();
    $res = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
                /* CSS styles for button and select */
                button, select {
            font-size: 14px; /* Adjust the font size as needed */
            padding: 5px 10px; /* Adjust padding as needed */
            width: 150px; /* Adjust the width of the select element */
            margin: 0 auto; /* Center the select element horizontally */
            display: block; /* Ensure the select element takes up the specified width */
        }

    

        form {
            text-align: center; /* Align form elements to the center */
        }
    </style>
    </head>
<body>
    <?php include("navbar.php"); ?>
    <h4>Doctor Details</h4>
    <form method="post">
        <label for="dept">Select Department:</label>
        <select name="dept" id="dept">
            <option value="Cardiology">Cardiology</option>
            <option value="Neurologist">Neurology</option>
            <!-- Add more options as needed -->
        </select>
        <button type="submit">Submit</button>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($res)) {
            $cnt = 1;
            while($row = $res->fetch_object()) {
                echo "<tr>";
                echo "<td>".$cnt."</td>";
                echo "<td>".$row->docfname."</td>";
                echo "<td>".$row->doclname."</td>";
                echo "<td>".$row->docemail."</td>";
                echo "<td>".$row->docnumber."</td>";
                echo "</tr>";
                $cnt++;
            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>