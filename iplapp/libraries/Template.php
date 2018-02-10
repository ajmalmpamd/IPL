<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    public $adm_path;
    public $site_path;
    public $usr_path;
    public $parame;

    public function __construct() {
        $this->ci = & get_instance();
        $this->adm_path = 'admin/layout/';
        $this->usr_path = 'user/layout/';
        $this->site_path = 'layout/';
        $this->cmp_path = 'company/layout/';
        

        $this->params = array(
            'scr-editor' => 'scr-editor',
            'popup' => 'popup',
        );
    }

    public function set_template($user = NULL, $hrdata = NULL, $nav_links = NULL, $extra = NULL) {
        $section = array();
        $page = array();
        $path = $this->site_path;

        $section['title'] = (isset($hrdata['title'])) ? $hrdata['title'] : 'Soogle | Online job portal';

        $section['user_logged'] = $user;

        if (isset($hrdata['header']) && $hrdata['header'] == 'Y') {
            $page['header_nav'] = $this->ci->load->view($path . 'header_nav.php', $section, true);
        } else if (isset($hrdata['banner']) && $hrdata['banner'] == 'Y') {
            $section['header_nav'] = $this->ci->load->view($path . 'header_nav.php', $section, true);
            $page['header_top'] = $this->ci->load->view($path . 'header_top.php', $section, true);
        } else {
            $page['header_top'] = $this->ci->load->view($path . 'header_nav.php', $section, true);
        }


        if (isset($hrdata['pagescript']) && $hrdata['pagescript'] == 'Y') {
            $section['pscript'] = explode(',', $hrdata['scriptitems']);
            $page['page_script'] = $this->ci->load->view($path . 'page_script.php', $section, true);
        }

        $page['footer'] = $this->ci->load->view($path . 'footer.php', '', true);


        if (isset($extra) && $extra != '') {
            foreach ($extra as $p => $tlpath) {
                $page['bottom_script'] = $this->ci->load->view($path . $this->params[$tlpath] . '.php', '', true);
            }
        }

        return $page;
    }

    public function set_template_user($user = NULL, $hrdata = NULL, $nav_links = NULL, $extra = NULL) {
        $path = $this->usr_path;
        $section['title'] = (isset($hrdata['title'])) ? $hrdata['title'] : '';
        $section['sub_title'] = (isset($hrdata['sub_title'])) ? $hrdata['sub_title'] : '';
        $section['user_logged'] = $user;
        if (isset($hrdata['pagescript']) && $hrdata['pagescript'] == 'Y') {
            $section['pscript'] = explode(',', $hrdata['scriptitems']);
            $page['page_script'] = $this->ci->load->view('layout/page_script.php', $section, true);
        }
        if (isset($hrdata['planner_nav']) && $hrdata['planner_nav'] == 'Y') {
            $page['planner_nav'] = $this->ci->load->view($path . 'planner_nav.php', $section, true);
        }


        $page['top_header'] = $this->ci->load->view($path . 'top_header.php', $section, true);
        $page['footer'] = $this->ci->load->view($path . 'footer.php', '', true);
        return $page;
    }

    public function set_template_admin($user = NULL, $hrdata = NULL, $nav_links = NULL, $extra = NULL) {
        $section = array();
        $page = array();
        $path = $this->adm_path;

        $section['title'] = (isset($hrdata['title'])) ? $hrdata['title'] : '';
        $section['sub_title'] = (isset($hrdata['sub_title'])) ? $hrdata['sub_title'] : '';
        

        $section['user_logged'] = $user;
        

        $page['left_nav'] = $this->ci->load->view($path . 'left_nav.php', $section, true);
        if (isset($hrdata['pagescript']) && $hrdata['pagescript'] == 'Y') {
            $section['pscript'] = explode(',', $hrdata['scriptitems']);
            $page['page_script'] = $this->ci->load->view('layout/page_script.php', $section, true);
        }
        $page['top'] = $this->ci->load->view($path . 'top.php', '', true);

        $section['nav_links'] = $nav_links;
        $section['plus_link'] = (isset($hrdata['plus_link'])) ? $hrdata['plus_link'] : '';
        $section['back_link'] = (isset($hrdata['back_link'])) ? $hrdata['back_link'] : '';
        $page['page_header'] = $this->ci->load->view($path . 'page-header.php', $section, true);
        $page['notify'] = $this->ci->load->view($path . 'notify.php', '', true);

        if (isset($extra) && $extra != '') {
            foreach ($extra as $p => $tlpath) {
                $page['bottom_script'] = $this->ci->load->view($path . $this->params[$tlpath] . '.php', '', true);
            }
        }
        

        return $page;
    }
     public function set_template_company($user = NULL, $hrdata = NULL, $nav_links = NULL, $extra = NULL) {
        $section = array();
        $page = array();
        $path = $this->cmp_path;

        $section['title'] = (isset($hrdata['title'])) ? $hrdata['title'] : '';
        $section['sub_title'] = (isset($hrdata['sub_title'])) ? $hrdata['sub_title'] : '';


        $section['user_logged'] = $user;
        $section['get_new_clients'] = $this->get_new_clients();
        $section['get_new_designers'] = $this->get_new_designers();

        $page['left_nav'] = $this->ci->load->view($path . 'left_nav.php', $section, true);
        if (isset($hrdata['pagescript']) && $hrdata['pagescript'] == 'Y') {
            $section['pscript'] = explode(',', $hrdata['scriptitems']);
            $page['page_script'] = $this->ci->load->view('layout/page_script.php', $section, true);
        }
        $page['top'] = $this->ci->load->view($path . 'top.php', '', true);

        $section['nav_links'] = $nav_links;
        $section['plus_link'] = (isset($hrdata['plus_link'])) ? $hrdata['plus_link'] : '';
        $section['back_link'] = (isset($hrdata['back_link'])) ? $hrdata['back_link'] : '';
        $page['page_header'] = $this->ci->load->view($path . 'page-header.php', $section, true);
        $page['notify'] = $this->ci->load->view($path . 'notify.php', '', true);

        if (isset($extra) && $extra != '') {
            foreach ($extra as $p => $tlpath) {
                $page['bottom_script'] = $this->ci->load->view($path . $this->params[$tlpath] . '.php', '', true);
            }
        }

        return $page;
    }

}
