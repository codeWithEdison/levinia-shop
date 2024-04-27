<?php include 'header.php'; ?>
<?php include "auth.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavinia Shop - Add New Product</title>
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
    <h2>Add New Product</h2>
    <form action="" method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
        <input type="submit" value="Add Product">
    </form>
    <?php
    include('./connection.php');
    // Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["product_name"];

    // Insert new product into the database
    $sql = "INSERT INTO product (ProductName) VALUES ('$productName')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    ?>
</body>

</html>
