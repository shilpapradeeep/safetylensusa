<meta charset="utf-8" />
<title><?=get_title()?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- App favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?=content('fav_icon')?>">
<?php
//$css=css_link();
if(!empty($css))
{
        foreach ($css as $c)
        {
                echo '<link rel="stylesheet" href="'.repo_back_end().$c.'">';
        }
}
?>
<style type="text/css">
	.validation-error, .star
    {
        color: red;
    }
    .card-header
    {
    	background: #2a3042 !important;
    }
    .card-title
    {
    	color: #fff;
    }
    .sweet-alert button.cancel {
        background-color: #e83d30 !important;
        border: 1px solid #e83d30 !important;
    }
    .sweet-alert button.confirm {
        background-color: #26942b !important;
        border: 1px solid #249628 !important;
    }
</style>