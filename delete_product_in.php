<?php

// Check if product in ID is provided
if (isset($_REQUEST["product_code"])) {
    $productInId = $_REQUEST["product_code"];
    
   include('./connection.php');
    // Delete product_in entry
    $deleteSql = "DELETE FROM productin WHERE ProductInId=$productInId";

    if ($conn->query($deleteSql) === TRUE) {
        // echo "Product In entry deleted successfully!";
        header('location: ./product_in_report.php');
    } else {
        echo "Error deleting product in entry: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Product in ID not provided.";
}
?>
