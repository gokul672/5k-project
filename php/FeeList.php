<?php
include 'connet.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Reset unpaid status at the start of the month
$currentDate = date('Y-m-d');
if (date('j') == 1) {
    // Reset only unpaid students' payment status
    $conn->query("UPDATE students SET payment_status = 'unpaid', datee = NULL WHERE payment_status = 'unpaid'");
}

// Fetch students
$sql = "SELECT * FROM studentinfoo ORDER BY id";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fee List</title>
    <link rel="stylesheet" href="style/FeeList.css" />
    <link rel="icon" href="images/Academy-Logo.png" />
</head>

<body>
    <header class="heading">
        <div id="header-wrapper">
            <p id="header">4 Dimensions Athletic Academy</p>
        </div>
    </header>
    <div id="container">
        <div id="listContainer">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['usname']; ?></td>
                                <td><?php echo ucfirst($row['payment_status']); ?></td>
                                <td><?php echo $row['datee'] ? $row['datee'] : 'N/A'; ?></td>
                                <td>
                                    <?php if ($row['payment_status'] == 'unpaid'): ?>
                                        <form action="pay.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit">Pay</button>
                                        </form>
                                    <?php else: ?>
                                        <span>Paid</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No students found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/FeeList.js"></script>
</body>

</html>