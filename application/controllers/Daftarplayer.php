<?php error_reporting(0); ?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarplayer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("player_fmodel");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $player = $this->player_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($player->rules());

        if ($validation->run()) {
            $player->save();
            $tes = $player->player_jenis;
            //$this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url($tes . '/player'));
        }
        $this->template->load('vhome', 'components/daftarplayer');
    }
}
