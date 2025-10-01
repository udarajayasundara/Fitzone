<?php
session_start();
include('dbconnect.php');
error_reporting(0);

// Handle logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: Login.php");
    exit;
}
// Check if the user is logged in
$isLoggedIn = isset($_SESSION['username']);
$isLoggedId = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1, h2 {
            color: #222;
            
            margin-top: 20px;
        }

        /* Main Container */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 30px;
            display: flex;
            justify-content: space-between;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 25%;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-right: 30px;
            border-radius: 8px;
            position: fixed;
            top: 20px;
            left: 20px;
            height: calc(100vh - 40px); /* Full-height sidebar */
        }

        .sidebar h1 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 20px;
        }

        .logout {
            font-size: 16px;
            text-align: left;
            margin-top: 10px;
        }

        .logout a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .logout a:hover {
            color: #0056b3;
        }

        /* Content Section */
        .content {
            width: 70%;
            margin-left: 20%;
            padding: 20px;
        }

        /* Form Styling */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        .form-container input,
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        /* Queries Section */
        .quires {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .quires h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }

        .quires label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        .quires input,
        .quires textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .quires button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .quires button:hover {
            background-color: #0056b3;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Alerts (Success/Failure) */
        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }

        .alert.success {
            background-color: #28a745;
            color: #fff;
        }

        .alert.error {
            background-color: #dc3545;
            color: #fff;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                box-shadow: none;
            }

            .content {
                width: 100%;
                margin-left: 0;
            }

            .form-container button {
                font-size: 14px;
            }

            table th, table td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
<h1>Customer Dashboard</h1>
<div class="logout">
    Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
    <a href="?logout=true" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
</div>
    <?php if (!$isLoggedIn): ?>
        <h1>You must log in to manage customer dashboard.</h1>
        <a href="Login.php">Login</a>
    <?php endif; ?>

    <!-- Appointment Booking Form -->
    <div class="form-container">
        <h2>Book a Training Session</h2>
        <form action="customerdashboard.php" method="POST">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <br>
            <label for="trainer">Select Trainer:</label>
            <select id="trainer" name="trainer_id" required>
                <option value="John Doe">John Doe</option>
                <option value="Jane Smith">Jane Smith</option>
                <option value="Mike Johnson">Mike Johnson</option>
                <option value="Emily Davis">Emily Davis</option>
                <option value="Chris Brown">Chris Brown</option>
                <option value="Sarah Wilson">Sarah Wilson</option>
            </select>
            <br>
            <label for="session_type">Training Session Type:</label>
            <select id="session_type" name="session_type" required>
                <option value="Weight Training">Weight Training</option>
                <option value="Cardio">Cardio</option>
                <option value="Yoga">Yoga</option>
                <option value="Zumba">Zumba</option>
                <option value="Nutritionist">Nutritionist</option>
                <!-- Add more session types as needed -->
            </select>
            <br>
            <label for="date">Session Date:</label>
            <input type="date" id="date" name="session_date" required>
            <br>
            <label for="time">Session Time:</label>
            <input type="time" id="time" name="session_time" required>       
            <br>
            <button type="submit" name="appointment" id="appointment">Submit Session</button>
        </form>
    </div>

    <?php
// Handle session booking
if (isset($_POST['appointment'])) {
    if (!$isLoggedIn) {
        // Redirect user to login page if not logged in
        echo '<script> 
                alert("Please log in to your account to book a training session.");
                window.location.href = "Login.php";
              </script>';
    } else {
        // Get form values
        $full_name = htmlspecialchars($_POST['full_name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $trainer_id = htmlspecialchars($_POST['trainer_id']);
        $session_type = htmlspecialchars($_POST['session_type']);
        $session_date = htmlspecialchars($_POST['session_date']);
        $session_time = htmlspecialchars($_POST['session_time']);
        $status = 'Pending'; // Default status

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }

        // Validate session date
        if (strtotime($session_date) < strtotime(date('Y-m-d'))) {
            die("Invalid session date. Please select a future date.");
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO appointments (user_id, full_name, email, phone, trainer_id, session_type, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("issssssss", $_SESSION['user_id'], $full_name, $email, $phone, $trainer_id, $session_type, $session_date, $session_time, $status);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Session Booked Successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    }
}
?>

<br>
    <div class="quires" id="quires">
                    <h2>quires</h2>
                    <br>
                    <form action="customerdashboard.php" method="POST">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <br>   
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" required> 
                        <br>
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
                        <br>
                        <button type="submit" name="submit" id="submit">Submit</button>
                    </form>
                </div>
</body>
</html>

<?php
// Handle queries form submission
if (isset($_POST['submit'])) {
    if (!$isLoggedIn) {
        echo '<script> 
                alert("Please log in to your account to submit a query.");
                window.location.href = "Login.php";
              </script>';
    } else {
        // Debugging: Check session user_id
        if (!isset($_SESSION['user_id'])) {
            die("User ID is not set in the session.");
        }

        // Get form values
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $message = htmlspecialchars($_POST['message']);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO quires (user_id, name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            error_log("Prepare failed: " . $conn->error);
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("issss", $_SESSION['user_id'], $name, $email, $phone, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Query submitted successfully!</p>";
        } else {
            error_log("Execution failed: " . $stmt->error);
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    }
}

?>

<br>
    <h2>View Appointment</h2>
    <?php
    // Fetch appointments for the logged-in user
    $sql = "SELECT appointment_id, full_name, email, phone, trainer_id, session_type, appointment_date, appointment_time, status 
            FROM appointments  
            WHERE appointments.user_id = '".$_SESSION['user_id']."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Trainer</th>
                    <th>Session</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['appointment_id']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['trainer_id']; ?></td>
                        <td><?php echo $row['session_type']; ?></td>
                        <td><?php echo $row['appointment_date']; ?></td>
                        <td><?php echo $row['appointment_time']; ?></td>
                        <td><?php echo ucfirst($row['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You have no appointments scheduled.</p>
    <?php endif; ?>

<br>
    <h2>View Quires</h2>
    <?php
    // Fetch appointments for the logged-in user
    $sql = "SELECT quires_id, name, email, phone, message, created_at, respond 
            FROM quires  
            WHERE quires.user_id = '".$_SESSION['user_id']."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Quires ID</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Respond</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['quires_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['respond']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You have no quires.</p>
    <?php endif; ?>
<?php
$conn->close();
?>