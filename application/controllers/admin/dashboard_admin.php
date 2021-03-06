<?php

class Dashboard_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') == '1') {
        } else if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda <strong>Belum Login</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );
            redirect('auth/login');
        }
    }

    public function index()
    {
        $title = [
            'title' => 'E-Seller'
        ];

        $role = [
            'role' => $this->session->userData('role_id')
        ];

        $this->load->view('templates_admin/header', $title);
        $this->load->view('templates_admin/sidebar', $role);
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
}
