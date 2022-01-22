<?php

    // database connection
    require_once "db-connection.php";

    // get register function
    require_once "functions.inc.php";

    session_start();
    SignOut($pdo);

?>