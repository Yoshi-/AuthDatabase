<?php
class indexController {

	private $model;
	private $view;	
	
	public function __construct() {
		$this -> model = new indexModel();
		$this -> view = new indexView();
	}
	
	public function indexAction() {
		$auths = $this -> model -> getAuths();
		$filter = $this -> model -> getFilter();
		$content = $this -> view -> showAuths($auths, $filter);
		
		return $content;
	}
	
	public function FilterAction() {
		$auths = $this -> model -> getAuths($_GET['filter']);
		$filter = $this -> model -> getFilter($_GET['filter']);
		$content = $this -> view -> showAuths($auths, $filter);
		
		return $content;
	}
}