<script type="text/javascript">
	function deleteName(nameID) {
		$.get(
			'index.php?site=names&action=delete&nameID=' + nameID + '&noindex=1', 
			function(data) {
				alert(data);
			});
	}	
</script>
<table cellspacing="3" cellpadding="3" border="0" id="rounded">
	<tr>
		<td><h2>Script Name</h2></td>
		<td><h2>key</h2></td>
		<td><h2>edit</h2></td>
		<td><h2>delete</h2></td>
	</tr>
	<?php foreach($names as $key=>$value): if(!empty($value['name'])):?>
	<tr>
		<td id="rounded">
			<?=$value['name']?>
		</td>
		<td id="rounded">
			<?=$value['key']?>
		</td>
		<td align="center" id="rounded">
			<a href="javascript:deleteName(<?=$value['nameID']?>);">Delete + Ajax</a>
		</td>
		<td align="center" id="rounded">
			<a href="index.php?site=names&action=edit&nameID=<?=$value['nameID']?>">Edit</a>
		</td>
	</tr>
	<?php endif; endforeach; ?>
</table>