<?php
    
    session_start();
  include('config.php');
  include('ess/checklogin.php');
  check_login();
  $id=$_SESSION['id'];
		if(isset($_POST['add_doc']))
		{
			$Licenseno=$_POST['Licenseno'];
            $docfname=$_POST['docfname'];
			$doclname=$_POST['doclname'];
			$dept=  $_POST['dept'];
            $docnumber = $_POST['docnumber'] ;

            $docemail=$_POST['docemail'];
            $password=sha1(md5($_POST['password']));
            // $certificate=$_FILES["certificate"]["name"];

            // move_uploaded_file($_FILES["certificate"]["tmp_name"],"pics/".$_FILES["certificate"]["name"]);
             if(isset($_FILES["certificate"])) {
                $certificate = $_FILES["certificate"]["name"];
                move_uploaded_file($_FILES["certificate"]["tmp_name"], "pics/" . $_FILES["certificate"]["name"]);
            } else {
                // Handle the case where 'certificate' is not set or null
                $certificate = "c:/Users/vaz/Downloads/OIP (2).jpg";  // You can set a default value or handle it as needed
            }
            $query="insert into doctors (Licenseno, docfname, doclname, dept,docnumber, docemail, password, certificate) values(?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssss', $Licenseno, $docfname, $doclname, $dept,$docnumber, $docemail, $password,$certificate);
			$stmt->execute();

            if($stmt)
			{
				echo"Doctor Details Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register doctor</title>
    <!-- Link to your external CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<!-- doc_license, doc_fname, doc_lname, dept,docnumber, docemail, password,certificate -->
<div class="container">
<form method="post">
    <div class="form-group">
        <label for="Licenseno">Doctor's License Number</label>
        <input type="text" id="Licenseno" name="Licenseno" placeholder="Enter Doctor's License Number" required>
    </div>

    <div class="form-group">
        <label for="docfname">Doctor's First Name</label>
        <input type="text" id="docfname" name="docfname" placeholder="Enter Doctor's First Name" required>
    </div>
    <div class="form-group">
        <label for="doclname">Doctor's Last Name</label>
        <input type="text" id="doclname" name="doclname" placeholder="Enter Doctor's Last Name" required>
    </div>
    <div class="form-group">
        <label for="dept">Department</label>
        <select id="dept" name="dept">
            <option>Cardiology</option>
            <option>General</option>
            <option>Neurology</option>
            <option>Gynecology</option>
        </select>
    </div>
    <div class="form-group">
        <label for="docnumber">Contact Number</label>
        <input type="text" id="docnumber" name="docnumber" placeholder="Enter Contact Number">
    </div>
    <div class="form-group">
        <label for="docemail">Email ID</label>
        <input type="email" id="docemail" name="docemail" placeholder="Enter Email ID" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required>
    </div>
    <div class="form-group">
        <label for="certificate">Profile Picture</label>
        <input type="file" id="certificate" name="certificate" placeholder="">
    </div>
    <button type="submit" name="add_doc">Add Doctor</button>
</form>
    </div>
</body>
</html>