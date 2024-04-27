<?php include "auth.php"; ?>
<?php
// Database connection parameters
include('./connection.php');
include('./header.php');
// Handle update action if product code and updated name are provided
if (isset($_REQUEST["update_product"]) && isset($_REQUEST["updated_name"])) {
    $productCode = $_REQUEST["update_product"];
    $updatedName = $_REQUEST["updated_name"];
    $updateSql = "UPDATE product SET ProductName='$updatedName' WHERE ProductCode=$productCode";

    if ($conn->query($updateSql) === TRUE) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

// Delete product if product code is provided
if (isset($_REQUEST["delete_product"])) {
    $productCode = $_REQUEST["delete_product"];
    $deleteSql = "DELETE FROM product WHERE ProductCode=$productCode";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}

// Fetch products from the database
$sql = "SELECT ProductCode, ProductName FROM product";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavinia Shop - List Products</title>
    <style>
        /* Your CSS styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-update {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>
    <h2>List of Products</h2>
    <table>
        <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ProductCode"] . "</td>";
                echo "<td>" . $row["ProductName"] . "</td>";
                echo "<td>";
                echo "<a href='update_product.php?product_code=" . $row["ProductCode"] . "' class='btn btn-update'>Update</a>";
                echo "<a href='delete_product.php?product_code=" . $row["ProductCode"] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No products found</td></tr>";
        }
        ?>
    </table>
</body>

</html>
