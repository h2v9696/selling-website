<?php
require_once('session_config.php');


if(!isset($_SESSION['Cart'])) {
    $_SESSION['Cart']['List'] = array();
    $_SESSION['Cart']['CountItem'] = 0;
}

require_once __DIR__.'/vendor/autoload.php';

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
} else {
    $controller = 'pages';
    $action     = 'home';
}
require_once('views/layouts/application.php');

