<?php
class Autoloader {
	public static function load($class_name) {
		$class_name = strtolower($class_name);

		$path = 'application/'.$class_name.'.class.php';
		
		if(file_exists($path)) {
			require_once $path;
		}
	}
	
	public static function controller($class_name) {
		$class_name = strtolower($class_name);
		
		$path = 'application/controller/'.$class_name.'.php';
		
		if(file_exists($path)) {
			require_once $path;
		}
	}
	
	public static function view($class_name) {
		$class_name = strtolower($class_name);

		$path = 'application/view/'.$class_name.'.php';

		if(file_exists($path)) {
			require_once $path;
		}
	}
	
	public static function model($class_name) {
		$class_name = strtolower($class_name);

		$path = 'application/model/'.$class_name.'.php';
		if(file_exists($path)) {
			require_once $path;
		}
	}
	
	public static function exception($class_name) {
		$class_name = strtolower($class_name);

		$path = 'application/exception/'.$class_name.'.php';
		if(file_exists($path)) {
			require_once $path;
		}
	}
}