<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pubgm extends CI_Controller
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
        $tournament = $this->tournament_fmodel;
        $data["bagan"] = $tournament->getAllBagan();
        $data["bagans"] = $tournament->getAllBagan();

        $this->template->load('vhome', 'components/pubgm', $data);
    }
    public function match()
    {
        $tournament = $this->tournament_fmodel;
        $data["bagan"] = $tournament->getAllBagan();
        $data["bagans"] = $tournament->getAllBagan();

        $this->template->load('vhome', 'components/matchpubgm', $data);
    }
    public function player()
    {
        $datas["players"] = $this->player_fmodel->get_pubgm();
        $regis = $_SESSION['akun'];
        $username = $regis['nama'];
        $datas["id"] = $this->player_fmodel->idregis($username);
        $datas["cek"] = $this->player_fmodel->cekpubgm();
        $datas["playerss"] = $this->player_fmodel->getAll_pubgm();
        $this->template->load('vhome', 'components/playerpubgm', $datas);
    }
    public function team()
    {
        $regis = $_SESSION['akun'];
        $username = $regis['nama'];
        $datas["id"] = $this->tim_fmodel->idregis($username);
        //$data['idplayer'] = $this->tournament_fmodel->playertim();
        $datas["cek"] = $this->tim_fmodel->cek();
        $datas["team"] = $this->tim_fmodel->getpubgm();
        $datas["cek2"] = $this->tim_fmodel->cek2();
        $this->template->load('vhome', 'components/teampubgm', $datas);
    }
    public function tournaments()
    {
        $data['tour'] = $this->tournament_fmodel->getpubgm();
        $data['tournament'] = $this->tournament_fmodel->getpubgm();
        $this->template->load('vhome', 'components/tournamentspubgm', $data);
    }

    public function editteam($id = null)
    {
        //if (!isset($id)) redirect('admin/tim');

        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $data["pulau"] = $tim->pulau();
        $data["tim"] = $tim->getById2($id);
        if ($validation->run()) {
            $tim->update();
            $tes = $tim->tim_jenis;
            //$this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url('overview/seting/' . $id));
        }

        // if (!$data["tim"]) show_404();

        $this->template->load('vhome', 'components/editteam', $data);
    }
    public function detailplayer($id = null)
    {
        if (!isset($id)) redirect('components/playerpubgm');

        $player = $this->player_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($player->rules());

        $data["players"] = $player->getByIdpubgm($id);
        $data["player"] = $player->get_joinpubgm($id);
        $this->template->load('vhome', 'components/detail_player', $data);
    }
    public function detailtim($id = null)
    {
        if (!isset($id)) redirect('components/tim');
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $data["tim"] = $tim->getById2($id);
        $data["cekid"] = $tim->cekidpubgm();
        $this->template->load('vhome', 'components/detail_team', $data);
    }
    public function detailtournament($id)
    {
        if (!isset($id)) redirect('components/tournaments');

        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());
        $data['tour'] = $tournament->getpubgm();
        $data['daftar'] = $tournament->daftartournament();
        $data['idplayer'] = $tournament->playerid();
        $data["tournament"] = $tournament->getById($id);
        $data["bracket"] = $tournament->getBracket($id);
        $data["bagan"] = $tournament->getBagan($id);
        $data["bagans"] = $tournament->getBagan($id);

        if (!$data["tournament"]) show_404();
        $this->template->load('vhome', 'components/detail_tournament', $data);
    }
    public function daftartournaments($id)
    {
        $tournament = $this->tournament_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tournament->rules());
        $idtournament = $tournament->getById($id);
        $idplayer = $this->tim_fmodel->cekidpubgm();
        // $idplayer = $tournament->playeridpubgm();

        $id = $idtournament->tournament_id;
        $player = $idplayer->player_id;
        $tim = $idplayer->posisi_timid;

        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
        $ambil2 = $koneksi->query("SELECT COUNT(*) AS jumlah FROM tb_posisi LEFT JOIN tb_tim ON tb_posisi.posisi_timid=tb_tim.tim_id where tb_tim.tim_id='$tim'");
        $total = mysqli_fetch_array($ambil2);
        $anggota = $total['jumlah'];
        if ($anggota >= 4) {
            $koneksi->query("INSERT INTO tb_daftartournament (tournamentid, daftartournament_idtim, daftartournament_idplayer) VALUES ('$id','$tim','$player')");
            echo (" <script>
        alert('anda telah bergabung');
        window.location='../detailtournament/$id';
      </script>");
        } else {
            echo (" <script>
            alert('Belum Memenuhi Syarat');

        window.location='../detailtournament/$id';

      </script>");
        }
    }
    public function request($id)
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $data['request'] = $tim->requestpubgm($id);
        $data['idtim'] = $this->tournament_fmodel->timid();
        $this->template->load('vhome', 'components/terimaanggota', $data);
    }
    public function acc($id)
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $request = $tim->acc($id);

        $idplayer = $request->request_playerid;
        $idtim = $request->request_timid;
        $posisi = $request->request_posisi;
        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
        $koneksi->query("UPDATE tb_player SET player_timid='$idtim',player_posisi='$posisi' WHERE player_id='$idplayer'");
        $koneksi->query("DELETE FROM tb_request WHERE request_id='$id'");
        echo (" <script>
        alert('Tersimpan');
        window.location='../detailtim/$idtim';
      </script>");
    }
    public function ApiContent()
    {
        $kode = $_POST['kode'];
        if ($kode == 1) {
            $data = $this->tim_fmodel->berdasarkannamapubgm();
            echo " <div class='container'>
           <div class='row mt-3'>";
            foreach ($data as $a) {
                echo "
                <div class='col-lg-3'>
                    <a href=" . site_url('pubgm/detailtim/' . $a->tim_id) . ">
                    <div class='card bg-dark text-white mb-3 game-card'>
                    <div class='row' style='margin-top: 10px'>
                        <div class='col-lg-4' style='margin-left: 10px'>
                       <div style='background-image:url(" . base_url('upload/tim/' . $a->tim_image) . ");background-size: 100% 100%; width:70px;height: 70px '>
                       </div>
                       
                        </div>
                        <div  class='col-lg-6' style='padding-top:20px'>
                            <h5 class='card-title mt-auto'>" . $a->tim_nama
                    . "</h5>
                            
                        </div>
                    </div>
                </div>
                    </a>
              </div>
                ";
            }
            echo "</div> </div>";
        } elseif ($kode == 2) {
            $data = $this->tim_fmodel->berdasarkantahunpubgm();
            echo " <div class='container'>
            <div class='row mt-3'>";
            foreach ($data as $a) {
                echo "
                 <div class='col-lg-3'>
                     <a href=" . site_url('pubgm/detailtim/' . $a->tim_id) . ">
                     <div class='card bg-dark text-white mb-3 game-card'>
                     <div class='row' style='margin-top: 10px'>
                         <div class='col-lg-4' style='margin-left: 10px'>
                        <div style='background-image:url(" . base_url('upload/tim/' . $a->tim_image) . ");background-size: 100% 100%; width:70px;height: 70px '>
                        </div>
                        
                         </div>
                         <div  class='col-lg-6' style='padding-top:20px'>
                             <h5 class='card-title mt-auto'>" . $a->tim_nama
                    . "</h5>
                             
                         </div>
                     </div>
                 </div>
                     </a>
               </div>
                 ";
            }
            echo "</div> </div>";
        } else {
            $data = $this->tim_fmodel->getpubgm();
            echo " <div class='container'>
            <div class='row mt-3'>";
            foreach ($data as $a) {
                echo "
                 <div class='col-lg-3'>
                     <a href=" . site_url('pubgm/detailtim/' . $a->tim_id) . ">
                     <div class='card bg-dark text-white mb-3 game-card'>
                     <div class='row' style='margin-top: 10px'>
                         <div class='col-lg-4' style='margin-left: 10px'>
                        <div style='background-image:url(" . base_url('upload/tim/' . $a->tim_image) . ");background-size: 100% 100%; width:70px;height: 70px '>
                        </div>
                        
                         </div>
                         <div  class='col-lg-6' style='padding-top:20px'>
                             <h5 class='card-title mt-auto'>" . $a->tim_nama
                    . "</h5>
                             
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
    public function ApiPulau()
    {
        $id = $_POST['pulau_id'];
        $data = $this->player_fmodel->cariProvinsi($id);
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
        $data = $this->player_fmodel->cariKota($id);
        echo "<option value=''>-PILIH KOTA-</option>";
        foreach ($data as $a) {
            echo "
            <option value='" . $a->kota_nama . "'>" . $a->kota_nama . "</option>
        ";
        }
    }
}
