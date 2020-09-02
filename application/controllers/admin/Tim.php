<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tim_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["tims"] = $this->tim_model->getAll();
        $this->load->view("admin/tim/list", $data);
    }

    public function add()
    {
        // if (!empty($_FILES) && $_FILES['tim_image']['name'] !== '') {
        //     $upload = $this->tim_model->_uploadImage();

        //     if (!$upload) {
        //         redirect(site_url('admin/tim/add'));
        //     }
        // }
        $tim = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $data["pulau"] = $tim->pulau();
        $this->load->view('admin/tim/new_form', $data);
        //   $validation->set_uploadImage($tim->_uploadImage());

        if ($validation->run()) {
            $tim->save();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/tim'));
        }
        //  $this->load->view("admin/tim/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tim');

        $tim = $this->tim_model;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $data["pulau"] = $tim->pulau();
        if ($validation->run()) {
            $tim->update();
            //  $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/tim'));
        }

        $data["tim"] = $tim->getById($id);
        if (!$data["tim"]) show_404();

        $this->load->view("admin/tim/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->tim_model->delete($id)) {
            redirect(site_url('admin/tim'));
        }
    }
    public function ApiPulau()
    {
        $id = $_POST['pulau_id'];
        $data = $this->tim_model->cariProvinsi($id);
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
        $data = $this->tim_model->cariKota($id);
        echo "<option value=''>-PILIH KOTA-</option>";
        foreach ($data as $a) {
            echo "
            <option value='" . $a->kota_nama . "'>" . $a->kota_nama . "</option>
        ";
        }
    }
}
