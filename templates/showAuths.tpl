<script type="text/javascript">
	function getPage(link, id) {
		  $('#dialog').show()
		  $("#frame").attr("src", "https://impsoft.net/nexus/onstart.php?prodauth=" + link + "&hash=<?=HASH?>");
		  $('#dialog a:first').attr("href", 'javascript:rateAuth("' + id + '", "true");');
		  $('#dialog a:first').next().attr("href", 'javascript:rateAuth("' + id + '");');
		  /*
		  var detail = checkAuth(link);
			if(s.indexOf("incomplete") != -1){
				detail = "Server did not reply, please try again";
			} else if(s.indexOf("Disabled") != -1){
				detail = "Code is disabled. Please Down-Vote!";
			} else {
				detail = "Code is valid. Please Up-Vote!";
			}
		  alert(detail);*/
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
			'index.php?site=rate&' + rate + '=' + auth + '&noindex=1', 
			function(data) {
				alert(data);
			});
	}	
	function checkAuth(auth) {
		var result = "incomplete";
		$().ready(function(){ 
 		   var url = 'https://impsoft.net/nexus/onstart.php?prodauth=' + auth + '&hash=<?=HASH?>';
	    $.get(url, function(data) {
	    	result = data;    
	    });
	});
		return result;
    	}
		
		function getAuth(authID) {
			$.get(
			'index.php?site=auth&authID=' + authID + '&noindex=1', 
			function(data) {
				$("#Auth_" + authID).html(data);
			});
		}
</script>

<center>
<div id="dialog" style="position:fixed;top:200px;display:none;margin-left:35%;width:500px;">
	<div id="imgPreview">
	Please Wait while Auth is loaded.<br/>
	<a href="">Up-Vote</a> | 
	<a href="">Down-Vote</a> | 
	<a href="javascript:hide();">Close</a><br/>
	<iframe id="frame" style="border: 0px;background-color:white;" SRC="" width="500" height = "70" scrolling="no" scrollbarvisable="no" >Please wait until the site is loaded.</iframe><br/>
	<font style="background-color: black" color="red">If you see "Code Disabled" please click Down-Vote. If you see the script name, press Up-Vote.</font>
	</div>
</div>
<div style="float:left;margin-left:10%;position:fixed;">
<?=$filter?>
</div>
<div id="imgPreview" align="center">
<table cellspacing="3" cellpadding="3" border="0" id="rounded">
	<tr>
		<td><h2>Script Name</h2></td>
		<td><h2>Code</h2></td>
		<td><h2>Rating</h2></td>
		<td><h2>Vote</h2></td>
	</tr>
	<?php foreach($Auths as $key=>$value):?>
	<?php
				$val=$value['working'];
				if($val < -3){
					continue;
				}
	?>
	<tr>
		<td id="rounded">
			<?=$value['name']?>
		</td>
		<td id="rounded">
			<div id="Auth_<?=$value['rate']?>">
				<a href="javascript:getAuth('<?=$value['rate']?>')"?> Show Auth </a>
			</div>
		</td>
		<td align="center" id="rounded">
			<?php
				$val=$value['working'];
				echo $val;
			?>
		</td>
		<td align="center" id="rounded">
			<input type="button" onclick="rateAuth('<?=$value['rate']?>', 'true');" id="prefSave">
			<input type="button" onclick="rateAuth('<?=$value['rate']?>');" id="deleteButton">
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
</center>


