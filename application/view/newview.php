<?php
class newView {

	private $template;
	
	public function newAuths() {
		$template = new Template('templates', 'addAuths.tpl');
		$token = $_SESSION['token'];
		$template -> addVariable('token', $token)
				  -> _loadTemplate();
				  
		$content = $template -> _run();
		
		return $content;
	}
	
	public function savedAuths($auths) {
		return $auths;
	}
}