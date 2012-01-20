<center>
<div id="imgPreview">
<form action="names.php?action=saveNames" method="post">
	<table width="600px" cellspacing="3" cellpadding="3" border="0">
		<tr>
			<td>
				<h2>
					Authkey
				</h2>
			</td>
			<td>
				<h2>
					Key
				</h2>
			</td>
			<td>
				<h2>
					Name
				</h2>
			</td>
		</tr>
		<?php
			while($ds = mysql_fetch_array($res)):
		?>
		<tr>
			<td>
				<?=$ds['auth']?>
			</td>
			<td>
				<input name="key[]" value="<?=$ds['key']?>" id="sstring" />
			</td>
			<td>
				<input name="name[]" id="sstring" />
			</td>
		</tr>
		<?php
			endwhile;
		?>
	</table><br /><br />
	<input type='submit' id="sstring" />
</form>
</div>
</center>