<?php defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_model extends CI_Model
{
    private $_table = "tb_registrasi";

    public $registrasi_id;
    public $registrasi_nama;
    public $registrasi_nohp;
    public $registrasi_email;
    public $registrasi_username;
    public $registrasi_password;
    public $registrasi_tgllahir;
    public $registrasi_alamat;
    public $registrasi_fb;
    public $registrasi_yt;
    public $registrasi_ig;
    public $registrasi_image;


    public function rules()
    {
        return [
            [
                'field' => 'registrasi_nama',
                'label' => 'registrasi_nama',
                'rules' => 'required'
            ],
            [
                'field' => 'registrasi_nohp',
                'label' => 'registrasi_nohp',
                'rules' => 'required'
            ],
            [
                'field' => 'registrasi_email',
                'label' => 'registrasi_email',
                'rules' => 'required'
            ],
            [
                'field' => 'registrasi_username',
                'label' => 'registrasi_username',
                'rules' => 'required'
            ],
            [
                'field' => 'registrasi_password',
                'label' => 'registrasi_password',
                'rules' => 'required'
            ],
            [
                'field' => 'registrasi_tgllahir',
                'label' => 'registrasi_tgllahir',
                'rules' => 'required'
            ],
            [
                'field' => 'registrasi_alamat',
                'label' => 'registrasi_alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'registrasi_fb',
                'label' => 'registrasi_fb'
            ],
            [
                'field' => 'registrasi_yt',
                'label' => 'registrasi_yt'
            ],
            [
                'field' => 'registrasi_ig',
                'label' => 'registrasi_ig'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["registrasi_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->registrasi_nama = $post["registrasi_nama"];
        $this->registrasi_nohp = $post["registrasi_nohp"];
        $this->registrasi_email = $post["registrasi_email"];
        $this->registrasi_username = $post["registrasi_username"];
        $this->registrasi_password = md5($post["registrasi_password"]);
        $this->registrasi_tgllahir = $post["registrasi_tgllahir"];
        $this->registrasi_alamat = $post["registrasi_alamat"];
        $this->registrasi_fb = $post["registrasi_fb"];
        $this->registrasi_yt = $post["registrasi_yt"];
        $this->registrasi_ig = $post["registrasi_ig"];
        $this->registrasi_image = $this->_uploadImage();
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->registrasi_id = $post["id"];
        $this->registrasi_nama = $post["registrasi_nama"];
        $this->registrasi_nohp = $post["registrasi_nohp"];
        $this->registrasi_email = $post["registrasi_email"];
        $this->registrasi_username = $post["registrasi_username"];
        $this->registrasi_password = md5($post["registrasi_password"]);
        $this->registrasi_tgllahir = $post["registrasi_tgllahir"];
        $this->registrasi_alamat = $post["registrasi_alamat"];
        $this->registrasi_fb = $post["registrasi_fb"];
        $this->registrasi_yt = $post["registrasi_yt"];
        $this->registrasi_ig = $post["registrasi_ig"];
        if (!empty($_FILES["registrasi_image"]["name"])) {
            $this->registrasi_image = $this->_uploadImage();
        } else {
            $this->registrasi_image = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('registrasi_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("registrasi_id" => $id));
    }

    public function _uploadImage()
    {
        $config['upload_path']          = './upload/player/';
        $config['allowed_types']        = 'jpg||png||jpeg';
        $config['file_name']            = $this->registrasi_id;
        $config['overwrite']            = false;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('registrasi_image')) {
            return $this->upload->data("file_name");
        } else {
            return "default.jpg";
        }

        return "default.jpg";
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
