<?php

$router = new \Bramus\Router\Router();

$router->get('/matches', function() {
    require_once('src/controller/matches.php');
});

$router->run();

require_once('src/view/profile.php');