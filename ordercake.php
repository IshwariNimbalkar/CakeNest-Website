<?php
include "config.php";

/* HANDLE FORM SUBMIT FIRST */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fname   = $_POST['first_name'] ?? '';
    $lname   = $_POST['last_name'] ?? '';
    $mobile  = $_POST['mobile'] ?? '';
    $address = $_POST['address'] ?? '';
    $weight  = $_POST['weight'] ?? '';
    $payment = $_POST['payment'] ?? '';
    $message = $_POST['message'] ?? '';
    $cake    = $_POST['cake_name'] ?? '';
    $total   = $_POST['total_price'] ?? 0;

    // VALIDATIONS

if(strlen($fname) < 2){
    die("Invalid First Name");
}

if(strlen($lname) < 2){
    die("Invalid Last Name");
}

if(strlen($address) < 10){
    die("Address must be at least 10 characters");
}

if(!in_array($payment, ['cod','upi','debit','credit'])){
    die("Invalid Payment Method");
}

if(!is_numeric($weight) || $weight < 1 || $weight > 4){
    die("Invalid Cake Weight");
}

if(!is_numeric($total) || $total <= 0){
    die("Invalid Total Price");
}
    $sql = "INSERT INTO orders
(first_name, last_name, mobile, address, weight, payment, message, cake_name, total_price)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssd",
    $fname,
    $lname,
    $mobile,
    $address,
    $weight,
    $payment,
    $message,
    $cake,
    $total
);




    if (mysqli_stmt_execute($stmt)) {
        $order_id = mysqli_insert_id($conn);
        header("Location: order_success.php?id=" . $order_id);
        exit();
    } else {
        die("Order not saved: " . mysqli_error($conn));
    }
}

/* NORMAL PAGE LOAD */
$cakeName = $_GET['cake'] ?? '';
$price    = $_GET['price'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Cake</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>

<h1>Order Your Cake</h1>

<div class="order-container">
<form method="POST" class="order-form">

<label>Cake Name</label>
<input type="text" value="<?php echo htmlspecialchars($cakeName); ?>" readonly>
<input type="hidden" name="cake_name" value="<?php echo htmlspecialchars($cakeName); ?>">

<label>First Name</label>
<input type="text" name="first_name" required>

<label>Last Name</label>
<input type="text" name="last_name" required>

<label>Mobile Number</label>

<input type="tel" name="mobile" id="mobile" 
pattern="[0-9]{10}" 
maxlength="10" 
placeholder="Enter 10-digit mobile number"
required>

<label>Delivery Address</label>
<textarea name="address" required></textarea>

<label>Cake Weight (kg)</label>
<select name="weight" id="cakeKg" onchange="calculatePrice()">
    <option value="1">1 Kg</option>
    <option value="2">2 Kg</option>
    <option value="3">3 Kg</option>
    <option value="4">4 Kg</option>
</select>
<!-- 
<label>Payment Method</label> -->
<!-- <select name="payment">
    <option>Cash on Delivery</option>
    <option>UPI</option>
    <option>Debit Card</option>
    <option>Credit Card</option>
</select> -->
<label>Payment Method</label>
<select name="payment" id="paymentMethod" onchange="handlePayment()">
    <option value="cod">Cash on Delivery</option>
    <option value="upi">UPI</option>
    <option value="debit">Debit Card</option>
    <option value="credit">Credit Card</option>
</select>

<!-- QR Scanner Section -->
<div id="qrSection" style="display:none; margin-top:20px;">
    <h3>Scan & Pay</h3>
    <img src="img/qr.png" alt="QR Code" width="200">
    <p>Scan this QR using any UPI app</p>
</div>

<label>Additional Instructions</label>
<textarea name="message"></textarea>

<label>Total Price (₹)</label>
<input type="text" id="totalPrice" name="total_price" readonly>

<button type="submit" class="btn-order">Place Order</button>

</form>
</div>

<script>
let price = <?php echo (int)$price; ?>;

function calculatePrice(){
    let kg = document.getElementById("cakeKg").value;
    document.getElementById("totalPrice").value = price * kg;
}
calculatePrice();
function handlePayment(){
    let method = document.getElementById("paymentMethod").value;

    if(method === "upi" || method === "debit" || method === "credit"){
        document.getElementById("qrSection").style.display = "block";
    } else {
        document.getElementById("qrSection").style.display = "none";
    }
}
document.querySelector(".order-form").addEventListener("submit", function(e){

    let mobile = document.getElementById("mobile").value;
    let fname = document.querySelector("[name='first_name']").value.trim();
    let lname = document.querySelector("[name='last_name']").value.trim();
    let address = document.querySelector("[name='address']").value.trim();
    let message = document.querySelector("[name='message']").value.trim();

    // Mobile validation (already there)
    if(!/^[0-9]{10}$/.test(mobile)){
        alert("Please enter valid 10-digit mobile number");
        e.preventDefault();
        return;
    }

    // First Name validation
    if(fname.length < 2){
        alert("First name must be at least 2 characters");
        e.preventDefault();
        return;
    }

    // Last Name validation
    if(lname.length < 2){
        alert("Last name must be at least 2 characters");
        e.preventDefault();
        return;
    }

    // Address validation
    if(address.length < 10){
        alert("Please enter full address (minimum 10 characters)");
        e.preventDefault();
        return;
    }

    // Message validation
    if(message.length > 200){
        alert("Message should be less than 200 characters");
        e.preventDefault();
        return;
    }
});
</script>


</body>
</html>
