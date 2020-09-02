<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Achievement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("achievement_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["achievements"] = $this->achievement_model->getAll();
        $this->load->view("admin/achievement/list", $data);
    }

    public function add()
    {
        $achievement = $this->achievement_model;
        $validation = $this->form_validation;
        $validation->set_rules($achievement->rules());
        $data["tournament"] = $achievement->tournament();
        $this->load->view('admin/achievement/new_form', $data);
        if ($validation->run()) {
            // var_dump($achievement);
            // exit;
            $achievement->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/achievement'));
        }

        //  $this->load->view("admin/achievement/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/achievements');

        $achievement = $this->achievement_model;
        $validation = $this->form_validation;
        $validation->set_rules($achievement->rules());
        $data["achievement"] = $achievement->getById($id);
        $this->load->view("admin/achievement/edit_form", $data);
        if ($validation->run()) {
            $achievement->update();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/achievement'));
        }

        if (!$data["achievement"]) show_404();
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->achievement_model->delete($id)) {
            redirect(site_url('admin/achievement'));
        }
    }

    public function ApiTim()
    {
        $id = $_POST['tournamentid'];
        $data = $this->achievement_model->cariTim($id);

        echo "<option value=''>-PILIH TIM-</option>";
        foreach ($data as $a) {
            echo "
                <option value=" . $a->tim_id . ">" . $a->tim_nama . "</option>
            ";
        }
    }
    public function ApiPlayer()
    {
        $id = $_POST['player_id'];
        $data = $this->achievement_model->cariPlayer($id);
        echo "<option value=''>-PILIH PLAYER-</option>";
        foreach ($data as $a) {
            echo "
                <option value=" . $a->player_id . ">" . $a->player_nickname . "</option>
            ";
        }
    }
}
