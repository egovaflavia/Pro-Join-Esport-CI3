<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("registrasi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["registrasis"] = $this->registrasi_model->getAll();
        $this->load->view("admin/registrasi/list", $data);
    }

    public function add()
    {
        $registrasi = $this->registrasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());
        $data["pulau"] = $registrasi->pulau();
        //  $data["provinsi"] = $registrasi->provinsi();

        $this->load->view('admin/registrasi/new_form', $data);
        if ($validation->run()) {
            $registrasi->save();
            // $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/registrasi'));
        }
        //  $this->load->view("admin/achievement/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/registrasis');
        $registrasi = $this->registrasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());
        $data["pulau"] = $registrasi->pulau();
        if ($validation->run()) {
            $registrasi->update();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/registrasi'));
        }

        $data["registrasi"] = $registrasi->getById($id);
        if (!$data["registrasi"]) show_404();

        $this->load->view("admin/registrasi/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->registrasi_model->delete($id)) {
            redirect(site_url('admin/registrasi'));
        }
    }

    public function ApiPulau()
    {
        $id = $_POST['pulau_id'];
        $data = $this->registrasi_model->cariProvinsi($id);
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
        $data = $this->registrasi_model->cariKota($id);
        echo "<option value=''>-PILIH KOTA-</option>";
        foreach ($data as $a) {
            echo "
            <option value='" . $a->kota_nama . "'>" . $a->kota_nama . "</option>
        ";
        }
    }
}
