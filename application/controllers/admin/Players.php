<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Players extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("player_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["players"] = $this->player_model->getAll();
        $this->load->view("admin/players/list", $data);
    }

    public function add()
    {
        $player = $this->player_model;
        $validation = $this->form_validation;
        $validation->set_rules($player->rules());
        $data["registrasi1"] = $player->registrasi1();
        $data["pulau"] = $player->pulau();
        //  $data["provinsi"] = $player->provinsi();
        $this->load->view('admin/players/new_form', $data);
        if ($validation->run()) {
            $player->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/players'));
        }

        //  $this->load->view("admin/achievement/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/players');
        $player = $this->player_model;
        $validation = $this->form_validation;
        $validation->set_rules($player->rules());
        $data["registrasi1"] = $player->registrasi1();
        $data["pulau"] = $player->pulau();
        $data["player"] = $player->getById($id);
        $this->load->view("admin/players/edit_form", $data);
        if ($validation->run()) {
            $player->update();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/players'));
        }


        if (!$data["player"]) show_404();
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->player_model->delete($id)) {
            redirect(site_url('admin/players'));
        }
    }

    public function ApiPulau()
    {
        $id = $_POST['pulau_id'];
        $data = $this->player_model->cariProvinsi($id);
        echo "<option value=''>-PILIH PROVINSI-</option>";
        foreach ($data as $a) {
            echo "
                <option value=" . $a->provinsi_id . ">" . $a->provinsi_nama . "</option>
            ";
        }
    }
    public function ApiKota()
    {
        $id = $_POST['kota_id'];
        $data = $this->player_model->cariKota($id);
        echo "<option value=''>-PILIH KOTA-</option>";
        foreach ($data as $a) {
            echo "
            <option value='" . $a->kota_nama . "'>" . $a->kota_nama . "</option>
        ";
        }
    }
}
