<?php

namespace Services;

use PDO;

interface DatabaseInterface
{
    function getConnection(): PDO;
}
