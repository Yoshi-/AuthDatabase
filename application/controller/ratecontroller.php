<?php
class rateController extends baseController {

	private $model;
	private $view;	
	
	public function __construct() {
		$this -> model = new rateModel();
		$this -> view = new rateView();
	}
	
	public function indexAction () {
		if(isset($_GET['rate'])) $rate = (int)$_GET['rate'];
		else $rate = '';
		
		$res = $this -> model -> rate($rate);
		
		$content = $this -> view -> rate($res);
		
		return $content;
	}
	
	public function errorAction() {
		return $this -> indexAction();
	}
}