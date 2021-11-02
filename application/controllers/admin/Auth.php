<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser', 'user');
    }
    
    public function index()
    {
       
        $data = array (
            'page_title' => 'Login'
        );

        $this->load->view('admin/auth/login', $data, FALSE);
        
    }

    public function validasi(){

        // validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // getUsername and password
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        if ($this->form_validation->run() == FALSE) {
            $msg = [
                'error' => [
                    'username' => form_error($username),
                    'password' => form_error($password)
                ]
            ];
        } else {
            //cek user
            $query_cekuser = $this->db->query("SELECT * FROM user WHERE username='$username'");

            $result = $query_cekuser->result();

            if (count($result) > 0) {
                $row = $query_cekuser->row();
                $password_user = $row->password;

                if (password_verify($password, $password_user)) {
                    if ($row->active == 1) {
                        $sess_save = [
                            'login' => true,
                            'user_id' => $row->user_id,
                            'username' => $username,
                            'nama'  => $row->nama,
                            'foto'  => $row->foto,
                            'level' => $row->level,
                        ];

                        $this->session->set_userdata($sess_save);

                        $msg = [
                            'sukses' => [
                                'link' => 'dashboard'
                            ]
                        ];
                    } else {
                        $msg = [
                            'nonactive' => [
                                'nonactive' => 'User tidak aktif!'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'password' => 'Password salah!'
                        ]
                    ];
                }
            } else {
                $msg = [
                    'error' => [
                        'username' => 'User tidak ditemukan!'
                    ]
                ];
            }

            echo json_encode($msg);
        }
    }

    public function logout()
    {
        
        $this->session->sess_destroy();
    
        $data = [
            'respond'   => 'success',
            'message'   => 'Anda berhasil logout!'
        ];

        echo json_encode($data);
    }
}

/* End of file Auth.php */
