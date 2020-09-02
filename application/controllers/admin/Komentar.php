<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("komentar_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["komentars"] = $this->komentar_model->getAll();
        $this->load->view("admin/komentar/list", $data);
    }

    public function add()
    {
        $komentar = $this->komentar_model;
        $validation = $this->form_validation;
        $validation->set_rules($komentar->rules());
        $data["komentar1"] = $komentar->idtournament();
        $this->load->view('admin/komentar/new_form', $data);
        if ($validation->run()) {
            $komentar->save();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/komentar'));
        }

        // $this->load->view("admin/komentar/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/komentars');

        $komentar = $this->komentar_model;
        $validation = $this->form_validation;
        $validation->set_rules($komentar->rules());
        $data["komentar"] = $komentar->getById($id);
        $data["komentar1"] = $komentar->idtournament();
        $this->load->view("admin/komentar/edit_form", $data);
        if ($validation->run()) {
            $komentar->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/komentar'));
        }

        //  $data["komentar"] = $komentar->getById($id);
        if (!$data["komentar"]) show_404();

        // $this->load->view("admin/komentar/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->komentar_model->delete($id)) {
            redirect(site_url('admin/komentar'));
        }
    }
}
