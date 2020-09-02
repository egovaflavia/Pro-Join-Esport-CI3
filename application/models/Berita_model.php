<?php defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    private $_table = "tb_berita";

    public $berita_id;
    public $berita_judul;
    public $berita_post;
    public $berita_isi;
    public $image = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'berita_judul',
                'label' => 'Berita_judul',
                'rules' => 'required'
            ],

            [
                'field' => 'berita_post',
                'label' => 'Berita_post',
                'rules' => 'required'
            ],

            [
                'field' => 'berita_isi',
                'label' => 'Berita_isi',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function get_all_limit()
    {
        $this->db->limit(3);
        $query =  $this->db->order_by('berita_post', 'DESC')->get('tb_berita');
        return $query->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["berita_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->berita_judul = $post["berita_judul"];
        $this->berita_post = $post["berita_post"];
        $this->berita_isi = $post["berita_isi"];
        $this->image = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->berita_id = $post["id"];
        $this->berita_judul = $post["berita_judul"];
        $this->berita_post = $post["berita_post"];
        $this->berita_isi = $post["berita_isi"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('berita_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("berita_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/berita/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->berita_id;
        $config['overwrite']            = false;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
}
