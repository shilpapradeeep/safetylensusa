<div id="modalDiv"></div>
<?php
	//$js=js_link();
	if(!empty($js))
	{
		foreach ($js as $ind => $jss) 
		{
			?>
				<script src="<?=repo_back_end().$jss?>"></script>
			<?php
		}
	}
?>