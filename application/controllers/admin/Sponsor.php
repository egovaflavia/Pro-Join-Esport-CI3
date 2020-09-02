<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sponsor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("sponsor_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["sponsors"] = $this->sponsor_model->getAll();
        $this->load->view("admin/sponsor/list", $data);
    }

    public function add() 
    {
        $sponsor = $this->sponsor_model;
        $validation = $this->form_validation;
        $validation->set_rules($sponsor->rules());

        if ($validation->run()) {
            $sponsor->save();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/sponsor'));
        }

        $this->load->view("admin/sponsor/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/sponsor');

        $sponsor = $this->sponsor_model;
        $validation = $this->form_validation;
        $validation->set_rules($sponsor->rules());

        if ($validation->run()) {
            $sponsor->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/sponsor'));
        }

        $data["sponsor"] = $sponsor->getById($id);
        if (!$data["sponsor"]) show_404();

        $this->load->view("admin/sponsor/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->sponsor_model->delete($id)) {
            redirect(site_url('admin/sponsor'));
        }
    }
}
