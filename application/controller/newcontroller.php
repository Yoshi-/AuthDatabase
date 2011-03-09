<?php
class newController {
	
	private $model;
	private $view;	
	
	public function __construct() {
		$this -> model = new rateModel();
		$this -> view = new newView();
	}
	
	public function indexAction() {
		$content = $this -> view -> newAuths();
		
		return $content;
	}
	
	public function saveAction() {
		if(isset($_POST['auths'])) $auths = $_POST['auths'];
		else $auths = '';
		
		$auths = $this -> model -> saveAuths($auths);
		
		$content = $this -> view -> savedAuths($auths);
		
		return $content;
	}
}