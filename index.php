<?php

require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    require_once('src/View/profile.php');
});

$router->get('/signin', function() {
    require_once('src/View/sign-in.php');
});
$router->get('/signup', function() {
    require_once('src/View/sign-up.php');
});
$router->get('/matches', function() {
    require_once('src/View/matches.php');
});
$router->run();