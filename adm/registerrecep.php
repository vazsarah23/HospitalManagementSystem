<?php
    
    session_start();
  include('config.php');
  include('ess/checklogin.php');
  check_login();
  $id=$_SESSION['id'];
		if(isset($_POST['add_rec']))
		{
			
            $rid=$_POST['rid'];
            $fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=  $_POST['email'];
            $password=sha1(md5($_POST['password']));
            $phone=  $_POST['phone'];
            

           
            $query="insert into receptionist (rid,fname, lname, email, password, phone) values(?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssi', $rid,$fname, $lname, $email, $password, $phone);
			$stmt->execute();

            if($stmt)
			{
				echo"Receptionist Details Added";
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
    <title>Register Receptionist</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="rid">Receptionist ID:</label>
                <input type="text" name="rid" id="rid" placeholder="Enter Receptionist ID" required>
            </div>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" name="fname" id="fname" placeholder="Enter Receptionist First Name" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" name="lname" id="lname" placeholder="Enter Receptionist Last Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter Email ID" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" placeholder="Enter Phone Number" required>
            </div>
            <button type="submit" name="add_rec">Add Receptionist</button>
        </form>
    </div>
</body>
</html>