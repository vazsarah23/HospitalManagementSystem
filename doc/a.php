<?php
session_start();
include("config.php");
include('ess/checklogin.php');
check_login();
$Licenseno=$_SESSION['Licenseno'];

if (isset($_POST['add_diagnosis'])){
    $pid = $_GET['pid'];
    $diagnosis = $_POST['diagnosis'];

    // Update the diagnosis column in the appointments table
    $query = "UPDATE patients SET diagnosis = ? WHERE pid = ? AND dichargestatus NOT NULL";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $diagnosis, $pid);
    $stmt->execute();

    if($stmt)
    {
        echo "Diagnosis added successfully.";
    }
    else {
        $err = "Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Diagnosis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <h2>Add Diagnosis</h2>
    <div class="container">
    <form method="post">
        <div>
            <textarea name="diagnosis" placeholder="Diagnosis"></textarea>
        </div>
        <div>
            <button type="submit" name="add_diagnosis">Add Diagnosis</button>
        </div>
    </form>
</body>
</html>