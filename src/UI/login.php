<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bamboo.css">
    <title>Login</title>
</head>

<body>
    <!-- <small style="display: block; color: green; border: 0.1rem; margin-top: 0.5rem;">Signup successfully. Please, log in!</small> -->
    <h1>Login!</h1>
    <form action="../UI/login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <button type="submit" style="margin-top: 1rem;">Login!</button>
    </form>
</body>

</html>