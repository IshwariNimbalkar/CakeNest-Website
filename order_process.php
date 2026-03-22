<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "cake"); // change username/password if needed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$flavor = $_POST['flavor'];
$weight = $_POST['weight'];
$message = $_POST['message'] ?? '';
$delivery_date = $_POST['delivery_date'];
$price = $_POST['price'];

// Handle image upload
$image = '';
if(isset($_FILES['cakeImage']) && $_FILES['cakeImage']['error'] == 0) {
    $targetDir = "uploads/";
    if(!is_dir($targetDir)) { mkdir($targetDir, 0777, true); }
    $image = $targetDir . basename($_FILES['cakeImage']['name']);
    move_uploaded_file($_FILES['cakeImage']['tmp_name'], $image);
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO custom (name, phone, flavor, weight, message, delivery_date, image, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssd", $name, $phone, $flavor, $weight, $message, $delivery_date, $image, $price);

if($stmt->execute()){
    // Redirect to success page with data in query string
    $query = http_build_query([
        'name'=>$name,
        'phone'=>$phone,
        'flavor'=>$flavor,
        'weight'=>$weight,
        'message'=>$message,
        'delivery_date'=>$delivery_date,
        'price'=>$price,
        'image'=>$image
    ]);
    header("Location: order_successcustom.php?$query");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
