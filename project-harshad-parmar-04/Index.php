<?php
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
define('DS', DIRECTORY_SEPARATOR);
spl_autoload_register(function ($className) {
    $classPath = str_replace('_', '/', $className);
	require_once "{$classPath}.php";
});

$request = new Model_Core_Request();
$request->getParams('c');
if (!$request->getParams('c') || !$request->getParams('a')) {
	header('Location:http://localhost/project-harshad-parmar-04/index.php?c=product&a=grid');
    exit();
}

class Ccc
{
	public static function init()
	{
		$front = new Controller_Core_Front();
		$front->init();
	}

	public static function getModel($className)
	{
		$className = 'Model_' . $className;
		return new $className();
	}

	public static function getSingleton($className)
	{
		$className = 'Model_' . $className;
		if (array_key_exists($GLOBALS[$className], $GLOBALS)) {
			return $GLOBALS[$className];
		}
		
		$GLOBALS[$className] = new $className();
		return $GLOBALS[$className];
	}
}
Ccc::init();

?>