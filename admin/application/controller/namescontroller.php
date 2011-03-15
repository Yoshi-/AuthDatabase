<?php
class NamesController {

	private $model;
	private $view;	
	
	public function __construct() {
		$this -> model = new namesModel();
		$this -> view = new namesView();
	}
	
	//Display all names
	public function indexAction() {
		$names = $this -> model -> getNames();
		$content = $this -> view -> showNames($names);
		
		return $content;
	}
	
	//Display Auth + Unknown Names
	public function unknownAction() {
		$names = $this -> model -> getUnknownNames();
		$content = $this -> view -> showUnknownNames($names);
		
		return $content;
	}
	
	//edit names
	public function editAction() {
		$nameID = (isset($_GET['nameID'])?(int)$_GET['nameID']:'');
		$content = $this -> model -> getName($nameID);
		$content = $this -> view -> editName($content);
		return $content;
	}
	
	//delete Name
	public function deleteAction() {
		$nameID = (isset($_GET['nameID'])?$_GET['nameID']:'');
		$return = $this -> model -> deleteName($nameID);
		return $return;
	}
	
	//save Edited Name
	public function saveeditAction() {
		return $this -> model -> saveEdit();
	}
	
	//save unknown names
	public function addnamesAction() {
		return $this -> model -> saveUnknownNames();
	}
	
}