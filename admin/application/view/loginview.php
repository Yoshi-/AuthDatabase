<?php 
class loginView {
	public function login() {
		$template = new Template('templates', 'login.tpl');
		$template -> _loadTemplate();
		$content = $template -> _run();
		
		return $content;
	}
}