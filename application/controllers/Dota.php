<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dota extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
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
        $this->template->load('vhome', 'components/dota');
    }
    public function player()
    {
        $datas["players"] = $this->player_fmodel->get_dota();
        $datas["playerss"] = $this->player_fmodel->getAll_dota();
        $this->load->view("components/playerdota", $datas);
        $this->template->load('vhome', 'components/playerdota', $datas);
    }
    public function team()
    {
        $this->template->load('vhome', 'components/teamdota');
    }
    public function tournaments()
    {
        $data["tour"] = $this->tournament_fmodel->getdota();
        $data["tournament"] = $this->tournament_fmodel->getdota();
        $this->template->load('vhome', 'components/tournamentsdota', $data);
    }
    public function detailplayer($id = null)
    {
        if (!isset($id)) redirect('components/playerdota');

        $player = $this->player_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($player->rules());

        $data["players"] = $player->getById($id);
        $data["player"] = $player->get_join($id);
        //if (!$data["player"]) show_404();
        $this->template->load('vhome', 'components/detail_player', $data);
    }
    public function detailtim($id)
    {
        if (!isset($id)) redirect('components/tim');

        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());

        $data["tim"] = $tim->getById($id);
        if (!$data["tim"]) show_404();
        $this->template->load('vhome', 'components/detail_team', $data);
    }
    public function detailtournament($id)
    {
        if (!isset($id)) redirect('components/tournaments');

        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());

        $data["tournament"] = $tournament->getById($id);
        if (!$data["tournament"]) show_404();
        $this->template->load('vhome', 'components/detail_tournament', $data);
    }

    public function ApiContent()
    {
        $kode = $_POST['kode'];
        if ($kode == 1) {
            $data = $this->tim_fmodel->berdasarkannamadota();
            echo " <div class='container'>
           <div class='row mt-3'>";
            foreach ($data as $a) {
                echo "
                <div class='col-lg-3'>
                    <a href=" . site_url('dota/detailtim/' . $a->tim_id) . ">
                        <div class='card bg-dark text-white mb-3 game-card'>
                            <div class='row'>
                                <div class='col-lg-4' style='margin-left: 10px'>
                                    <img src=" . base_url('upload/tim/' . $a->tim_image) . " class='card-img' style='width: 70px;height:70px;margin-top: 10px'>
                                </div>
                                <div style='padding-top:35px'>
                                    <h5 class='card-title mt-auto'>" . $a->tim_nama . "</h5>

                                </div>
                            </div>

                        </div>
                    </a>
              </div>
                ";
            }
            echo "</div> </div>";
        } else {
            $data = $this->tim_fmodel->berdasarkantahundota();
            echo " <div class='container'>
            <div class='row mt-3'>";
            foreach ($data as $a) {
                echo "
                 <div class='col-lg-3'>
                     <a href=" . site_url('dota/detailtim/' . $a->tim_id) . ">
                         <div class='card bg-dark text-white mb-3 game-card'>
                             <div class='row'>
                                 <div class='col-lg-4' style='margin-left: 10px'>
                                     <img src=" . base_url('upload/tim/' . $a->tim_image) . " class='card-img' style='width: 70px;height:70px;margin-top: 10px'>
                                 </div>
                                 <div style='padding-top:35px'>
                                     <h5 class='card-title mt-auto'>" . $a->tim_nama . "</h5>
 
                                 </div>
                             </div>
 
                         </div>
                     </a>
               </div>
                 ";
            }
            echo "</div> </div>";
        }
    }
}
