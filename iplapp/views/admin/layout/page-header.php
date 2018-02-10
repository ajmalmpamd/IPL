<div class="page-header-content">
        <div class="page-title">
                <h4> <span class="text-semibold"><?php echo $title ?></span> </h4>
        </div>

        <div class="heading-elements">
                <div class="heading-btn-group">
                    <?php if(isset($plus_link) && $plus_link!='') { ?>
                        <a href="<?php echo base_url().$plus_link; ?>" class="btn btn-link btn-float has-text"><i class="icon-plus-circle2 text-primary"></i><span>Add <?php echo $title ?></span></a>
                    <?php } if(isset($back_link) && $back_link!='') { ?>
                        <a href="<?php echo base_url().$back_link; ?>" class="btn btn-link btn-float has-text"><i class=" icon-undo2 text-primary"></i> <span>Back</span></a>
                    <?php } ?>   
                </div>
        </div>
</div>

<div class="breadcrumb-line">
        <ul class="breadcrumb">
                <li><a href="<?php echo base_url('sitemanager'); ?>"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <?php if(isset($nav_links)) {
                  echo $nav_links;
           }?>
        </ul>

</div>
			