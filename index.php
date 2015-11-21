<?php

// minimal bootstrap
include('helper' . DIRECTORY_SEPARATOR . 'Config.php');
include('helper' . DIRECTORY_SEPARATOR . 'Request.php');
include('helper' . DIRECTORY_SEPARATOR . 'Template.php');

$urlParams = $_SERVER['PATH_INFO'];
$urlParams = explode('/', $urlParams);

if ( empty($urlParams[0]) )
{
	unset($urlParams[0]);
}
// @TODO LFI
$controllerPath = 'controller/'.ucfirst($urlParams[1]).'Controller'.'.php';
$controllerName = ucfirst($urlParams[1]).'Controller';
$actionName = $urlParams[2].'Action';

/*
echo '<pre>';
print_r(array($urlParams, $controllerName, $actionName));
echo '</pre>';
*/

// Here you should probably gather the rest as params

// Call the action
require_once($controllerPath);
$controller = new $controllerName;
$controller->$actionName();

