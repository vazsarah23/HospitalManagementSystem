<?php
    session_start();
    include('config.php');
    include('ess/checklogin.php');
    check_login();
    $id=$_SESSION['rid'];

    if(isset($_POST['make_payment']))
    {
        $paymentid = $_POST['paymentid'];
        $pid = $_POST['pid'];
        $mode = $_POST['mode'];
        $amt = $_POST['amt'];
        $paid = isset($_POST['paid']) ? $_POST['paid'] : '';

        $query = "INSERT INTO payment (paymentid, pid, mode, amt, paid) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sssis', $paymentid, $pid, $mode, $amt, $paid);
        $stmt->execute();

        if($stmt)
        {
            $success = "Payment Made Successfully";
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
    <title>Make Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Make Payment</h2>
        <form method="post" class="payment-form">
            <div class="form-group">
                <label for="paymentid">Payment ID</label>
                <input type="text" id="paymentid" name="paymentid" placeholder="Enter Payment ID" required>
            </div>
            <div class="form-group">
                <label for="pid">Patient ID</label>
                <input type="text" id="pid" name="pid" placeholder="Enter Patient ID" required>
            </div>
            <div class="form-group">
                <label for="mode">Payment Mode</label>
                <select id="mode" name="mode" required>
                    <option value="cash">Cash</option>
                    <option value="card">Card</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amt">Amount</label>
                <input type="number" id="amt" name="amt" placeholder="Enter Amount" required>
            </div>
            <div class="form-group">
                <label for="paid">Paid</label>
                <input type="checkbox" id="paid" name="paid" value="paid">
            </div>
            <button type="submit" name="make_payment">Make Payment</button>
        </form>
    </div>
</body>
</html>