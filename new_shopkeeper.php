<?php include 'header.php'; ?>
<?php include "auth.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavinia Shop - Add New Shopkeeper</title>
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
    <h2>Add New Shopkeeper</h2>
    <form action="new_shopkeeper.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Add Shopkeeper">
    </form>
    <?php
// Database connection parameters
include('connection.php');

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Insert new shopkeeper into the database
    $sql = "INSERT INTO shopkeeper (UserName, Password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // echo "New shopkeeper added successfully!";
        header('location: shopkeepers.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

</body>

</html>
