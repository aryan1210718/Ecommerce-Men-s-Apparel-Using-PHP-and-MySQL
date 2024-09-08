<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    // header("location:login(user)");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <title>About Us | Men's Apparel</title>
    <style>
        /* Customize the footer style */
        footer {
            background-color: #343a40;
            /* Dark background color */
            padding: 20px 0;
            bottom: 0;
            width: 100%;
            color: white;
            /* Text color */
        }

        footer a {
            color: #fff;
            /* Link color */
        }

        .container_about {
            margin-top: 50px;
        }

        .about-section {
            padding: 100px 0;
            background-color: #f8f9fa;
        }

        .about-section h1 {
            font-size: 48px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .about-section p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .about-section img {
            max-width: 100%;
            height: auto;
        }

        .value-section {
            padding: 50px 0;
            background-color: #fff;
        }

        .value-section h2 {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .value-section ul {
            list-style-type: none;
            padding-left: 0;
        }

        .value-section ul li {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <!-- Header Navbar -->
    <?php include 'db__conn.php'; ?>
    <?php include 'partials/_nav.php'; ?>

    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-5 mt-5">
                    <img src="partials\aboutus.jpg" class="img-fluid mt-5" alt="About Us Image">
                </div>
                <div class="col-md-6">
                    <div class="container_about pl-5">
                        <h1>About Us</h1>
                        <p>Welcome to <strong>Men's Apparel</strong>, where style meets comfort!</p>

                        <p>At <strong>Men's Apparel</strong>, we believe that fashion should be both trendy and comfortable for men's. Our
                            mission is to provide high-quality clothing that not only looks great but also feels amazing to
                            wear for men's. Whether you're dressing up for a special occasion or keeping it casual for everyday wear,
                            we've got you covered.</p>

                        <h2>Our Story</h2>
                        <p><strong>Men's Apparel</strong> was founded with a simple idea: to create clothing that combines
                            fashion-forward designs with the utmost comfort for men's. What started as a passion project quickly grew
                            into a full-fledged brand, thanks to our dedicated team and loyal customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="value-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Values</h2>
                    <ul>
                        <li><strong>Quality:</strong> We are committed to using the finest materials and craftsmanship
                            to ensure the highest quality in every garment we produce.</li>
                        <li><strong>Style:</strong> Our designs are inspired by the latest trends and timeless classics,
                            offering something for every style and occasion.</li>
                        <li><strong>Comfort:</strong> Comfort is at the core of everything we do. From the softest
                            fabrics to the perfect fit, we prioritize comfort without compromising on style.</li>
                        <li><strong>Sustainability:</strong> We strive to minimize our environmental impact by using
                            sustainable and eco-friendly practices wherever possible.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h2>Our Products</h2>
                    <p>From oversize tees to cargos, our collection features a wide range of clothing
                        options for men.Whether you're looking for stylish tees, comfortable bottoms,
                        or statement accessories, you'll find everything you need to elevate your wardrobe.</p>

                    <h2>Get in Touch</h2>
                    <p>Have a question or feedback? We'd love to hear from you! Feel free to reach out to our customer
                        service team at <a href="123@gamil.com">info@brandname.com</a> or give us a call at
                        <strong>1-800-BRAND-123</strong>. You can also follow us on social media for the latest updates
                        and exclusive offers.</p>

                    <p>Thank you for choosing <strong>Brand Name</strong>. We can't wait to help you look and feel your
                        best!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
