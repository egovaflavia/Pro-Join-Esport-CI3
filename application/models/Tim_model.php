<?php error_reporting(0); ?>

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tim_model extends CI_Model
{
    private $_table = "tb_tim";

    public $tim_id;
    public $tim_jenis;
    public $tim_about;
    public $tim_nama;
    public $tim_lokasi;
    public $tim_cek;
    public $tim_tahunmasuk;
    public $tim_fb;
    public $tim_yt;
    public $tim_ig;
    public $tim_image;

    public function rules()
    {
        return [
            [
                'field' => 'tim_jenis',
                'label' => 'tim_jenis',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_about',
                'label' => 'tim_about',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_nama',
                'label' => 'tim_nama',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_lokasi',
                'label' => 'tim_lokasi',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_cek',
                'label' => 'tim_cek',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_tahunmasuk',
                'label' => 'tim_tahunmasuk',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_fb',
                'label' => 'tim_fb',
            ],
            [
                'field' => 'tim_yt',
                'label' => 'tim_yt',
            ],
            [
                'field' => 'tim_ig',
                'label' => 'tim_ig',
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["tim_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tim_jenis = $post["tim_jenis"];
        $this->tim_about = $post["tim_about"];
        $this->tim_nama = $post["tim_nama"];
        $this->tim_lokasi = $post["tim_lokasi"];
        $this->tim_cek = $post["tim_cek"];
        $this->tim_tahunmasuk = $post["tim_tahunmasuk"];
        $this->tim_fb = $post["tim_fb"];
        $this->tim_yt = $post["tim_yt"];
        $this->tim_ig = $post["tim_ig"];
        $this->tim_image = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->tim_id = $post["id"];
        $this->tim_jenis = $post["tim_jenis"];
        $this->tim_about = $post["tim_about"];
        $this->tim_nama = $post["tim_nama"];
        $this->tim_lokasi = $post["tim_lokasi"];
        $this->tim_cek = $post["tim_cek"];
        $this->tim_tahunmasuk = $post["tim_tahunmasuk"];
        $this->tim_fb = $post["tim_fb"];
        $this->tim_yt = $post["tim_yt"];
        $this->tim_ig = $post["tim_ig"];
        if (!empty($_FILES["tim_image"]["name"])) {
            $this->tim_image = $this->_uploadImage();
        } else {
            $this->tim_image = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('tim_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("tim_id" => $id));
    }

    public function _uploadImage()
    {
        $config['upload_path']          = './upload/tim/';
        $config['allowed_types']        = 'png';
        $config['file_name']            = $this->tim_id;
        $config['overwrite']            = false;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if (!$config['tim_image'] == 'png') {
            echo ("<script> 
            alert('Gambar Harus .PNG');
            window.location='add';
            </script> ");
        }
        if ($this->upload->do_upload('tim_image')) {
            return $this->upload->data("file_name");
        }

        //return "default.jpg";
    }

    public function pulau()
    {
        $query = $this->db->query("SELECT * FROM tb_pulau");
        return $query->result();
    }

    public function cariProvinsi($id)
    {
        return $this->db->query("SELECT * FROM tb_provinsi WHERE pulau_id='$id'")->result();
    }
    public function cariKota($id)
    {
        return $this->db->query("SELECT * FROM tb_kota WHERE provinsi_id='$id'")->result();
    }
}
