<?php if($this->session->flashdata('message') ) : ?>
<div class="notify-<?php echo $this->session->flashdata('msg_class'); ?>">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <?php echo $this->session->flashdata('message'); ?>

</div>
<?php endif; ?> 