<?php defined('BASEPATH') or exit('No direct script access allowed');

class Klaim extends CI_Model
{
    private $_table = "tb_klaim";

    public function tambah()
    {
        $tgl = date('Y-m-d');
        $regis = $_SESSION['id'];
        $poin = mt_rand(20, 50);
        return $this->db->query("INSERT INTO tb_klaim (klaim_registrasiid, klaim_tgl, klaim_poin) VALUES ('$regis->registrasi_id','$tgl','$poin')");
    }
 
    public function cek_status_klaim()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $tgl = date('Y-m-d');
        return $this->db->get_where($this->_table, ["klaim_registrasiid" => $id, "klaim_tgl" => $tgl])->row();
    }
}
