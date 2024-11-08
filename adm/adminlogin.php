<?php
session_start();
include("config.php");

if (isset($_POST['login'])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = $mysqli->prepare("SELECT email ,password,id FROM admin WHERE email=? AND password=?");
    $query->bind_param('ss', $email,$password);
    $query->execute();
    $query->bind_result($email,$password,$id);
    $rs=$query->fetch();
    $_SESSION['id']=$id;
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
    <title>Administrator Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .background-image {
            position: absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            z-index:-1;
            background-image:url('banner-bg.jpg'); 
            background-size:cover;
            filter:blur(5px);
            opacity:0.3; 
        }
        .login-container {
            margin-top:100px;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2 class="text-center mb-4">Administrator Login</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                        <small><a href="#" class="float-right">Forgot Password?</a></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>