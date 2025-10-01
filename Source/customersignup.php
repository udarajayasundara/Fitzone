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
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="/CSS/style.css">
    <link rel="icon" href="/Images/fitzone-main.png" type="image/png">
    <script src="https://kit.fontawesome.com/6d7f01899f.js" crossorigin="anonymous" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="signup-card-container">
            <div class="signup-background">
                <img src="/Images/signup.jpg" alt="Background Image">
            </div>
            <div class="signup-form">
                <h2>Sign Up</h2>
                <form action="customersignup.php" method="POST">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    
                    <label for="package">Package:</label>
                    <select id="package" name="package" required>
                        <option value="Basic">Basic</option>
                        <option value="Standard">Standard</option>
                        <option value="Premium">Premium</option>
                    </select>

                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="Customer">Customer</option>
                    </select>
                    <br>
                    <button type="submit" name="signup" id="signup">SignUp</button>
                </form>
                <p><a href="Login.php">Already have an account?</a></p>
            </div>
    </main>
</body>
</html>

<?php 

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $package = $_POST['package'];
    $role = $_POST['role'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, package, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $hashed_password, $package, $role);

        // Execute the query
        if ($stmt->execute()) {
            echo '<script type="text/javascript">alert("Registration successful. Now you can login");
            window.location="Login.php";
            </script>';
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }

    $conn->close();
    ?>
