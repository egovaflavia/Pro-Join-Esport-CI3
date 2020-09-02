<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bagan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bagan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["bagans"] = $this->bagan_model->getAll();
        $this->load->view("admin/bagan/list", $data);
    }

    public function add()
    {
        $bagan = $this->bagan_model;
        $validation = $this->form_validation;
        $validation->set_rules($bagan->rules());
        $data["tournament"] = $bagan->gettournament();
        $this->load->view('admin/bagan/new_form', $data);

        if ($validation->run()) {
            $bagan->save();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/bagan'));
        }

        //  $this->load->view("admin/bagan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/bagans');

        $bagan = $this->bagan_model;
        $validation = $this->form_validation;
        $validation->set_rules($bagan->rules());
        $data["tournament"] = $bagan->gettournament();
        //$data["bagan1"] = $bagan->tim();
        $data["bagan"] = $bagan->getById($id);
        if ($validation->run()) {
            $bagan->update(); 
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/bagan'));
        }
        if (!$data["bagan"]) show_404(); 
         $this->load->view("admin/bagan/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->bagan_model->delete($id)) {
            redirect(site_url('admin/bagan'));
        }
    }

    public function ApiTim()
    {
        $id = $_POST['tournamentid'];
        $data = $this->bagan_model->cariTim($id);

        echo "<option value=''>-PILIH TIM-</option>";
        foreach ($data as $a) {
            echo "
                <option value=" . $a->tim_id . ">" . $a->tim_nama . "</option>
            ";
        }
    }
    public function ApiTim2()
    {
        $id = $_POST['tournamentid'];
        $data = $this->bagan_model->cariTim($id);

        echo "<option value=''>-PILIH TIM-</option>";
        foreach ($data as $a) {
            echo "
                <option value=" . $a->tim_id . ">" . $a->tim_nama . "</option>
            ";
        }
    }
}
