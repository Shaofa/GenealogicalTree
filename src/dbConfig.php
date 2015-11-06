<?php
    $host = $_SERVER['SERVER_NAME'] == "localhost" ? 0 : 1;
    if($host == 0)
    {
        define("DB_HOST","localhost");
        define("DB_USER","root");
        define("DB_PASSWD","");
    }
    else if($host == 1)
    {
        define("DB_HOST",SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT);
        define("DB_USER",SAE_MYSQL_USER);
        define("DB_PASSWD",SAE_MYSQL_PASS);
    }
    define("DB_NAME","genealogy");
?>