<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bagan_model extends CI_Model
{
    private $_table = "tb_bagan";

    public $bagan_id;
    public $bagan_tournamentid;
    public $bagan_tima;
    public $bagan_timb;
    public $bagan_waktu;
    public $bagan_scorea;
    public $bagan_scoreb;
    public $bagan_babak;
    public $bagan_menang;
    public $bagan_keterangan;

    public function rules()
    {
        return [
            [
                'field' => 'bagan_tournamentid',
                'label' => 'bagan_tournamentid',
                'rules' => 'required'
            ],

            [
                'field' => 'bagan_tima',
                'label' => 'bagan_tima',
                'rules' => 'required'
            ],
            [
                'field' => 'bagan_timb',
                'label' => 'bagan_timb',
                'rules' => 'required'
            ],
            [
                'field' => 'bagan_waktu',
                'label' => 'Bagan_waktu',
                'rules' => 'required'
            ],

            [
                'field' => 'bagan_scorea',
                'label' => 'bagan_scorea'

            ],
            [
                'field' => 'bagan_scoreb',
                'label' => 'bagan_scoreb'
            ],
            [
                'field' => 'bagan_babak',
                'label' => 'bagan_babak',
                'rules' => 'required'
            ],
            [
                'field' => 'bagan_menang',
                'label' => 'bagan_menang'
            ],
            [
                'field' => 'bagan_keterangan',
                'label' => 'bagan_keterangan'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["bagan_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->bagan_tournamentid = $post["bagan_tournamentid"];
        $this->bagan_tima = $post["bagan_tima"];
        $this->bagan_timb = $post["bagan_timb"];
        $tgl = $post["bagan_waktu"];
        $jam = $post["bagan_jam"];
        $waktu = $tgl . " " . $jam;
        $this->bagan_waktu = $waktu;
        $this->bagan_scorea = "";
        $this->bagan_scoreb = "";
        $this->bagan_babak = $post["bagan_babak"];
        $this->bagan_menang = "";
        $this->bagan_keterangan = $post["bagan_keterangan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->bagan_id = $post["id"];
        $this->bagan_tournamentid = $post["bagan_tournamentid"];
        $this->bagan_tima = $post["bagan_tima"];
        $this->bagan_timb = $post["bagan_timb"];
        $this->bagan_waktu = $post["bagan_waktu"];
        $this->bagan_scorea = $post["bagan_scorea"];
        $this->bagan_scoreb = $post["bagan_scoreb"];
        $this->bagan_babak = $post["bagan_babak"];
        $this->bagan_menang = $post["bagan_menang"];
        $this->bagan_keterangan = $post["bagan_keterangan"];

        return $this->db->update($this->_table, $this, array('bagan_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("bagan_id" => $id));
    }

    public function gettournament()
    {
        $query3 = $this->db->query('select * from tb_tournament');
        return $query3->result();
    }

    public function cariTim($id)
    {
        return $this->db->query("SELECT b.tim_id,b.tim_nama FROM tb_daftartournament a LEFT JOIN tb_tim b ON a.daftartournament_idtim=b.tim_id WHERE a.tournamentid='$id'")->result();
    }
}
