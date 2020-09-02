<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bracket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bracket_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["brackets"] = $this->bracket_model->getAll();
        $this->load->view("admin/bracket/list", $data);
    }

    public function add()
    {
        $bracket = $this->bracket_model;
        $validation = $this->form_validation;
        $validation->set_rules($bracket->rules());
        $data["bracket1"] = $bracket->tournamentid();
        $this->load->view('admin/bracket/new_form', $data);

        if ($validation->run()) {
            $bracket->save();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/bracket'));
        }

        // $this->load->view("admin/bracket/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/brackets');

        $bracket = $this->bracket_model;
        $validation = $this->form_validation;
        $validation->set_rules($bracket->rules());
        $data["bracket1"] = $bracket->tournamentid();
        $data["bracket"] = $bracket->getById($id);
        $this->load->view("admin/bracket/edit_form", $data);
        if ($validation->run()) {
            $bracket->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/bracket'));
        }
        if (!$data["bracket"]) show_404();
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->bracket_model->delete($id)) {
            redirect(site_url('admin/bracket'));
        }
    }
}
