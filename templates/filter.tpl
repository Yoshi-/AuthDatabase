<?php
	if(isset($_GET['filter']) AND is_array($_GET['filter'])) $filter = $_GET['filter'];
	else $filter = array();
?>
<div id="imgPreview">
	<form id="filterform" action='index.php' method='get'>
		<div align="center">
			<input type="submit" id="sstring" value="Filter"/><br/><br/>
		</div>
	<select multiple="multiple" name="filter[]" size="20" id="rounded">
	<?php
	$i = 1;
	foreach($names as $key=>$name): ?>
	<option value="<?=$name['key']?>" <?php if(in_array($name['key'], $filter)) echo "selected='selected'";?>><?=$name['name']?></option>
	<? $i++;?>
	<?php endforeach; ?>
	</select>
	</form>
</div>