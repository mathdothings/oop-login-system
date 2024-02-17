<?php
require_once __DIR__ . '/../signup-process.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bamboo.css">
    <link rel="stylesheet" href="./Style/style.css">
    <title>Sign Up</title>
</head>

<body>
    <h1>Sign Up!</h1>
    <form action="" method="post" autocomplete="off">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST["name"] ?? "") ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <label for="repeat-password">Repeat Password</label>
        <input type="password" name="repeat-password" id="repeat-password">
        <button type="submit" style="margin-top: 1rem;">Signup!</button>
    </form>
</body>

</html>