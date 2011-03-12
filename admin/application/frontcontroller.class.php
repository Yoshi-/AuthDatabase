<?php
class FrontController {
	private $action;
	private $controller;

	public function __construct() {
		$this -> action = isset($_GET["action"]) ? strtolower($_GET["action"]) : "index";
		$this -> controller = isset($_GET["site"]) ? strtolower($_GET["site"]) : "index";

		$this -> controller .= 'Controller';
		$this -> action .= 'Action';
	}

	public function run() {		
		$controller = new $this->controller;

		if(!in_array($this->action, get_class_methods($controller))) 
			$this -> action = 'indexAction';
			
		$content = $controller->{$this->action}();
		if(isset($_GET['noindex'])) echo $content;
		else {
			$template = new Template('templates', 'index.tpl');
			
			$template -> addVariable('content', $content)
						  -> _loadTemplate();		  
			echo $template -> _run();
		}
				
	}
}

?>