<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUserRoleById($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }
    public function getUserRoleAll()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function searchUserData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }

    public function deleteFaq($id)
    {
    $this->db->where('id_faq', $id);
    return $this->db->delete('faq');
    }

    public function deleteTutorial($id)
    {
    $this->db->where('id_tutorial', $id);
    return $this->db->delete('tutorial');
    }

    public function deleteRule($id)
    {
    $this->db->where('id_rule', $id);
    return $this->db->delete('rules');
    }

    public function deleteTransaction($id)
    {
    $this->db->where('id_ticket', $id);
    return $this->db->delete('transaction');
    }
}
