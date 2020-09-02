<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarteam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tim_fmodel");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());

        if ($validation->run()) {
            $tim->save();
            $tes = $tim->tim_jenis;
            //$this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url($tes . '/team'));
        }
        $data["player"]=$tim->get_by_role1();
        $data["pulau"] = $tim->pulau();
        $this->template->load('vhome', 'components/daftarteam', $data);

    }
    public function ApiPulau()
    {
        $id = $_POST['pulau_id'];
        $data = $this->tim_fmodel->cariProvinsi($id);
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
        $data = $this->tim_fmodel->cariKota($id);
        echo "<option value=''>-PILIH KOTA-</option>";
        foreach ($data as $a) {
            echo "
            <option value='" . $a->kota_nama . "'>" . $a->kota_nama . "</option>
        ";
        }
    }
}
