<?php
class  Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");

        $is_login = $this->session->userdata("status");
        if (!$is_login) {
            redirect(base_url("admin/login"));
        }
    }
    public function index()
    {
        $this->load->view("admin/overview");
    }
}
