<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("berita_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $datas["beritas"] = $this->berita_model->getAll();
        $this->template->load('vhome', 'components/news', $datas);
    }
    public function detail($id = null)
    {
        if (!isset($id)) redirect('components/news');

        $berita = $this->berita_model;
        $validation = $this->form_validation;
        $validation->set_rules($berita->rules());

        $data["berita"] = $berita->getById($id);
        if (!$data["berita"]) show_404();
        $this->template->load('vhome', 'components/detail_berita', $data);
    }
}
