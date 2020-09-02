<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftartim_model extends CI_Model
{
    private $_table = "tb_daftartim";

    public $daftartim_id;
    public $daftartim_idplayer;
    public $daftartim_tgldaftar;

    public function rules()
    {
        return [

            [
                'field' => 'daftartim_idplayer',
                'label' => 'daftartim_idplayer',
                'rules' => 'required'
            ],
            [
                'field' => 'daftartim_tgldaftar',
                'label' => 'daftartim_tgldaftar',
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
        return $this->db->get_where($this->_table, ["daftartim_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->daftartim_idplayer = $post["daftartim_idplayer"];
        $this->daftartim_tgldaftar = $post["daftartim_tgldaftar"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->daftartim_id = $post["id"];
        $this->daftartim_idplayer = $post["daftartim_idplayer"];
        $this->daftartim_tgldaftar = $post["daftartim_tgldaftar"];
        return $this->db->update($this->_table, $this, array('daftartim_id' => $post['id']));
    }

    public function get_by_role1()
    {
        $query1 = $this->db->query('select * from tb_player');
        return $query1->result();
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array("daftartim_id" => $id));
    }
}
