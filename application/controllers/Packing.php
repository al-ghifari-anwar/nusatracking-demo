<?php
defined('BASEPATH') or exit('No direct scripts allowed');

class Packing extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Packing';
        $data['menu'] = 'packing';
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/Menu');
        $this->load->view('Packing/Index');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
    }
}
