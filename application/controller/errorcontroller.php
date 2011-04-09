<?php
class errorController extends baseController {

	public function __construct() {	}
	
	public function indexAction() {
		return '404 Not found';
	}
	public function errorAction() {
		return '404 Not found';
	}
}