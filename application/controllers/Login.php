<?php
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    function index()
    {
        $this->load->view('register');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'registrasi_username' => $username,
            'registrasi_password' => md5($password)
        );
        $cek = $this->m_login->cek_login("tb_registrasi", $where)->num_rows();
        if ($cek == 1) {
            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );
            $_SESSION['akun'] = $data_session;
            $insert = $this->m_login;
            $data = $this->m_login->idregis($username);
            $_SESSION['id'] = $data;
            $tgl = date('Y-m-d');
            $koin = $this->m_login->getkoin();
            $_SESSION['koin'] = $koin;
            if (($tgl == $koin->koin_tgl) && ($data->registrasi_id == $koin->register_id)) {
                $tgl = date('Y-m-d');
            } elseif ($data->registrasi_id == $koin->register_id  && ($tgl != $koin->koin_tgl)) {
                $insert->edit($data->registrasi_id);
            } else {
                $insert->tambah();
            }

            $this->session->set_userdata($data_session);

            redirect(base_url());
        } else { ?>
            <script>
                alert('Userename atau Password salah');
                window.location = '<?php echo base_url() ?>'
            </script>;

<?php
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(''));
    }
}
