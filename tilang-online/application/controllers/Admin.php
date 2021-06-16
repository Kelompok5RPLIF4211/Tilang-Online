<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Admin_model', 'admin');
    }

    // user

    public function index() {
        $data['title'] = 'Data Pengguna';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();

        if ($this->input->post('keyword')) {
            $data['all_user']  = $this->admin->searchUserData();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/all-user', $data);
        $this->load->view('templates/footer');
    }

    public function active($username, $status) {
        $this->db->set('active', $status);
        $this->db->where('username', $username);
        $this->db->update('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil diubah</div>');
        redirect('admin');
        
    }

    // profile

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
        $this->load->view('admin/all-profile', $data);
        $this->load->view('templates/footer');
    }

    public function adduser() {
        $this->form_validation->set_rules('ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('phone', 'No Telepon', 'required');
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
            redirect('admin');
        }
    }

    // polisi

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
        $this->load->view('admin/all-police', $data);
        $this->load->view('templates/footer');
    }

    // faq

    public function faq() {
        $data['title'] = 'Tanya Jawab';
        $data['user'] = $this->user->getUserData();
        $data['faq'] = $this->user->getFaqAll();

        if ($this->input->post('keyword')) {
            $data['faq']  = $this->user->searchFaq();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/faq', $data);
        $this->load->view('templates/footer');
    }

    public function addFaq() {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required');

        if ($this->form_validation->run() == false) {
            $this->faq();
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'status' => 1
            ];
            $this->db->insert('faq', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tanya Jawab Berhasil ditambahkan</div>');
            redirect('admin/faq');
        }
    }

    public function editFaq($id) {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required');

        if ($this->form_validation->run() == false) {
            $this->faq();
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer')
            ];
            $this->db->set($data);
            $this->db->where('id_faq', $id);
            $this->db->update('faq');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tanya Jawab Berhasil ditambahkan</div>');
            redirect('admin/faq');
        }
    }

    public function deleteFaq($id) {
        $this->db->set('status', 2);
        $this->db->where('id_faq', $id);
        $this->db->update('faq');
        $this->admin->deleteFaq($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status berhasil diubah</div>');
        redirect('admin/faq');
    }

    // tutorial

    public function tutorial() {
        $data['title'] = 'Cara Bayar';
        $data['user'] = $this->user->getUserData();
        $data['tutorial'] = $this->user->getTutorialAll();

        if ($this->input->post('keyword')) {
            $data['tutorial']  = $this->admin->searchUserData();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tutorial', $data);
        $this->load->view('templates/footer');
    }

    public function addTutorial() {
        $this->form_validation->set_rules('id_bank', 'Kode BANK', 'required');
        $this->form_validation->set_rules('step', 'Tata Cara', 'required');

        if ($this->form_validation->run() == false) {
            $this->tutorial();
        } else {
            $data = [
                'id_bank' => $this->input->post('id_bank'),
                'step' => $this->input->post('step')
            ];
            $this->db->insert('tutorial', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cara Bayar Berhasil ditambahkan</div>');
            redirect('admin/tutorial');
        }
    }

    public function editTutorial($id) {
       $this->form_validation->set_rules('id_bank', 'Kode BANK', 'required');
       $this->form_validation->set_rules('step', 'Tata Cara', 'required');

       if ($this->form_validation->run() == false) {
        $this->tutorial();
    } else {
        $data = [
            'id_bank' => $this->input->post('id_bank'),
            'step' => $this->input->post('step')
        ];
        $this->db->set($data);
        $this->db->where('id_tutorial', $id);
        $this->db->update('tutorial');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cara Bayar Berhasil Diperbarui</div>');
        redirect('admin/tutorial');
    }
}

public function deleteTutorial($id) {
        // $this->db->set('status', 2);
    $this->db->where('id_tutorial', $id);
        // $this->db->update('tutorial');
    $this->admin->deleteTutorial($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cara Bayar berhasil dihapus</div>');
    redirect('admin/tutorial');
}

    // rules

public function rule() {
    $data['title'] = 'Peraturan';
    $data['user'] = $this->user->getUserData();
    $data['rule'] = $this->user->getRuleAll();

    if ($this->input->post('keyword')) {
        $data['rule']  = $this->admin->searchUserData();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/rule', $data);
    $this->load->view('templates/footer');
}

public function addRule() {
    $this->form_validation->set_rules('article', 'Pasal', 'required');
    $this->form_validation->set_rules('detail', 'Detail Pasal', 'required');

    if ($this->form_validation->run() == false) {
        $this->rule();
    } else {
        $data = [
            'article' => $this->input->post('article'),
            'detail' => $this->input->post('detail'),
            'status' => 1
        ];
        $this->db->insert('rules', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pasal Berhasil Ditambahkan</div>');
        redirect('admin/rule');
    }
}

public function editRule($id) {
    $this->form_validation->set_rules('article', 'Pasal', 'required');
    $this->form_validation->set_rules('detail', 'Detail Pasal', 'required');

    if ($this->form_validation->run() == false) {
        $this->rule();
    } else {
        $data = [
            'article' => $this->input->post('article'),
            'detail' => $this->input->post('detail')
        ];
        $this->db->set($data);
        $this->db->where('id_rule', $id);
        $this->db->update('rules');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Undang-Undang Berhasil Diperbarui</div>');
        redirect('admin/rule');
    }
}

public function deleteRule($id) {
        // $this->db->set('status', 2);
    $this->db->where('id_rule', $id);
        // $this->db->update('rules');
    $this->admin->deleteRule($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Undang-Undang Berhasil Dihapus</div>');
    redirect('admin/rule');
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
    $this->load->view('admin/ticket', $data);
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
        redirect('admin/ticket');
    }
}

    // transaction

public function transaction() {
    $data['title'] = 'Data Transaksi';
    $data['user'] = $this->user->getUserData();
    $data['transaction'] = $this->user->getTransactionAll();
    $data['data_ticket'] = $this->user->getTicketWaiting();

    if ($this->input->post('keyword')) {
        $data['transaction']  = $this->admin->searchUserData();
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/transaction', $data);
    $this->load->view('templates/footer');
}


public function addTransaction() {
    $this->form_validation->set_rules('id_ticket', 'No Tilang', 'required');
    $file_tmp= $_FILES['image']['tmp_name'];
    $data = file_get_contents( $file_tmp );

    if ($this->form_validation->run() == false) {
        $this->transaction();
    } else {
        $data = [
            'id_ticket' => $this->input->post('id_ticket'),
            'image' => $data,
            'date_transaction' => date("Y-m-d"),
        ];
        $this->db->insert('transaction', $data);
        $this->db->set('status', 2);
        $this->db->where('id_ticket', $this->input->post('id_ticket'));
        $this->db->update('ticket');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tilang Berhasil ditambahkan</div>');
        redirect('admin/transaction');
    }
}


public function editTransaction($id) {
    $this->form_validation->set_rules('id_ticket', 'No Tilang', 'required');
    $file_tmp= $_FILES['image']['tmp_name'];
    $data = file_get_contents( $file_tmp );

    if ($this->form_validation->run() == false) {
        $this->transaction();
    } else {
        $data = [
            'id_ticket' => $this->input->post('id_ticket'),
            'image' => $data,
            'date_transaction' => date("Y-m-d"),
        ];
        $this->db->set('status', 2);
        $this->db->where('id_ticket', $id);
        $this->db->update('ticket');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tilang Berhasil diubah</div>');
        redirect('admin/transaction');
    }
}

public function deleteTransaction($id) {
    $this->db->set('status', 1);
    $this->db->where('id_ticket', $id);
    $this->db->update('ticket');
    $this->admin->deleteTransaction($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi berhasil diubah</div>');
    redirect('admin/transaction');
}
}
