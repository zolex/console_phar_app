<?php

use Luke\Console\Command;
use Symfony\Component\Console\Application;

ini_set('error_reporting', -1);
ini_set('display_errors', 'On');
define('DS', DIRECTORY_SEPARATOR);

if ('phar://' === substr(__FILE__, 0, 7)) {

	$basePath = 'phar://'. (include 'phar_name.php');

} else {

	$basePath = realpath(dirname(__FILE__));
}

require $basePath . DS . 'vendor' . DS . 'autoload.php';
require $basePath . DS . 'src' . DS . 'Autoloader.php';
Autoloader::register($basePath . DS . 'src');

$application = new Application;
$application->setName('Electrum/Luke');
$application->setVersion('v0.1');
$application->add(new Command\Test);
$application->run();