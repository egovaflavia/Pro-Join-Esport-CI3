<?php error_reporting(0); ?>
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tim_fmodel extends CI_Model
{
    private $_table = "tb_tim";
    private $_table1 = "tb_player";
    private $_posisi = "tb_posisi";
    private $_request = "tb_request";


    public $tim_id;
    public $tim_about;
    public $tim_nama;
    public $tim_lokasi;
    public $tim_tahunmasuk;
    public $tim_jenis;
    public $tim_cek;
    public $tim_fb;
    public $tim_yt;
    public $tim_ig;
    public $tim_image;
    public $tim_registrasi;

    public function rules()
    {
        return [
            [
                'field' => 'tim_about',
                'label' => 'tim_about',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_registrasi',
                'label' => 'tim_registrasi',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_nama',
                'label' => 'tim_nama',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_jenis',
                'label' => 'tim_jenis',
                'rules' => 'required'
            ],
            [
                'field' => 'tim_lokasi',
                'label' => 'tim_lokasi',
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
                'field' => 'tim_cek',
                'label' => 'tim_cek',
            ],
            [
                'field' => 'tim_yt',
                'label' => 'tim_yt',
            ],
            [
                'field' => 'tim_ig',
                'label' => 'tim_ig',
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById2($id)
    {
        return $this->db->get_where($this->_table, ["tim_id" => $id])->row();
    }
    public function getposisi($id)
    {
        return $this->db->get_where($this->_posisi, ["posisi_id" => $id])->row();
    }
    public function get_by_role1()
    {
        $query1 = $this->db->query('select * from tb_player');
        return $query1->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["tim_registrasi" => $id])->result();
    }
    public function getanggota()
    {
        return $this->db->query("SELECT * FROM tb_tim LEFT JOIN tb_posisi ON tb_tim.tim_id=tb_posisi.posisi_timid ")->result();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->tim_about = $post["tim_about"];
        $this->tim_nama = $post["tim_nama"];
        $this->tim_lokasi = $post["tim_lokasi"];
        $this->tim_jenis = $post["tim_jenis"];
        $this->tim_tahunmasuk = $post["tim_tahunmasuk"];
        $this->tim_fb = $post["tim_fb"];
        $this->tim_yt = $post["tim_yt"];
        $this->tim_ig = $post["tim_ig"];
        $this->tim_cek = 'no';
        $this->tim_registrasi = $post["tim_registrasi"];
        if (!empty($_FILES["tim_image"]["name"])) {
            $this->tim_image = $this->_uploadImage();
        } else {
            $this->tim_image = $post["old_image"];
        }
        $this->db->insert($this->_table, $this);
        $id_team = $this->db->insert_id();
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $jenis = $post["tim_jenis"];
        // $koneksi = mysqli_connect('localhost', 'joinesports_root', 'egova13081996', 'joinesports_database');
        $koneksi = mysqli_connect('localhost', 'root', '', 'db_join');
        $query = $koneksi->query("SELECT player_id FROM tb_player WHERE player_registrasi='$id' AND player_jenis='$jenis'");
        $pecah = $query->fetch_object();
        $this->db->update($this->_posisi, array("posisi_timid" => $id_team, "posisi_nama" => "Leader"), array('posisi_playerid' => $pecah->player_id));
        // update player set timid = id_team where id_player = $id_player
        return $id_team;
    }
    public function acc($id)
    {
        return $this->db->get_where($this->_request, ["request_id" => $id])->row();
    }
    public function update()
    {
        $post = $this->input->post();
        $this->tim_id = $post["tim_id"];
        $this->tim_about = $post["tim_about"];
        $this->tim_nama = $post["tim_nama"];
        $this->tim_lokasi = $post["tim_lokasi"];
        $this->tim_jenis = $post["tim_jenis"];
        $this->tim_tahunmasuk = $post["tim_tahunmasuk"];
        $this->tim_fb = $post["tim_fb"];
        $this->tim_yt = $post["tim_yt"];
        $this->tim_ig = $post["tim_ig"];
        $this->tim_registrasi = $post["tim_registrasi"];
        $this->tim_cek = $post["tim_cek"];
        if (!empty($_FILES["tim_image"]["name"])) {
            $this->tim_image = $this->_uploadImage();
        } else {
            $this->tim_image = $post["old_image"];
        }

        return $this->db->update($this->_table, $this, array('tim_id' => $post['tim_id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("tim_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/tim/';
        $config['allowed_types']        = 'png';
        $config['file_name']            = $this->tim_id;
        $config['overwrite']            = false;
        $config['max_size']             = 1024;
        $this->load->library('upload', $config);

        if (!$config['tim_image'] == 'png') {
            echo (" <script>
        alert('Gambar harus format PNG');
        window.location='daftarteam'; </script>");
        }
        if ($this->upload->do_upload('tim_image')) {
            return $this->upload->data("file_name");
        }
        // return "default.jpg";
    }
    public function getpubg()
    {
        $this->db->select('*');
        $this->db->where('tim_jenis', 'pubg');
        return $this->db->get($this->_table)->result();
    }
    public function getml()
    {
        $this->db->select('*');
        $this->db->where('tim_jenis', 'ml');
        return $this->db->get($this->_table)->result();
    }
    public function getdota()
    {
        $this->db->select('*');
        $this->db->where('tim_jenis', 'dota');
        return $this->db->get($this->_table)->result();
    }
    public function getpb()
    {
        $this->db->select('*');
        $this->db->where('tim_jenis', 'pb');
        return $this->db->get($this->_table)->result();
    }
    public function getff()
    {
        $this->db->select('*');
        $this->db->where('tim_jenis', 'ff');
        return $this->db->get($this->_table)->result();
    }
    public function getpubgm()
    {
        $this->db->select('*');
        $this->db->where('tim_jenis', 'pubgm');
        return $this->db->get($this->_table)->result();
    }
    public function berdasarkannamapubg()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='pubg' ORDER BY tim_nama ASC")->result();
    }
    public function berdasarkantahunpubg()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='pubg' ORDER BY tim_nama DESC")->result();
    }
    public function berdasarkannamaml()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='ml' ORDER BY tim_nama ASC")->result();
    }
    public function berdasarkantahunml()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='ml' ORDER BY tim_nama DESC")->result();
    }
    public function berdasarkannamaff()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='ff' ORDER BY tim_nama ASC")->result();
    }
    public function berdasarkantahunff()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='ff' ORDER BY tim_nama DESC")->result();
    }
    public function berdasarkannamapb()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='pb' ORDER BY tim_nama ASC")->result();
    }
    public function berdasarkantahunpb()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='pb' ORDER BY tim_nama DESC")->result();
    }
    public function berdasarkannamadota()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='dota' ORDER BY tim_nama ASC")->result();
    }
    public function berdasarkantahundota()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='dota' ORDER BY tim_nama DESC")->result();
    }
    public function berdasarkannamapubgm()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='pubgm' ORDER BY tim_nama ASC")->result();
    }
    public function berdasarkantahunpubgm()
    {
        return $this->db->query("SELECT * FROM tb_tim WHERE tim_jenis='pubgm' ORDER BY tim_nama DESC")->result();
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
    public function idregis($nama)
    {
        return $this->db->query("SELECT registrasi_id FROM tb_registrasi WHERE registrasi_username='$nama'")->row();
    }
    public function cek()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT tim_registrasi FROM tb_tim WHERE tim_registrasi='$id'");
        return $query->row();
    }
    public function cek2()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT tim_id FROM tb_tim WHERE tim_registrasi='$id'");
        return $query->row();
    }
    public function cekidpubg()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE player_jenis='pubg' and player_registrasi='$id'");
        return $query->row();
    }
    public function cekidpb()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE player_jenis='pb' and player_registrasi='$id'");
        return $query->row();
    }
    public function cekidml()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE player_jenis='ml' and player_registrasi='$id'");
        return $query->row();
    }
    public function cekiddota()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE player_jenis='dota' and player_registrasi='$id'");
        return $query->row();
    }
    public function cekidpubgm()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE player_jenis='pubgm' and player_registrasi='$id'");
        return $query->row();
    }
    public function cekidff()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_posisi LEFT JOIN tb_player ON tb_posisi.posisi_playerid=tb_player.player_id WHERE player_jenis='ff' and player_registrasi='$id'");
        return $query->row();
    }
    public function request()
    {
        return $this->db->query("SELECT * FROM tb_request")->result();
    }
}
