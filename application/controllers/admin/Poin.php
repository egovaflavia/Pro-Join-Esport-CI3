<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Poin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("poin_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["poins"] = $this->poin_model->getAll();
        $this->load->view("admin/poin/list", $data);
    }

    public function add()
    {
        $poin = $this->poin_model;
        $validation = $this->form_validation;
        $validation->set_rules($poin->rules());

        $data["tournament"] = $poin->gettournament();
        $this->load->view('admin/poin/new_form', $data);
        if ($validation->run()) {
            $poin->save();
            redirect(site_url('admin/poin'));
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/poin');
        $poin = $this->poin_model;
        $validation = $this->form_validation;
        $validation->set_rules($poin->rules());
        $data["playertournament3"] = $poin->gettournament();
        $data["tournament"] = $poin->gettournament();
        $data["poin"] = $poin->getById($id);
        $this->load->view('admin/poin/edit_form', $data);

        if ($validation->run()) {
            $poin->update();
            redirect(site_url('admin/poin'));
        }


        if (!$data["poin"]) show_404();

        // $this->load->view("admin/poin/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->poin_model->delete($id)) {
            redirect(site_url('admin/poin'));
        }
    }

    public function ApiTim()
    {
        $id = $_POST['tournamentid'];
        $data = $this->poin_model->cariTim($id);

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
        $data = $this->poin_model->cariPlayer($id);
        echo "<option value=''>-PILIH PLAYER-</option>";
        foreach ($data as $a) {
            echo "
                <option value=" . $a->player_id . ">" . $a->player_nickname . "</option>
            ";
        }
    }
}
