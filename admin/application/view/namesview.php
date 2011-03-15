<?php
class namesView {
	public function showNames($names) {
		$template = new Template('templates', 'names.tpl');
		$template -> addVariable('names', $names)
				  -> _loadTemplate();
		$content = $template -> _run();
		return $content;
	}
	
	public function showUnknownNames($names) {
		
		$template = new Template('templates', 'unknownNames.tpl');
		
		$template -> addVariable('names', $names)
				  -> _loadTemplate();
				  
		$content = $template -> _run();
		return $content;
	}
	
	public function editName($name) {
			
		$template = new Template('templates', 'editName.tpl');
		
		$template -> addVariable('name', $name)
				  -> _loadTemplate();
				  
		$content = $template -> _run();
		return $content;
	}
}