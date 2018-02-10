 <!-- Main sidebar -->
<div class="sidebar sidebar-main">
        <div class="sidebar-content">

                <!-- User menu -->
            <div class="sidebar-user">
                    <div class="category-content">
                            <div class="media">
                                    <a href="#" class="media-left"><img src="<?php echo base_url('assets/images/placeholder.jpg'); ?>" class="img-circle img-sm" alt=""></a>
                                    <div class="media-body">
                                            <span class="media-heading text-semibold"><?php echo SITE_NAME; ?></span>
                                            <div class="text-size-mini text-muted">
                                             &nbsp;<?php echo SITE_SLOGAN; ?>
                                            </div>
                                    </div>


                            </div>
                    </div>
            </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">

                                        <!-- Main -->
                                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>

                                        <li class="<?php
                                            if ($this->uri->segment(1) == "sitemanager" && $this->uri->segment(2) == "") {
                                                echo 'active';
                                            }
                                            ?>"><a href="<?php echo base_url('sitemanager'); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>


                                        <li class="<?php
                                            if ($this->uri->segment(2) == "match") {
                                                echo 'active';
                                            }
                                            ?>" > <a href="<?php echo base_url('sitemanager/match'); ?>"><i class="icon-list-unordered"></i> <span>Matches</span></a></li>
                                        <li class="<?php
                                            if ($this->uri->segment(2) == "player") {
                                                echo 'active';
                                            }
                                            ?>" > <a href="<?php echo base_url('sitemanager/player'); ?>"><i class=" icon-users"></i> <span>Players</span></a></li>
                                        <li class="<?php
                                            if ($this->uri->segment(2) == "team") {
                                                echo 'active';
                                            }
                                            ?>" > <a href="<?php echo base_url('sitemanager/team'); ?>"><i class="   icon-files-empty"></i> <span>Teams</span></a></li>
                                        
                                        <!-- /main -->
                                        
                                        
                                        <!-- Settings -->
                                        <li class="navigation-header"><span>Settings</span> <i class="icon-menu" title="Settings"></i></li>
                                        <li class="<?php
                                            if ($this->uri->segment(2) == "change_password") {
                                                echo 'active';
                                            }
                                            ?>"><a href="<?php echo base_url('sitemanager/change_password'); ?>"><i class="icon-key"></i> <span>Change Password</span></a></li>
                                        <li class=""><a href="<?php echo base_url('sitemanager/logout'); ?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>

                                        <!-- /Settings -->



                                </ul>
                        </div>
                </div>
                <!-- /main navigation -->

        </div>
</div>
<!-- /main sidebar -->
