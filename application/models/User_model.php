<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Users Data
    public function getUserData() {
        $query = $this->db->get_where('user', ['username' => $this->session->userdata('username')]);
        return $query->row_array();
    }
    // User
    public function getUserDataAll() {
        $query = "SELECT * from user JOIN profile where user.username = profile.username";
        return $this->db->query($query)->result_array();
    }
    // Police
    public function getPoliceDataAll() {
        $query = "SELECT * from user JOIN police where user.username = police.username";
        return $this->db->query($query)->result_array();
    }
    // Faq
    public function getFaqAll() {
        $query = $this->db->get_where('faq', array('status' => 1));
        return $query->result_array();
    }
    public function searchFaq() {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('question', $keyword);
        return $this->db->get_where('faq', array('status' => 1))->result_array();
    }
    // tutorial
    public function getTutorialAll() {
        $query = $this->db->get('tutorial');
        return $query->result_array();
    }
    public function searchTutorial() {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('id_bank', $keyword);
        $this->db->or_like('step', $keyword);
        return $this->db->get('tutorial')->result_array();
    }
    // rule
    public function getRuleAll() {
        $query = $this->db->get_where('rules', array('status' => 1));
        return $query->result_array();
    }
    public function searchRule() {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('article', $keyword);
        $this->db->or_like('detail', $keyword);
        return $this->db->get('rules')->result_array();
    }


    #Bagian Nova

    /**
     * Fungsi yang digunakan untuk mengambil semua data ticket yang ada dalam database
     *
     * Diimplementasikan untuk melihat data tilang yang ada pada view ticket.php
     *
     * @param array $query
     *          untuk menampung data ticket
     * @return hasil array pada $query
     *          untuk menyimpan data ticker dan mengoutputkannya
     * 
     */
    public function getTicketAll() {
        $query = $this->db->get('ticket');
        return $query->result_array();
    }


    /**
     * Fungsi yang digunakan untuk mengambil semua data ticket yang berstatus 1 yang ada dalam database
     *
     * @param array $query
     *          untuk menampung data ticket yang berstatus 1
     * @return hasil array pada $query
     *          untuk menyimpan data ticket yang berstatus 1 dan mengoutputkannya
     * 
     */
    public function getTicketWaiting() {
        $query = $this->db->get_where('ticket', array('status' => 1));
        return $query->result_array();
    }
























    // transaction
    public function getTransactionAll() {
        $query = $this->db->get('transaction');
        return $query->result_array();
    }
    // Login
    public function userCheckLogin($username)
    {
        $this->db->where("username =  '$username'");
        $query = $this->db->get('user');
        return $query->row_array();
    }
}
