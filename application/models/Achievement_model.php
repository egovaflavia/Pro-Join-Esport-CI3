<?php defined('BASEPATH') or exit('No direct script access allowed');

class Achievement_model extends CI_Model
{
    private $_table = "tb_achievement";

    public $achievement_id;
    public $achievement_idtournament;
    public $achievement_idtim;
    public $achievement_idplayer;
    public $achievement_peringkat;

    public function rules()
    {
        return [
            [
                'field' => 'achievement_idtournament',
                'label' => 'Achievement_idtournament',
                'rules' => 'required'
            ],
            [
                'field' => 'achievement_idtim',
                'label' => 'Achievement_idtim',
                'rules' => 'required'
            ],
            [
                'field' => 'achievement_idplayer',
                'label' => 'Achievement_idplayer',

            ],
            [
                'field' => 'achievement_peringkat',
                'label' => 'Achievement_peringkat',
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
        return $this->db->get_where($this->_table, ["achievement_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->achievement_idtournament = $post["achievement_idtournament"];
        $this->achievement_idtim = $post["achievement_idtim"];
        $this->achievement_idplayer = $post["achievement_idplayer"];
        $this->achievement_peringkat = $post["achievement_peringkat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->achievement_id = $post["id"];
        $this->achievement_idtournament = $post["achievement_idtournament"];
        $this->achievement_idtim = $post["achievement_idtim"];
        $this->achievement_idplayer = $post["achievement_idplayer"];
        $this->achievement_peringkat = $post["achievement_peringkat"];
        return $this->db->update($this->_table, $this, array('achievement_id' => $post['id']));
    }

    public function tournament()
    {
        $query1 = $this->db->query('select * from tb_tournament');
        return $query1->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("achievement_id" => $id));
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
