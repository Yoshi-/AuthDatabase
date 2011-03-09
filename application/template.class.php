<?php
class Template {
	private $variables = Array();
	private $folder;
	private $template;
	private $templateFile;
	
	public function __construct($folder, $template) {
		$this -> folder = $folder;
		$this -> templateFile = $template;
	}
	
	public function addVariable($name, $value) {
		if(isset($name) AND isset($value)) {
			$this -> variables[$name] = $value;
		}
		else {
			throw new Exception('Invalid input');
		}
		return $this;
	}
	
	public function _loadTemplate() {
		$templateFile = $this -> folder . '/' . $this -> templateFile;
		
		if(file_exists($templateFile)) {
			foreach($this -> variables as $key=>$value) {
				$$key = $value;
			}
			ob_start();
			include($templateFile);
			$content = ob_get_contents();
			ob_clean();
			$this -> template = $content;
		}
		else {
			throw new Exception('File Doesnt exists');
		}
		return $this;
	}
	
	public function _run() {
		return $this -> template;
	}
}