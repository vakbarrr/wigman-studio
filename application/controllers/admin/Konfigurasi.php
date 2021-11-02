<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('auth/login');
        }
        $this->load->model('ModelKonfigurasi', 'konfigurasi');
        
    }

    public function output_json($data, $encode = true)
    {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index()
    {
    
        $data = [
            'data'             => $this->konfigurasi->list(),
            'page_title'       => 'Konfigurasi website'
        ];
        $this->template->set('title', 'Konfigurasi website');
        $this->template->load('default', 'contents', 'admin/konfigurasi/website', $data);
    }

    public function submit()
    {
        if ($this->input->is_ajax_request()) {
            
            $config = array([
                'nama_web' => [
                    'label' => 'Nama website',
                    'rules' => 'required|alpha_numeric_space',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'alpha_numeric_space' => 'Tidak boleh mengandung karakter unik',
                    ]
                ],
                'deskripsi' => [
                    'label' => 'Deskripsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'instagram' => [
                    'label' => 'Instagram',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'facebook' => [
                    'label' => 'Facebook',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'whatsapp' => [
                    'label' => 'Whatsapp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            
            if (!$config) {
                $msg = [
                    'error' => [
                        'nama_web'      => form_error('nama_web'),
                        'deskripsi'     => form_error('deskripsi'),
                        'instagram'     => form_error('instagram'),
                        'facebook'      => form_error('facebook'),
                        'whatsapp'      => form_error('whatsapp'),
                        'email'         => form_error('email'),
                        'alamat'        => form_error('alamat'),
                    ]
                ];
                
            } else {
                $data = [
                    'nama_web'     => $this->input->post('nama_web'),
                    'deskripsi'    => $this->input->post('deskripsi'),
                    'instagram'    => $this->input->post('instagram'),
                    'facebook'     => $this->input->post('facebook'),
                    'whatsapp'     => $this->input->post('whatsapp'),
                    'email'        => $this->input->post('email'),
                    'alamat'       => $this->input->post('alamat'),
                ];
                $konfigurasi_id = $this->input->post('konfigurasi_id');
                $this->db->where('konfigurasi_id', $konfigurasi_id);
                $this->db->update('konfigurasi',$data);
                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        }
    }

    

}

/* End of file Konfigurasi.php */
