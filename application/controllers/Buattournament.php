<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buattournament extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tournament_fmodel");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());

        if ($validation->run()) {
            $tournament->save();
            $tes = $tournament->tournament_jenis;
            //$this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url($tes . '/tournaments'));
        }
        $data["pulau"] = $tournament->pulau();
        $this->template->load('vhome', 'components/buattournament', $data);
    }
}
