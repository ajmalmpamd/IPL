<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME .' | ';echo isset($title)? $title:''; ?></title>

<!--responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<!-- Bootstrap -->
<link href="<?php echo base_url('assets/css/icons/icomoon/styles.css');?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrapmin.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css');?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/responsive-tabs.css');?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/style1.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/slick.css');?>" />
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="<?php echo base_url('assets/js/html5shiv.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/respond.min.js');?>"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js');?>"></script> 
<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js');?>"></script>
<!--<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script> -->
<script src="<?php echo base_url('assets/js/jquery.responsiveTabs.js');?>"></script>
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>


</head>
<body>
            <nav class="navbar  navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle"
  data-toggle="collapse"
  data-target=".navbar-collapse"
  >
  <span class="sr-only"> Toggle navigation</span>
  <span class="icon-bar"> </span>
  <span class="icon-bar"> </span>
  <span class="icon-bar"> </span>
  </button>
  
      <a class="navbar-brand" href="<?php echo base_url();?>"> <img class="img-responsive mr-t0" style="height: 50px;" alt="" src="<?php echo base_url('assets/images/logo.png');?>"></a>
   
       <div class="navbar-collapse collapse">
           
       </div>
  </div>
</nav>
<?php if(isset($content)) {
              echo $content;
                }?>


	    

<script>
$('#responsiveTabsDemo').responsiveTabs({
    startCollapsed: 'accordion'
});

 
</script>

</body>
</html>