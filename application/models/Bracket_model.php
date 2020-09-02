<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bracket_model extends CI_Model
{
    private $_table = "tb_bracket";

    public $bracket_id;
    public $bracket_tournamentid;
    public $bracket_gambar;

    public function rules()
    {
        return [
            [
                'field' => 'bracket_tournamentid',
                'label' => 'Bracket_tournamentid',
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
        return $this->db->get_where($this->_table, ["bracket_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->bracket_tournamentid = $post["bracket_tournamentid"];
        $this->bracket_gambar = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->bracket_id = $post["id"];
        $this->bracket_tournamentid = $post["bracket_tournamentid"];
        if (!empty($_FILES["bracket_gambar"]["name"])) {
            $this->bracket_gambar = $this->_uploadImage();
        } else {
            $this->bracket_gambar = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('bracket_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("bracket_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/bracket/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->bracket_id;
        $config['overwrite']            = false;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bracket_gambar')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

    public function tournamentid() 
    {
        $query1 = $this->db->query('SELECT * FROM tb_tournament');
        return $query1->result();
    }
}
