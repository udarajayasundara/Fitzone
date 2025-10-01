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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/CSS/style.css">
    <link rel="icon" href="/Images/fitzone-main.png" type="image/png">
    <script src="https://kit.fontawesome.com/6d7f01899f.js" crossorigin="anonymous" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="login-card-container">
            <div class="login-background">
                <img src="/Images/login.jpg" alt="Background Image">
            </div>
            <div class="login-form">
                <h2>Sign in</h2>
                <form action="Login.php" method="POST">
                    <label for="name">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="Customer">Customer</option>
                        <option value="Staff">Staff</option>
                        <option value="Admin">Admin</option>
                    </select>
                    <br>
                    <button type="submit" name="signin" id="signin">Signin</button>
                    <br>
                </form>
                <a href="signuppage.php">Don't have an account?</a>
        </div>
        </div>
    </main>
</body>
</html>

<?php 
if (isset($_POST["signin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    
    $sql = "SELECT * FROM users WHERE username=? AND role=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['package'] = $row['package'];

        // Redirect to the appropriate page based on the role
        if ($row['role'] == 'Customer') {
            echo '<script>
            alert("You have successfully logged in!");
            window.location.href = "customerdashboard.php";
        </script>';
        
    } elseif ($row['role'] == 'Staff') {
            echo '<script>
            alert("You have successfully logged in!");
            window.location.href = "staffdashboard.php";
        </script>';
    } 
    elseif ( $row['role'] == 'Admin') {
        echo '<script>
        alert("You have successfully logged in!");
        window.location.href = "admindashboard.php";
    </script>';
    }
    else {
        echo '<script>
            alert("You have logged in failed!");
        </script>';
    }
    
    $stmt->close();
}}

$conn->close();
?>