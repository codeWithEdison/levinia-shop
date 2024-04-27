<?php include "auth.php"; ?>
<?php
// Database connection parameters
include('connection.php');
// Query to fetch product out data
$productOutQuery = "SELECT product.ProductCode, product.ProductName, productout.Date, productout.Quantity, productout.UniquePrice, productout.TotalPrice FROM productout
                    INNER JOIN product ON productout.ProductCode = product.ProductCode";

$productOutResult = $conn->query($productOutQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Out Report</title>
    <style>
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

    <h2>Product Out Report</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Date</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
        <?php
        if ($productOutResult->num_rows > 0) {
            while ($row = $productOutResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ProductName"] . "</td>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Quantity"] . "</td>";
                echo "<td>" . $row["UniquePrice"] . "</td>";
                echo "<td>" . $row["TotalPrice"] . "</td>";
                echo "<td><a href='update_product_out.php?product_code=" . $row["ProductCode"] . "'>Update</a> | <a href='delete_product_out.php?product_code=" . $row["ProductCode"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
    </table>

    <?php
    // Close connection
    $conn->close();
    ?>
</body>

</html>
