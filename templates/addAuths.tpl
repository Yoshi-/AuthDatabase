<form action="index.php?site=new&action=save" method="post">
	<textarea name="Auths"></textarea>
	<br />
	<input type="hidden" name="securitytoken" value="<?=$token?>"/>
	<input type="submit" value="addAuths" />
</form>