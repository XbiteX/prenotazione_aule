<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'username') {
        echo "<script>alert('Username non trovato');</script>";
    } elseif ($error == 'password') {
        echo "<script>alert('Password errata');</script>";
    }
}
?>

<form action="login.php" method="POST">
    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
    </div>
</form>

</body>
</html>