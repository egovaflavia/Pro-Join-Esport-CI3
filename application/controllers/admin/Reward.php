<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reward extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("reward_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["rewards"] = $this->reward_model->getAll();
        $this->load->view("admin/reward/list", $data);
    }

    public function add()
    {
        $reward = $this->reward_model;
        $validation = $this->form_validation;
        $validation->set_rules($reward->rules());
        if ($validation->run()) {
            $reward->save();
            redirect(site_url('admin/reward'));
        }
        $this->load->view("admin/reward/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/rewards');

        $reward = $this->reward_model;
        $validation = $this->form_validation;
        $validation->set_rules($reward->rules());

        if ($validation->run()) {
            $reward->update();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/reward'));
        }

        $data["reward"] = $reward->getById($id);
        if (!$data["reward"]) show_404();

        $this->load->view("admin/reward/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->reward_model->delete($id)) {
            redirect(site_url('admin/reward'));
        }
    }
}
