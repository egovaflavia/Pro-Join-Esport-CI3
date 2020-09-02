<?php defined('BASEPATH') or exit('No direct script access allowed');

class Player_model extends CI_Model
{
    private $_table = "tb_player";

    public $player_id;
    public $player_nickname;
    public $player_tglmasuk;
    public $player_jenis;
    public $player_registrasi;
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
                'field' => 'player_jenis',
                'label' => 'Player_jenis',
                'rules' => 'required'
            ],
            [
                'field' => 'player_registrasi',
                'label' => 'Player_registrasi',
                'rules' => 'required'
            ],
            [
                'field' => 'player_cek',
                'label' => 'Player_cek',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["player_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->player_id = $post["player_id"];
        $this->player_nickname = $post["player_nickname"];
        $this->player_tglmasuk = $post["player_tglmasuk"];
        $this->player_jenis = $post["player_jenis"];
        $this->player_registrasi = $post["player_registrasi"];
        $this->player_cek = $post["player_cek"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->player_id = $post["player_id"];
        $this->player_nickname = $post["player_nickname"];
        $this->player_tglmasuk = $post["player_tglmasuk"];
        $this->player_jenis = $post["player_jenis"];
        $this->player_registrasi = $post["player_registrasi"];
        $this->player_cek = $post["player_cek"];
        return $this->db->update($this->_table, $this, array('player_id' => $post['player_id']));
    }


    public function registrasi1()
    {
        $query12 = $this->db->query('select * from tb_registrasi');
        return $query12->result();
    }

    public function pulau()
    {
        $query = $this->db->query("SELECT * FROM tb_pulau");
        return $query->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("player_id" => $id));
    }

    public function cariProvinsi($id)
    {
        return $this->db->query("SELECT * FROM tb_provinsi WHERE pulau_id='$id'")->result();
    }
    public function cariKota($id)
    {
        return $this->db->query("SELECT * FROM tb_kota WHERE provinsi_id='$id'")->result();
    }
}
