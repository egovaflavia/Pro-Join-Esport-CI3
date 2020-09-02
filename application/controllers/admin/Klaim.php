<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Klaim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("klaim_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["klaims"] = $this->klaim_model->getAll();
        $this->load->view("admin/klaim/list", $data);
    }

    public function add()
    {
        $klaim = $this->klaim_model;
        $validation = $this->form_validation;
        $validation->set_rules($klaim->rules());
        $data["regis"] = $klaim->regis();
        $this->load->view("admin/klaim/new_form", $data);
        if ($validation->run()) {
            $klaim->save();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/klaim'));
        }

        // $this->load->view("admin/klaim/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/klaims');

        $klaim = $this->klaim_model;
        $validation = $this->form_validation;
        $validation->set_rules($klaim->rules());
        $data["regis"] = $klaim->regis();
        $data["klaim"] = $klaim->getById($id);
        $this->load->view("admin/klaim/edit_form", $data);
        if ($validation->run()) {
            $klaim->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/klaim'));
        }


        if (!$data["klaim"]) show_404();
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->klaim_model->delete($id)) {
            redirect(site_url('admin/klaim'));
        }
    }
}
