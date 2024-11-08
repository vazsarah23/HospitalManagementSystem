<?php
session_start();
include("config.php");

if (isset($_POST['login'])){
    $rid = $_POST["rid"];
    $password=sha1(md5($_POST['password']));
    // $password = $_POST["password"];
    $query = $mysqli->prepare("SELECT rid,fname ,lname,password FROM receptionist WHERE rid=? AND password=?");
    $query->bind_param('ss', $rid,$password);
    $query->execute();
    $query->bind_result($rid,$fname,$lname,$password);
    $rs=$query->fetch();
    $_SESSION['rid']=$rid;
    // $rs=$query->fetch();
    if($rs)
    {
        header("Location:dashboard.php");
    }
    else
            {
            #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
                $err = "Access Denied Please Check Your Credentials";
            }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist Login Page</title>
    <!-- Bootstrap CSS -->
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
                <h2 class="text-center mb-4">Receptionist Login</h2>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="rid" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</html>