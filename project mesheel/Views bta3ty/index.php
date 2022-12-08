<?php

    require __DIR__ .'/../Controllers/admin.php';
    $test = new Admin();
    $test->registered_users();
    /*
    session_start();
    echo $_SESSION["Name"];
    echo $_SESSION["log_as"];
*/
?>