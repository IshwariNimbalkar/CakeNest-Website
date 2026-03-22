<?php
include "config.php";

if (!isset($_GET['id'])) {
    die("Invalid order");
}

$id = (int)$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM orders WHERE id = $id");
$order = mysqli_fetch_assoc($result);

if (!$order) {
    die("Order not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>
    <style>
        body { font-family: Arial; background:#f4f6f8; }
        .box {
            width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { color: green; text-align: center; }
        p { margin: 6px 0; }
    </style>
</head>
<body>

<div class="box">
    <h2>🎉 Order Successful!</h2>

    <p><b>Order ID:</b> <?php echo $order['id']; ?></p>
    <p><b>Name:</b> <?php echo $order['first_name']." ".$order['last_name']; ?></p>
    <p><b>Mobile:</b> <?php echo $order['mobile']; ?></p>
    <p><b>Cake:</b> <?php echo $order['cake_name']; ?></p>
    <p><b>Weight:</b> <?php echo $order['weight']; ?> Kg</p>
    <p><b>Payment:</b> <?php echo $order['payment']; ?></p>
    <p><b>Total:</b> ₹<?php echo $order['total_price']; ?></p>
</div>

</body>
</html>
