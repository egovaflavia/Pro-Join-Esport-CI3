<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gabungtim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("player_fmodel");
        $this->load->library('form_validation');
        $this->load->model("tim_fmodel");
        $this->load->library('form_validation');
        $this->load->model("tournament_fmodel");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());

        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());
        $data['idplayer'] = $tournament->playerid();
        $data["player"] = $tim->get_by_role1();
        $this->template->load('vhome', 'components/gabungtim', $data);
    }
    public function cadangan()
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());
        $player = $tournament->playerid();
        $tim_id = $_SESSION['idtim'];
        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
        $ambil = $koneksi->query("SELECT * FROM tb_tim where tim_id=$tim_id");
        $pecah = $ambil->fetch_object();
        $id =  $pecah->tim_id;
        $posisi = 'Cadangan';
        foreach ($player as $player) :
            if ($pecah->tim_jenis == $player->player_jenis) {
                $idplayer =  $player->player_id;
            }
        endforeach;
        $nama = $idplayer;
        $jenis = $pecah->tim_jenis;
        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
        $koneksi->query("INSERT INTO tb_request (request_timid,request_playerid, request_posisi,request_jenis) VALUES ('$id','$nama','$posisi','$jenis')");
        echo (" <script>
            alert('Tunggu Konfirmasi Tim!!!');
            window.location='/gabung/$jenis/detailtim/$id';
          </script>");
        //   redirect(base_url($jenis . '/detailtim/' . $id));
        $this->template->load('vhome', 'components/gabungtim');
    }
}
