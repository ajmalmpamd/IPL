<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo SITE_NAME . ' | ';
            echo isset($title) ? $title : ''; ?></title>

        <!--responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/css/core.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/css/components.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/css/colors.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets/css/admin.css'); ?>" rel="stylesheet" type="text/css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('assets/js/html5shiv.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
        <![endif]-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js'); ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js'); ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js'); ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js'); ?>"></script> 

        <!-- Theme JS files -->
        <?php /* <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/visualization/d3/d3.min.js');?>"></script>
         *  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/styling/switchery.min.js');?>"></script>
          <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/visualization/d3/d3_tooltip.js');?>"></script> */ ?>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/editors/summernote/summernote.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/styling/uniform.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/selects/bootstrap_multiselect.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery_ui/interactions.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery_ui/widgets.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery_ui/effects.min.js'); ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/pickers/pickadate/picker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/ui/moment/moment.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/pickers/daterangepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/selects/select2.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/pages/editor_summernote.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/pages/form_inputs.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/pages/jqueryui_forms.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/pages/form_select2.js'); ?>"></script>
<?php /* <script type="text/javascript" src="<?php echo base_url('assets/js/pages/dashboard.js');?>"></script> */ ?>


        <!-- /theme JS files -->



    </head>
    <body>


        <?php
        if (isset($top)) {
            echo $top;
        }
        ?>
        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">
                <!-- left nav -->
<?php
if (isset($left_nav)) {
    echo $left_nav;
}
?>


                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Page header -->
                    <div class="page-header page-header-default">

                    <?php
                    if (isset($page_header)) {
                        echo $page_header;
                    }
                    ?>
                    </div>
                    <!-- /page header -->
                        <?php
                        if (isset($notify)) {
                            echo $notify;
                        }
                        ?>

                    <!-- Content area -->
                    <div class="content">
                        <?php
                        if (isset($content)) {
                            echo $content;
                        }
                        ?>

<?php
if (isset($datepicker)) {
    echo $datepicker;
}
?>
<?php
if (isset($page_script)) {
    echo $page_script;
}
?>
<?php
if (isset($bottom_script)) {
    echo $bottom_script;
}
?>

                        <!-- Footer -->
                        <div class="footer text-muted">
                            &copy; <?php echo date('Y'); ?>. <a href="#"><?php echo SITE_NAME; ?></a>
                        </div>
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->
    </body>
</html>