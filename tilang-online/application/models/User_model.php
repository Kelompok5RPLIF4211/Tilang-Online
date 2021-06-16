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
    // ticket
    public function getTicketAll() {
        $query = $this->db->get('ticket');
        return $query->result_array();
    }
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
