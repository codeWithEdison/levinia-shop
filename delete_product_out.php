<?php

// Check if product out ID is provided
if (isset($_REQUEST["product_code"])) {
    $productOutId = $_REQUEST["product_code"];
    
   include('./connection.php');
    
    // Delete product out entry
    $deleteSql = "DELETE FROM productout WHERE ProductOutId=$productOutId";

    if ($conn->query($deleteSql) === TRUE) {
        // echo "Product Out entry deleted successfully!";
        header('location: ./product_out_report.php');
    } else {
        echo "Error deleting product out entry: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Product Out ID not provided.";
}
?>
