<?php error_reporting(0); ?>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reward_model extends CI_Model
{
    private $_table = "tb_reward";

    public $reward_id;
    public $reward_jenis;
    public $reward_nama;
    public $reward_stok;
    public $reward_koin;
    public $reward_image;
 
    public function rules()
    {
        return [
            [
                'field' => 'reward_jenis',
                'label' => 'Reward_jenis',
                'rules' => 'required'
            ],
            [
                'field' => 'reward_nama',
                'label' => 'Reward_nama',
                'rules' => 'required'
            ],
            [
                'field' => 'reward_stok',
                'label' => 'Reward_stok',
                'rules' => 'required'
            ],
            [
                'field' => 'reward_koin',
                'label' => 'Reward_koin',
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
        return $this->db->get_where($this->_table, ["reward_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->reward_jenis = $post["reward_jenis"];
        $this->reward_nama = $post["reward_nama"];
        $this->reward_stok = $post["reward_stok"];
        $this->reward_koin = $post["reward_koin"];
        $this->reward_image = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->reward_id = $post["id"];
        $this->reward_jenis = $post["reward_jenis"];
        $this->reward_nama = $post["reward_nama"];
        $this->reward_stok = $post["reward_stok"];
        $this->reward_koin = $post["reward_koin"];
        if (!empty($_FILES["reward_image"]["name"])) {
            $this->reward_image = $this->_uploadImage();
        } else {
            $this->reward_image = $post["old_image"];
        }
        return $this->db->update($this->_table, $this, array('reward_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('reward_id' => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/reward/';
        $config['allowed_types']        = 'png';
        $config['file_name']            = $this->reward_id;
        $config['overwrite']            = false;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if (!$config['reward_image'] == 'png') {
            echo ("<script> 
            alert('Gambar Harus .PNG');
            window.location='add';
            </script> ");
        }

        if ($this->upload->do_upload('reward_image')) {
            return $this->upload->data("file_name");
        }
        //  return "default.jpg";
    }
    public function hitung($id)
    {
        $query = $this->db->query("SELECT COUNT(*) FROM tb_poin WHERE point_playernama=$id");
        return $query->result();
    }
    public function gethardware()
    {
        $query = $this->db->query("SELECT * FROM tb_reward WHERE reward_jenis='hardware'");
        return $query->result();
    }
    public function getvoucher()
    {
        $query = $this->db->query("SELECT * FROM tb_reward WHERE reward_jenis='voucher'");
        return $query->result();
    }
    public function getmerch()
    {
        $query = $this->db->query("SELECT * FROM tb_reward WHERE reward_jenis='merch'");
        return $query->result();
    }
}
