<?php
class indexController {

	private $model;
	private $view;	
	
	public function __construct() {
		$this -> model = new indexModel();
		$this -> view = new indexView();
	}
	
	public function indexAction() {
		if(isset($_GET['filter']) AND is_array($_GET['filter'])) $filter_arr = $_GET['filter'];
		else $filter_arr = array();
		
		$page_number = $this -> model -> getHighestPage();
		$auths = $this -> model -> getAuths($filter_arr);
		$filter = $this -> model -> getFilter($filter_arr);
		$content = $this -> view -> showAuths($auths, $filter, $page_number);
		
		return $content;
	}
	
	public function checkAction() {
		return $this -> view -> showCheck();
	}
} 