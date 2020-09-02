<?php defined('BASEPATH') or exit('No direct script access allowed');

class Poin_model extends CI_Model
{
    private $_table = "tb_poin";

    public $poin_id;
    public $poin_tournament;
    public $poin_playertim;
    public $poin_playernama;
    public $poin_jumlah;

    public function rules()
    {
        return [
            [
                'field' => 'poin_tournament',
                'label' => 'Poin_tournament',
                'rules' => 'required'
            ],
            [
                'field' => 'poin_playertim',
                'label' => 'Poin_playertim',
                'rules' => 'required'
            ],
            [
                'field' => 'poin_playernama',
                'label' => 'Poin_playernama',
                'rules' => 'required'
            ],
            [
                'field' => 'poin_jumlah',
                'label' => 'Poin_jumlah',
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
        return $this->db->get_where($this->_table, ["poin_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->poin_tournament = $post["poin_tournament"];
        $this->poin_playertim = $post["poin_playertim"];
        $this->poin_playernama = $post["poin_playernama"];
        $this->poin_jumlah = $post["poin_jumlah"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->poin_id = $post["id"];
        $this->poin_tournament = $post["poin_tournament"];
        $this->poin_playertim = $post["poin_playertim"];
        $this->poin_playernama = $post["poin_playernama"];
        $this->poin_jumlah = $post["poin_jumlah"];
        return $this->db->update($this->_table, $this, array('poin_id' => $post['id']));
    }

    // public function getplayertim()
    // {
    //     $query2 = $this->db->query('select * from tb_daftartournament');
    //     return $query2->result();
    // }

    public function gettournament()
    {
        $query3 = $this->db->query('select * from tb_tournament');
        return $query3->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("poin_id" => $id));
    }

    public function cariTim($id)
    {
        return $this->db->query("SELECT b.tim_id,b.tim_nama FROM tb_daftartournament a LEFT JOIN tb_tim b ON a.daftartournament_idtim=b.tim_id WHERE a.tournamentid='$id'")->result();
    }

    public function cariPlayer($id)
    {
        return $this->db->query("SELECT a.player_id,a.player_nickname FROM tb_player a LEFT JOIN tb_posisi p ON a.player_id=p.posisi_playerid LEFT JOIN tb_tim t ON p.posisi_timid=t.tim_id WHERE t.tim_id='$id'")->result();
    }
}
