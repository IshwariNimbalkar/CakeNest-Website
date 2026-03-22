<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Custom Cake Order | CakeHolic</title>
 <link rel="stylesheet" href="custom-order.css">

</head>

<body>

<header class="header">
    <h1>🎂 Custom Cake Order</h1>
    <p>Create your dream cake with CakeHolic</p>
</header>

<section class="order-section">
    <form class="order-form" id="orderForm" method="POST" action="order_process.php" enctype="multipart/form-data">

        <h2>Design Your Cake</h2>

        <label>Name</label>
        <input type="text" id="name" name="name" placeholder="Your name" required>

        <label>Phone</label>
        <input type="tel" id="phone" name="phone" placeholder="Mobile number" required>

        <label>Flavor</label>
        <select id="flavor" name="flavor" required>
            <option value="">Select Flavor</option>
            <option>Chocolate</option>
            <option>Vanilla</option>
            <option>Red Velvet</option>
            <option>Strawberry</option>
        </select>

        <label>Weight</label>
        <select id="weight" name="weight" onchange="calculatePrice()" required>
            <option value="">Select Weight</option>
            <option value="300">0.5 kg – ₹300</option>
            <option value="600">1 kg – ₹600</option>
            <option value="1200">2 kg – ₹1200</option>
        </select>

        <label>Message on Cake</label>
        <input type="text" name="message" placeholder="Happy Birthday ❤️">

        <label>Delivery Date</label>
        <input type="date" id="date" name="delivery_date" required>

        <div class="price-box">
            Total Price: <span id="price">₹0</span>
        </div>

        <!-- hidden price field -->
        <input type="hidden" name="price" id="hiddenPrice" value="0">

        <button type="submit">Place Order</button>

        <label>Upload Cake Inspiration Image</label>

        <div class="upload-box">
            <input type="file" id="cakeImage" name="cakeImage" accept="image/*" onchange="previewImage(event)">
            <p>Click to upload or choose an image</p>
        </div>

        <div class="preview">
            <img id="imagePreview" alt="Cake Preview">
        </div>

    </form>
</section>

<script>
function calculatePrice() {
    let weight = document.getElementById('weight').value;
    document.getElementById('price').innerText = '₹' + weight;
    document.getElementById('hiddenPrice').value = weight;
}

function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function() {
        let output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>
