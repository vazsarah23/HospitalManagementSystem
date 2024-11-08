<?php
session_start();
include("config.php");

if (isset($_POST['login'])){
    $Licenseno = $_POST["Licenseno"];
    $password=sha1(md5($_POST['password']));
    // $password = $_POST["password"];
    $query = $mysqli->prepare("SELECT Licenseno,docfname ,doclname,password FROM doctors WHERE Licenseno=? AND password=?");
    $query->bind_param('ss', $Licenseno,$password);
    $query->execute();
    $query->bind_result($Licenseno,$docfname,$doclname,$password);
    $rs=$query->fetch();
    $_SESSION['Licenseno']=$Licenseno;
    // $rs=$query->fetch();
    if($rs)
    {
        header("Location:ddashboard.php");
    }
    else
    {
        $err = "Access Denied Please Check Your Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 login-container">
            <h2 class="text-center mb-4">Doctor Login</h2>
            <form  method="post">
                <div class="form-group">
                    <input type="Licenseno" class="form-control" name="Licenseno" placeholder="Licenseno">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>