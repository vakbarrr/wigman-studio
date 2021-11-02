<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array();

        $this->template->set('title', 'Dashboard');
        $this->template->load('default', 'contents', 'admin/dashboard', $data);
    }

}

/* End of file Dashboard.php */
