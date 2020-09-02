<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tournament_model extends CI_Model
{
    private $_table = "tb_tournament";

    public $tournament_id;
    public $tournament_jenis;
    public $tournament_nama;
    public $tournament_tglmulai;
    public $tournament_tglakhir;
    public $tournament_participan;
    public $tournament_mode;
    public $tournament_lokasi;
    public $tournament_prize;
    public $tournament_prize1;
    public $tournament_fee;
    public $tournament_region;
    public $tournament_format;
    public $tournament_organizer;
    public $tournament_detail;
    public $tournament_rules;
    public $tournament_status;

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
                'field' => 'tournament_status',
                'label' => 'tournament_status',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_tglmulai',
                'label' => 'tournament_tglmulai',
                'rules' => 'required'
            ],
            [
                'field' => 'tournament_tglakhir',
                'label' => 'tournament_tglakhir',
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
            ],
            [
                'field' => 'tournament_prize1',
                'label' => 'tournament_prize1',
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
            ],
            [
                'field' => 'tournament_rules',
                'label' => 'tournament_rules'
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

    public function save()
    {
        // print_r($_POST);
        // exit;
        $post = $_POST;
        // $lokasi_tournament = $post['lokasi_tournament'];
        // if ($lokasi_tournament == "online") {
        //     $this->tournament_lokasi = "online";
        // } else {
        //     $this->tournament_lokasi = $post["tournament_lokasi"];
        // }

        $this->tournament_jenis = $post["tournament_jenis"];
        $this->tournament_nama = $post["tournament_nama"];
        $this->tournament_status = $post["tournament_status"];
        $this->tournament_tglmulai = $post["tournament_tglmulai"];
        $this->tournament_tglakhir = $post["tournament_tglakhir"];
        $this->tournament_participan = $post["tournament_participan"];
        $this->tournament_mode = $post["tournament_mode"];
        $this->tournament_lokasi = $post["tournament_lokasi"];
        $this->tournament_prize = $post["tournament_prize"];
        $this->tournament_prize1 = $post["tournament_prize1"];
        $this->tournament_fee = $post["tournament_fee"];
        $this->tournament_region = $post["tournament_region"];
        $this->tournament_format = $post["tournament_format"];
        $this->tournament_organizer = $post["tournament_organizer"];
        $this->tournament_detail = $post["tournament_detail"];
        $this->tournament_rules = $post["tournament_rules"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->tournament_id = $post["id"];
        $this->tournament_jenis = $post["tournament_jenis"];
        $this->tournament_nama = $post["tournament_nama"];
        $this->tournament_status = $post["tournament_status"];
        $this->tournament_tglmulai = $post["tournament_tglmulai"];
        $this->tournament_tglakhir = $post["tournament_tglakhir"];
        $this->tournament_participan = $post["tournament_participan"];
        $this->tournament_mode = $post["tournament_mode"];
        $this->tournament_lokasi = $post["tournament_lokasi"];
        $this->tournament_prize = $post["tournament_prize"];
        $this->tournament_prize1 = $post["tournament_prize1"];
        $this->tournament_fee = $post["tournament_fee"];
        $this->tournament_region = $post["tournament_region"];
        $this->tournament_format = $post["tournament_format"];
        $this->tournament_organizer = $post["tournament_organizer"];
        $this->tournament_detail = $post["tournament_detail"];
        $this->tournament_rules = $post["tournament_rules"];
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
}
