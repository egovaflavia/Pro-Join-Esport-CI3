<?php
class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tournament_fmodel");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->template->load('vhome', 'components/detail_tournament');
    }
    public function kirimKomen($id)
    {
        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());
        $datatim = $tournament->getById($id);
        $jenis = $datatim->tournament_jenis;
        $nama = $this->input->post('nama');
        $isi_komentar = $this->input->post('isi');
        $tgl = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO tb_komentar VALUES('','$id','0','$nama','$isi_komentar','$tgl')");
        redirect(base_url($jenis . '/detailtournament/' . $id));
    }

    public function balasKomen($idt)
    {
        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());
        $datatim = $tournament->getById($idt);
        $jenis = $datatim->tournament_jenis;
        $id = $this->input->post('id');
        $nama = $this->input->post('namabls');
        $isi_komentar = $this->input->post('isibls');
        $tgl = date('Y-m-d');
        $this->db->query("INSERT INTO tb_komentar VALUES('','$idt','$id','$nama','$isi_komentar','$tgl')");
        redirect(base_url($jenis . '/detailtournament/' . $idt));
    }
}
