  <center>
    <div id="imgPreview">
      <h2>Paste in your dump and Submit!</h2><br />
	  <h2>Our Code will do the rest</h2><br /><br />
      <form action="index.php?site=new&action=save" method="post">
        <textarea rows="10" cols="30" name="Auths"></textarea><br />
        <input type="hidden" name="securitytoken" value="<?=$token?>" />
		<input type="button" id="deleteButton" onclick="javascript:history.go(-1)" style="float:left;" />
        <input type="submit" id="prefSave" style="float:right;" />
      </form>
    </div>
  </center>
