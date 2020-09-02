<?php
class M_login extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function idregis($nama)
    {

        return $this->db->query("SELECT registrasi_id FROM tb_registrasi WHERE registrasi_username='$nama'")->row();
    }
    public function regis($nama)
    {

        return $this->db->query("SELECT * FROM tb_registrasi WHERE registrasi_username='$nama'")->row();
    }

    public function getkoin()
    {
        $regis = $_SESSION['id'];
        $id = $regis->registrasi_id;
        $query = $this->db->query("SELECT * FROM tb_koin WHERE register_id='$id'");
        return $query->row();
    }
    public function tambah()
    {
        $tgl = date('Y-m-d');
        $regis = $_SESSION['id'];
        return $this->db->query("INSERT INTO tb_koin (koin_id, register_id, koin_tgl, koin_total) VALUES ('','$regis->registrasi_id','$tgl','1')");
    }
    public function edit($id)
    {
        $tgl = date('Y-m-d');
        $regis = $_SESSION['id'];
        $koin = $_SESSION['koin'];
        $id = $regis->registrasi_id;

        $tot = $koin->koin_total + 1;
        return $this->db->query("UPDATE tb_koin SET koin_id='$koin->koin_id',register_id='$koin->register_id',koin_tgl='$tgl',koin_total=$tot WHERE register_id='$id' ");
    }
}
