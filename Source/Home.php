<?php
session_start();
include('dbconnect.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone</title>
    <link rel="stylesheet" type="text/css" href="/CSS/style.css">
    <link rel="icon" href="/Images/fitzone-main.png" type="image/png">
    <script src="https://kit.fontawesome.com/6d7f01899f.js" crossorigin="anonymous" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <div class="topbar">
        <a href="#location"><i class="fa-solid fa-location-dot"></i><span style="font-weight: bold;">Location:</span> 1050 Anewtyop Way kurunegala, Kurunegala.</a>
        <a href="#contact"><i class="fa-solid fa-envelope"></i><span style="font-weight: bold;">E-mail:</span> fitzonefitness@gym.com</a>
        <a href="#hours"><i class="fa-solid fa-clock"></i><span style="font-weight: bold;">Opening Hours:</span> Mon - Sat:8.00 am-7.00 pm</a>
        <a href="#phone"><i class="fa-solid fa-phone"></i><span style="font-weight: bold;">Let's Phone:</span> +75284839282</a>
    </div>
    
    <div class="navbar">
        <div class="navbar-container">
        <div class="logo">
            <a href="Home.php"><img src="/Images/fitzone.png" alt="FitZone Logo"></a>
        </div>
        <nav class="main-nav">
            <a href="Home.php">Home</a>
            <a href="#our-packages">Membership Plan</a>
            <a href="#inquires">Inquires</a>
            <a href="#trainers">Personal Training</a>
            <a href="#blog">Blog</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </nav>
        <div class="button">
            <a href="signuppage.php"><button class="button">Sign Up</button></a>
            <a href="Login.php"><button class="button">Login</button></a>
        </div>
    </div>
</div>
</header>
<main>
<div class="cover-image" id="cover-image">
    <img src="/Images/women-strecthing.jpg" alt="Cover Image">
        <h1>MAKE YOUR BODY HEALTHY & FIT</h1>
        <p>Your journey to a healthier life starts here.</p>
        <a href="customersignup.php"><button class="cover-button">Join Now</button></a>
    </div>
    <div class="services" id="services">
        <hr>
        <h2>Our Services</h2>
        <br>
        <div class="service-card">
            <img src="/Images/fitness-training.jpeg" alt="Fitness Training">
            <h3>Fitness Training</h3>
        </div>
        <div class="service-card">
            <img src="/Images/group-classes.jpeg" alt="Group Classes">
            <h3>Group Classes</h3>
        </div>
        <div class="service-card">
            <img src="/Images/nutrition-counseling.jpeg" alt="Nutrition Counseling">
            <h3>Nutrition Counseling</h3>
        </div>
        <div class="service-card">
            <img src="/Images/personal-training.jpeg" alt="Personal Training">
            <h3>Personal Training</h3>
            </div>
        <div class="service-card">
            <img src="/Images/modern-equipment.jpeg" alt="Modern Equipment">
            <h3>Modern Equipment</h3>
            </div>
            <div class="service-card">
                <img src="/Images/fitness-programme.jpeg" alt="Fitness Programme">
                <h3>Fitness Programme</h3>
                </div>
        </div>
        <div class="class" id="class">
            <hr>
            <h2>Our Classes</h2>
            <br>
            <div class="class-card">
                <img src="/Images/yoga.jpeg" alt="Yoga">
                <h3>Yoga</h3>
            </div>
            <div class="class-card">
                <img src="/Images/cardio.jpeg" alt="Cardio">
                <h3>Cardio</h3>
            </div>
            <div class="class-card">
                <img src="/Images/hiit.jpeg" alt="HIIT">
                <h3>HIIT</h3>
            </div>
        </div>
        <div class="trainers" id="trainers">
            <hr>
            <h2>Our Trainers</h2>
            <br>
            <div class="trainer-card">
                <img src="/Images/trainer1.jpeg" alt="Trainer 1">
                <h3>John Doe</h3>
                <p>Certified Personal Trainer</p>
            </div>
            <div class="trainer-card">
                <img src="/Images/trainer2.jpeg" alt="Trainer 2">
                <h3>Jane Smith</h3>
                <p>Yoga Instructor</p>
            </div>
            <div class="trainer-card">
                <img src="/Images/trainer3.jpeg" alt="Trainer 3">
                <h3>Mike Johnson</h3>
                <p>Nutritionist</p>
            </div>
            <div class="trainer-card">
                <img src="/Images/trainer5.jpeg" alt="Trainer 4">
                <h3>Emily Davis</h3>
                <p>Group Fitness Instructor</p>
                </div>
            <div class="trainer-card">
                <img src="/Images/trainer4.jpeg" alt="Trainer 5">
                <h3>Chris Brown</h3>
                <p>Strength Coach</p>
                </div>
            <div class="trainer-card">
                <img src="/Images/trainer6.jpeg" alt="Trainer 6">
                <h3>Sarah Wilson</h3>
                <p>Cardio Specialist</p>
                </div>
        </div>
        <div class ="our-packages" id="our-packages">
            <hr>
            <h2>Our Packages</h2>
            <br>
            <div class="package-card">
                <h3>Basic Package</h3>
                <img src="/Images/basic-package.jpeg" alt="Package 1">
                <p>$29.99/month</p>
                <ul>
                <li>Gym floor access</li>
                <li>Standard Amenities</li>
                <li>One Free Orientation</li>
                <li>1 Guest Pass/Month</li>
                <li>Free functional movement screen</li>
                <li>Movement screen</li>
                </ul>
                <a href="customersignup.php"><button>Join Now</button></a>
            </div>
            <div class="package-card">
                <h3>Standard Package</h3>
                <img src="/Images/standard-package.jpeg" alt="Package 2">
                <p>$49.99/month</p>
                <ul>
                    <li>All Basic features</li>
                    <li>Unlimited Group Classes</li>
                    <li>1 complimentary group session/month</li>
                    <li>24/7 Access</li>
                    <li>One Guest Pass Per Month</li>
                    <li>Movement screen</li>
                    </ul>
                <a href="customersignup.php"><button>Join Now</button></a>
            </div>
            <div class="package-card">
                <h3>Premium Package</h3>
                <img src="/Images/premium-package.jpeg" alt="Package 3">
                <p>$69.99/month</p>
                <ul>
                    <li>Unlimited Access to Home Club</li>
                    <li>Free Fitness Training</li>
                    <li>Free training session with a Club</li>
                    <li>Over 16 free group fitness classes</li>
                    <li>Free functional movement screen</li>
                    <li>Movement screen</li>
                    </ul>
                <a href="customersignup.php"><button>Join Now</button></a>
                </div>
            </div>
            <div class="blog" id="blog">
                <hr>
                <h2>Latest Blog Posts</h2>
                <br>
                <div class="blog-card">
                    <img src="/Images/hiit.jpeg" alt="Blog Post 1">
                    <a href="blog1.php"><h3>5 Tips for Staying Motivated at the Gym</h3></a>
                    <a href="blog1.php"><p>Discover effective strategies to keep your fitness journey on track.</p></a>
                </div>
                <div class="blog-card">
                    <img src="/Images/group-classes.jpeg" alt="Blog Post 2">
                    <a href="blog2.php"><h3>The Benefits of Group Classes</h3></a>
                    <a href="blog2.php"><p>Learn how group classes can enhance your workout experience.</p></a>
                </div>
                <div class="blog-card">
                    <img src="/Images/nutrition-counseling.jpeg" alt="Blog Post 3">
                    <a href="blog3.php"><h3>Nutrition Tips for Optimal Performance</h3></a>
                    <a href="blog3.php"><p>Fuel your body with the right nutrients for peak performance.</p></a>
                 </div>
                </div>

                <div class="inquires" id="inquires">
                    <hr>
                    <h2>Inquires</h2>
                    <br>
                    <form action="Home.php" method="POST">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" required> 
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                        <button type="submit" name="submit">Submit</button>
                    </form>
                </div>
                
        <div class="contact" id="contact">
                    <hr>
                    <h2>Contact</h2>
                    <br>
                    <div class="contact-card">
                        <a href="facebook.com"><i class="fa-brands fa-facebook"></i></a>
                        <a href="facebook.com"><h3>Facebook</h3></a>
                    </div>
                    <div class="contact-card">
                        <a href="instagram.com"><i class="fa-brands fa-instagram"></i></a>
                        <a href="instagram.com"><h3>Instagram</h3></a>
                    </div>
                    <div class="contact-card">
                        <a href="gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a href="gmail.com"><h3>E-Mail</h3></a>
                    </div>
                    
                </div>
                <div class="aboutus" id="about">
                <hr>
                <br>
                <br>
                    <h2>About Us</h2>
                    <br>
                    <p>Welcome to FitZone Fitness Center, where we are dedicated to helping you achieve your fitness goals and live a healthier lifestyle. Our mission is to provide a supportive and motivating environment for individuals of all fitness levels. Whether you're a beginner or an experienced athlete, our team of certified trainers is here to guide you on your journey.</p>
                    <p>Our state-of-the-art facility features the latest equipment, a variety of group classes, and personalized training programs tailored to your needs. We believe that fitness should be fun and accessible to everyone, which is why we offer flexible membership options and a welcoming community.</p>
                    <p>Join us at FitZone Fitness Center and take the first step towards a healthier, happier you. Together, we can achieve your fitness goals and create a positive impact on your life.</p>
        <p> At FitZone Fitness Center, we believe that a healthy lifestyle is the foundation of success. Our facility offers a wide range of services designed to suit every fitness level. Our state-of-the-art gym is equipped with the latest fitness technology, ensuring you have everything you need to achieve your goals. experienced trainers are here to guide you every step of the way, providing personalized training programs tailored to your individual needs. We also offer a variety of group classes, from high-intensity interval training to yoga and pilates, so you can find the perfect workout that fits your lifestyle. Our friendly and supportive community is here to motivate and inspire you on your fitness journey."</p>
        <h4>– FitZone Fitness Center –</h4>
    </div>
</main>
    <footer>
    <br>
    <br>
        &copy; <?php echo date('Y') ?> FitZone Fitness. All Rights Reserved.
    </footer>
</body>
</html>

<?php

    // Handle session inquires
    if (isset($_POST['submit'])) {
        // Get form values and sanitize
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $message = htmlspecialchars($_POST['message']);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO inquires (name, email, phone, message) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        // Execute the query
        if ($stmt->execute()) {
            echo '<script>alert("Inquires submitted successfully!");</script>';
        } else {
            die("Execute failed: " . $stmt->error);
        }

        $stmt->close();
    }

    $conn->close();
?>