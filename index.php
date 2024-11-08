<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL MANAGEMENT SYSTEM</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-custom {
            background-color: #343a40; /* Dark color */
        }
        .navbar-brand img {
            height: 30px; /* Adjust as needed */
            width: auto; /* Maintain aspect ratio */
        }
        .background-image {
            background-image: url('banner-bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh; /* Full height of viewport */
        }
        .content-section {
            background-color: rgba(255, 255, 255, 0.7); /* Transparent white */
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Limit content width */
        }
        .content-section h4 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .content-section p {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">
        <img src="logo-light.png" alt="My Website Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="patientlogin.php">Patient Login</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="doc/doctorlogin.php">Doctor Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adm/adminlogin.php">Administrator Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="receptionist/receplogin.php">Receptionist Login</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid background-image d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-15">
            <div class="content-section text-center">
                <h1>Hospital Management System</h1>
                <h4>Caring for a better life</h4>
                <h1>Leading the way in medical excellence</h1>
                <p>Hospital Management System (HMS) is awarded as one of the Top Hospital Management Systems, which can integrate all the HIS systems, processes, and machines into an intelligent information system to derive operational efficiency and assist hospitals in the decision-making process through MIS and Analytics.</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>