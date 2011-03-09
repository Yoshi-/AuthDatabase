<?php
class indexView {
	public function showAuths($auths = array(), $names = array()) {
		$template = new Template('templates', 'filter.tpl');
		$template -> addVariable('names', $names)
				  -> _loadTemplate();
		$filter = $template -> _run();
			
		$template = new Template('templates', 'showAuths.tpl');
		$template -> addVariable('Auths', $auths)
				  -> addVariable('filter', $filter)
				  -> _loadTemplate();
		$content = $template -> _run();
		return $content;
	}
}