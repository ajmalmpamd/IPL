<div class="panel panel-flat">
    <div class="panel-heading">

    </div>
    <div class="panel-body">
        <div class="full-width mt-15p" style="margin-top: 100px;">

            <?php if (!empty($result)) { ?>
                <?php
                foreach ($result as $r => $item) :
                    ?>
                    <div class="col-md-8 mt-15p" style="margin-top: 10px; ">
                        <div class="col-md-2">
                            <?php echo date('d F, Y', strtotime($item->date)); ?>
                        </div>
                        <div class="col-md-10">
                            <a href="<?php echo site_url('team/'.slugify($item->home).'-'.$item->home_team);?>"><?php echo $item->home; ?></a>
                            x
                            <?php echo $item->away; ?>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php } else { ?>

                <div class="pl-30p ptb-20p">
                    No Records Found!
                </div>

            <?php } ?>    

        </div>
    </div>
</div>