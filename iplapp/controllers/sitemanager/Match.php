<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');class Match extends MY_Controller {    public $tmpl_path;    public $sec_path;    public $img_arr;    public function __construct() {        parent::__construct();        $this->load_modelslib();        $this->init_vars();        $this->load->helper('text');    }    public function load_modelslib() {        $this->load->model('M_match');    }    public function init_vars() {        $this->tmpl_path = 'admin/layout/template';        $this->sec_path = 'admin/match';        $this->redir_path = 'sitemanager/match';        $this->imagepath = 'assets/images/match';        $this->controller = 'sitemanager/match';        $this->title = 'Match';        $this->logname = 'match';    }    public function index() {        $this->has_access(); // Checking admin authentication -> core/MY_Controller.php        $nav_links = "<li><a href='#'>$this->title</a></li>";        $hrdata = array(            'title' => $this->title,            'sub_title' => $this->title,            'plus_link' => "$this->controller/add",            'controller' => $this->controller,            'imagepath' => $this->imagepath,        );        $content = array();        $total_row = $this->M_match->recordCount(); // Returns total number of records        $this->config->load('pagination');        $config["total_rows"] = $total_row;        $config["per_page"] = 25;        $config["base_url"] = base_url() . '/' . $this->redir_path;        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;        $this->pagination->initialize($config);        $data = $this->template->set_template_admin($this->adm_name, $hrdata, $nav_links, '');        $content['result'] = $this->M_match->read($config["per_page"], $page);        $content['page'] = $page;        $content['pagination'] = $this->pagination->create_links();        $content['hrdata'] = $hrdata;        $data['content'] = $this->load->view($this->sec_path . '/index.php', $content, true);        $this->load->view($this->tmpl_path, $data);    }    public function add() {        $this->has_access();        $content = array();        $nav_links = "<li><a href='" . base_url($this->controller) . "'>$this->title </a></li>        <li class='active'>Add</li>";                $team_config['table']='team';        $team_config['condition']['status']='Y';        $teams=$this->M_common->getDatas($team_config);        $team['0']='Select a Team';        foreach ($teams as $team_val){            $team[$team_val['id']]=$team_val['name'];        }                $hrdata = array(            'title' => $this->title,            'sub_title' => 'Add ' . $this->title,            'back_link' => $this->controller,            'controller' => $this->controller,            'imagepath' => $this->imagepath,            'team'   =>$team,        );        $this->form_validation->set_rules('date', 'Date', 'trim|required|callback_valid_date');        $this->form_validation->set_rules('home_team', 'Home Team', 'trim|integer|required|callback_check_zero');        $this->form_validation->set_rules('away_team', 'Away Team', 'trim|integer|required|callback_check_zero|callback_is_same['.$this->input->post('home_team').']');                if ($this->form_validation->run() != false) {                        $insert_data = array(                'date' => date('Y-m-d',strtotime($this->input->post('date'))),                'home_team' => $this->input->post('home_team'),                                'away_team' => $this->input->post('away_team'),            );            $insert = $this->M_match->insert($insert_data);            $this->M_log->insert_log("add_$this->logname", "Admin Added $this->title", $this->adm_id, $insert);            $this->M_notify->set_notification("$this->title Added Successully", 'success');            redirect($this->redir_path);        }        $data = $this->template->set_template_admin($this->adm_name, $hrdata, $nav_links, '');        $data['content'] = $this->load->view($this->sec_path . '/add.php', $sdata = array('hrdata' => $hrdata), true);        $this->load->view($this->tmpl_path, $data);    }        public function edit($id) {                $this->has_access();        $content = array();        $content['editdata'] = $this->M_match->getRow($id);        if (!$id > 0 || empty($content['editdata'])) {            $this->M_notify->set_notification('Requested Content not found', 'error');            redirect($this->redir_path);            die();        }        $nav_links = "<li><a href='#'> $this->title </a></li>        <li class='active'>Edit</li>";        $team_config['table']='team';        $team_config['condition']['status']='Y';        $teams=$this->M_common->getDatas($team_config);        $team['0']='Select a Team';        foreach ($teams as $team_val){            $team[$team_val['id']]=$team_val['name'];        }        $hrdata = array(            'title' => $this->title,            'sub_title' => 'Edit ' . $this->title,            'back_link' => $this->controller,            'controller' => $this->controller,            'imagepath' => $this->imagepath,            'team'   =>$team,        );        $this->form_validation->set_rules('date', 'Date', 'trim|required|callback_valid_date');        $this->form_validation->set_rules('home_team', 'Home Team', 'trim|integer|required|callback_check_zero');        $this->form_validation->set_rules('away_team', 'Away Team', 'trim|integer|required|callback_check_zero|callback_is_same['.$this->input->post('home_team').']');        if ($this->form_validation->run() != false) {            $update_data = array(               'date' => date('Y-m-d',strtotime($this->input->post('date'))),                'home_team' => $this->input->post('home_team'),                                'away_team' => $this->input->post('away_team'),            );            $update = $this->M_match->update($update_data, $id);            $this->M_log->insert_log("upd_$this->logname", "Admin Updated $this->title", $this->adm_id, $id);            $this->M_notify->set_notification("$this->title Updated Successully", 'success');            redirect($this->redir_path);        }        $data = $this->template->set_template_admin($this->adm_name, $hrdata, $nav_links, '');        $content['hrdata'] = $hrdata;        $data['content'] = $this->load->view($this->sec_path . '/edit.php', $content, true);        $this->load->view($this->tmpl_path, $data);    }        public function image_upload($image, $image_field = 'image') {        $img_ext = explode('.', $image);        $img_upl_name = 'p' . get_rand_number() . '.' . end($img_ext);        $upl_path = $this->imagepath;         $img_full_path = $upl_path . $img_upl_name;        $mksubdir = $this->imagepath;        if (!is_dir($mksubdir)) {            mkdir($mksubdir);        }        $config['upload_path'] = $upl_path;        $config['allowed_types'] = 'jpg|jpeg|png|gif';        $config['file_name'] = $img_upl_name;        //Load upload library and initialize configuration        $this->load->library('upload', $config);        $this->upload->initialize($config);        if ($this->upload->do_upload($image_field)) {            return $img_upl_name;        }    }    public function delimg($id = 0) {        $this->has_access();        $del_img = $this->M_match->delImg($this->imagepath, $id);        $this->M_notify->set_notification('Image deleted successfully', 'success');        redirect($this->redir_path . '/edit/' . $id);    }    public function delete($id) {        $this->has_access();        if (!$id > 0) {            $this->M_notify->set_notification('Requested Content not found', 'error');            redirect($this->redir_path);            die();        }        $this->M_match->delete($this->imagepath, $id);        $this->M_log->insert_log("del_$this->logname", "Admin Deleted $this->title", $this->adm_id, $id);        $this->M_notify->set_notification("$this->title deleted successfully", 'success');        redirect($this->redir_path);    }    function check_zero($x) {        if ($x > 0) {           return true;        } else {             $this->form_validation->set_message('check_zero', 'Please enter a valid {field}.');            return false;                    }    }    function is_same($x, $y) {        if ($x !=$y) {           return true;        } else {             $this->form_validation->set_message('is_same', 'Home Team could not be Away Team.');            return false;                    }    }    function valid_date($date) {        if (preg_match("/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/",$date)) {           return true;        } else {             $this->form_validation->set_message('valid_date', '{field} must be in MM/DD/YYYY format');            return false;                    }    }}