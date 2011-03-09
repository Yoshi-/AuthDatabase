<div id="imgPreview" align="left">
<?=$filter?>
</div>
<div id="imgPreview">
<table width="1000" cellspacing="0" cellpadding="1" border="1">
	<tr>
		<td>Script</td>
		<td>Code</td>
		<td>Rating</td>
		<td>Rate</td>
	</tr>
	<?php foreach($Auths as $key=>$value):?>
	<tr>
		<td>
			<?=$value['name']?>
		</td>
		<td>
			<a href="https://impsoft.net/nexus/onstart.php?prodauth=<?=$value['auth']?>&hash=<?=HASH?>" target="_blank"><?=$value['auth']?></a>
		</td>
		<td>
			<?=$value['working']?>
		</td>
		<td>
			<a href="index.php?site=rate&rate=<?=$value['rate']?>">
				Disabled
			</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>