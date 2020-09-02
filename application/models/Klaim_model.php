<?php defined('BASEPATH') or exit('No direct script access allowed');

class Klaim_model extends CI_Model
{
    private $_table = "tb_klaim";

    public $klaim_id;
    public $klaim_poin;
    public $klaim_tgl;
    public $klaim_registrasiid;

    public function rules()
    {
        return [
            [
                'field' => 'klaim_poin',
                'label' => 'Klaim_poin',
                'rules' => 'required'
            ],
            [
                'field' => 'klaim_tgl',
                'label' => 'Klaim_tgl',
                'rules' => 'required'
            ],
            [
                'field' => 'klaim_registrasiid',
                'label' => 'Klaim_registrasiid',
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
        return $this->db->get_where($this->_table, ["klaim_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->klaim_poin = $post["klaim_poin"];
        $this->klaim_tgl = $post["klaim_tgl"];
        $this->klaim_registrasiid = $post["klaim_registrasiid"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->klaim_id = $post["id"];
        $this->klaim_poin = $post["klaim_poin"];
        $this->klaim_tgl = $post["klaim_tgl"];
        $this->klaim_registrasiid = $post["klaim_registrasiid"];
        return $this->db->update($this->_table, $this, array('klaim_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("klaim_id" => $id));
    }

    public function regis()
    {
        $regis = $this->db->query('SELECT * FROM tb_registrasi');
        return $regis->result();
    }
}
