<?php
	if(isset($_GET['filter']) AND is_array($_GET['filter'])) $filter = $_GET['filter'];
	else $filter = array();
?>
<div>
	<form action='index.php' method='get'>
	<select multiple="mutiple" name="filter[]" size="5">
	<?php var_dump($filter);
	$i = 1;
	foreach($names as $key=>$name): ?>
	<option value="<?=$name['key']?>" <?php if(in_array($name['key'], $filter)) echo "selected='selected'";?>><?=$name['name']?></option>
	<? $i++;?>
	<?php endforeach; ?>
	</select>
	<input type="hidden" name='action' value="filter"/>
	<input type="submit" value="Filter"/>
	</form>
</div>