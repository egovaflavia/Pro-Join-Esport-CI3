<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftartournament extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("daftartournament_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["daftartournaments"] = $this->daftartournament_model->getAll();
        $this->load->view("admin/daftartournament/list", $data);
    }

    public function add()
    {
        $daftartournament = $this->daftartournament_model;
        $validation = $this->form_validation;
        $validation->set_rules($daftartournament->rules());
        $data["daftartournament1"] = $daftartournament->get_by_role1();
        $data["daftartournament2"] = $daftartournament->get_by_role2();
        $data["daftartournament3"] = $daftartournament->get_by_role3();
        $this->load->view('admin/daftartournament/new_form', $data);
        if ($validation->run()) {
            // var_dump($daftartournament);
            // exit;
            $daftartournament->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/daftartournament'));
        }

        //  $this->load->view("admin/daftartournament/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/daftartournaments');

        $daftartournament = $this->daftartournament_model;
        $validation = $this->form_validation;
        $validation->set_rules($daftartournament->rules());
        $data["daftartournament1"] = $daftartournament->get_by_role1();
        $data["daftartournament2"] = $daftartournament->get_by_role2();
        $data["daftartournament3"] = $daftartournament->get_by_role3();
        if ($validation->run()) {
            $daftartournament->update();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/daftartournament'));
        }

        $data["daftartournament"] = $daftartournament->getById($id);
        if (!$data["daftartournament"]) show_404();

        $this->load->view("admin/daftartournament/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->daftartournament_model->delete($id)) {
            redirect(site_url('admin/daftartournament'));
        }
    }
}
