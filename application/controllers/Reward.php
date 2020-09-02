<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reward extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("reward_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $reward_model = $this->reward_model;
        $validation = $this->form_validation;
        $validation->set_rules($reward_model->rules());
        $data["rewards"] = $this->reward_model->getAll();
        $data["hardware"] = $this->reward_model->gethardware();
        $data["voucher"] = $this->reward_model->getvoucher();
        $data["merch"] = $this->reward_model->getmerch();
        $this->template->load('vhome', 'components/reward', $data);
    }
}
