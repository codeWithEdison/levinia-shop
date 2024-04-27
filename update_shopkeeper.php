<?php include "auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE Shopkeeper</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>
<body>
    <div class="form-container">
       

        <!-- Form for Updating Records -->
        <form action="update_shopkeeper.php" method="POST">
            <h3>Update Shopkeeper</h3>
            <input type="text" name="new_username" placeholder="New Username">
            <input type="password" name="new_password" placeholder="New Password">
            <button type="submit">Update Shopkeeper</button>
        </form>

    </div>
</body>
</html>
