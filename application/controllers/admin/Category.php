<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('admin/auth');
        }
        $this->load->model('ModelCategory', 'category');
    }
    
    public function index()
    {
        $data = [
            'page_title' => 'Category'
        ];

        $this->template->set('title', 'Category');
        $this->template->load('default', 'contents','admin/category/index', $data);
    }

    public function list()
    {
        $list = $this->category->get_datatables();
        $data = array();
        foreach ($list as $category) {
            $row = array();
            $row[] = $category->category_id;
            $row[] = $category->category_name;
            $row[] = $category->updated_on;

            //add html for action
            $row[] = 
            "<a class='btn btn-sm btn-primary' href='javascript:void(0)' title='Edit' onclick=\"edit_category('{$category->category_id}')\"><i class='fa fa-edit'></i> Edit</a>"
            . " <a class='btn btn-sm btn-danger' href='javascript:void(0)' title='Hapus' onclick=\"delete_category('{$category->category_id}')\"><i class='fa fa-trash'></i> Delete</a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->category->count_all(),
            "recordsFiltered" => $this->category->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    private function _validate()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|min_length[2]|max_length[30]');
    }

    public function add()
    {
        $this->validation_for = 'add';
        $data = array();
        $data['status'] = TRUE;

        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'category_name'     => form_error('category_name'),
            );
            $data = array(
                'status'         => FALSE,
                'errors'         => $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $insert = array(
                'category_name' => $this->input->post('category_name'),
                'created_on' => date('Y-m-d H:i:s'),
                'updated_on' => date('Y-m-d H:i:s'),
            );
            $insert = $this->category->save($insert);
            $data['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }


    public function edit($id)
    {
        $data = $this->category->get_by_id($id);
        echo json_encode($data);
    }

    public function update()
    {
        $this->validation_for = 'update';
        $data = array();
        $data['status'] = TRUE;

        $this->_validate();

        if ($this->form_validation->run() == FALSE) {
            $errors = array(
                'category_name'     => form_error('category_name'),
            );
            $data = array(
                'status'         => FALSE,
                'errors'         => $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $update = array(
                'category_name' => $this->input->post('category_name'),
                'updated_on' => date('Y-m-d H:i:s'),
            );
            $this->category->update(array('category_id' => $this->input->post('category_id')), $update);
            $data['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function delete($id)
    {
        $this->category->delete_by_id($id);
        $data['status'] = TRUE;
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

}

/* End of file Blog.php */
