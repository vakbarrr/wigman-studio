<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {   
        parent::__construct();
        if (!$_SESSION['user_id']) {
            return redirect('admin/auth');
        }
    }
    
    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        $data = array(
            'page_title' => 'Dashboard admin'
        );

        $this->template->set('title', 'Dashboard');
        $this->template->load('default', 'contents', 'admin/dashboard', $data);
    }

}

/* End of file Dashboard.php */
