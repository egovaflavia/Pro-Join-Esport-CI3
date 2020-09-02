<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftartournament_model extends CI_Model
{
    private $_table = "tb_daftartournament";

    public $daftartournament_id;
    public $tournamentid;
    public $daftartournament_idtim;
    public $daftartournament_idplayer;

    public function rules()
    {
        return [
            [
                'field' => 'tournamentid',
                'label' => 'tournamentid',
                'rules' => 'required'
            ],
            [
                'field' => 'daftartournament_idtim',
                'label' => 'daftartournament_idtim',
                'rules' => 'required'
            ],
            [
                'field' => 'daftartournament_idplayer',
                'label' => 'daftartournament_idplayer',
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
        return $this->db->get_where($this->_table, ["daftartournament_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tournamentid = $post["tournamentid"];
        $this->daftartournament_idtim = $post["daftartournament_idtim"];
        $this->daftartournament_idplayer = $post["daftartournament_idplayer"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->daftartournament_id = $post["id"];
        $this->tournamentid = $post["tournamentid"];
        $this->daftartournament_idtim = $post["daftartournament_idtim"];
        $this->daftartournament_idplayer = $post["daftartournament_idplayer"];
        return $this->db->update($this->_table, $this, array('daftartournament_id' => $post['id']));
    }

    public function get_by_role1()
    {
        $query1 = $this->db->query('select * from tb_tournament');
        return $query1->result();
    }

    public function get_by_role2()
    {
        $query2 = $this->db->query('select * from tb_tim');
        return $query2->result();
    }
    public function get_by_role3()
    {
        $query3 = $this->db->query('select * from tb_player');
        return $query3->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("daftartournament_id" => $id));
    }
}
