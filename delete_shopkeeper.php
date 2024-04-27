<?php

// Check if shopkeeper ID is provided
if (isset($_REQUEST["id"])) {
    $shopkeeperId = $_REQUEST["id"];
    
   include('./connection.php');
    // Delete shopkeeper
    $deleteSql = "DELETE FROM shopkeeper WHERE ShopkeeperId=$shopkeeperId";

    if ($conn->query($deleteSql) === TRUE) {
        // echo "Shopkeeper deleted successfully!";
        header('location: shopkeepers.php');
    } else {
        echo "Error deleting shopkeeper: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Shopkeeper ID not provided.";
}
?>
