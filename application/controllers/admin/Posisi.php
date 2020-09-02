<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Posisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("posisi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["posisi"] = $this->posisi_model->getAll();
        $this->load->view("admin/posisi/list", $data);
    }

    public function add()
    {
        $posisi = $this->posisi_model;
        $validation = $this->form_validation;
        $validation->set_rules($posisi->rules());
        $data["tim"] = $posisi->tim();
        $data["player"] = $posisi->player();
        $this->load->view('admin/posisi/new_form', $data);
        if ($validation->run()) {
            $posisi->save();
            redirect(site_url('admin/posisi'));
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/posisi');
        $posisi = $this->posisi_model;
        $validation = $this->form_validation;
        $validation->set_rules($posisi->rules());
        $data["tim"] = $posisi->tim();
        $data["player"] = $posisi->player();
        $data["posisi"] = $posisi->getById($id);
        $this->load->view('admin/posisi/edit_form', $data);

        if ($validation->run()) {
            $posisi->update();
            redirect(site_url('admin/posisi'));
        }
        if (!$data["posisi"]) show_404();
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->posisi_model->delete($id)) {
            redirect(site_url('admin/posisi'));
        }
    }
}
