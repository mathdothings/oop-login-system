<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/View/Style/style.css?v=<?php echo time(); ?>">
    <title>Accessible</title>
</head>

<body>
    <article class="center-container">
        <main class="main">
            <form action="" method="post" class="flex-container main__form__card main__form" autocomplete="off">
                <h1 class="main__form__title">Accessible</h1>
                <label for="email"></label>
                <input type="email" name="email" id="login-email" autofocus placeholder="Email" class="main__form__input">
                <label for="password"></label>
                <input type="password" name="password" id="login-password" placeholder="Password" class="main__form__input">
                <button type="submit" class="main__form__button">Log in!</button>
            </form>
            <p class="main__form__paragraph main__form__card">Don't have an account? <a href="./src/View/signup.php" class="main__form__paragraph__link">Sign Up!</a></p>
        </main>
    </article>
</body>

</html>