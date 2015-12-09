<?php

class Autoloader
{
	protected static $instance;
	protected static $paths = array();

	protected function __construct() {

		spl_autoload_register(array('static', 'autoload'));
	}

	protected static function getInstance() {

		if (!static::$instance instanceof static) {

			static::$instance = new static;
		}

		return static::$instance;
	}

	public static function register($path) {

		static::$paths[] = $path;
		return self::getInstance();
	}

	protected static function autoload($class) {

		$classPath = str_replace('\\', DS, $class) . '.php';
		foreach (static::$paths as $path) {

			$filePath = $path . DS . $classPath;
			if (is_readable($filePath)) {

				include $filePath;
				return;
			}
		}

		throw new \Exception('Could not load class "'. $class .'"', 1);
	}
}