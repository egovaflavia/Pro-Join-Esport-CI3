<?php defined('BASEPATH') or exit('No direct script access allowed');

class Player_fmodel extends CI_Model
{
    private $_table = "tb_player";
    private $_posisi = "tb_posisi";
    private $_registrasi = "tb_registrasi";
 
    public $player_id;
    public $player_registrasi;
    public $player_jenis;
    public $player_nickname;
    public $player_tglmasuk;
    public $player_cek;

    public function rules()
    {
        return [
            [
                'field' => 'player_id',
                'label' => 'Player_id',
                'rules' => 'required'
            ],
            [
                'field' => 'player_registrasi',
                'label' => 'player_registrasi',
                'rules' => 'required'
            ],
            [
                'field' => 'player_jenis',
                'label' => 'Player_jenis',
                'rules' => 'required'
            ],
            [
                'field' => 'player_nickname',
                'label' => 'Player_nickname',
                'rules' => 'required'
            ],
            [
                'field' => 'player_tglmasuk',
                'label' => 'Player_tglmasuk',
                'rules' => 'required'
            ],
            [
                'field' => 'player_cek',
                'label' => 'Player_cek',
                // 'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function editplayer($id)
    {
        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function getByIdpubg($id)
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubg');
        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function getByIdpubgm($id)
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubgm');
        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function getByIdpb($id)
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pb');
        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function getByIdml($id)
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'ml');
        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function getregis($id)
    {
        $this->db->select('
        tb_registrasi.*
    ');
        return $this->db->get_where($this->_registrasi, ["registrasi_id" => $id])->row();
    }
    public function getplayer($id)
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        return $this->db->get_where($this->_table, ["player_registrasi" => $id])->result();
    }
    public function getplayerss($id)
    {
        $this->db->select('
    tb_player.*,tb_posisi.*
');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->where('tb_posisi.posisi_timid', '');
        return $this->db->get_where($this->_table, ["player_registrasi" => $id])->result();
    }
    public function get_joinpubg($id)
    {
        $this->db->select('
            tb_player.*,tb_registrasi.*, tb_posisi.*');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubg');

        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function get_joinpubgm($id)
    {
        $this->db->select('
            tb_player.*,tb_registrasi.*, tb_posisi.*');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubgm');

        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function get_joinpb($id)
    {

        $this->db->select('
            tb_player.*,tb_registrasi.*, tb_posisi.*');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pb');

        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function get_joinml($id)
    {
        $this->db->select('
            tb_player.*,tb_registrasi.*, tb_posisi.*');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'ml');

        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->player_id = $post["player_id"];
        $this->player_jenis = $post["player_jenis"];
        $this->player_nickname = $post["player_nickname"];
        $this->player_tglmasuk = $post["player_tglmasuk"];
        $this->player_cek = "no";
        $this->player_registrasi = $post["player_registrasi"];
        $this->db->insert($this->_table, $this);
        $id_player =  $post["player_id"];
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $this->db->insert($this->_posisi, array("posisi_timid" => '', "posisi_playerid" => $id_player, "posisi_nama" => ''));
        // update player set timid = id_player where id_player = $id_player
        return $id_player;
    }

    public function update()
    {
        $post = $this->input->post();
        $this->player_id = $post["player_id"];
        $this->player_jenis = $post["player_jenis"];
        $this->player_registrasi = $post["player_registrasi"];
        $this->player_nickname = $post["player_nickname"];
        $this->player_tglmasuk = $post["player_tglmasuk"];
        $this->player_cek = $post["player_cek"];
        return $this->db->update($this->_table, $this, array('player_id' => $post['player_id']));
    }

    public function get_tim()
    {
        $query = $this->db->query('select * from tb_tim');
        return $query->result();
    }
    public function get_posisi()
    {
        $query = $this->db->query('select * from tb_posisi');
        return $query->result();
    }
    public function get_registrasi()
    {
        $query = $this->db->query('select * from tb_registrasi');
        return $query->result();
    }

    public function get_pubg()
    {
        $this->db->select('
            tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
        ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubg');
        // $this->db->from('tb_palyer');
        return $this->db->get($this->_table)->result();
    }

    public function getAll_pubg()
    {
        $this->db->select('
            tb_player.*,tb_posisi.*,tb_registrasi.*
        ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubg');
        $this->db->where('tb_posisi.posisi_timid', '');
        return $this->db->get($this->_table)->result();
    }

    public function get_pb()
    {
        $this->db->select('
            tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
        ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pb');
        // $this->db->from('tb_palyer');
        return $this->db->get($this->_table)->result();
    }

    public function getAll_pb()
    {
        $this->db->select('
            tb_player.*,tb_posisi.*,tb_registrasi.*
        ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pb');
        $this->db->where('tb_posisi.posisi_timid', '');
        return $this->db->get($this->_table)->result();
    }


    public function get_dota()
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'dota');
        // $this->db->from('tb_palyer');
        return $this->db->get($this->_table)->result();
    }
    public function getAll_dota()
    {
        $this->db->select('
        tb_player.*,tb_posisi.*,tb_registrasi.*
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'dota');
        $this->db->where('tb_posisi.posisi_timid', '');
        return $this->db->get($this->_table)->result();
    }
    public function get_ml()
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'ml');
        // $this->db->from('tb_palyer');
        return $this->db->get($this->_table)->result();
    }
    public function getAll_ml()
    {
        $this->db->select('
        tb_player.*,tb_posisi.*,tb_registrasi.*
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'ml');
        $this->db->where('tb_posisi.posisi_timid', '');
        return $this->db->get($this->_table)->result();
    }

    public function get_ff()
    {
        $this->db->select('
            tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
        ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'ff');
        // $this->db->from('tb_palyer');
        return $this->db->get($this->_table)->result();
    }
    public function getAll_ff()
    {
        $this->db->select('
            tb_player.*,tb_posisi.*,tb_registrasi.*
        ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'ff');
        $this->db->where('tb_posisi.posisi_timid', '');
        return $this->db->get($this->_table)->result();
    }
    public function get_pubgm()
    {
        $this->db->select('
        tb_player.*,tb_registrasi.*, tb_posisi.*,tb_tim.tim_id, tb_tim.tim_nama, tb_tim.tim_image
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_tim', 'tb_posisi.posisi_timid = tb_tim.tim_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubgm');
        // $this->db->from('tb_palyer');
        return $this->db->get($this->_table)->result();
    }
    public function getAll_pubgm()
    {
        $this->db->select('
        tb_player.*,tb_posisi.*,tb_registrasi.*
    ');
        $this->db->join('tb_posisi', 'tb_posisi.posisi_playerid =  tb_player.player_id');
        $this->db->join('tb_registrasi', 'tb_player.player_registrasi = tb_registrasi.registrasi_id');
        $this->db->where('player_jenis', 'pubgm');
        $this->db->where('tb_posisi.posisi_timid', '');
        return $this->db->get($this->_table)->result();
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
    public function idregis($nama)
    {
        return $this->db->query("SELECT registrasi_id FROM tb_registrasi WHERE registrasi_username='$nama'")->row();
    }
    public function cekpubg()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='pubg'");
        return $query->row();
    }
    public function cekpb()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='pb'");
        return $query->row();
    }
    public function cekml()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='ml'");
        return $query->row();
    }
    public function cekdota()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='dota'");
        return $query->row();
    }
    public function cekff()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='ff'");
        return $query->row();
    }
    public function cekpubgm()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_player WHERE player_registrasi='$id' AND player_jenis='pubgm'");
        return $query->row();
    }
    function data($number, $offset)
    {
        return $query = $this->db->get('tb_player', $number, $offset)->result();
    }

    function jumlah_data()
    {
        return $this->db->get('tb_player')->num_rows();
    }
}
