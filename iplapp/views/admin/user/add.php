<div class="panel panel-flat">    <div class="panel-heading">            </div>    <div class="panel-body">        <?php        $attributes = array('class' => 'form-horizontal', 'id' => 'myform', 'name' => 'frm_client');        echo form_open_multipart($hrdata['controller'] .'/add', $attributes);        ?>        <div class="form-group">                <label class="control-label col-lg-2">Name<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="name" value="<?php echo set_value('name'); ?>" name="name" type="text" placeholder="Name"  />                    <div class="error error-txt error-name"></div>                    <?php echo form_error('name'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">E-mail<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="email" value="<?php echo set_value('email'); ?>" name="email" type="text" placeholder="E-mail"  />                    <div class="error error-txt error-email"></div>                    <?php echo form_error('email'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Password<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="password" value="<?php echo set_value('password'); ?>" name="password" type="password" placeholder="Password"  />                    <div class="error error-txt error-password"></div>                    <?php echo form_error('password'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Confirm Password<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="conpassword" value="<?php echo set_value('conpassword'); ?>" name="conpassword" type="password" placeholder="Confirm Password"  />                    <div class="error error-txt error-conpassword"></div>                    <?php echo form_error('conpassword'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Phone<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="phone" value="<?php echo set_value('phone'); ?>" name="phone" type="text" placeholder="Phone number"  />                    <div class="error error-txt error-phone"></div>                    <?php echo form_error('phone'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">City<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="form-control" id="city" value="<?php echo set_value('city'); ?>" name="city" type="text" placeholder="City"  />                    <div class="error error-txt error-city"></div>                    <?php echo form_error('city'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Image<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="file-styled" type="file" name="image" id="image" >                                        <span style="font-size: 10px">Allowed types: JPEG,JPG,PNG  Max-size:2MB</span><br/>                     <div class="error error-img error-txt"></div>                    <?php echo form_error('image'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Address<span class="required"> *</span></label>                <div class="col-lg-6">                                        <textarea name="address" id="editor" class="form-control" ><?php echo set_value('address');?></textarea>                                        <div class="error error-editor error-txt"></div>                    <?php echo form_error('address'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Skills</label>                <div class="col-lg-6">                    <select name="skills[]" multiple="multiple" class="select select-search  form-control">                        <?php foreach ($hrdata['skill'] as $key => $val) { ?>                        <option value="<?php echo $key; ?>" ><?php echo $val; ?></option>                        <?php } ?>                    </select>                        <?php echo form_error('skill'); ?>                </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Cover Letter<span class="required"> *</span></label>                <div class="col-lg-6">                                        <textarea name="cover" id="editor1" class="form-control" ><?php echo set_value('cover');?></textarea>                                        <div class="error error-cover error-txt"></div>                    <?php echo form_error('cover'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Resume<span class="required"> *</span></label>                <div class="col-lg-6">                                        <input class="file-styled" type="file" name="resume" id="resume" >                                        <span style="font-size: 10px">Allowed types: DOC,DOCX,PDF  Max-size:1MB</span><br/>                     <div class="error error-cv error-txt"></div>                    <?php echo form_error('resume'); ?>                                    </div>        </div>        <div class="form-group">                <label class="control-label col-lg-2">Status<span class="required"> *</span></label>                <div class="col-lg-6">                    <?php $status = array('Y' => 'Active', 'N' => 'Inactive'); ?>                    <?php echo form_dropdown('status', $status, set_value('status'), 'class="dropdown form-control" id="status"'); ?>                    <?php echo form_error('status'); ?>                                    </div>        </div>                <div class="form-group">            <label class="control-label col-lg-2">&nbsp;</label>                <div class="col-lg-4"><button type="submit" name="submit" class="btn btn-primary" onclick="return validate_form();"  >Submit</button></div>        </div>        <?php form_close(); ?>    </div> </div><script type="text/javascript">        function validate_form()    {               var thisform = document.frm_client;        var fuData=document.getElementById('image');        var fu2 = document.getElementById('resume').value;        var fuData2=document.getElementById('resume');        var fu1 = document.getElementById('image').value;        var name = document.getElementById('name').value;        var email = document.getElementById('email').value;        var password = document.getElementById('password').value;        var conpassword = document.getElementById('conpassword').value;        var phone = document.getElementById('phone').value;        var city = document.getElementById('city').value;        var editor = document.getElementById('editor').value;        var editor1 = document.getElementById('editor1').value;        var passwordlength=6;        // var editor= tinyMCE.activeEditor.getContent();        var ext = fu1.substr(fu1.lastIndexOf('.') + 1).toLowerCase();        var ext2 = fu2.substr(fu2.lastIndexOf('.') + 1).toLowerCase();        // editor=$(editor).text();                $('.error').html('');        if(name.trim() == ""){            $('.error-name').html('<p >Please enter a valid title.</p>');            return false;        }        if(email.trim() == "" || !(validateEmail(email))){            $('.error-email').html('<p >Please enter a valid E-mail.</p>');            return false;        }        if(password.trim() == "" || password.length < passwordlength ){            $('.error-password').html('<p >Password must contain atleast '+passwordlength+' characters .</p>');            return false;        }        if(conpassword.trim() == "" || conpassword.length < passwordlength ){            $('.error-conpassword').html('<p >Confirm Password must contain atleast '+passwordlength+' characters .</p>');            return false;        }        if(conpassword!=password){            $('.error-conpassword').html('<p >Password donot match.</p>');            return false;        }        if(phone.trim() == ""){            $('.error-phone').html('<p >Please enter a valid Phone number.</p>');            return false;        }        if(city.trim() == ""){            $('.error-city').html('<p >Please enter a valid city.</p>');            return false;        }        if(fu1 == ""){            $('.error-img').html('<p >Please upload a jpg/png image.</p>');            return false;        }        if (fu1 != "")        {            if (ext != 'jpg' && ext != 'png' && ext != 'jpeg' && ext != 'gif')            {                $('.error-img').html('<p >Upload jpg/png images only</p>');                               return false;            }            if(fuData.files && fuData.files[0]){                    var size=fuData.files[0].size;                    if(size > 2400000){                        $('.error-img').html('<p>Please upload a jpg/png image less than 2MB </p>');                                         return false;                 }             }                    }        if (fu2 != "")        {            if (ext2 != 'doc' && ext2 != 'docx' && ext2 != 'pdf' )            {                $('.error-cv').html('<p >Upload doc/docx/pdf files only</p>');                               return false;            }            if(fuData2.files && fuData2.files[0]){                    var size=fuData.files[0].size;                    if(size > 1200000){                        $('.error-cv').html('<p>Please upload a doc/docx/pdf file less than 2MB </p>');                                         return false;                 }             }                    }         if(editor.trim() == ""){            $('.error-editor').html('<p >Please enter a valid address.</p>');            return false;        }        if(editor1.trim() == ""){            $('.error-cover').html('<p >Please enter a valid cover letter.</p>');            return false;        }        thisform.submit();    }    function validateEmail(emailID)    {        var atpos = emailID.indexOf("@");        var dotpos = emailID.lastIndexOf(".");        if (atpos < 1 || (dotpos - atpos < 2))        {            return false;        }        return(true);    }</script>			