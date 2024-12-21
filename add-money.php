<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Money</title>
</head>
<body>
    <form action="create-payment.php" method="POST">
        <label for="amount">Enter Amount (USD):</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Add Money</button>
    </form>
</body>
</html>