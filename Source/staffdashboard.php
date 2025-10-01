<?php
// Enable error reporting (disable in production)
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

// Check login
$isLoggedIn = isset($_SESSION['username']);
$isLoggedId = isset($_SESSION['user_id']);

if (!$isLoggedIn) {
    echo "<h1>You must log in to manage the staff dashboard.</h1>";
    echo '<a href="Login.php">Login</a>';
    exit;
}

// Handle appointment status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'], $_POST['status'])) {
    $update_id = $_POST['update_id'];
    $status = $_POST['status'];

    $sql = "UPDATE appointments SET status = ? WHERE appointment_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $status, $update_id);
        if ($stmt->execute()) {
            echo '<script>alert("Appointment status updated successfully!");</script>';
        } else {
            echo '<script>alert("Error updating appointment: ' . $stmt->error . '");</script>';
        }
        $stmt->close();
    }
}

// Handle quires reply update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quires_id'], $_POST['reply'])) {
    $update_id = $_POST['quires_id'];
    $reply = $_POST['reply'];

    $sql = "UPDATE quires SET respond = ? WHERE quires_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $reply, $update_id);
        if ($stmt->execute()) {
            echo '<script>alert("Quires reply updated successfully!");</script>';
        } else {
            echo '<script>alert("Error updating reply: ' . $stmt->error . '");</script>';
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
        }

        .logout {
            margin-bottom: 20px;
        }

        .logout a {
            color: red;
            text-decoration: none;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        textarea {
            width: 100%;
            padding: 6px;
            margin-bottom: 10px;
        }

        button {
            padding: 6px 12px;
            background-color:rgb(255, 0, 0);
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        hr {
            margin: 40px 0;
        }
    </style>
</head>
<body>

<h1>Staff Dashboard</h1>
<div class="logout">
    Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
    <a href="?logout=true" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
</div>

<h2>Manage Appointments</h2>
<?php
$sql = "SELECT appointment_id, full_name, email, phone, trainer_id, session_type, appointment_date, appointment_time, status 
        FROM appointments";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Trainer</th>
            <th>Session</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['appointment_id']; ?></td>
                <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['trainer_id']); ?></td>
                <td><?php echo htmlspecialchars($row['session_type']); ?></td>
                <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="update_id" value="<?php echo $row['appointment_id']; ?>">
                        <select name="status" required>
                            <option value="Accepted" <?php if ($row['status'] == 'Accepted') echo 'selected'; ?>>Accepted</option>
                            <option value="Rejected" <?php if ($row['status'] == 'Rejected') echo 'selected'; ?>>Rejected</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No appointments found.</p>
<?php endif; ?>

<hr>

<h2>View and Respond to Quires</h2>
<?php
$sql = "SELECT quires_id, name, email, phone, message, created_at, respond FROM quires";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Time</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['quires_id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($row['respond'])); ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="quires_id" value="<?php echo $row['quires_id']; ?>">
                        <textarea name="reply" rows="3" required></textarea>
                        <button type="submit">Send Reply</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No quires available.</p>
<?php endif; ?>

<?php $conn->close(); ?>
</body>
</html>
