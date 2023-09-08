<?php
$c=count($bread_crum);
?>
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18" id="main-title"><?=$bread_crum[$c-2]?></h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <?php
            for ($i=0; $i <$c ; $i++)
            { 
            ?>
            <li class="breadcrumb-item">
                <a href="<?php $i++;  echo $bread_crum[$i]; ?>"><?php echo $bread_crum[$i-1]; ?></a>
            </li>
            <?php
            }
            ?>
        </ol>
    </div>

</div>