<?=$filter?><table width="1000" cellspacing="0" cellpadding="1" border="1">	<tr>		<td><h2>Name</h2></td>		<td><h2>Authcode</h2></td>		<td><h2>Rating</h2></td>		<td><h2>rate</h2></td>	</tr>	<?php foreach($Auths as $key=>$value):?>	<tr>		<td>			<?=$value['name']?>		</td>		<td>			<a href="https://impsoft.net/nexus/onstart.php?prodauth=<?=$value['auth']?>&hash=bbb530f2250538b8a139d0406d865c03" target="_blank"><?=$value['auth']?></a>		</td>		<td>			<?=$value['working']?>		</td>		<td>			<a href="index.php?site=rate&rate=<?=$value['rate']?>">				Doesnt work			</a>		</td>	</tr>	<?php endforeach; ?></table>