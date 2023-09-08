

<?php
	if($header_from=="ltr_hd")
	{
		?>
		<tr>
	<td>
		<img id="image" src="<?=$img_path?>" alt="logo" class="img-responsive" style="width:100%;    height: 122px;"/> 
	</td>
</tr>
		<?php

	}
	else
	{
		?>
		<tr>
	<td style="width:100%;text-align: center;">

		<p style="text-align: center;width: 100%"><img id="image" src="<?=$img_path?>" alt="logo" class="img-responsive" align="center" style="width:100%;height: 25px;margin:0% 30%"/> </p>
	</td>
</tr>
		<?php
	}
?>
