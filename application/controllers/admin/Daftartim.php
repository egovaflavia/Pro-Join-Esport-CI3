<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftartim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("daftartim_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["daftartims"] = $this->daftartim_model->getAll();
        $this->load->view("admin/daftartim/list", $data);
    }

    public function add()
    {
        $daftartim = $this->daftartim_model;
        $validation = $this->form_validation;
        $validation->set_rules($daftartim->rules());
        $data["daftartim3"] = $daftartim->get_by_role1();
        $this->load->view('admin/daftartim/new_form', $data);
        if ($validation->run()) {
            $daftartim->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/daftartim'));
        }
        //  $this->load->view("admin/daftartim/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/daftartim');

        $daftartim = $this->daftartim_model;
        $validation = $this->form_validation;
        $validation->set_rules($daftartim->rules());
        $data["daftartim3"] = $daftartim->get_by_role1();
        $data["daftartims"] = $this->daftartim_model->getAll();

        if ($validation->run()) {
            $daftartim->update();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/daftartim'));
        }

        $data["daftartim"] = $daftartim->getById($id);
        if (!$data["daftartim"]) show_404();

        $this->load->view("admin/daftartim/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->daftartim_model->delete($id)) {
            redirect(site_url('admin/daftartim'));
        }
    }
}
