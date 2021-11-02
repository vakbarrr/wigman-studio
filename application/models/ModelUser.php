<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model {

    protected $table      = 'user ';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'nama', 'email', 'password', 'foto', 'level', 'active'];

    //backend
    public function list()
    {
        return $this->db->get('user')
            ->orderBy('user_id', 'ASC')
            ->get()->getResultArray();
    }

    public function getaktif()
    {
        return $this->db->get('user')
            ->like('active', '1')
            ->orderBy('user_id', 'ASC')
            ->get()->getResultArray();
    }

    public function getnonaktif()
    {
        return $this->db->get('user')
            ->where('active', 0)
            ->orderBy('user_id', 'ASC')
            ->get()->getResultArray();
    }

}

/* End of file ModelUser.php */
