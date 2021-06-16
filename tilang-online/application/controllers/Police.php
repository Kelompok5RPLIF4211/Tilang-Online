<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Police extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      is_logged_in();
      $this->load->model('User_model', 'user');
      $this->load->model('Menu_model', 'menu');
      $this->load->model('Admin_model', 'admin');
  }

  public function index() {
      $data['title'] = 'Data Seluruh Pengguna';
      $data['user'] = $this->user->getUserData();
      $data['all_user'] = $this->user->getUserDataAll();

      if ($this->input->post('keyword')) {
          $data['all_user']  = $this->admin->searchUserData();
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('Police/index', $data);
      $this->load->view('templates/footer');
  }

  public function police() {
      $data['title'] = 'Data Polisi';
      $data['user'] = $this->user->getUserData();
      $data['all_user'] = $this->user->getPoliceDataAll();

      if ($this->input->post('keyword')) {
          $data['all_user']  = $this->admin->searchUserData();
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('Police/all-police', $data);
      $this->load->view('templates/footer');
  }
  public function DataPolice() {
      $data['title'] = 'Data Polisi';
      $data['user'] = $this->user->getUserData();
      $data['all_user'] = $this->user->getPoliceDataAll();

      if ($this->input->post('keyword')) {
          $data['all_user']  = $this->admin->searchUserData();
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('Police/all-user', $data);
      $this->load->view('templates/footer');
  }

  public function profile() {
      $data['title'] = 'Data Pengguna';
      $data['user'] = $this->user->getUserData();
      $data['all_user'] = $this->user->getUserDataAll();

      if ($this->input->post('keyword')) {
          $data['all_user']  = $this->admin->searchUserData();
      }
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('Police/all-profile', $data);
      $this->load->view('templates/footer');
  }
  // ticket

  public function ticket() {
    $data['title'] = 'Data Tilang';
    $data['user'] = $this->user->getUserData();
    $data['ticket'] = $this->user->getTicketAll();
    $data['data_profile'] = $this->user->getUserDataAll();
    $data['data_police'] = $this->user->getPoliceDataAll();
    $data['data_rule'] = $this->user->getRuleAll();

    if ($this->input->post('keyword')) {
      $data['ticket']  = $this->admin->searchUserData();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('Police/ticket', $data);
    $this->load->view('templates/footer');
  }

  public function addTicket() {
    $this->form_validation->set_rules('id_ticket', 'No Tilang', 'required');
    $this->form_validation->set_rules('ktp', 'No TKP', 'required');
    $this->form_validation->set_rules('kta', 'No KTA', 'required');
    $this->form_validation->set_rules('article[]', 'Pasal', 'required');
    $this->form_validation->set_rules('nominal', 'Denda', 'required');

    if ($this->form_validation->run() == false) {
      $this->ticket();
    } else {
      $article = $this->input->post('article');
      $article = join(", ",$article);
      $data = [
        'id_ticket' => $this->input->post('id_ticket'),
        'ktp' => $this->input->post('ktp'),
        'kta' => $this->input->post('kta'),
        'article' => $article,
        'nominal' => $this->input->post('nominal'),
        'date_create' => date("Y-m-d"),
        'status' => 1,
      ];
      $this->db->insert('ticket', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tilang Berhasil ditambahkan</div>');
      redirect('Police/ticket');
    }
  }
  public function editTicket($id) {
    $this->form_validation->set_rules('denda', 'Denda', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == false) {
      $this->rule();
    } else {
      $data = [
        'nominal' => $this->input->post('denda'),
        'status' => $this->input->post('status')
      ];
      $this->db->set($data);
      $this->db->where('id_ticket', $id);
      $this->db->update('ticket');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tilang Berhasil Diperbarui</div>');
      redirect('Police/ticket');
    }
  }
  public function deleteTicket($id) {
        // $this->db->set('status', 2);
    $this->db->where('id_ticket', $id);
        // $this->db->update('rules');
    $this->admin->deleteTicket($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tilang Berhasil Diubah</div>');
    redirect('Police/ticket');
  }
  public function adduser() {

    $this->form_validation->set_rules('ktp', 'No. KTP', 'required');
    $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('address', 'Alamat', 'required');
    $this->form_validation->set_rules('phone', 'Telepon', 'required');
    $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');

    if ($this->form_validation->run() == false) {
      $this->index();
    } else {
      $data = [
        'ktp' => $this->input->post('ktp'),
        'username' => $this->input->post('ktp'),
        'name' => ucwords($this->input->post('name')),
        'address' => ucwords($this->input->post('address')),
        'phone' => $this->input->post('phone'),
        'gender' => $this->input->post('gender')
      ];
      $dataUser = [
        'username' => $this->input->post('ktp'),
        'password' => password_hash($this->input->post('ktp'), PASSWORD_DEFAULT),
        'type' => 3,
        'active' => 2
      ];
      $this->db->insert('profile', $data);
      $this->db->insert('user', $dataUser);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil ditambahkan</div>');
      redirect('Police');
    }
  }
}
