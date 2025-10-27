<?php
// Configuration - update these values to match your environment.
define('DB_HOST', getenv("MYSQLHOST"));
define('DB_NAME', getenv("MYSQLDATABASE"));
define('DB_USER', getenv("MYSQLUSER"));
define('DB_PASS', getenv("MYSQLPASSWORD"));
define('DB_CHAR', 'utf8mb4');
