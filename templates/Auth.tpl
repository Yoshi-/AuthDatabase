<?php if(is_array($Auth)) {?>
<a id="dialog_trigger" href="javascript:getPage('<?=$value['auth']?>', '<?=$value['rate']?>')"><?=$value['auth']?></a>
<?php } else echo $Auth; ?>