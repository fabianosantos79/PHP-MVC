<?php
    session_start();
    require_once '../vendor/autoload.php';

    define("URL_BASE", "http://localhost");

    $app = new \App\core\App();
?>