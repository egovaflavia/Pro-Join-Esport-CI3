<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Overview extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model("berita_model");
        $this->load->library('form_validation');
        $this->load->model("player_fmodel");
        $this->load->library('form_validation');
        $this->load->model("tim_fmodel");
        $this->load->library('form_validation');
        $this->load->model("registrasi_model");
        $this->load->library('form_validation');
        $this->load->model("klaim");
        $this->load->library('form_validation');
    }
    public function index()
    {
        // ambil data klaim si pengguna hari ini
        $datas['klaim'] = $this->klaim->cek_status_klaim();
        $datas["berital"] = $this->berita_model->get_all_limit();
        $datas["beritas"] = $this->berita_model->getAll();
        $this->template->load('vhome', 'components/home', $datas);
    }
    public function aksi_klaim()
    {
        $this->klaim->tambah();
        $data = $this->klaim->cek_status_klaim();
        $koin = $data->klaim_poin;
        echo (" <script>
        alert('Selamat Kamu Mendapatkan $koin koin');
        window.location='../';
      </script>");
        // redirect(base_url());
    }
    public function detail($id = null)
    {
        if (!isset($id)) redirect('components/news');

        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();

        $this->template->load('vhome', 'components/detail_berita', $data);
    }
    public function profil($id)
    {
        $player = $this->player_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($player->rules());
        $data["player"] = $player->getregis($id);
        $data["players"] = $player->getplayer($id);
        $data["playerss"] = $player->getplayerss($id);

        $this->template->load('vhome', 'components/profil', $data);
    }
    public function edit($id = null)
    {
        // if (!isset($id)) redirect(base_url('pubg/player'));
        $player = $this->player_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($player->rules());
        // $data["player1"] = $player->get_by_role2();
        // $data["registrasi1"] = $player->registrasi1();
        // $data["pulau"] = $player->pulau();
        $data["player"] = $player->editplayer($id);
        if ($validation->run()) {
            $player->update();
            $id = $player->player_registrasi;
            redirect(base_url('overview/profil/' . $id));
        }

        // if (!$data["player"]) show_404();
        $this->template->load('vhome', 'components/editplayer', $data);
    }
    public function seting($id = null)
    {
        // if (!isset($id)) redirect(base_url('pubg/player'));
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        // $data["tim1"] = $tim->get_by_role2();
        // $data["registrasi1"] = $tim->registrasi1();
        // $data["pulau"] = $tim->pulau();
        $regis = $_SESSION['id'];
        $idr = $regis->registrasi_id;
        $data["tims"] = $tim->getById($idr);
        $data["anggota"] = $tim->getanggota();
        if ($validation->run()) {
            $tim->update();
            $id = $tim->tim_registrasi;
            redirect(base_url('overview/setting_tim/' . $id));
        }

        // if (!$data["tim"]) show_404();
        $this->template->load('vhome', 'components/setting_tim', $data);
    }
    public function edituser($id = null)
    {

        $registrasi = $this->registrasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($registrasi->rules());
        $data["pulau"] = $registrasi->pulau();
        $data["registrasi"] = $registrasi->getById($id);
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        // if (!isset($id)) redirect(base_url('overview/profil/' . $id));
        if ($validation->run()) {
            $registrasi->update();
            redirect(base_url('overview/profil/' . $id));
        }
        // if (!$data["registrasi"]) show_404();
        $this->template->load('vhome', 'components/edituser', $data);
    }
    public function editposisi($id)
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $data["posisi"] = $tim->getposisi($id);
        $this->template->load('vhome', 'components/editposisi', $data);
    }
    public function keluar($id)
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
        $koneksi->query("UPDATE tb_posisi SET posisi_nama='', posisi_timid='' WHERE posisi_id=$id");
        $regis = $_SESSION['id'];
        $idr = $regis->registrasi_id;
        redirect(base_url('overview/seting/' . $idr));
    }
    public function request($id)
    {
        $tim = $this->tim_fmodel;
        $validation = $this->form_validation;
        $validation->set_rules($tim->rules());
        $data["tim"] = $tim->getById($id);
        // $data['request'] = $tim->request();
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
        $pecah = $koneksi->query("SELECT *  FROM tb_posisi WHERE posisi_playerid='$idplayer'");
        $ambil = $pecah->fetch_object();
        $koneksi->query("UPDATE tb_posisi SET posisi_timid='$idtim',posisi_nama='$posisi' WHERE posisi_playerid='$idplayer' AND posisi_id=$ambil->posisi_id");
        $koneksi->query("DELETE FROM tb_request WHERE request_id='$id'");
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        echo (" <script>
        alert('Tersimpan');
        window.location='../request/$id';
      </script>");
    }
    public function tolak($id)
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
        $koneksi->query("DELETE FROM tb_request WHERE request_id='$id'");
        $regis = $_SESSION['id'];
        $idr = $regis->registrasi_id;
        echo (" <script>
        alert('Tersimpan');
        window.location='../request/$idr';
      </script>");
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
    public function coming()
    {
        $this->template->load('vhome', 'components/coming');
    }
}
