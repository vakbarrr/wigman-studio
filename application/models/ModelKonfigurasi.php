<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKonfigurasi extends CI_Model {


    protected $table      = 'konfigurasi';
    protected $primaryKey = 'konfigurasi_id';
    protected $allowedFields = ['nama_web', 'deskripsi', 'visi', 'misi', 'instagram', 'facebook', 'whatsapp', 'email', 'alamat', 'logo', 'icon'];

    //backend
    public function list()
    {
        $this->db->order_by('konfigurasi_id', 'ASC');
       return $this->db->get('konfigurasi')->row();
    }

}

/* End of file ModelKonfigurasi.php */
