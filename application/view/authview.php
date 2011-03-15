<?php
class authView {
	public function showAuth($auth) {
		$template = new Template('templates', 'Auth.tpl');
		$template -> addVariable('Auth', $auth)
				  -> _loadTemplate();
		$content = $template -> _run();
		return $content;
	}
	
} 