<?php
class FrontController {
	private $action;
	private $controller;

	public function __construct() {
		$this -> action = isset($_GET["action"]) ? ucfirst(strtolower($_GET["action"])) : "index";
		$this -> controller = isset($_GET["site"]) ? ucfirst(strtolower($_GET["site"])) : "index";

		$this -> controller .= 'Controller';
		$this -> action .= 'Action';
	}

	public function run() {
		$controller = new $this->controller;

		if(in_array($this->action, get_class_methods($controller))) {
			
			$content = $controller->{$this->action}();
			$template = new Template('templates', 'index.tpl');

			$template -> addVariable('content', $content)
						  -> _loadTemplate();		  
			echo $template -> _run();
	
		}
		else {
			throw new Exception("Action wasnt found");
		}
	}
}

?>