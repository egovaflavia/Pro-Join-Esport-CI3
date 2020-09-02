<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("registrasi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $registrasi = $this->registrasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());
        $data["pulau"] = $registrasi->pulau();

        if ($validation->run()) {
            $registrasi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->template->load('vhome', 'components/register', $data);
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
