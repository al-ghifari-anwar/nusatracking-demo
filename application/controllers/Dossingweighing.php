<?php
defined('BASEPATH') or exit('No direct scripts allowed');

class Dossingweighing extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dossing & Weighing';
        $data['menu'] = 'dossweigh';
        $this->load->view('Theme/Header', $data);
        $this->load->view('Theme/Menu');
        $this->load->view('Dossingweighing/Index');
        $this->load->view('Theme/Footer');
        $this->load->view('Theme/Scripts');
    }
}
