<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?php echo SITE_ADMIN ;?></title>

<!-- Bootstrap -->
<link href="<?php echo base_url('assets/css/icons/icomoon/styles.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/core.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/components.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/colors.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/admin.css');?>" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="<?php echo base_url('assets/js/html5shiv.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/respond.min.js');?>"></script>
<![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js');?>"></script> 

</head>
<body>
<section class="content-wrapper login-bg">
  <div class="login-wrap">
    <div class="container">
      <div class="row">
        <div class=" max-w-300 mt-100 m-auto">
          <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <img src="<?php echo base_url('assets/images/logo.png');?>"  alt="<?php echo SITE_ADMIN ;?>" class="img-responsive"/>
              <h1 class="panel-title"></h1>
            </div>
            <div class="panel-body">
             <h2>Sign In</h2>
             <?php if ( $this->session->flashdata('message') ) : ?>
                <div class="alert-<?php echo $this->session->flashdata('msg_class'); ?>">
                <?php echo $this->session->flashdata('message'); ?>
                </div>

              <?php endif; ?> 
             
             <form role="form" method="post">
                <fieldset>
                  <div class="form-group">
                    <div class="input-group"> 
                        <input type="text" name="username" value="<?php if(isset($username)) { echo $username; } ?>" class="form-control" placeholder="Username" >
                        <span class="input-group-addon" id=""><i class="icon-user"></i></span>
                        
                    </div>
                      <div class='error text-danger'><?php echo form_error('username'); ?> </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"> 
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                      <span class="input-group-addon" id=""><i class=" icon-lock2"></i></span>
                      
                    </div>
                      <div class='error text-danger'><?php echo form_error('password'); ?> </div>
                  </div>
                 
                  <!-- Change this to a button or input when using this as a form -->
                  <div class="row">
                      
                    <div class="col-md-6"><input type="submit" name="login" value="Login" class="btn btn-primary btn-block" /> </div>
                    
                  </div>
                  
                  
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>