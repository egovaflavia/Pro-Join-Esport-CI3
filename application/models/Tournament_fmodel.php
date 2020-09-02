<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tournament_fmodel extends CI_Model
{
    private $_table = "tb_tournament";
    private $_bracket = "tb_bracket";
    private $_bagan = "tb_bagan";
    public $tournament_id;
    public $tournament_jenis;
    public $tournament_nama;
    public $tournament_tglmulai;
    public $tournament_participan;
    public $tournament_mode;
    public $tournament_lokasi;
    public $tournament_prize;
    public $tournament_fee;
    public $tournament_region;
    public $tournament_format;
    public $tournament_organizer;
    public $tournament_detail;

    public function rules()
    {
        return [
            [
                'field' => 'tournament_jenis',
                'label' => 'tournament_jenis',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_nama',
                'label' => 'tournament_nama',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_tglmulai',
                'label' => 'tournament_tglmulai',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_participan',
                'label' => 'tournament_participan',
                'rules' => 'numeric'
            ],
            [
                'field' => 'tournament_mode',
                'label' => 'tournament_mode',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_lokasi',
                'label' => 'tournament_lokasi',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_prize',
                'label' => 'tournament_prize',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_fee',
                'label' => 'tournament_fee',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_region',
                'label' => 'tournament_region',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_format',
                'label' => 'tournament_format',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_organizer',
                'label' => 'tournament_organizer',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_detail',
                'label' => 'tournament_detail',
            ]
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getById($id) 
    {
        return $this->db->get_where($this->_table, ["tournament_id" => $id])->row();
    }
    public function getBracket($id)
    {
        return $this->db->get_where($this->_bracket, ["bracket_tournamentid" => $id])->row();
    }
    public function getBagan($id)
    {
        return $this->db->get_where($this->_bagan, ["bagan_tournamentid" => $id])->result();
    }
    public function getAllBagan()
    {
        return $this->db->get($this->_bagan)->result();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->tournament_jenis = $post["tournament_jenis"];
        $this->tournament_nama = $post["tournament_nama"];
        $this->tournament_tglmulai = $post["tournament_tglmulai"];
        $this->tournament_participan = $post["tournament_participan"];
        $this->tournament_mode = $post["tournament_mode"];
        $this->tournament_lokasi = $post["tournament_lokasi"];
        $this->tournament_prize = $post["tournament_prize"];
        $this->tournament_fee = $post["tournament_fee"];
        $this->tournament_region = $post["tournament_region"];
        $this->tournament_format = $post["tournament_format"];
        $this->tournament_organizer = $post["tournament_organizer"];
        $this->tournament_detail = $post["tournament_detail"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->tournament_id = $post["id"];
        $this->tournament_jenis = $post["tournament_jenis"];
        $this->tournament_nama = $post["tournament_nama"];
        $this->tournament_tglmulai = $post["tournament_tglmulai"];
        $this->tournament_participan = $post["tournament_participan"];
        $this->tournament_mode = $post["tournament_mode"];
        $this->tournament_lokasi = $post["tournament_lokasi"];
        $this->tournament_prize = $post["tournament_prize"];
        $this->tournament_fee = $post["tournament_fee"];
        $this->tournament_region = $post["tournament_region"];
        $this->tournament_format = $post["tournament_format"];
        $this->tournament_organizer = $post["tournament_organizer"];
        $this->tournament_detail = $post["tournament_detail"];

        return $this->db->update($this->_table, $this, array('tournament_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("tournament_id" => $id));
    }

    public function pulau()
    {
        $query = $this->db->query("SELECT * FROM tb_pulau");
        return $query->result();
    }

    public function cariProvinsi($id)
    {
        return $this->db->query("SELECT * FROM tb_provinsi WHERE pulau_id='$id'")->result();
    }
    public function cariKota($id)
    {
        return $this->db->query("SELECT * FROM tb_kota WHERE provinsi_id='$id'")->result();
    }
    public function getpubg()
    {
        $this->db->select('
            tb_tournament.*,tb_achievement.*,tb_tim.*
        ');
        $this->db->join('tb_achievement', 'tb_tournament.tournament_id = tb_achievement.	achievement_idtournament');
        $this->db->join('tb_tim', 'tb_achievement.achievement_idtim = tb_tim.tim_id');
        $this->db->where('tournament_jenis', 'pubg');
        return $this->db->get($this->_table)->result();
    }
    public function getpubgm()
    {
        $this->db->select('
            tb_tournament.*,tb_achievement.*,tb_tim.*
        ');
        $this->db->join('tb_achievement', 'tb_tournament.tournament_id = tb_achievement.	achievement_idtournament');
        $this->db->join('tb_tim', 'tb_achievement.achievement_idtim = tb_tim.tim_id');
        $this->db->where('tournament_jenis', 'pubgm');
        return $this->db->get($this->_table)->result();
    }
    public function getpb()
    {
        $this->db->select('
            tb_tournament.*,tb_achievement.*,tb_tim.*
        ');
        $this->db->join('tb_achievement', 'tb_tournament.tournament_id = tb_achievement.	achievement_idtournament');
        $this->db->join('tb_tim', 'tb_achievement.achievement_idtim = tb_tim.tim_id');
        $this->db->where('tournament_jenis', 'pb');
        return $this->db->get($this->_table)->result();
    }
    public function getff()
    {
        $this->db->select('
            tb_tournament.*,tb_achievement.*,tb_tim.*
        ');
        $this->db->join('tb_achievement', 'tb_tournament.tournament_id = tb_achievement.	achievement_idtournament');
        $this->db->join('tb_tim', 'tb_achievement.achievement_idtim = tb_tim.tim_id');
        $this->db->where('tournament_jenis', 'ff');
        return $this->db->get($this->_table)->result();
    }
    public function getml()
    {
        $this->db->select('
            tb_tournament.*,tb_achievement.*,tb_tim.*
        ');
        $this->db->join('tb_achievement', 'tb_tournament.tournament_id = tb_achievement.	achievement_idtournament');
        $this->db->join('tb_tim', 'tb_achievement.achievement_idtim = tb_tim.tim_id');
        $this->db->where('tournament_jenis', 'ml');
        return $this->db->get($this->_table)->result();
    }
    public function getdota()
    {
        $this->db->select('
            tb_tournament.*,tb_achievement.*,tb_tim.*
        ');
        $this->db->join('tb_achievement', 'tb_tournament.tournament_id = tb_achievement.	achievement_idtournament');
        $this->db->join('tb_tim', 'tb_achievement.achievement_idtim = tb_tim.tim_id');
        $this->db->where('tournament_jenis', 'dota');
        return $this->db->get($this->_table)->result();
    }
    public function timid()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT tim_id FROM tb_tim WHERE tim_registrasi='$id'");
        return $query->row();
    }
    public function playerid()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id'");
        return $query->result();
    }
    public function playeridpubg()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='pubg'");
        return $query->result();
    }
    public function playeridpb()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='pb'");
        return $query->result();
    }
    public function playertim()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT player_timid FROM tb_player WHERE player_registrasi='$id'");
        return $query->row();
    }
    public function daftartournament()
    {
        $query = $this->db->query("SELECT * FROM tb_daftartournament");
        return $query->result();
    }
}
