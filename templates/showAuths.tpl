<script type="text/javascript">
	function getPage(link) {
		  $('#dialog').show()
		  $("#frame").attr("src", "https://impsoft.net/nexus/onstart.php?prodauth=" + link + "&hash=bbb530f2250538b8a139d0406d865c03");
		  $('#dialog a:first').attr("href", 'index.php?site=rate&rate=' + link);
	}

	function hide() {
		$('#dialog').hide();
		$("#frame").attr("src", '');
		$('#dialog a:first').attr("href", '');
	}
	</script>
<style type="text/css">
	#dialog {  
		position:absolute;  
		top:200px;  
		left:20%;  
		margin-left:235px;  
		width:500px;  
		border: 1px;
		display:none;
		background-color:#FFFFFF;
	} 
</style>
<div id="dialog">
	Please Wait while Auth is loaded. 
	<a href="">
		Disabled
	</a>
	<a href="javascript:hide();">Hide</a>
	<iframe id="frame" style="border: 0px;" SRC="" width="500" height = "70" scrolling="no" scrollbarvisable="no" >Please wait until the site is loaded.</iframe>
	</div>
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
			<a id="dialog_trigger" href="javascript:getPage('<?=$value['auth']?>')"><?=$value['auth']?></a>
		</td>
		<td>
			<?=$value['working']?>
		</td>
		<td>
			<a href="index.php?site=rate&rate=<?=$value['auth']?>">
				Disabled
			</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div> 
