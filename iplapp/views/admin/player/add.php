<div class="panel panel-flat">    <div class="panel-heading">            </div>    <div class="panel-body">        <?php        $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'name' => 'frm_client');        echo form_open_multipart($hrdata['controller'] .'/add', $attributes);        ?>        <div class="form-group">                <label class="control-label col-lg-2">Name<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="name" value="<?php echo set_value('name'); ?>" name="name" type="text" placeholder="Name"  />                    <div class="error error-txt error-name"></div>                    <?php echo form_error('name'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Team<span class="required"> *</span></label>                <div class="col-lg-6">                                       <?php echo form_dropdown('team', $hrdata['team'], set_value('team'), 'class="select-search select2-hidden-accessible form-control" id="team"'); ?><div class="error error-txt error-team"></div>                    <?php echo form_error('team'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Designation<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="designation" value="<?php echo set_value('designation'); ?>" name="designation" type="text" placeholder="Designation"  />                    <div class="error error-txt error-designation"></div>                    <?php echo form_error('designation'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Image<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="file-styled" type="file" name="image" id="image" >                                        <span style="font-size: 10px">Allowed types: JPEG,JPG,PNG  Max-size:2MB</span><br/>                     <div class="error error-img error-txt"></div>                    <?php echo form_error('image'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">About<span class="required"> *</span></label>                <div class="col-lg-6">                                        <textarea name="about" id="editor" class="form-control"  placeholder="About" ><?php echo set_value('about');?></textarea>                                        <div class="error error-editor error-txt"></div>                    <?php echo form_error('about'); ?>                                    </div>        </div>                <div class="form-group">                <label class="control-label col-lg-2">Status<span class="required"> *</span></label>                <div class="col-lg-6">                    <?php $status = array('Y' => 'Active', 'N' => 'Inactive'); ?>                    <?php echo form_dropdown('status', $status, set_value('status'), 'class="dropdown form-control" id="status"'); ?>                    <?php echo form_error('status'); ?>                                    </div>        </div>                <div class="form-group">            <label class="control-label col-lg-2">&nbsp;</label>                <div class="col-lg-4"><button type="submit" name="submit" class="btn btn-primary" onclick="return validate_form();"  >Submit</button></div>        </div>        <?php form_close(); ?>    </div> </div><script type="text/javascript">        function validate_form()    {               var thisform = document.frm_client;        var fuData=document.getElementById('image');        var fu1 = document.getElementById('image').value;        var name = document.getElementById('name').value;        var designation = document.getElementById('designation').value;        var team = document.getElementById('team').value;        var editor = document.getElementById('editor').value;                var ext = fu1.substr(fu1.lastIndexOf('.') + 1).toLowerCase();        // editor=$(editor).text();                $('.error').html('');        if(name.trim() == ""){            $('.error-name').html('<p >Please enter a valid name.</p>');            return false;        }        if(team == 0){            $('.error-team').html('<p >Please select a team.</p>');            return false;        }                if(designation.trim() == ""){            $('.error-designation').html('<p >Please enter a valid Designation.</p>');            return false;        }                        if(fu1 == ""){            $('.error-img').html('<p >Please upload a jpg/png image.</p>');            return false;        }        if (fu1 != "")        {            if (ext != 'jpg' && ext != 'png' && ext != 'jpeg' && ext != 'gif')            {                $('.error-img').html('<p >Upload jpg/png images only</p>');                               return false;            }            if(fuData.files && fuData.files[0]){                    var size=fuData.files[0].size;                    if(size > 2400000){                        $('.error-img').html('<p>Please upload a jpg/png image less than 2MB </p>');                                         return false;                 }             }                    }         if(editor.trim() == ""){            $('.error-editor').html('<p >Please enter a valid description of the player.</p>');            return false;        }        thisform.submit();    }    </script>			