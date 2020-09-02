<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftartournaments extends CI_Controller
{
    public function index()
    {
        $this->template->load('vhome', 'components/daftartournaments');

    }
}
