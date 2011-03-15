<form action="names.php?action=saveNames" method="post">
	<table width="1000" cellspacing="0" cellpadding="1" border="1">
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
				<input name="key[]" value="<?=$ds['key']?>" />
			</td>
			<td>
				<input name="name[]" />
			</td>
		</tr>
		<?php
			endwhile;
		?>
	</table>
	<input type='submit' />
</form>