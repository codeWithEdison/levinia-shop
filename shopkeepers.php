<?php include "auth.php"; ?>
<?php
// Database connection parameters
include('connection.php');
// Query to fetch shopkeepers data
$shopkeeperQuery = "SELECT * FROM shopkeeper";

$shopkeeperResult = $conn->query($shopkeeperQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavinia Shop - Shopkeeper Report</title>
    <style>
        /* Your CSS styles for the table */
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <h2>Shopkeeper Report</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php
        if ($shopkeeperResult->num_rows > 0) {
            while ($row = $shopkeeperResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ShopkeeperId"] . "</td>";
                echo "<td>" . $row["UserName"] . "</td>";
                echo "<td><a href='update_shopkeeper.php?id=" . $row["ShopkeeperId"] . "'>Update</a> | <a href='delete_shopkeeper.php?id=" . $row["ShopkeeperId"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>
    </table>

    <?php
    // Close connection
    $conn->close();
    ?>
</body>

</html>
