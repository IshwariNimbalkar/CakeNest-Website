<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CakeNest</title>

    <!-- Link CSS file -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <!-- Logo and name -->
    <div class="logo-section">
        <img src="img/cake.jpg" alt="Cakeoeder Logo">
        <h2>CakeNest</h2>
    </div>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#order">Order</a></li>
               <li><a href="custom-order.php">Custom Order</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#contact">Contact Us</a></li>
         
        </ul>
    </nav>
</header>
<!-- Slider Section -->

<div class="slider">

    <div class="slide active">
        <img src="img/choco9.jpg">
        <div class="caption">Fresh & Delicious Cakes</div>
    </div>

    <div class="slide">
        <img src="img/straw.jpg">
        <div class="caption">Order Custom Birthday Cakes</div>
    </div>

    <div class="slide">
        <img src="img/redwelvet.jpg">
        <div class="caption">Sweet Moments Made Special</div>
    </div>

    <div class="slide">
        <img src="img/vanilla8.jpg">
        <div class="caption">Fast & Reliable Cake Delivery</div>
    </div>

</div>

<script>
    let slides = document.querySelectorAll(".slide");
    let index = 0;

    function changeSlide() {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length;
        slides[index].classList.add("active");
    }

    setInterval(changeSlide, 3000); // change every 3 seconds
</script>
<!-- About Us Section -->
            <section id="about" class="about">
    <div class="about-container">
        <div class="about-text">
            <h2>About Us</h2>
            
        </div>
    </div>
<p>
    Welcome to <strong>Cakeoeder</strong>, your trusted destination for delicious and
    beautifully crafted cakes in <strong>Kolhapur</strong>.
    We are passionate about creating cakes that bring joy, sweetness, and
    unforgettable moments to every celebration.
</p>

<p>
    Based in <strong>Kolhapur</strong>, we specialize in freshly baked cakes using
    high-quality ingredients and creative designs.
    Whether it’s a birthday, wedding, anniversary, or any special occasion,
    our cakes are made with love and attention to detail.
</p>

<p>
    At CakeNest, customer satisfaction is our priority.
    We offer custom cake designs, timely delivery within Kolhapur,
    and a wide variety of flavors to suit every taste.
    Let us be a part of your special moments and make them sweeter.
</p>

        </div>

       
       
    </div>
</section>
<section id="order" class="order">
<h3>OUR COLLECTIONS</h3>
<div class="gallery">
    <div class="card card">
        <img src="img/choco9.jpg">
        <h3>Choclate Cake</h3>
        <p>with flavor and taste</p>
        <button onclick="location.href='choclate.php'">Explore All</button>

    </div>
    
 
    <div class="card card">
        <img src="img/straw9.jpg">
        <h3>Vanilla Cake</h3>
        <p>with flavor and taste</p>
       <button onclick="location.href='vanilla.php'">Explore All</button>
    </div>

    <div class="card card">
        <img src="img/vanilla8.jpg">
        <h3>Red-Welvet cake</h3>
        <p>with flavor and taste</p>
        <button onclick="location.href='redvelvet.php'">Explore All</button>
    </div>

    <div class="card card">
        <img src="img/redvelvet1.jpg">
        <h3>Strawberry Cake</h3>
        <p>with flavor and taste</p>
       <button onclick="location.href='strawberry.php'">Explore All</button>
            
       
    </div>

</div>
</section>
<!-- Footer Start -->
 <section id="contact" class="contact">
<footer>
    <div class="footer-container">

        <!-- About / Description -->
        <div class="footer-left">
            <h3>CakeNest</h3>
            <p>Your sweet destination for delicious cakes and desserts!</p>
        </div>

        <!-- Quick Links -->
        <div class="footer-center">
            <h4>Quick Links</h4>
            <ul>
            
            <li><a href="#">Home</a></li>
            <li><a href="">Order</a></li>
               <li><a href="custom-order.html">Custom Order</a></li>
            <li><a href="#" onclick="goToAbout()">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
         
        </ul>
            </ul>
        </div>

        <!-- Location / Map -->
        <div class="footer-right">
            <h4>Our Location</h4>
            <div class="map-container">
                <!-- Replace the src with your shop's Google Maps embed URL -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.123456789!2d73.123456!3d18.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c123456789ab%3A0xc123456789abcdef!2sYour%20Cake%20Shop!5e0!3m2!1sen!2sin!4v1234567890"
                    width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; 2026 CakeNest. All Rights Reserved.</p>
    </div>
</footer>

</section>
<!-- Footer End -->

</body>
</html>
