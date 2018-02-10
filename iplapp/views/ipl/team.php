<div class="panel panel-flat">
    <div class="panel-heading">

    </div>
     <div class="panel-body">
         <div class=" row full-width mt-15p" style="margin-top: 100px;">
             <div class="col-md-8 mt-15p" style="margin-top: 10px; ">
                 <div class="col-md-2">Name</div>
                 <div class="col-md-10"><?php echo $data->name ?></div>
             </div>
              <div class="col-md-8 mt-15p" style="margin-top: 10px; ">
                 <div class="col-md-2">Venue</div>
                 <div class="col-md-10"><?php echo $data->venue ?></div>
             </div>
              <div class="col-md-8 mt-15p" style="margin-top: 10px; ">
                 <div class="col-md-2">Image</div>
                 <div class="col-md-10"><?php if (isset($data->image) && $data->image != '') { ?>

                    <img src="<?php echo base_url() . 'assets/images/team/' ?><?php echo $data->image ?>" width="120" class="left-float mr-10p" alt="icon">

                <?php } ?></div>
             </div>
              <div class="col-md-8 mt-15p" style="margin-top: 10px; ">
                 <div class="col-md-2">Address</div>
                 <div class="col-md-10"><?php echo nl2br($data->address) ?></div>
             </div>
              <div class="col-md-8 mt-15p" style="margin-top: 10px; ">
                 <div class="col-md-2">Name</div>
                 <div class="col-md-10"><?php echo $data->name ?></div>
             </div>
             

         </div>
        <?php if (!empty($players)) { ?>
             <h3>Squad</h3>
                <?php
                foreach ($players as $player) :
                    ?>
                    <div class="row" style="margin-top: 10px; ">
                        <div class="col-md-2">
                            <span class="img-view" style="">
                                <img src="<?php echo base_url() .  'assets/images/player/' ?><?php echo $player['image'] ?>" width="50" class="img-circle" alt="icon">
                            </span>
                        </div>
                        <div class="col-md-4">
                            <strong><?php echo $player['name']; ?></strong>                            
                        </div>
                        <div class="col-md-3">
                            <?php echo $player['designation']; ?>                            
                        </div>
                        <div class="col-md-3">
                            <?php echo nl2br($player['about']); ?>                           
                        </div>
                        
                    </div>
                <?php endforeach ?>
            <?php }  ?>
        
        

    </div> 
</div>