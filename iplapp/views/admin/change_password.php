<div class="panel panel-flat">
    <div class="panel-heading">
        
    </div>
    <div class="panel-body">
        <?php  echo form_open('sitemanager/change_password' ,'class="form-horizontal"');  ?>
        <div class="form-group">
                <label class="control-label col-lg-2">Current Password</label>
                <div class="col-lg-4">
                        <?php
                   echo form_password('old_psw', set_value('old_psw'),'class="form-control" id="old_psw"');
                   echo form_error('old_psw');
                   ?>
                </div>
        </div>
        <div class="form-group">
                <label class="control-label col-lg-2">New Password</label>
                <div class="col-lg-4">
                        <?php
                   echo form_password('new_psw', set_value('new_psw'),'class="form-control" id="new_psw"');
                   echo form_error('new_psw');
                   ?>
                </div>
        </div>
        <div class="form-group">
                <label class="control-label col-lg-2">Confirm Password</label>
                <div class="col-lg-4">
                        <?php
                   echo form_password('con_psw', set_value('con_psw'),'class="form-control" id="con_psw"');
                   echo form_error('con_psw');
                   ?>
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2">&nbsp;</label>
                <div class="col-lg-4"><button type="submit" name="submit" class="btn btn-primary" >Change</button></div>
        </div>
        <div>
            
        </div>
        <?php // echo form_submit('submit', 'Submit'); ?>
        <?php form_close(); ?>
    </div>
                