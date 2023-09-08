<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <?=date('Y')?> © safetylensusa.com
            </div>
            <div class="col-sm-6">
               <!-- <div class="text-sm-right d-none d-sm-block">
                    Design & Develop by  <a href="https://threeseasinfologics.com/" target="_blank">ThreeSeasInfologics</a>
                </div>-->
            </div>
        </div>
    </div>
</footer>

<input type="hidden" id="baseurl" value="<?= b() ?>">
<input type="hidden" id="urisegment1" value="<?= $this->uri->segment(1); ?>">
<?php
    if(!empty($this->uri->segment(2)))
    {
        ?>
        <input type="hidden" id="urisegment2" value="<?= $this->uri->segment(2); ?>">
        <?php
    }
    if(!empty($this->uri->segment(3)))
    {
        ?>
        <input type="hidden" id="urisegment3" value="<?= $this->uri->segment(3); ?>">
        <?php
    }
?>
<input type="hidden" id="csrf_token" value="<?=$this->security->get_csrf_token_name();?>">
<input type="hidden" id="csrf_hash" value="<?=$this->security->get_csrf_hash();?>">