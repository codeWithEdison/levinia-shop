<?php
include('./auth.php');
// Database connection parameters
include('./header.php');
include('./connection.php');
// Fetch products for dropdown menu
$productQuery = "SELECT ProductCode, ProductName FROM product";
$productResult = $conn->query($productQuery);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavinia Shop - Add New Product Out</title>
    <style>
        /* Your CSS styles for the form */
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        label,
        select,
        input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Add New Product Out</h2>
    <form action="./new_product_out.php" method="post">
        <label for="product_code">Product:</label>
        <select id="product_code" name="product_code" required>
            <?php
            if ($productResult->num_rows > 0) {
                while ($row = $productResult->fetch_assoc()) {
                    echo "<option value='" . $row["ProductCode"] . "'>" . $row["ProductName"] . "</option>";
                }
            } else {
                echo "<option value=''>No products available</option>";
            }
            ?>
        </select>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <label for="unique_price">Unique Price:</label>
        <input type="text" id="unique_price" name="unique_price" required>
        <input type="submit" value="Add Product Out">
    </form>
    <?php
// Database connection parameters
include('./connection.php');
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productCode = $_POST["product_code"];
    $date = $_POST["date"];
    $quantity = $_POST["quantity"];
    $uniquePrice = $_POST["unique_price"];
    $totalPrice = $quantity * $uniquePrice;

    // Insert new product out record into the database
    $sql = "INSERT INTO productout (ProductCode, Date, Quantity, UniquePrice, TotalPrice) VALUES ('$productCode', '$date', '$quantity', '$uniquePrice', '$totalPrice')";

    if ($conn->query($sql) === TRUE) {
        // echo "New product out record added successfully!";
        header('location: ./product_out_report.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

</body>

</html>
