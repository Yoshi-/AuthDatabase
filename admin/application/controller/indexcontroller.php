<?php
class indexController {

	private $model;
	private $view;	
	
	public function __construct() {
		$this -> model = new indexModel();
		$this -> view = new indexView();
	}
	
	public function indexAction() {
		$content = 'Hi';
		return $content;
	}
	
} 