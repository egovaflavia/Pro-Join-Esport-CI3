<?php defined('BASEPATH') or exit('No direct script access allowed');

class Posisi_model extends CI_Model
{
    private $_table = "tb_posisi";

    public $posisi_id;
    public $posisi_timid;
    public $posisi_playerid;
    public $posisi_nama;

    public function rules()
    {
        return [
            [
                'field' => 'posisi_timid',
                'label' => 'Posisi_timid',
                'rules' => 'required'
            ],

            [
                'field' => 'posisi_playerid',
                'label' => 'Posisi_playerid',
                'rules' => 'required'
            ],

            [
                'field' => 'posisi_nama',
                'label' => 'Posisi_nama',
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
        return $this->db->get_where($this->_table, ["posisi_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->posisi_timid = $post["posisi_timid"];
        $this->posisi_playerid = $post["posisi_playerid"];
        $this->posisi_nama = $post["posisi_nama"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->posisi_id = $post["id"];
        $this->posisi_timid = $post["posisi_timid"];
        $this->posisi_playerid = $post["posisi_playerid"];
        $this->posisi_nama = $post["posisi_nama"];
        return $this->db->update($this->_table, $this, array('posisi_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("posisi_id" => $id));
    }

    public function tim()
    {
        $query2 = $this->db->query('select * from tb_tim');
        return $query2->result();
    }
    public function player()
    {
        $query3 = $this->db->query('select * from tb_player');
        return $query3->result();
    }
}
