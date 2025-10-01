<?php
// Enable error reporting (for development only — disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('dbconnect.php');

// Handle logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: Login.php");
    exit;
}

// Check if the admin is logged in
$isLoggedIn = isset($_SESSION['username']);
$isLoggedId = isset($_SESSION['user_id']);

// If not logged in, prompt to login and exit
if (!$isLoggedIn) {
    echo "<h2>You must log in to manage the dashboard.</h2>";
    echo '<a href="Login.php">Login</a>';
    exit;
}

// Handle user deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
    $delete_user_id = $_POST['delete_user_id'];

    $sql = "DELETE FROM users WHERE user_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $delete_user_id);
        if ($stmt->execute()) {
            echo '<script>alert("User deleted successfully!");</script>';
        } else {
            echo '<script>alert("Error deleting user: ' . $stmt->error . '");</script>';
        }
        $stmt->close();
    } else {
        echo '<script>alert("Error preparing delete statement: ' . $conn->error . '");</script>';
    }
}

// Handle inquiry deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_inquire_id'])) {
    $delete_inquire_id = $_POST['delete_inquire_id'];

    $sql = "DELETE FROM inquires WHERE inquires_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $delete_inquire_id);
        if ($stmt->execute()) {
            echo '<script>alert("Inquiry deleted successfully!");</script>';
        } else {
            echo '<script>alert("Error deleting inquiry: ' . $stmt->error . '");</script>';
        }
        $stmt->close();
    } else {
        echo '<script>alert("Error preparing delete inquiry statement: ' . $conn->error . '");</script>';
    }
}

// Fetch users
$sqlUsers = "SELECT user_id, username, email, package, role, `date` FROM users";
$resultUsers = $conn->query($sqlUsers);

// Fetch inquiries
$sqlInquires = "SELECT inquires_id, name, email, phone, message, created_at FROM inquires";
$resultInquires = $conn->query($sqlInquires);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
/* General Styles for Admin Dashboard */
body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f9f9f9;
}

.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

/* Header and Logout Styles */
.logout {
    margin-bottom: 20px;
    font-size: 18px;
}

.logout a.logout-link {
    color: red;
    text-decoration: none;
    margin-left: 10px;
}

h1, h2 {
    color: #333;
}

/* Table Styles for Users and Inquiries */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

table, th, td {
    border: 1px solid #000;
    padding: 8px;
}

th {
    background-color: #f0f0f0;
}

td {
    text-align: center;
}

/* Action Button Styles for Delete */
button[type="submit"] {
    background-color: red;
    color: white;
    border: none;
    padding: 8px 16px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #ff6666;
}

/* Form and Input Styles */
form {
    display: inline-block;
    margin: 0;
}

/* Confirmation Prompt Styles */
button {
    font-size: 16px;
    font-weight: bold;
    border-radius: 10px;
    padding: 10px 20px;
    background-color: red;
    color: white;
    cursor: pointer;
    transition-duration: 0.4s;
    border: none;
}

button:hover {
    background-color: white;
    color: black;
}

/* User and Inquiry Management Styles */
td a {
    color: #007BFF;
    text-decoration: none;
}

td a:hover {
    text-decoration: underline;
}

/* No Records Found Message */
p {
    font-size: 16px;
    color: #333;
}

/* Logout and Session Info Styles */
.logout-info {
    font-size: 16px;
    color: #444;
    margin-bottom: 20px;
}


    </style>
</head>
<body>
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="logout">
        Logged in as: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
        <a class="logout-link" href="?logout=true" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
    </div>

    <h2>Manage Users</h2>
    <?php if ($resultUsers && $resultUsers->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Package</th>
                    <th>Role</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultUsers->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['package']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td>
                            <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="delete_user_id" value="<?php echo $row['user_id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>

    <h2>Manage Inquiries</h2>
    <?php if ($resultInquires && $resultInquires->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Inquiry ID</th>
                    <th>Name</th>
                    <th>Email / Action</th>
                    <th>Phone / Action</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultInquires->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['inquires_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td>
                            <?php echo htmlspecialchars($row['email']); ?><br>
                            <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>">Email</a>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($row['phone']); ?><br>
                            <a href="tel:<?php echo htmlspecialchars($row['phone']); ?>">Call</a>
                        </td>
                        <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                        <td>
                            <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                                <input type="hidden" name="delete_inquire_id" value="<?php echo $row['inquires_id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No inquiries found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</div>
</body>
</html>
