<?php

declare(strict_types=1);

$_SESSION['userId'] ?? header('location: ./src/UI/signup.html');
die;
