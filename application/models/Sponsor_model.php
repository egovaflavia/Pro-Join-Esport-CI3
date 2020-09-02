<?php error_reporting(0); ?>

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sponsor_model extends CI_Model
{
    private $_table = "tb_sponsor";

    public $sponsor_id;
    public $sponsor_nama;
    public $sponsor_link;
    public $sponsor_tglmulai;
    public $sponsor_tglselesai;
    public $image;

    public function rules()
    {
        return [
            [
                'field' => 'sponsor_nama',
                'label' => 'sponsor_nama',
                'rules' => 'required'
            ],
            [
                'field' => 'sponsor_link',
                'label' => 'sponsor_link',
                'rules' => 'required'
            ],
            [
                'field' => 'sponsor_tglmulai',
                'label' => 'sponsor_tglmulai',
                'rules' => 'required'
            ],
            [
                'field' => 'sponsor_tglselesai',
                'label' => 'sponsor_tglselesai',
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
        return $this->db->get_where($this->_table, ["sponsor_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->sponsor_nama = $post["sponsor_nama"];
        $this->sponsor_link = $post["sponsor_link"];
        $this->sponsor_tglmulai = $post["sponsor_tglmulai"];
        $this->sponsor_tglselesai = $post["sponsor_tglselesai"];
        $this->image = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->sponsor_id = $post["id"];
        $this->sponsor_nama = $post["sponsor_nama"];
        $this->sponsor_link = $post["sponsor_link"];
        $this->sponsor_tglmulai = $post["sponsor_tglmulai"];
        $this->sponsor_tglselesai = $post["sponsor_tglselesai"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('sponsor_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("sponsor_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/sponsor/';
        $config['allowed_types']        = 'png';
        $config['file_name']            = $this->sponsor_id;
        $config['overwrite']            = false;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($config['image'] != 'png') {
            echo ("<script> 
            alert('Gambar Harus .PNG');
            window.location='add';
            </script> ");
        }

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        // return "default.jpg";
    }
}
