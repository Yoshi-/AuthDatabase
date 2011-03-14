<?php
class indexView {
	public function showAuths($auths = array(), $names = array(), $page_number = 1) {
		if(isset($_GET['page'])) $page = (int) $_GET['page'];
		else $page = 1;
		
		if($page < 1) $page = 1;
		
		$pageLink = '';
		$data = $_GET;
		
		if(isset($data['page'])) unset($data['page']);
		$i = 1;
		while($i <= $page_number) {
			$data['page'] = $i;
			if(isset($data['pagenumber'])) unset($data['pagenumber']);

			$pageLink .= '';

			if($i == $page) {
				$pageLink .='<b>' . $i .'</b> ';
			} else {
					$pageLink .='<a href="index.php?'.http_build_query($data).'">' . $i . '</a> ';
			}
			if($i == 6) {
				$pageLink .== ' ... ';
				$i = $page_number - 5;
			}
			$i++;
		}		
		$template = new Template('templates', 'filter.tpl');
		$template -> addVariable('names', $names)
				  -> _loadTemplate();
		$filter = $template -> _run();
			
		$template = new Template('templates', 'showAuths.tpl');
		$template -> addVariable('Auths', $auths)
				  -> addVariable('filter', $filter)
				  -> addVariable('page', $pageLink)
				  -> _loadTemplate();
		$content = $template -> _run();
		return $content;
	}
	
	public function showCheck() {
		$template = new Template('templates', 'checkAuths.tpl');
		$template -> _loadTemplate();
		
		$content = $template -> _run();
		
		return $content;
	}
} 