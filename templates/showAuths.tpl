<script type="text/javascript">
	token = '<?=$_SESSION['token']?>';
	function getPage(link, id) {
		  $('#dialog').show();
		  $("#frame").attr("src", "https://impsoft.net/nexus/onstart.php?prodauth=" + link + "&hash=<?=HASH?>");
		  $('#dialog a:first').attr("href", 'javascript:rateAuth("' + id + '", "true");');
		  $('#dialog a:first').next().attr("href", 'javascript:rateAuth("' + id + '");');
	}

	function hide() {
		$('#dialog').hide();
		$("#frame").attr("src", '');
		$('#dialog a:first').attr("href", '');
		$('#dialog a:second').attr("href", '');
	}	
function rateAuth(auth, uprate) {
		if(uprate) rate = 'uprate';
		else rate = 'downrate';
		$.get(
			'index.php?site=rate&rate=' + auth + '&type=' + rate + '&securitytoken=' + token + '&noindex=1', 
			function(data) {
				alert(data);
			});
	}	
		function getAuth(authID) {
			$.get(
			'index.php?site=auth&authID=' + authID + '&noindex=1', 
			function(data) {
				$("#Auth_" + authID).html(data);
			});
		}
</script>

<div id="page" align="center">
    <div style="float:left;margin-left:5%;position:fixed;">
        <?=$filter?>
    </div>
    
    <div id="imgPreview" align="center">
    <?=$page;?>
    <table cellspacing="5" cellpadding="5" border="0" bordercolor="white" id="rounded">
    	<tr>
    		<td><h2>Script Name</h2></td>
    		<td><h2>Code</h2></td>
    		<td><h2>Rating</h2></td>
    		<td><h2>Vote</h2></td>
    		<td><h2>From</h2></td>
    	</tr>
    	<?php foreach($Auths as $key=>$value):?>
    	<?php
    				$val=$value['working'];
    				if($val < _Remove_Disabled){
    					continue;
    				}
    	?>
    	<tr>
    		<td>
    			<?=$value['name']?>
    		</td>
    		<td>
    		<?php if(alreadyChecked($value['rate'])  > 0) {?>
    			<div id="Auth_<?=$value['rate']?>">
    				<a id="dialog_trigger" href="javascript:getPage('<?=$value['auth']?>', '<?=$value['rate']?>')"><?=$value['auth']?></a>
    			</div>
    			<?php } else {?>
    			<div id="Auth_<?=$value['rate']?>">
    				<a href="javascript:getAuth('<?=$value['rate']?>')"?> Show Code </a>
    			</div>
    			<?php } ?>
    		</td>
    		<td align="center">
    			<?php
    				echo $value['working'];
    			?>
    		</td>
    		<td align="center">
    			<input type="button" onclick="rateAuth('<?=$value['rate']?>', 'true');" id="prefSave">
    			<input type="button" onclick="rateAuth('<?=$value['rate']?>');" id="deleteButton">
    		</td>
    		<td align="center">
    			<?=getUserLink($value['username'])?>
    		</td>
    	</tr>
    	<?php endforeach; ?>
    </table>
    <?=$page;?>
    </div>
    
    <div id="dialog" style="display: none; position: fixed; width: 260px; top: 95px; right: 30px;">
    	<div id="imgPreview">
    	Please Wait while Auth is loading.<br />
    	<a href="">Up Vote</a> | 
    	<a href="">Down Vote</a> | 
    	<a href="javascript:hide();">Close</a><br />
    	<iframe id="frame" style="border: 0px;background-color:white;" SRC="" width="250" height="300" scrolling="no" >Please wait until the site is loaded.</iframe><br/>
    	If you see "Code Disabled" please click "Down Vote". If you see the script name, press "Up Vote".
    	</div>
    </div>
</div>