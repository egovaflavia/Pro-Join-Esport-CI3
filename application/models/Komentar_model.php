<?php defined('BASEPATH') or exit('No direct script access allowed');

class Komentar_model extends CI_Model
{
    private $_table = "tb_komentar";

    public $komentar_id;
    public $komentar_idtournament;
    public $komentar_status;
    public $komentar_nama;
    public $komentar_isi;
    public $komentar_waktu;


    public function rules()
    {
        return [
            [
                'field' => 'komentar_idtournament',
                'label' => 'Komentar_idtournament',
                'rules' => 'required'
            ],
            [
                'field' => 'komentar_status',
                'label' => 'Komentar_status',
                'rules' => 'required'
            ],
            [
                'field' => 'komentar_nama',
                'label' => 'Komentar_nama',
                'rules' => 'required'
            ],
            [
                'field' => 'komentar_isi',
                'label' => 'Komentar_isi',
                'rules' => 'required'
            ],
            [
                'field' => 'komentar_waktu',
                'label' => 'Komentar_waktu',
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
        return $this->db->get_where($this->_table, ["komentar_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->komentar_idtournament = $post["komentar_idtournament"];
        $this->komentar_status = $post["komentar_status"];
        $this->komentar_nama = $post["komentar_nama"];
        $this->komentar_isi = $post["komentar_isi"];
        $this->komentar_waktu = $post["komentar_waktu"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->komentar_id = $post["id"];
        $this->komentar_idtournament = $post["komentar_idtournament"];
        $this->komentar_status = $post["komentar_status"];
        $this->komentar_nama = $post["komentar_nama"];
        $this->komentar_isi = $post["komentar_isi"];
        $this->komentar_waktu = $post["komentar_waktu"];
        return $this->db->update($this->_table, $this, array('komentar_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("komentar_id" => $id));
    }

    public function idtournament()
    {
        $idtournament = $this->db->query('SELECT * FROM tb_tournament');
        return $idtournament->result();
    }
}
