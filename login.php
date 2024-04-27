<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            // Validate credentials
            $inputUsername = $_POST["username"];
            $inputPassword = $_POST["password"];
        
            include('./connection.php');
        
            // Prepare SQL statement to fetch user by username and password
            $sql = "SELECT * FROM shopkeeper WHERE UserName = '$inputUsername' AND Password = '$inputPassword'";
            
            $result = $conn->query($sql);
        
            // Check if user exists
            if ($result->num_rows == 1) {
                // Authentication successful, set session variables
                $_SESSION["username"] = $inputUsername;
        
                // Redirect to home page or any other authenticated page
                header("Location: product_out_report.php");
                exit();
            } else {
                // Authentication failed, display error message
                echo "Invalid username or password";
            }
        
            // Close statement and connection
            // $stmt->close();
            $conn->close();
        }
        
        ?>
        <p>Don't have an account? <a href="./shopkeeper/register_shopkeeper.php">Register</a></p>
    </div>
</body>
</html>
