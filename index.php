<?php
define(ROOT, __DIR__);
require_once ROOT . '/autoload.php';
require_once ROOT . '/configs/DB.php';
require_once ROOT . '/classes/AbstractModel.php';

error_reporting(E_ALL);

$act = isset($_GET['act']) ? $_GET['act'] : 'GetAll';
$metod = 'action' . $act;

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$controllerClassName = $ctrl . 'Controller';

$controller = new $controllerClassName;
$controller->$metod();