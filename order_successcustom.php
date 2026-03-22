<?php
// Get data from query string
$name = $_GET['name'];
$phone = $_GET['phone'];
$flavor = $_GET['flavor'];
$weight = $_GET['weight'];
$message = $_GET['message'];
$delivery_date = $_GET['delivery_date'];
$price = $_GET['price'];
$image = $_GET['image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Successful | CakeHolic</title>
    <link rel="stylesheet" href="custom_order.css">
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .success-card {
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            text-align: left;
            max-width: 400px;
        }

        .success-card h2 {
            color: #28a745; /* green */
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success-card p {
            font-size: 16px;
            margin: 8px 0;
        }

        .success-card p strong {
            display: inline-block;
            width: 120px;
        }

        .success-card img {
            display: block;
            margin: 15px auto 0 auto;
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<section class="order-section">
    <div class="order-form">
        <h2>🎉 Order Placed Successfully!</h2>
        <p>Thank you, <?= htmlspecialchars($name) ?>. Your order has been received.</p>

        <h3>Order Details:</h3>
        <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($phone) ?></p>
        <p><strong>Flavor:</strong> <?= htmlspecialchars($flavor) ?></p>
        <p><strong>Weight:</strong> <?= htmlspecialchars($weight) ?> g</p>
        <p><strong>Message:</strong> <?= htmlspecialchars($message) ?></p>
        <p><strong>Delivery Date:</strong> <?= htmlspecialchars($delivery_date) ?></p>
        <p><strong>Price:</strong> ₹<?= htmlspecialchars($price) ?></p>
        <?php if($image): ?>
            <p><strong>Uploaded Image:</strong></p>
            <img src="<?= htmlspecialchars($image) ?>" alt="Cake Inspiration" style="max-width:100%;border-radius:10px;">
        <?php endif; ?>
    </div>
</section>

</body>
</html>



