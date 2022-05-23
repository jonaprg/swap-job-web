<?php
    error_reporting(E_ALL);

    ini_set('ignore_repeated_errors', TRUE);

    ini_set('display_errors', FALSE);

    ini_set('log_errors', TRUE);

    error_log("App web is starting");

    require_once 'src/libs/app.php';
    require_once 'src/libs/controller.php';
    require_once 'src/libs/model.php';
    require_once 'src/libs/view.php';

    $app = new App();
