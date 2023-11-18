<?php
defined('BASEPATH') or exit('No direct scripts allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('Theme/Header', $data);
        $this->load->view('Auth/Index');
        $this->load->view('Theme/Scripts');
    }
}
